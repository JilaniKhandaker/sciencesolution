<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Add_Batch</a></li>
</ul>

<?php
//    echo '<pre>';
// print_r($_POST);
if (isset($_POST['btn'])) {

    $obj_admin->save_batch($_POST);
}
?>



<div class="col_w450 float_l" >
    <div id="contact_form">




        <h4>Please give all informations correctly</h4>

        <form method="post" name="contact" action=""  > 


            <label for="author"> Batch Name:</label> <input type="text" id="author"  name="batch_name"  class="required input_field" /> 
            <div class="cleaner h10"></div>

            <label for="author"> Subjects:</label> <input type="text" id="author"  name="subjects"  class="required input_field" /> 
            <div class="cleaner h10"></div>
            <label for="author">For which  class ?:</label> 
            <select class="form-control" name="class">
                <option>...Select Class...</option>
                <option value="8"> Eight </option>
                <option value="9">Nine</option>
                <option value="10">Ten</option>

            </select>
            <div class="cleaner h10"></div>

            <label for="author"> Time:</label> <input type="text" id="author"  name="time"  class="required input_field" /> 
            <div class="cleaner h10"></div>
            <label for="author"> Day:</label> <input type="text" id="author"  name="day"  class="required input_field" /> 
            <div class="cleaner h10"></div>
            <label for="author"> Monthly Fee:</label> <input type="text" id="author" name="fee" class="required input_field" /> 
            <div class="cleaner h10"></div>




            <input type="submit" value="Save Batch "  name="btn" class="submit_btn float_r" /> 

        </form>

    </div> 
</div>