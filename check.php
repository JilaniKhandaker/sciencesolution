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

          <?php
           require './application.php';
           $obj_app = new Application();
        $class = $_GET['class'];
        $batch_by_class = $obj_app->select_all_batch_info($class);
       //echo $class;
        ?>
     
   <div class="top-margin">
        <label>Select Batch  <span class="text-danger">* <a id="batchres" > </a> </span> </label>
        <select class="form-control" name="batch_id" onblur="check_Batch(this.value, 'batchres');" >
            <option> </option>
                    <?php while ($batch_info = mysqli_fetch_assoc($batch_by_class)) { ?>
                        <option value="<?php echo $batch_info['batch_id']; ?>"><?php echo $batch_info['batch_name']; ?></option>
                    <?php } ?>

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
            <option> </option>
            <option value="8"> Eight </option>
            <option value="9">Nine</option>
            <option value="10">Ten</option>

        </select>
    </div>
    <div id="cres" > </div>

    <?php
}
if (isset($_GET['user_type']) && $_GET['user_type']=='teacher') {
    
    ?>
       
    <div class="top-margin">
            <label>Email Address  <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="email" onblur="check_email(this.value, 'emailres'); ">
        </div>

        <div id="emailres" > </div>

    <?php
}
// cheking Batch 
if (isset($_GET['batch'])) {

    if (empty($_GET['batch'])) {
        $count_error+=1;
        echo "Batch is required";
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
    
    ?>
       
    <div class="top-margin">
            
         <?php 
         while ($qu_info_comment = mysqli_fetch_assoc($comment_res)) { ?>
            <p> <?php echo $qu_info_comment['comment']; ?> :
            
            <?php }?>
        </div>

       
        

    <?php
}


?>