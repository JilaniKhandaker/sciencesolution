<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Upload Lectues</a></li>
</ul>

<?php
// echo '<pre>';
print_r($_POST);
if (isset($_POST['btn'])) {

  $obj_admin->save_lecture($_POST);
}
?>



<div class="col_w450 float_l" >
    <div id="contact_form">




        <h4>Please give all informations correctly</h4>

        <form method="post" name="contact" action=""   enctype="multipart/form-data" > 


            <label for="author"> Lecture Title :</label>
            <input type="text" id="author"  name="lecture_title"  class="required input_field" /> 
            <div class="cleaner h10">

            </div>
            <div class="top-margin">
                <label>Upload Your File</label>
                <input type="file" name="slide_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">

            </div>
            

            

            


            <input type="submit" value="Upload Lecture "  name="btn" class="submit_btn float_r" /> 

        </form>

    </div> 
</div>