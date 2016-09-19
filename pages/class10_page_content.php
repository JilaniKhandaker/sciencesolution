<br/><br/><br/><br/><br/>

<?php
 

   $class=10;
   
  $query_result=$obj_app->select_all_batch_info($class);
    
?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Batches Details.</h2>
           
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
                        <th> Batch Name</th>
                        <th>Subjects</th>
                        <th>Class </th>
                         <th>Time</th>
                          <th>Day</th>
                           <th>Monthly Fee</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['batch_name']; ?></td>
                        <td class="center"><?php echo $qu_info['subjects']; ?></td>
                        <td class="center"><?php echo $qu_info['class']; ?></td>
                        <td class="center"><?php echo $qu_info['time']; ?></td>
                         <td class="center"><?php echo $qu_info['day']; ?></td>
                          <td class="center"><?php echo $qu_info['fee']; ?></td>
                        
                       
                          
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>