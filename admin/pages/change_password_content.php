<?php
//echo $user_id;

$result_qu=$obj_admin->select_user_ifo_by_id($user_id);
$pofile_info=  mysqli_fetch_assoc($result_qu);
//print_r($pofile_info);

if (isset($_POST['btn_update_pass'])) {

    print_r($_POST);
  $obj_admin->update_password($_POST);
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span> Change your password</h2>
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
                        <label class="control-label" for="typeahead">Enter Ond Passwor:</label>
                        <div class="controls">
                            <input type="text" value="*******" name="old_password" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            <input type="hidden" value="<?php echo $pofile_info['user_id']; ?>" name="user_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    
                    
                    
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Enter New Password</label>
                        <div class="controls">
                            <input type="text" value="*******" name="new_password" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                     
                    
                     <div class="form-actions">
                        <button type="submit" name="btn_update_pass" class="btn btn-primary">Update Information </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
