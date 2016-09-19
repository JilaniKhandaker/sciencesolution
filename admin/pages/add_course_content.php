<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Add_course</a></li>
</ul>

<?php
//    echo '<pre>';
// print_r($_POST);
if (isset($_POST['btn'])) {

    $obj_admin->save_course($_POST);
}
?>



<div class="col_w450 float_l" >
    <div id="contact_form">




        <h4>Please give all informations correctly</h4>

        <form method="post" name="contact" action=""  > 


            <label for="author"> Course Name:</label> <input type="text" id="author"  name="course_name"  class="required input_field" /> 
            <div class="cleaner h10"></div>
            

            <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2"> Subject:</label>
                <div class="controls">
                    <textarea name="subjects" class="cleditor" id="textarea2" rows="3"></textarea>
                </div>
            </div>
             <label for="author"> Monthly Fee:</label> <input type="text" id="author" name="fee" class="required input_field" /> 
            <div class="cleaner h10"></div>

            


            <input type="submit" value="Save Course "  name="btn" class="submit_btn float_r" /> 

        </form>

    </div> 
</div>