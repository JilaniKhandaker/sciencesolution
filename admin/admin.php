<?php

class Admin {

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
    public function admin_login_check_info($data) {
        $connection = $this->__construct();
        $password = md5($data['password']);
     echo $password;
//        echo $data['email_address'];
        $sql = "SELECT * FROM tbl_user WHERE name='$data[name]' AND password='$password'  ";
        if (mysqli_query($connection, $sql)) {
            $query_result = mysqli_query($connection, $sql);
            $user_info = mysqli_fetch_assoc($query_result);
//       echo '<pre>';
           // echo 'ki ki ';
   // print_r($user_info);
            
            if ($user_info) {
                session_start();
                $_SESSION['name'] = $user_info['name'];
                $_SESSION['user_id'] = $user_info['user_id'];
                 $_SESSION['user_type'] = $user_info['user_type'];
               
                 
                if($user_info['user_type']=='student' ){
                    header('Location: ../student_info.php');
                }
                elseif($user_info['user_type']=='admin' ){
                    header('Location: admin_master.php');
                }
                 
            } else {
                $message = "Please use user name & password";
                return $message;
            }
        } else {
            die('Query problem' . mysqli_error($connection));
        }
    }
    
    //Admin Logout 
    public function admin_logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);

        header('Location: ../index.php');
    }
    
    
    
    //save batch
    public function save_batch($data){
        
         $con = $this->__construct();
         $sql = "INSERT INTO  tbl_batch (`batch_name` , `group`, `subjects`, `class`, `time`, `day`, `fee`) VALUES ( '$data[batch_name]','$data[group]', '$data[subjects]', '$data[class]','$data[time]','$data[day]','$data[fee]' )";
        if (mysqli_query($con, $sql)) {
            echo ' Your course information save successfully ';
            
            header('Location: batch.php');
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
    
    // select all batch info..
     public function select_all_batch_info(){
        $con = $this->__construct();
        $sql = "SELECT * FROM tbl_batch WHERE deletion_status = 0 ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    // select all batch info..
     public function select_new_student(){
        $con = $this->__construct();
        $sql = "SELECT * FROM tbl_user WHERE deletion_status = 0 AND approval_status = 0 AND user_type = 'student' ";
         
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    
    //Approve student
    public function approve_student($data){
        $con = $this->__construct();
        
        $sql1= " SELECT * FROM  tbl_batch WHERE `class` = '$data[class]' AND `group` = '$data[group]' AND `batch_name` = '$data[batch_name]'   ";
        if (mysqli_query($con, $sql1)) {
        
            $query_result = mysqli_query($con, $sql1);
           
            $user_info = mysqli_fetch_assoc($query_result);
          // echo $user_info['batch_id'];
            
            
            $sql3="SELECT MAX(roll) FROM tbl_student Where batch_id='$user_info[batch_id]' ";
            if (mysqli_query($con, $sql3)) {
        
            $qu_res = mysqli_query($con, $sql3);
           
            $max_roll = mysqli_fetch_assoc($qu_res);
            //print_r($max_roll);
           $last_roll=$max_roll['MAX(roll)'];
           // echo $last_roll;
                
                if($last_roll== ''){
                    $roll=1;
                               
                }
                else{
                    $roll=$max_roll['MAX(roll)']+1;                 
                }
                
               $d_roll= $data['roll'];
              
               $pass_roll= $d_roll.$roll;
               echo $pass_roll;
            //qu for approve student     
         $sql = "UPDATE tbl_user SET approval_status='1' WHERE user_id='$data[user_id]]' ";
            if (mysqli_query($con, $sql)) {
               
                //Insert Student Roll     
          $sq4 = "INSERT INTO  tbl_student (`user_id`, `batch_id`, `family_status`,`student_quality`,`payment_type`, `roll`, `pass_roll`,`extra_info`)"
                 . " VALUES ( '$data[user_id]', '$user_info[batch_id]', '$data[family_status]','$data[student_quality]','$data[payment_type]', '$roll','$pass_roll', '$data[extra_info]' )";
       
            if (mysqli_query($con, $sq4)) {
                
                echo 'Student request approved successfully.';
                header('Location: manage_student.php');
            } else {
                die('Query problem' . mysqli_error($con));            }
                } else {
                die('Query problem' . mysqli_error($con));            }
        
                } else {
            die('Query problem' . mysqli_error($con));
        }
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
   
    }

    //Reject student
    public function reject_student($user_id){
        $con = $this->__construct();
//        echo $user_id;
//        echo 'jilani';
        $sql = "UPDATE tbl_user SET deletion_status='1' WHERE user_id='$user_id' ";
        if (mysqli_query($con, $sql)) {
            $message = "Successfully Rejected";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
    
    //Save payment 
    public function save_payment_info($data){
         $con = $this->__construct();
         $today = date("Y-m-d");
         //print_r($data);
        $pass_roll= $data['pass_roll'];
         $sql = "INSERT INTO  tbl_payment ( batch_id, pass_roll, month, amount,date) VALUES ( '$data[batch_id]', '$pass_roll' , '$data[month]','$data[amount]', '$today' )";
       
            if (mysqli_query($con, $sql)) {
                
                echo 'Student payment received successfully.';
                              
            } else {
                die('Query problem' . mysqli_error($con));            }
    }
    
    
    // select all student by batch_id and class.
     public function select_all_student_by_batch_id($data){
        $con = $this->__construct();
         $sql = "SELECT u.*, b.*, s.* FROM tbl_user as u, tbl_batch as b,tbl_student as s  WHERE b.batch_id=s.batch_id AND u.deletion_status=0 AND u.user_id=s.user_id AND s.deletion_status=0 AND b.batch_id='$data[batch_id]' " ;
       
         if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    // get contact info
    public function get_contact_info(){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_contact_info ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
     public function update_contact_info($data){
        
         $con = $this->__construct();
         
        $sql = "UPDATE tbl_contact_info SET phone = '$data[phone]', email = '$data[email]', address = '$data[address]' ";
        if (mysqli_query($con, $sql)) {
           // $_SESSION['message'] = 'Infomations update successfully';
            header('Location: ../index.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
     // Conatct page Messages
    public function conatct_page_messages(){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_contact_page_msg WHERE deletion_status='0' ORDER BY contact_msg_id DESC ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    //delete contact contact message
    public function delete_contatc_msg($msg_id){
        $con = $this->__construct();
//        echo $user_id;
//        echo 'jilani';
        $sql = "UPDATE tbl_contact_page_msg SET deletion_status='1' WHERE contact_msg_id='$msg_id' ";
        if (mysqli_query($con, $sql)) {
            $message = "Message Successfully Deleted ";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
    
    //save notice 
    public function save_notice($data){
        
         $con = $this->__construct();
         $date =  date("Y/m/d");
         
         $sql = " INSERT IGNORE  INTO tbl_notice (notice_des, notice_type, date) VALUES ( '$data[notice_des]', '$data[notice_type]' , '$date'  )";
        
         if (mysqli_query($con, $sql)) {
           
             echo 'Your Notice is published successfully';
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    public function select_all_notice(){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_notice WHERE deletion_status='0' ORDER BY notice_id DESC ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    public function delete_notice_by_id($notice_id){
        $con = $this->__construct();
        $sql = "UPDATE tbl_notice SET deletion_status='1' WHERE notice_id='$notice_id' ";
        if (mysqli_query($con, $sql)) {
           
            echo 'Notice is Deleted Successfully';
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    //save Lecture
    public function save_lecture($data){
        
         $con = $this->__construct();
         $user_id = $_SESSION['user_id'];
        ///main qry
         $directory = '../assets/lecture/';
        $target_file = $directory . $_FILES['slide_name']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['slide_name']['size'];
        if ($file_size > 10485760) {
                echo 'File size is too large';
            } else {
                move_uploaded_file($_FILES['slide_name']['tmp_name'], $target_file);
                // $sql = "INSERT INTO tbl_user (user_name, email_address, password, address, phone_number, city, area, user_type, user_image) VALUES ('$data[user_name]', '$data[email_address]', '$password', '$data[address]', '$data[phone_number]', '$data[city]', '$data[area]', '$data[user_type]','$target_file' )";
                $date = date("Y/m/d");

                $sql = " INSERT  INTO tbl_lecture ( lecture_title, upload_date, slide_name, user_id) VALUES ( '$data[lecture_title]', '$date' , '$target_file', '$user_id') ";

                if (mysqli_query($con, $sql)) {

                    echo 'Your file is uploaded.';
                } else {
                    die('Query problem' . mysqli_error($con));
                }
            }
            }
            
 // save qustion category 
    public function save_question_category($data){
        
         $con = $this->__construct();
         $sql = " INSERT IGNORE  INTO  tbl_question_category ( question_category_name, question_category_des) VALUES ( '$data[question_category_name]', '$data[question_category_des]'  )";
        
         if (mysqli_query($con, $sql)) {
           
             echo 'Question category is uploaded successfully';
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }        
    //Select all qll qstion category
     public function select_all_question_category(){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_question_category WHERE deletion_status='0' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    // Upload Qustion 
    public function upload_question($data){
        
         
        $con = $this->__construct();
        
        $directory = '../assets/images/questions/';
         $user_id = $_SESSION['user_id'];
          $today = date("Y-m-d");
         
          $target_file = $directory . $_FILES['resource']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['resource']['size'];
        $check = getimagesize($_FILES['resource']['tmp_name']);
        if ($check) {
            if ($file_size > 5000000) {
                echo 'File size is too large';
            } else {
                if ($file_type != 'jpg' && $file_type != 'PNG' && $file_type != 'JPG' && $file_type != 'png'  ) {
                    echo 'File type is not valid. Please try once again';
                } else {
                    move_uploaded_file($_FILES['resource']['tmp_name'], $target_file);
                   
                    $tar_file= 'assets/images/questions/'.$_FILES['resource']['name'];
                    $sql = "INSERT INTO tbl_question ( question_category_id, user_id, question_des, resource, upload_date ) VALUES ('$data[question_category_id]', '$user_id' , '$data[question_des]', '$tar_file', '$today'  )";

                    if (mysqli_query($con, $sql)) {

                        echo 'Question is Uploaded';
                        
                    } else {
                        die('Query problem' . mysqli_error($con));
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image!  Please try again.';
        }
    } 
    
    // all_article_category
    public function all_article_category(){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_article_category WHERE deletion_status='0' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    // add article
    public function add_article($data){
        
        $user_id = $_SESSION['user_id'];
          $today = date("Y-m-d");
         $con = $this->__construct();
         
        $sql = " INSERT INTO  tbl_article ( article_category_id, article_title, article_short_des, article_long_des, resource, user_id, upload_date) ". "VALUES ( '$data[article_category_id]', '$data[article_title]', '$data[article_short_des]' , '$data[article_long_des]','$data[resource]', '$user_id' , '$today'  )";
        
         if (mysqli_query($con, $sql)) {
           
             echo 'Article is uploaded successfully';
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
    
    // upload photo..
    
    public function upload_gallery_photo($data){
        
         
        $con = $this->__construct();
        
        $directory = '../assets/images/gallery_photo/';
         $user_id = $_SESSION['user_id'];
          $today = date("Y-m-d");
         
          $target_file = $directory . $_FILES['resource']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['resource']['size'];
        $check = getimagesize($_FILES['resource']['tmp_name']);
        if ($check) {
            if ($file_size > 5000000) {
                echo 'File size is too large';
            } else {
                if ($file_type != 'jpg' && $file_type != 'PNG' && $file_type != 'JPG' && $file_type != 'png'  ) {
                    echo 'File type is not valid. Please try once again';
                } else {
                    move_uploaded_file($_FILES['resource']['tmp_name'], $target_file);
                   
                    $tar_file= 'assets/images/gallery_photo/'.$_FILES['resource']['name'];
                    $sql = "INSERT INTO tbl_gallery_photo ( user_id, photo_title, photo_des,  upload_date, resource ) VALUES ( '$user_id' , '$data[photo_title]','$data[photo_des]', '$today' , '$tar_file' )";

                    if (mysqli_query($con, $sql)) {

                        echo 'Photo is Uploaded';
                        
                    } else {
                        die('Query problem' . mysqli_error($con));
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image!  Please try again.';
        }
    }
    
    // add advertise
    public function upload_advertise($data){
        
        $user_id = $_SESSION['user_id'];
          $today = date("Y-m-d");
         $con = $this->__construct();
         
        $sql = " INSERT INTO  tbl_advertise ( user_id, adv_heading, adv_desc, upload_date) ". "VALUES ( '$user_id' ,'$data[adv_heading]','$data[adv_desc]', '$today'  )";
        
         if (mysqli_query($con, $sql)) {
           
             echo 'Advertise is uploaded successfully';
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
    
    // Save uggestion
    public function save_suggestion($data){
        
        $user_id = $_SESSION['user_id'];
          $today = date("Y-m-d");
         $con = $this->__construct();
         
         $sq = " SELECT * FROM tbl_suggestion WHERE  subject_name ='$data[subject_name]' AND  class ='$data[class]'";
         
         if (mysqli_query($con, $sq)) {
            $query_result = mysqli_query($con, $sq);
            $qu_info = mysqli_fetch_assoc($query_result);
            if ($qu_info['class'] == "") {
                $sql = " INSERT INTO  tbl_suggestion ( user_id, group_name, subject_name,upload_date, class, suggestion) " . "VALUES ( '$user_id' ,'$data[group_name]','$data[subject_name]', '$today','$data[class]','$data[suggestion]'  )";

                if (mysqli_query($con, $sql)) {

                    echo 'Suggestion is uploaded successfully';
                    header('Location: suggestion_show.php');
                } else {
                    die('Query problem' . mysqli_error($con));
                }
            } else {
                echo 'Suggestion for this class and subject is uploaded.';
            }
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    
    
    //Select all select_all_suggestion
     public function select_all_suggesstion(){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_suggestion WHERE deletion_status='0' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    //Select student by id 
     public function select_studnet_info_by_id($user_id){
        $con = $this->__construct();
        $sql = "SELECT * From tbl_user WHERE deletion_status='0' AND user_id='$user_id' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    //Select batch for student 
     public function select_batch_for_student($data){
        $con = $this->__construct();
        $sql = "SELECT * FROM tbl_batch  WHERE  deletion_status=0 AND `class` ='$data[class]'  AND `group` ='$data[group]' " ;
       
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
   // select all question 
    
    public function select_all_question(){
        $con = $this->__construct();
        $sql = "SELECT q.*, c.*, u.* FROM tbl_question as q, tbl_question_category as c, tbl_user as u WHERE q.user_id=u.user_id AND c.question_category_id=q.question_category_id AND q.deletion_status=0 ORDER BY q.question_id DESC ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    //Delete Question
    public function delete_question($question_id){
        $con = $this->__construct();
        $sql = "UPDATE tbl_question SET deletion_status='1' WHERE question_id='$question_id' ";
        if (mysqli_query($con, $sql)) {
           
            echo 'Question is Deleted Successfully';
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    public function select_all_absent($data){
        $con = $this->__construct();
         $today = date("Y-m-d");
        $sql = "SELECT * FROM tbl_user tbl_attendance WHERE status='absent' AND user_id='$data[user_id]' AND date= '$today' ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    public function select_all_roll_by_batch_id($batch_id){
        $con = $this->__construct();
         $today = date("Y-m-d");
        $sql = "SELECT * FROM tbl_student WHERE `batch_id`='$batch_id' AND `deletion_status`= '0' ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    //Select all select_all_lecture
     public function select_all_lecture(){
        $con = $this->__construct();
        $sql = "SELECT l.*, u.* FROM  tbl_lecture as l, tbl_user as u WHERE l.user_id=u.user_id AND l.deletion_status=0 ORDER BY l.lecture_id DESC ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    //delete lecture by id
    public function delete_lecture_by_id($lecture_id){
        $con = $this->__construct();
//        echo $user_id;
//        echo 'jilani';
        $sql = "UPDATE tbl_lecture SET deletion_status='1' WHERE lecture_id='$lecture_id' ";
        if (mysqli_query($con, $sql)) {
            echo "Lecture Successfully Deleted ";
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
    
   
    //Select all advertise
     public function select_all_advertise(){
        $con = $this->__construct();
        $sql = "SELECT a.*, u.* FROM  tbl_advertise as a, tbl_user as u WHERE a.user_id=u.user_id AND a.deletion_status=0 ORDER BY a.adv_id DESC ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    //delete Advertise by id
    public function delete_adv_by_id($adv_id){
        $con = $this->__construct();
//        echo $user_id;
//        echo 'jilani';
        $sql = "UPDATE tbl_advertise SET deletion_status='1' WHERE adv_id='$adv_id' ";
        if (mysqli_query($con, $sql)) {
            echo "Advertise is Deleted Successfully  ";
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
        
    }
    
    //Select all advertise
     public function get_all_advertise($adv_id){
        $con = $this->__construct();
        $sql = "SELECT * FROM  tbl_advertise  WHERE `deletion_status`=0 AND  `adv_id` = '$adv_id' ORDER BY adv_id DESC ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    //update Advertise 
    public function update_avd_info($data){
        
         $con = $this->__construct();
         
        $sql = "UPDATE tbl_advertise SET `adv_heading` = '$data[adv_heading]', `adv_desc` = '$data[adv_desc]'  WHERE `adv_id` = '$data[adv_id]'";
        if (mysqli_query($con, $sql)) {
            $_SESSION['message'] = 'Advertise update successfully';
           
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    
    
    // delete galerry photo by id //------------3.4.17.1am
     public function delete_gallery_photo_by_id($photo_id){
        $con = $this->__construct();
        $sql = "UPDATE tbl_gallery_photo SET deletion_status='1' WHERE photo_id='$photo_id' ";
        if (mysqli_query($con, $sql)) {
           
            echo 'Photo is Deleted Successfully';
            header('Location: ../photo_gallery.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
        
    //Select all gally photo 
     public function get_photo_info($photo_id){
        $con = $this->__construct();
        $sql = "SELECT * FROM  tbl_gallery_photo  WHERE `deletion_status`=0 AND  `photo_id` = '$photo_id' ORDER BY photo_id DESC ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
     //update Photo Info 
    public function update_photo_info($data){
        
         $con = $this->__construct();
         
        $sql = "UPDATE tbl_gallery_photo SET `photo_title` = '$data[photo_title]', `photo_des` = '$data[photo_des]'  WHERE `photo_id` = '$data[photo_id]'";
        if (mysqli_query($con, $sql)) {
           // $_SESSION['message'] = 'Advertise update successfully';
           header('Location: ../photo_gallery.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

//Select all Notice by id ------- start 2.15am
     public function get_notice_by_id($notice_id){
        $con = $this->__construct();
        $sql = "SELECT * FROM  tbl_notice  WHERE `deletion_status`=0 AND  `notice_id` = '$notice_id' ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    //update Photo Info 
    public function update_notice_info($data){
        
         $con = $this->__construct();
         $notice_type= $data['notice_type'];
        $sql = "UPDATE tbl_notice SET `notice_des` = '$data[notice_des]'  WHERE `notice_id` = '$data[notice_id]'";
        if (mysqli_query($con, $sql)) {
           // $_SESSION['message'] = 'Advertise update successfully';
           header('Location: ../index.php');
           
           if ($notice_type == 'main') {
                header('Location: ../index.php');
            } else {
                header('Location: ../notice.php');
            }
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
   
    
    
    
    // delete suggestion by id //------------ 4.3.17..12pm
     public function delete_suggestion_by_id($suggestion_id){
        $con = $this->__construct();
        $sql = "UPDATE tbl_suggestion SET deletion_status='1' WHERE suggestion_id='$suggestion_id' ";
        if (mysqli_query($con, $sql)) {
           
            echo 'Suggestion is Deleted Successfully';
            header('Location: suggestion_show.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    //Select Suggestion by id
     public function get_suggestion_by_id($suggestion_id){
        $con = $this->__construct();
        $sql = "SELECT * FROM  tbl_suggestion  WHERE `deletion_status`=0 AND  `suggestion_id` = '$suggestion_id' ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    //update Suggestion Info 
    public function update_suggestion_info($data){
        
         $con = $this->__construct();
         
        $sql = "UPDATE tbl_suggestion SET `group_name` = '$data[group_name]', `subject_name` = '$data[subject_name]', `suggestion` = '$data[suggestion]'   WHERE `suggestion_id` = '$data[suggestion_id]'";
        if (mysqli_query($con, $sql)) {
           header('Location: suggestion_show.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    
    
    
    //update User Info 
    public function update_user_info($data){
        
         $con = $this->__construct();
         
        $sql = "UPDATE tbl_user SET `name` = '$data[name]', `address` = '$data[address]',`phone_number` = '$data[phone_number]', `email` = '$data[email]'   WHERE `user_id` = '$data[user_id]'";
        if (mysqli_query($con, $sql)) {
           header('Location: index.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    // select all batch 8.3.2017
     public function select_all_batch(){
        $con = $this->__construct();
        $sql = "SELECT * FROM  tbl_batch  WHERE `deletion_status`=0  ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
  
// 11.3.17  
     public function select_all_payment(){
        $con = $this->__construct();
        $sql = "SELECT * FROM  tbl_payment  WHERE `deletion_status`=0 ORDER BY payment_id DESC  ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    // save lecture class
//     public function save_lecture_class($data){
//        
//         $con = $this->__construct();
//         $user_id = $_SESSION['user_id'];
//        ///main qry
//         $directory = 'assets/lecture/';
//        $target_file = $directory . $_FILES['resource']['name'];
//        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
//        $file_size = $_FILES['resource']['size'];
//        if ($file_size > 10485760) {
//                echo 'File size is too large';
//            } else {
//                move_uploaded_file($_FILES['resource']['tmp_name'], $target_file);
//                
//                $date = date("Y/m/d");
//
//                $sql = " INSERT  INTO tbl_class_lecture ( lecture_des, user_id, batch_id, class,upload_date,resource) VALUES ( '$data[lecture_des]','$user_id','$data[batch_id]','$data[class]','$date' , '$target_file') ";
//
//                if (mysqli_query($con, $sql)) {
//
//                    echo 'Your file is uploaded.';
//                } else {
//                    die('Query problem' . mysqli_error($con));
//                }
//            }
//            }
            //Select all select_all calss _lecture
     public function select_all_class_lecture(){
        $con = $this->__construct();
        $sql = "SELECT l.*, u.* FROM  tbl_class_lecture as l, tbl_user as u WHERE l.user_id=u.user_id AND l.deletion_status=0 ORDER BY l.class_lecture_id DESC ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    //delete class lecture by id
  public function delete_class_lecture_by_id($class_lecture_id){
        $con = $this->__construct();
        $sql = "UPDATE tbl_class_lecture SET deletion_status='1' WHERE class_lecture_id='$class_lecture_id' ";
        if (mysqli_query($con, $sql)) {
           
            echo 'Lecture is Deleted Successfully';
            
            
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }   
            
            
    //test save lecture
     public function save_lecture_class($data){
        
         
        $con = $this->__construct();
        
        $directory = '../assets/images/gallery_photo/';
         $user_id = $_SESSION['user_id'];
          $today = date("Y-m-d");
         
          $target_file = $directory . $_FILES['resource']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['resource']['size'];
        $check = getimagesize($_FILES['resource']['tmp_name']);
        if ($check) {
            if ($file_size > 5000000) {
                echo 'File size is too large';
            } else {
                if ($file_type != 'jpg' && $file_type != 'PNG' && $file_type != 'JPG' && $file_type != 'png'  ) {
                    echo 'File type is not valid. Please try once again';
                } else {
                    move_uploaded_file($_FILES['resource']['tmp_name'], $target_file);
                   
                    $tar_file= 'assets/images/gallery_photo/'.$_FILES['resource']['name'];
                    $sql = " INSERT  INTO tbl_class_lecture ( lecture_des, user_id, batch_id, class,upload_date,resource) VALUES ( '$data[lecture_des]','$user_id','$data[batch_id]','$data[class]','$today' , '$tar_file') ";

                    if (mysqli_query($con, $sql)) {

                        echo 'Lecture is Uploaded';
                        
                    } else {
                        die('Query problem' . mysqli_error($con));
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image!  Please try again.';
        }
    }
    
    
    
    // 13.3.17
    
    public function delete_batch_by_id($batch_id){
        $con = $this->__construct();
        $sql = "UPDATE tbl_batch SET deletion_status='1' WHERE batch_id='$batch_id' ";
        if (mysqli_query($con, $sql)) {
           
            echo 'Batch is Deleted Successfully';
            header('Location: batch.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    // select all batch info
    public function get_all_batch($batch_id){
        $con = $this->__construct();
        $sql = "SELECT * FROM  tbl_batch WHERE batch_id=$batch_id AND deletion_status=0 ";
        
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }  
    }
    
    
    // Update batch info 
    public function update_batch_info($data){
        
         $con = $this->__construct();
         
        $sql = "UPDATE tbl_batch SET `subjects` = '$data[subjects]', `class` = '$data[class]',`time` = '$data[time]', `day` = '$data[day]', `fee` = '$data[fee]'   WHERE `batch_id` = '$data[batch_id]'";
        if (mysqli_query($con, $sql)) {
           header('Location: batch.php');
            
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    
}// main class 