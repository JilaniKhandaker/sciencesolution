<?php


class Application {
    //put your code here
    
    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'sciencesolution';
        $con = mysqli_connect($host_name, $user_name, $password);
        if ($con) {
            $db_select = mysqli_select_db($con, $db_name);
            if ($db_select) {
                return $con;
            } else {
                die('Database not selected' . mysqli_error($con));
            }
        } else {
            die('Database server connection fail' . mysqli_error($con));
        }
    }
    
     function save_user_info($data) {
        $con = $this->__construct();
        $password = md5($data['password']);
        
        

        $directory = 'assets/images';
        $target_file = $directory . $_FILES['user_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['user_image']['size'];
        $check = getimagesize($_FILES['user_image']['tmp_name']);
        if ($check) {
            if ($file_size > 5000000) {
                echo 'File size is too large';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'File type is not valid. Please try once again';
                } else {
                    move_uploaded_file($_FILES['user_image']['tmp_name'], $target_file);
                   
                    
                    $user = $data['user_type'];
                    if ($user == 'teacher' || $user == 'other') {
                        $group = '0';
                        $class = '0';
                        //print_r($data);
                        
                        $sql= "INSERT INTO `tbl_user`  (`name`, `date_of_birth`, `class`, `address`, `phone_number`, `user_type`, `email`, `group`, `user_image`, `password`)"
                                . " VALUES ('$data[name]','$data[date_of_birth]', '$class', '$data[address]', '$data[phone_number]', '$data[user_type]', '$data[email]', '$group', '$target_file', '$password') ";
                    } else if ($user == 'student') {
                        $email = '0';



                        $sql = "INSERT INTO `tbl_user` (`name`, `date_of_birth`, `class`, `address`, `phone_number`, `user_type`, `email`, `group`, `user_image`, `password`) VALUES ('$data[name]', '$data[date_of_birth]', '$data[class]','$data[address]',  '$data[phone_number]', '$data[user_type]', $email, '$data[group]', '$target_file', '$password' )";
                    }



                    if (mysqli_query($con, $sql)) {

                        header('Location: signin.php');
                        
                    } else {
                        die('Query problem' . mysqli_error($con));
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image!. Please try again.';
        }
    }
    
    // select user by id
    public function search_user_by_id($user_id){
       
        $con = $this->__construct();
        $sql = "SELECT * From tbl_user WHERE user_id=$user_id  ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
    
    //class wise batch info
    // select all batch info..
     public function select_all_batch_info($class){
        $con = $this->__construct();
        $sql = "SELECT * FROM tbl_batch WHERE deletion_status = 0 AND class='$class' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    //add present student info 
    public function insert_present_info($user_id){
         $con = $this->__construct();
         $date =  date("Y/m/d");
         
         $sql = " INSERT IGNORE  INTO tbl_attendance (user_id, status, date) VALUES ($user_id, 'present', '$date'  )";
        
         if (mysqli_query($con, $sql)) {
           
             echo $user_id.'is present';
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    // get contact info
    public function get_contact_info(){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_contact_info   ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    // Conatct page msg
    public function contact_page_msg($data){
        $con = $this->__construct();
        $sql = " INSERT INTO tbl_contact_page_msg (name, phone, message) VALUES ('$data[name]','$data[phone]','$data[message]'  )";
       
        if (mysqli_query($con, $sql)) {
          
            echo ' Your Message sent Succcessfully.Thank You.';
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    // select latest notice
    public function select_latest_notice(){
       
        $con = $this->__construct();
       
        
        $sql3= " SELECT MAX(notice_id) FROM tbl_notice WHERE notice_type='main' AND deletion_status='0' ";
            if (mysqli_query($con, $sql3)) {
      $qu_res = mysqli_query($con, $sql3);
           
            $max_notice_id = mysqli_fetch_assoc($qu_res);
            //print_r($max_roll);
           $last_notice_id=$max_notice_id['MAX(notice_id)'];
           
           $sql = "SELECT * From tbl_notice  where notice_id = '$last_notice_id'  ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        } 
               }
               }
               
                // to select all notice 
    public function select_all_notice(){
       
        $con = $this->__construct();
        $sql = "SELECT * From tbl_notice WHERE notice_type='regular' AND deletion_status='0' ORDER BY notice_id DESC ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
         
     // to select all lecture 
    public function select_all_lecture(){
       
        $con = $this->__construct();
        $sql = "SELECT * From tbl_lecture WHERE deletion_status='0' ORDER BY lecture_id DESC ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
     // to select all Question category 
    public function select_all_question_category(){
       
        $con = $this->__construct();
        $sql = "SELECT * From  tbl_question_category WHERE deletion_status='0'  ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
     // to select all Question  
    public function select_all_question(){
       
        $con = $this->__construct();
        $sql = "SELECT * From  tbl_question WHERE deletion_status='0'  ";
        $sql = "SELECT q.*, c.*, u.* FROM tbl_question as q, tbl_question_category as c, tbl_user as u WHERE q.user_id=u.user_id AND c.question_category_id=q.question_category_id AND q.deletion_status=0  ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
    
     // to select all Question  
    public function select_all_article(){
       
        $con = $this->__construct();
        $sql = "SELECT a.*, u.* FROM tbl_article as a, tbl_user as u WHERE a.user_id=u.user_id AND a.deletion_status=0  ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
    
    //add like to an article
    public function add_article_like($data){
        
         $con = $this->__construct();
         $user_id = $_SESSION['user_id'];
        $sql = " INSERT INTO  tbl_like (  user_id,article_id, status) ". "VALUES ( '$user_id', '$data[article_id]','like'  )";
        
         if (mysqli_query($con, $sql)) {
           
             
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    //add like to an article
    public function add_article_dislike($data){
        
         $con = $this->__construct();
         $user_id = $_SESSION['user_id'];
        $sql = " INSERT INTO  tbl_like (  user_id,article_id, status) ". "VALUES ( '$user_id', '$data[article_id]','dislike'  )";
        
         if (mysqli_query($con, $sql)) {
           
             
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    //add like to an comment
    public function add_article_comment($data){
        
         $con = $this->__construct();
         $user_id = $_SESSION['user_id'];
         
        $sql = " INSERT INTO  tbl_comment ( comment, user_id, article_id) ". "VALUES ( '$data[comment]', '$user_id', '$data[article_id]'  )";
        
         if (mysqli_query($con, $sql)) {
           
             echo 'Comment is uploaded successfully';
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    //total comment of an article
    public function tolal_article_comment($article_id){
        
    $con = $this->__construct();
        $sql = "SELECT SUM(article_id) as total_comment From tbl_comment   WHERE article_id='$article_id' AND deleted_by_admin='0' AND deleted_by_admin='0' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    // find all comment 
    public function find_all_commnet($article_id){
        
    $con = $this->__construct();
      //  $sql = "SELECT * From  tbl_comment   WHERE article_id='$data[article_id]' AND deleted_by_admin='0' AND deleted_by_admin='0' ";
         $sql = "SELECT  c.*, u.* FROM  tbl_comment as c, tbl_user as u WHERE c.user_id=u.user_id AND c.article_id='$article_id' AND c.deleted_by_admin='0' AND c.deleted_by_admin='0'   ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    // to select all Question by category  
    public function select_all_question_by_category($question_category_id){
       
        $con = $this->__construct();
        //$sql = "SELECT * From  tbl_question WHERE deletion_status='0'  ";
        $sql = "SELECT q.*, c.*, u.* FROM tbl_question as q, tbl_question_category as c, tbl_user as u WHERE  q.question_category_id='$question_category_id' AND q.user_id=u.user_id AND c.question_category_id=q.question_category_id AND q.deletion_status=0 ORDER BY q.question_id DESC ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
    
    //user Logout 
    public function user_logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);

        header('Location: index.php');
    }
    
    
    // to select all gallery photo  
    public function select_all_gallery_photo(){
       
        $con = $this->__construct();
        //$sql = "SELECT * From  tbl_question WHERE deletion_status='0'  ";
        $sql = "SELECT * FROM tbl_gallery_photo WHERE  deletion_status=0  ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
         // to select all advertise 
    public function get_advertise(){
       
        $con = $this->__construct();
        $sql = "SELECT * From tbl_advertise WHERE deletion_status='0' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
                
   
    // select user payment 
    public function search_user_payment_id($user_id){
       
        $con = $this->__construct();
        $sql = "SELECT s.*, p.* FROM tbl_payment as p, tbl_student as s WHERE  s.user_id='$user_id' AND s.pass_roll=p.pass_roll AND p.deletion_status=0 ORDER BY p.payment_id DESC ";
       
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
    
    
     //select Student Details  by id
    public function search_setudent_details_by_id($user_id){
       
        $con = $this->__construct();
        
        $sql = "SELECT s.*, u.* FROM tbl_user as u, tbl_student as s WHERE  s.user_id='$user_id' AND u.user_id=s.user_id AND s.deletion_status=0  ";
       
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
    
    
    //select suggestion by stu id .... 2.33pm  4-3-17
    public function search_suggestion_by_student_id($user_id){
       
        $con = $this->__construct();
        
        $sql = "SELECT s.*, u.* FROM tbl_suggestion as s, tbl_user as u WHERE  u.user_id='$user_id' AND u.class=s.class AND u.group = s.group_name  AND s.deletion_status=0  ";
       
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }    
        
    }
    
    
    
    
}// end of main class
