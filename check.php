<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$count_error = 0;


if (isset($_GET['text'])) {
    $name = $_GET['text'];

    $count_error = 0;
    if (empty($_GET['text'])) {
        echo "Name is required";
        $count_error+=1;
    } else {
        $nam = test_input($name);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $nam)) {
            echo "Only letters and white space allowed";
            $count_error+=1;
        }
    }
}
// cheking phone number 
if (isset($_GET['phone'])) {

    if (empty($_GET['phone'])) {
        $count_error+=1;
        echo "Phone number is required";
    } else {
        $phon = test_input($_GET['phone']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phon)) {
            $count_error+=1;
            echo "Phone Number is not vaild";
        }
    }
}
// cheking Birday 
if (isset($_GET['birth_day'])) {

    if (empty($_GET['birth_day'])) {
        $count_error+=1;
        echo "Birthday is required";
    } else {
        $birth_day = $_GET['birth_day'];
        $today = date("Y-m-d");
        if ($birth_day > $today) {

            echo 'Insert correct birthday';
        }
    }
}
// cheking Class 
if (isset($_GET['class'])) {

    if (empty($_GET['class'])) {
        $count_error+=1;
        echo "Class is required";
    }
    else { ?>

         
     
   <div class="top-margin">
        <label>Select Group <span class="text-danger">* <a id="batchres" > </a> </span> </label>
        <select class="form-control" name="group"  >
            <option value=""> --Select Group -- </option>
                   
                        <option value="none">None</option>
                        <option value="science">Science</option>
                         <option value="arts">Arts</option>
                        <option value="commerce">Commerce</option>
                       
        </select>
    </div>
        
<?php    }
}

// cheking Class 
if (isset($_GET['user_type']) && $_GET['user_type']=='student') {
    
    ?>
       
    <div class="top-margin">
        <label>Select Class <span class="text-danger">* </span>  </label>
        <select class="form-control" name="class" onblur="check_class(this.value, 'cres');">
            <option value="">--Select Class </option>
            <option value="8"> Eight </option>
            <option value="9">Nine</option>
            <option value="10">Ten</option>

        </select>
    </div>
    <div id="cres" > </div>

    <?php
}
if (isset($_GET['user_type']) && ( $_GET['user_type']=='teacher' || $_GET['user_type']=='other')) {
    
    ?>
       
    <div class="top-margin">
            <label>Email Address  <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="email" onblur="check_email(this.value, 'emailres'); ">
        </div>

        <div id="emailres" > </div>

    <?php
}
// cheking Batch 
if (isset($_GET['group'])) {

    if (empty($_GET['group'])) {
        $count_error+=1;
        echo "Group is required";
    }
}
// cheking Pass
if (isset($_GET['pass'])) {

    if (empty($_GET['pass'])) {
        $count_error+=1;
        echo "Password is required";
    } else {
        $pass = $_GET['pass'];
        echo 'Your Password will be : ' . $pass;
    }
}
// cheking Pass
if (isset($_GET['address'])) {

    if (empty($_GET['address'])) {
        $count_error+=1;
        echo "Address is required";
    }
}

// cheking Pass
if (isset($_GET['email'])) {

    if (empty($_GET['email'])) {
        $count_error+=1;
        echo "Email is required";
    }
    else {
    $val = test_input($_GET["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format"; 
      
      
    }
  }
}

if (isset($_GET['comment_user'])) {
    $article_id= $_GET['comment_user'];
    require './application.php';
           $obj_app = new Application();
           
    $comment_res= $obj_app->find_all_commnet($article_id);
    while ($qu_info = mysqli_fetch_assoc($comment_res)) { ?>
      <b><?php echo $qu_info['name'];  ?> : </b>  <?php echo $qu_info['comment'];  ?> <br/> 
        
        
   <?php }
    ?>
       
                 
<?php
}


?>