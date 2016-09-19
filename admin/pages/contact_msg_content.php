<?php
    

    if(isset($_GET['p_status'])){
        $msg_id=$_GET['msg_id'];
        if($_GET['p_status'] == 'delete') {
            $message=$obj_admin->delete_contatc_msg($msg_id);
        }
    }
    
$query_result=$obj_admin->conatct_page_messages();
    
?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Contact page message.</h2>
           
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
                        <th> Name</th>
                        <th>Email Address</th>
                        <th>Phone Number </th>
                         <th>Message</th>
                          
                         <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['name']; ?></td>
                        
                        <td class="center"><?php echo $qu_info['email']; ?></td>
                          <td class="center"><?php echo $qu_info['phone']; ?></td>
                           <td class="center"><?php echo $qu_info['message']; ?></td>
                        
                        
                        <td class="center">
                            
                           <a class="btn btn-danger" href="?p_status=delete&msg_id=<?php echo $qu_info['contact_msg_id']; ?>" title=" Delete Message">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>