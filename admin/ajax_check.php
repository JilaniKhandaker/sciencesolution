<?php

require '../application.php';
        $obj_app = new Application();
        
// cheking Class 
if (isset($_GET['class'])) {
    $count_error = 0;
    if (empty($_GET['class'])) {
        $count_error+=1;
        echo "Class is required";
    } else {
        ?>

        <?php
        
        $class = $_GET['class'];
        $batch_by_class = $obj_app->select_all_batch_info($class);
        ?>

        <div class="top-margin">
            <label>Select Batch  <span class="text-danger">* <a id="batchres" > </a> </span> </label>
            <select class="form-control" name="batch_id" onblur="check_Batch(this.value, 'batchres');" >
                <option> </option>
        <?php while ($batch_info = mysqli_fetch_assoc($batch_by_class)) { ?> 
                    <option value="<?php echo $batch_info['batch_id']; ?>" >

                    <?php echo $batch_info['batch_name']; ?>   </option> 

                    <?php } ?>

            </select>
        </div>
    <?php
    }
}

if(isset($_GET['puser_id'])){
    
    $user_id = $_GET['puser_id'];
//    echo $user_id;
//    echo 'is present';
    
    $obj_app-> insert_present_info($user_id);
}

if(isset($_GET['auser_id'])){
    
    $user_id = $_GET['auser_id'];
    echo $user_id;
    echo 'absent';
}

if(isset($_GET['notice'])){
   $val= $_GET['notice'];
   if($val== 'sn'){ ?>
 
    <form method="post" name="contact" action=""  > 
        <label for="author"> Write Short Notice:</label> <textarea type="text" id="author"  name="notice_des"  class="required input_field" /> </textarea> 
            <div class="cleaner h10"></div>
            <input name="notice_type" value="main" type="hidden" /> 
      
            <input type="submit" value="Publish Notice "  name="btn" class="submit_btn float_r" /> 
     </form>
       

  <?php  } elseif ($val == 'gn') { ?>
      <form method="post" name="contact" action=""  > 
        
          
            <label for="author"> Write Notice Here:</label> <textarea type="text" id="author"  name="notice_des"  class="required input_field" /> </textarea> 
      <div class="cleaner h10"></div>
       <input name="notice_type" value="regular" type="hidden" /> 
            <input type="submit" value="Publish Notice "  name="btn" class="submit_btn float_r" /> 
     </form>
      
   <?php }elseif ($val = 'mn') {
      
     require './admin.php';
     $obj_admin = new Admin();
       $result = $obj_admin -> select_all_notice();  ?>
       
       
<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Notice ID</th>
                        <th>Notice Description</th>
                        <th>Notice Type</th>
                        <th>Published Date </th>
                         
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['notice_id']; ?></td>
                        <td class="center"><?php echo $qu_info['notice_des']; ?></td>
                        <td class="center"><?php echo $qu_info['notice_type']; ?></td>
                        <td class="center"><?php echo $qu_info['date']; ?></td>
                        <td class="center">
                            
                           <a class="btn btn-danger" href="?n_status=delete&notice_id=<?php echo $qu_info['notice_id']; ?>" title=" Delete Notice">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
       
  <?php  }
    
}

if (isset($_GET['history'])){
   
    $history_type = $_GET['history'];
    if( $history_type == 'ph'){
        echo 'Payment History';
    } elseif ($history_type == 'ah') {
        echo 'Attendance History';
}elseif ( $history_type == 'sh') {
    echo 'Students history';
    }
    
}

if (isset($_GET['uq'])){ ?>
   
    <form method="post" name="contact" action=""  > 
        <label for="author"> Enter Exam Name:</label>
        <input type="text" id="author"  name="exam_name"  class="required input_field" /> 
   
         <input type="submit" value="Next "  name="_btn_exam" class="submit_btn float_r" /> 
      
    </form>
   
    <?php
  
}


?>