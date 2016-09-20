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
               header('Location: admin_master.php');
                
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
         $sql = "INSERT INTO  tbl_batch (batch_name, subjects, class,time, day, fee) VALUES ( '$data[batch_name]', '$data[subjects]', '$data[class]','$data[time]','$data[day]','$data[fee]' )";
        if (mysqli_query($con, $sql)) {
            echo ' Your course information save successfully ';
            
            //header('Location: payment.php');
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
        //$sql = "SELECT * FROM tbl_user WHERE deletion_status = 0 AND approval_status = 0 AND user_type = 'student' ";
         $sql = "SELECT u.*, b.* FROM tbl_user as u, tbl_batch as b WHERE u.user_type='student'  AND u.approval_status=0 AND u.batch_id=b.batch_id AND u.deletion_status=0 ";
       
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    
    //Approve student
    public function approve_student($user_id){
        $con = $this->__construct();
        
        $sql1="SELECT * FROM tbl_user WHERE user_id='$user_id' ";
        if (mysqli_query($con, $sql1)) {
        
            $query_result = mysqli_query($con, $sql1);
           
            $user_info = mysqli_fetch_assoc($query_result);
           // echo $user_info['name'];
            
            
            $sql3="SELECT MAX(roll) FROM tbl_student Where batch_id='$user_info[batch_id]' ";
            if (mysqli_query($con, $sql3)) {
        
            $qu_res = mysqli_query($con, $sql3);
           
            $max_roll = mysqli_fetch_assoc($qu_res);
            //print_r($max_roll);
           $last_roll=$max_roll['MAX(roll)'];
            //echo $last_roll;
                
                if($last_roll== ''){
                    $roll=1;
                               
                }
                else{
                    $roll=$max_roll['MAX(roll)']+1;                 
                }
            //echo $roll;
            //qu for approve student     
          $sql = "UPDATE tbl_user SET approval_status='1' WHERE user_id='$user_id' ";
            if (mysqli_query($con, $sql)) {
               
                //Insert Student Roll     
          $sq4 = "INSERT INTO  tbl_student (user_id, batch_id, class, roll) VALUES ( '$user_id', '$user_info[batch_id]', '$user_info[class]', '$roll' )";
       
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
         $sql = "INSERT INTO  tbl_payment (batch_id, roll, month, amount) VALUES ( '$data[batch_id]','$data[roll]','$data[month]','$data[amount]' )";
       
            if (mysqli_query($con, $sql)) {
                
                echo 'Student payment received successfully.';
                              
            } else {
                die('Query problem' . mysqli_error($con));            }
    }
    
    
    // select all student by batch_id and class.
     public function select_all_student_by_batch_id($data){
        $con = $this->__construct();
         $sql = "SELECT u.*, b.*, s.* FROM tbl_user as u, tbl_batch as b,tbl_student as s  WHERE u.batch_id=b.batch_id AND u.deletion_status=0 AND u.user_id=s.user_id AND s.deletion_status=0 AND b.batch_id='$data[batch_id]' " ;
       
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

                $sql = " INSERT  INTO tbl_lecture ( lecture_title, upload_date, slide_name) VALUES ( '$data[lecture_title]', '$date' , '$target_file') ";

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
         
                    $sql = "INSERT INTO tbl_question ( question_category_id, question_des, resource ) VALUES ('$data[question_category_id]', '$data[question_des]', '$target_file' )";

                    if (mysqli_query($con, $sql)) {

                        echo 'Question is Uploaded';
                        
                    } else {
                        die('Query problem' . mysqli_error($con));
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image! Please try again.';
        }
    } 
    
    
}