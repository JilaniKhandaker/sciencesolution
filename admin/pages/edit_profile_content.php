<?php

$query_res = $obj_app->search_user_by_id($user_id);
$search_info_by_id = mysqli_fetch_assoc($query_res);

if (isset($_POST['update_info'])) {

    //print_r($_POST);
  $obj_admin->update_user_info($_POST);
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Your Information</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h4 style="color: green;">
                <?php
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?>
            </h4>
             
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Name</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $search_info_by_id['name']; ?>" name="name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Address</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $search_info_by_id['address']; ?>" name="address" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Email Address</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $search_info_by_id['email']; ?>" name="email" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Phone Number</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $search_info_by_id['phone_number']; ?>" name="phone_number" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $search_info_by_id['user_id']; ?>" name="user_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                    <div class="form-actions">
                        <button type="submit" name="update_info" class="btn btn-primary">Update Information </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
