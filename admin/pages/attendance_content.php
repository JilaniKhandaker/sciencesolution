<script>
    function check_class(given_text, obj_id) {
        xmlhttp = new XMLHttpRequest();
        server_page = 'ajax_check.php?class=' + given_text;
        xmlhttp.open('GET', server_page);
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
    function present(given_text, obj_id) {
        xmlhttp = new XMLHttpRequest();
        server_page = 'ajax_check.php?puser_id=' + given_text;
        xmlhttp.open('GET', server_page);
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
    function absent(given_text, obj_id) {
        xmlhttp = new XMLHttpRequest();
        server_page = 'ajax_check.php?auser_id=' + given_text;
        xmlhttp.open('GET', server_page);
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
    
   
   
</script>
<?php
if(isset($_POST['btn'])){
 
   // print_r($_POST);
    
    $query_result=$obj_admin->select_all_student_by_batch_id($_POST);
            
}
if(isset($_POST['send_msg'])){
    $obj_admin->select_all_absent($_POST);
}




?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon box"></i>
                <span class="break"></span>Daily Attendance : 
                <?php if (isset($_POST['btn'])) {
     echo 'Class : '.$_POST['class']; echo '  /Batch ID : '.$_POST['batch_id']; 
     echo "  /Date :" . date("Y/m/d") . "<br>";
                    
                } ?> </h2>

        </div>
        <div class="box-content">
            <h4>
<?php
if (isset($message)) {
    echo $message;
    unset($message);
}
?>
            </h4>
            <h4>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </h4>

            <form method="post" name="contact" action=""  enctype="multipart/form-data">
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

                
                <button class="btn btn-action"  name="btn" type="submit">Submit</button>



            </form>   
<?php   if (isset($_POST['btn'])){ ?>
<table width="50%" border="1" style="float: left;"> 
    
                <thead>
                    <tr>
                        
                        <th>Roll Number</th>
                        <th> Name of the student</th>
                        
                        <th>Actions</th>
                      
                        
                    </tr>
                </thead>   
                <tbody align="center">
                    <?php while ($qu_info=  mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['pass_roll'];  ?></td>
                        <td class="center"><?php echo $qu_info['name']; ?></td>
                        
                        
                                             
                        <td class="center">
                      
                            <button class="btn btn-success"  onclick="present(this.value, 'pres');" name="present" value="<?php echo $qu_info['user_id']; ?>" title=" Present">
                                <i class="halflings-icon white box-icon"></i>  
                            </button>
                            
                            
                            <button class="btn btn-danger"  onclick="absent(this.value, 'pres');" name="present" value="<?php echo $qu_info['user_id']; ?>" title=" Absentt">
                                <i class="halflings-icon white box-icon"></i>  
                            </button>
                            
                            
                            </td>
                       
                            
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

<div style="float: right; "> <a id="pres"> </a>  </div>
        
        


   
            
<?php }   
?>

        </div>
    </div><!--/span-->
</div>

<button type="submit" name="send_msg" class="btn btn-primary">Send Message who do not come today. </button>