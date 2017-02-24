<br><br><br><br><br><br>


<script>
function check_name(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?text='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
    
    function check_phone(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?phone='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
    
    function check_birth_day(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?birth_day='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
    function check_class(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?class='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
     function check_user(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?user_type='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
     function check_Batch(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?batch='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
    
    function check_password(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?pass='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
    function check_address(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?address='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
    function check_email(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?email='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
</script>



<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Registration</li>
    </ol>
    
    <?php
if(isset($_POST['btn'])){
    
    
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 
$count_error=0;


if(isset($_POST['name']))
{ $name = $_POST['name'];

$count_error=0;
if (empty($_POST['name'])) {
    echo "Name is required <br/> ";
    $count_error+=1;
  } else {
    $nam = test_input($name);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nam)) {
      echo "Only letters and white space allowed <br/>"; 
      $count_error+=1;
    }
  }
}
// cheking phone number 
  if (isset($_POST['phone_number'])){
  
   if (empty($_POST['phone_number'])) {
      $count_error+=1;
    echo "Phone number is required. <br/>";
  } 
  
  else {
    $phon = test_input($_POST['phone_number']);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phon)) {
        $count_error+=1;
      echo "Phone Number is not vaild.  <br/>"; 
    }
  }
  }
  // cheking Birday 
  if (isset($_POST['date_of_birth'])){
  
   if (empty($_POST['date_of_birth'])) {
      $count_error+=1;
    echo "Birthday is required. <br/>";
  } 
  
  else {
    $birth_day= $_POST['date_of_birth'];
    $today = date("Y-m-d");
    if($birth_day>$today){
        
        echo 'Insert correct birthday. <br/>';
    }
    
  }
  }
  // cheking Class 
  if (isset($_POST['class'])){
  
   if (empty($_POST['class'])) {
      $count_error+=1;
    echo "Class is required.<br/>";
  }   
  }
  
  // cheking Class 
  if (isset($_POST['user_type'])){
  
   if (empty($_POST['user_type'])) {
      $count_error+=1;
    echo "User Type is required <br/>";
  }   
  }
  // cheking Batch 
  if (isset($_POST['batch'])){
  
   if (empty($_POST['batch'])) {
      $count_error+=1;
    echo "Batch is required.<br/>";
  }   
  }
  // cheking Pass
  if (isset($_POST['password'])){
  
   if (empty($_POST['password'])) {
      $count_error+=1;
    echo "Password is required.<br/>"; 
  }   
  else{
      $pass=$_POST['password'];
      
  }
  
  }
  // cheking Pass
  if (isset($_POST['address'])){
  
   if (empty($_POST['address'])) {
      $count_error+=1;
    echo "Address is required. <br/>"; 
  }   
  
  }
  
  
  
 // echo $count_error;
  
  if ($count_error>1){
     echo '<h4>Please, Insert all information Correctly.</h4>';

  }  
 else {
     // $obj_app->save_user_info($_POST); 
     
//     echo 'Okkkkkkkkkkkkkkkkkkkkkkkkkk';
//     print_r($_POST);
      $obj_app->save_user_info($_POST);   
  }
     
    
    
}
?>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Registration</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center"> <b>Register a new account</b></h3>

                        <hr>

                        <form method="post" name="contact" action=""  enctype="multipart/form-data">
                            <div class="top-margin">
                                <label>Name  <span class="text-danger">* <a color="red" id="res" > </a></span></label>
                                <input type="text" class="form-control" name="name" onblur="check_name(this.value, 'res'); ">
                            </div>
                            <div class="top-margin">
                                <label>Date of Birth  <span class="text-danger">* <a id="bres" > </a></span> </label>
                                <input type="date" class="form-control"  name="date_of_birth"  onblur="check_birth_day(this.value, 'bres');" >
                            </div>

                            

                            <div class="top-margin">
                                <label>Address <span class="text-danger">* <a id="adres" > </a> </span></label>
                                <input type="text" class="form-control" name="address" onblur="check_address(this.value, 'adres');" >
                            </div>
                            <div class="top-margin">
                                <label>Phone Number <span class="text-danger">* <a id="resphone" > </a> </span> </label>
                                <input type="number" class="form-control" name="phone_number"  onblur="check_phone(this.value, 'resphone');" >
                            </div>

                            <div class="top-margin">
                                <label>User Type <span class="text-danger">*  </span>  </label>
                                <select class="form-control" name="user_type" onblur="check_user(this.value, 'ures');" >
                                    <option value="">--Select One-- </option>
                                    <option value="student">Student </option>
                                    <option value="teacher">Teacher</option>
                                    <option value="other">Other</option>

                                </select>
                            </div>
                            <a id="ures" > </a>

                            

                            <div class="top-margin">
                                <label>Upload Your Image</label>
                                <input type="file" name="user_image" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">

                            </div>




                            <div class="row top-margin">
                                <div class="col-sm-6">
                                    <label>Password <span class="text-danger">* <div id="passres" > </div> </span></label>
                                    <input type="text" class="form-control" name="password" onblur="check_password(this.value, 'passres');" >
                                </div>
                                
                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-action"  name="btn" type="submit">Register</button>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </article>
        <!-- /Article -->

    </div>
</div>