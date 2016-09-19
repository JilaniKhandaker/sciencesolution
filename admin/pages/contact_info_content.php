<?php
//echo $user_id;

$result_qu = $obj_admin-> get_contact_info();
$contact_info =  mysqli_fetch_assoc($result_qu);

if (isset($_POST['update_info'])) {

    //print_r($_POST);
  $obj_admin->update_contact_info($_POST);
}
?>

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
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?>
            </h4>
             
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Address</label>
                        <div class="controls">
                            <textarea id="text" name="address" rows="0" cols="0" class="required"><?php echo $contact_info['address']; ?> </textarea>
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Email Address</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $contact_info['email']; ?>" name="email" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Phone Number</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $contact_info['phone']; ?>" name="phone" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="update_info" class="btn btn-primary">Update Information </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
