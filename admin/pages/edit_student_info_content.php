<div style="background-color: #ff944d">
    <div style="padding: 10px;">
        <form method="post" name="contact" action=""   enctype="multipart/form-data" > 
           <label for="author">
               Enter Student ID :</label> <input type="text" id="author"  name="student_id"  class="required input_field" /> 
            <div class="cleaner h10"></div>
            <input type="submit" value="Submit"  name="edit_student_profile" class="submit_btn float_r" /> 

        </form>
    </div>
    <div style="padding: 10px;">
<?php


if (isset($_POST['update_student_info'])) {

    //print_r($_POST);
  $obj_admin->update_student_info($_POST);
}



if (isset($_POST['edit_student_profile'])) {

   // print_r($_POST);
    $student_id = $_POST['student_id'];
    //echo $student_id;
    $query_res = $obj_admin->get_student_info_by_id($student_id);
    $search_info_by_id = mysqli_fetch_assoc($query_res);
    ?>

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
                        <label class="control-label" for="typeahead">Phone Number</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $search_info_by_id['phone_number']; ?>" name="phone_number" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $search_info_by_id['user_id']; ?>" name="user_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                    <div class="form-actions">
                        <button type="submit" name="update_student_info" class="btn btn-primary">Update Information </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>
            
        


        <?php }
        ?>

    </div>
</div>