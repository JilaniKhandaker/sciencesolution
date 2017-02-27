<?php 
$user_id= $_GET['user_id'];
 $query_result= $obj_admin-> select_studnet_info_by_id($user_id);
 $qu_info=  mysqli_fetch_assoc($query_result);
 //generate roll
  $class=$qu_info['class']; 
  $gr=$qu_info['group'];
  if($gr=='arts'){
      $group='A';
  }
  else if($gr=='science'){
       $group='S';
  }
  else if($gr=='commerce'){
       $group='C';
  }
  
  $year= date("y");  echo '<br/>';
  
  $roll=$class.$group.$year;
  //echo $roll;   echo '<br/>';
 
 $_POST['class']= $qu_info['class'];
 $_POST['group']=$qu_info['group'];
 //print_r($_POST);
 $query_result1= $obj_admin-> select_batch_for_student($_POST);
 
 if(isset($_POST['btn_student']))  {
     
     $roll=$roll.$_POST['batch_name'];
     $_POST['roll']= $roll;
    //print_r($_POST);
     echo '<br/>';
    
     
    //$obj_admin-> approve_student($_POST);
     
 }    
 
         
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span><?php echo $qu_info['name']; ?>'s Details..</h2>
           
        </div>
        <div class="box-content">
            <h4>
                <?php
                    if(isset($message)) {
                        echo $message;
                        unset($message);
                    }
                ?>
            </h4>
            
             <table border="1">
                <thead>
                    <tr>
                        <th> Student Name</th>
                        <th>Applied for the class</th>
                        <th>Group </th>
                         <th>Date of Birth</th>
                          <th>Address</th>
                          <th>Phone Number</th></tr>
                </thead>   
                
                    
                    <tr>
                        <td><?php echo $qu_info['name']; ?></td>
                        <td class="center"><?php echo $qu_info['class']; ?></td>
                        <td class="center"><?php echo $qu_info['group']; ?></td>
                        <td class="center"><?php echo $qu_info['date_of_birth']; ?></td>
                         <td class="center"><?php echo $qu_info['address']; ?></td>
                          <td class="center"><?php echo $qu_info['phone_number']; ?></td>
                        
                        
                       
                    </tr>
                   
                
            </table> 
            <br/> <br/>

      <form method="post" name="contact" action=""  > 
        <select name="batch_name">
             <option value=" ">---Select Batch---</option>
             <?php while ($stu_batch = mysqli_fetch_assoc($query_result1)) { ?>
                 <option value="<?php echo $stu_batch['batch_name']; ?> "><?php echo $stu_batch['batch_name']; ?> -->Sub: <?php echo $stu_batch['subjects']; ?>--><?php echo $stu_batch['fee']; ?>--><?php echo $stu_batch['time']; ?>--><?php echo $stu_batch['day']; ?></option>
                  
                     <?php } ?>
        </select>
        <select name="family_status">
             <option value=" ">---Family Status---</option>
        
         <option value="poor" >  Very Poor   </option> 
             <option value="poor" > Poor   </option> 
        <option value="good" > Good   </option>
        <option value="better" > Better   </option>
        <option value="best" > Best  </option>
        </select>
        <select name="student_quality">
             <option value=" ">---Student Quality---</option>
       <option value="poor" >  Very Poor   </option> 
             <option value="poor" > Poor   </option> 
        <option value="good" > Good   </option>
        <option value="better" > Better   </option>
        <option value="best" > Best  </option>
        
        </select>
          <select name="payment_type">
             <option value=" ">---Payment Type---</option>
        <option value="regular" > Regular  </option> 
        <option value="partial" > Partial  </option>
         
        </select>
        
        <label for="author"> Write Extra Information :</label> <textarea type="text" id="author"  name="extra_info"  class="required input_field" /> </textarea> 
            <div class="cleaner h10"></div>
            
            <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>"/>
            <input type="hidden" name="class" value="<?php echo $qu_info['class']; ?>"/>
            <input type="hidden" name="group" value="<?php echo $qu_info['group']; ?>"/>
            <input type="submit"  name="btn_student" class="submit_btn float_r" /> 
     </form>
            
            


            
        </div>
    </div><!--/span-->
</div>