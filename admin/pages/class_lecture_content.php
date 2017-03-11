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
//print_r($_POST);
if (isset($_POST['btn'])) {

    if ($_POST['batch_id_class'] != "" && $_POST['lecture_des'] != "" && $_FILES['resource'] != "") {
       
        //print_r($_POST);
        $batch_class= $_POST['batch_id_class'];
        
       
$myArray = explode(',', $batch_class);
//print_r($myArray);
            $_POST['batch_id']=$myArray[0];
             $_POST['class']=$myArray[1];
              $obj_admin->save_lecture_class($_POST);
             
        // echo 'Ok';
    } else {
        echo 'Please Give all information correctly.';
    }
}
?>



<div class="col_w450 float_l" >
    <div id="contact_form">




        <h4>Please give all informations correctly</h4>
 <?php  $student_batch = $obj_admin->select_all_batch(); ?>
        <form method="post" name="contact" action=""   enctype="multipart/form-data" > 


            <label for="author"> Lecture Description:</label>
            <input type="text" id="author"  name="lecture_des"  class="required input_field" />  <br/>
            <select class="form-control"name="batch_id_class" >
                <option value="">--Select Class and Batch--</option>
        <?php while ($batch_info = mysqli_fetch_assoc($student_batch)) { ?> 
                    <option value="<?php echo $batch_info['batch_id']; ?>,<?php echo $batch_info['class']; ?>" >

               Class:  <?php echo $batch_info['class']; ?> ->Batch: <?php echo $batch_info['batch_name']; ?>
                     </option> 

                    <?php } ?>

            </select> <br/>
            
            <div class="top-margin">
                <label>Upload Your File</label>
                <input type="file" name="resource" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">

            </div>
            <input type="submit" value="Upload Lecture "  name="btn" class="submit_btn float_r" /> 

        </form>

    </div> 
</div>
<hr/>
<div style="background-color: #ff944d">
    <div style="padding: 10px;">
        <form method="post" name="contact" action=""   enctype="multipart/form-data" > 
            <input type="submit" value="Manage Lecture"  name="btn_manage_lecture" class="submit_btn float_r" /> 

        </form>
    </div>
    <div style="padding: 10px;">
<?php


if (isset($_GET['lecture_status'])){
        $class_lecture_id=$_GET['class_lecture_id'];
        if (isset($_GET['lecture_status'])=='delete'){
            $obj_admin-> delete_class_lecture_by_id($class_lecture_id);
            //echo 'Delete';
        }
    }



if (isset($_POST['btn_manage_lecture'])) {

    $result = $obj_admin->select_all_class_lecture();
    ?>


            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Lecture Description</th>
                        <th>Uploaded By</th>
                        <th>Uploaded Date </th>
                        <th>Lecture </th>

                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $qu_info['lecture_des']; ?></td>

                            <td class="center"><?php echo $qu_info['name']; ?></td>
                            <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                            <td><img src="<?php echo $qu_info['resource']; ?>" height="100" width="70" > </td>
                            <td class="center">

                                <a class="btn btn-danger" href="?lecture_status=delete&class_lecture_id=<?php echo $qu_info['class_lecture_id']; ?>" title=" Delete Lecture">
                                    <i class="halflings-icon white box-icon"></i>  
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 


        <?php }
        ?>

    </div>
</div>
