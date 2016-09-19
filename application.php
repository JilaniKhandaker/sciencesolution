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
        
        
        
        
                    if ($user == 'teacher') {
                        $batch = '0';
                        $class = '0';
                        //echo 'techer';
                        $sql = "INSERT INTO tbl_user (name, date_of_birth, class, address, phone_number, user_type, email, batch_id, user_image, password) VALUES ('$data[name]', '$data[date_of_birth]', $class, '$data[address]',  '$data[phone_number]', '$data[user_type]','$data[email]', $batch, '$target_file', '$password' )";

                    } else if ($user == 'student') {
                       $email = '0';

                       
                       
                        $sql = "INSERT INTO tbl_user (name, date_of_birth, class, address, phone_number, user_type, email, batch_id, user_image, password) VALUES ('$data[name]', '$data[date_of_birth]', '$data[class]','$data[address]',  '$data[phone_number]', '$data[user_type]', $email, '$data[batch_id]', '$target_file', '$password' )";

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
        $sql = " INSERT INTO tbl_contact_page_msg (name, email, phone, message) VALUES ('$data[name]','$data[email]','$data[phone]','$data[message]'  )";
       
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
         
                
    
    
}