<?php
    
    if(isset($_GET['p_status'])) {
        $batch_id=$_GET['batch_id'];
        if($_GET['p_status'] == 'delete') {
            $message=$obj_admin->delete_batch_by_id($batch_id);
            //echo 'Delete';
            //print_r($_GET);
        }
        else if($_GET['p_status'] == 'edit') {
           // echo 'Edit';
            //print_r($_GET);
            $result_qu = $obj_admin-> get_all_batch($batch_id);
             $batch_info =  mysqli_fetch_assoc($result_qu);
        }
        
        
       
        
        
    }
    
   
   $query_result=$obj_admin->select_all_batch_info();
    if(isset($_POST['update_batch'])){
        //echo 'ok';
        //print_r($_POST);
         $obj_admin->update_batch_info($_POST);
    } 
    
?>



<?php 
    if(isset($batch_info)){ ?>
        
    
    <div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Contact Information</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h4 style="color: green;">
                <?php
                if(isset($_SESSION['message'])){
                if ($_SESSION['message']) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }}
                ?>
            </h4>
             
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Subjects</label>
                        <div class="controls">
                            <textarea id="text" name="subjects" rows="0" cols="0" class="required"><?php echo $batch_info['subjects']; ?> </textarea>
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Class</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $batch_info['class']; ?>" name="class" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Day</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $batch_info['day']; ?>" name="day" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Time</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $batch_info['time']; ?>" name="time" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Monthly Fee</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $batch_info['fee']; ?>" name="fee" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $batch_info['batch_id']; ?>" name="batch_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                          
                    
                    <div class="form-actions">
                        <button type="submit" name="update_batch" class="btn btn-primary">Update Advertisement </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
        
    <?php } ?>



<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Batches Details..</h2>
           
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
            <h4>
                <?php
                    if(isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
            </h4>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Batch Name</th>
                        <th>Group</th>
                        <th>Subjects</th>
                        <th>Class </th>
                         <th>Time</th>
                          <th>Day</th>
                           <th>Monthly Fee</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['batch_name']; ?></td>
                         <td><?php echo $qu_info['group']; ?></td>
                        <td class="center"><?php echo $qu_info['subjects']; ?></td>
                        <td class="center"><?php echo $qu_info['class']; ?></td>
                        <td class="center"><?php echo $qu_info['time']; ?></td>
                         <td class="center"><?php echo $qu_info['day']; ?></td>
                          <td class="center"><?php echo $qu_info['fee']; ?></td>
                        
                        
                        <td class="center">
                            
                           <a class="btn btn-success" href="?p_status=edit&batch_id=<?php echo $qu_info['batch_id']; ?>" title="Edit Batch">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>
                            <a class="btn btn-danger" href="?p_status=delete&batch_id=<?php echo $qu_info['batch_id']; ?>" title=" Delete Batch">
                                <i class="halflings-icon white danger"></i>  
                            </a>
                            
                            
                            
                           
                            
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>


