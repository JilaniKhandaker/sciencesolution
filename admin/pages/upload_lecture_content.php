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

    if ($_POST['lecture_title'] != "" && $_FILES['slide_name'] != "") {
        $obj_admin->save_lecture($_POST);
        //print_r($_POST);
        // echo 'Ok';
    } else {
        echo 'Please Give all information correctly.';
    }
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
        $lecture_id=$_GET['lecture_id'];
        if (isset($_GET['lecture_status'])=='delete'){
            $obj_admin-> delete_lecture_by_id($lecture_id);
            //echo 'Delete';
        }
    }



if (isset($_POST['btn_manage_lecture'])) {

    $result = $obj_admin->select_all_lecture();
    ?>


            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Lecture Title</th>
                        <th>Uploaded By</th>
                        <th>Uploaded Date </th>

                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $qu_info['lecture_title']; ?></td>

                            <td class="center"><?php echo $qu_info['name']; ?></td>
                            <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                            <td class="center">

                                <a class="btn btn-danger" href="?lecture_status=delete&lecture_id=<?php echo $qu_info['lecture_id']; ?>" title=" Delete Lecture">
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
