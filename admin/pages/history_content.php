<div style="background-color: #ff944d">
    <div style="padding: 10px;">
        <form method="post" name="contact" action=""   enctype="multipart/form-data" > 
            <input type="submit" value="Payment History"  name="btn_payment_history" class="submit_btn float_r" /> 

        </form>
    </div>
    <div style="padding: 10px;">
<?php




if (isset($_POST['btn_payment_history'])) {

    $result = $obj_admin->select_all_payment();
    ?>


            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Payment ID</th>
                        <th> Roll</th>
                        <th>Month</th>
                        <th>Amount </th>
                        <th>Payment Date </th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $qu_info['payment_id']; ?></td>

                            <td class="center"><?php echo $qu_info['pass_roll']; ?></td>
                            <td class="center"><?php echo $qu_info['month']; ?></td>
                             <td class="center"><?php echo $qu_info['amount']; ?></td>
                              <td class="center"><?php echo $qu_info['date']; ?></td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 


        <?php }
        ?>

    </div>
</div>
<div style="background-color: #ff944d">
    <div style="padding: 10px;">
        <?php  $student_batch = $obj_admin->select_all_batch(); ?>
        <form method="post" name="contact" action=""   enctype="multipart/form-data" > 
             <select class="form-control"name="batch_id" >
                <option value="">--Select Class and Batch--</option>
        <?php while ($batch_info = mysqli_fetch_assoc($student_batch)) { ?> 
                    <option value="<?php echo $batch_info['batch_id']; ?>" >

               Class:  <?php echo $batch_info['class']; ?> ->Batch: <?php echo $batch_info['batch_name']; ?>
                     </option> 

                    <?php } ?>

            </select> <br/>
            <input type="submit" value="Student History"  name="btn_student_history" class="submit_btn float_r" /> 

        </form>
    </div>
    <div style="padding: 10px;">
<?php






if (isset($_POST['btn_student_history'])) {
    //print_r($_POST);
   $result = $obj_admin->select_all_student_by_batch_id($_POST);
    ?>


            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th> Roll</th>
                       
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $qu_info['name']; ?></td>

                            <td class="center"><?php echo $qu_info['pass_roll']; ?></td>
                            
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 


        <?php }
        ?>

    </div>
</div>