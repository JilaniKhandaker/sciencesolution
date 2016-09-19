<?php
    
    if(isset($_GET['p_status'])) {
        $user_id=$_GET['user_id'];
        if($_GET['p_status'] == 'approve') {
            $message=$obj_admin->approve_student($user_id);
        }
        else if($_GET['p_status'] == 'reject') {
            $message=$obj_admin->reject_student($user_id);
        }
        
    }
    
   
   $query_result=$obj_admin->select_new_student();
    
?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>New Students Details..</h2>
           
        </div>
        <div class="box-content">
            <h4>
                <?php
                    if(isset($message)) {
                        echo $message;
                        unset($message);
                    }
                ?>
            </h4>
            <h4>
                <?php
                    if(isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
            </h4>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Student Name</th>
                        <th>Applied for the class</th>
                        <th>Batch </th>
                         <th>Date of Birth</th>
                          <th>Address</th>
                          <th>Phone Number</th>
                           
                          
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['name']; ?></td>
                        <td class="center"><?php echo $qu_info['class']; ?></td>
                        <td class="center"><?php echo $qu_info['batch_name']; ?></td>
                        <td class="center"><?php echo $qu_info['date_of_birth']; ?></td>
                         <td class="center"><?php echo $qu_info['address']; ?></td>
                          <td class="center"><?php echo $qu_info['phone_number']; ?></td>
                        
                        
                        <td class="center">
                            
                           <a class="btn btn-success" href="?p_status=approve&user_id=<?php echo $qu_info['user_id']; ?>" title=" Approve Admission">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>
                            <a class="btn btn-danger" href="?p_status=reject&user_id=<?php echo $qu_info['user_id']; ?>" title=" Reject Admission ">
                                <i class="halflings-icon white danger"></i>  
                            </a>
                            
                            
                            
                           
                            
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>