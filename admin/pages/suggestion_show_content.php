
      <?php
    // require 'admin.php';
     //$obj_admin = new Admin();
       $result = $obj_admin -> select_all_suggesstion(); 
       
       if (isset($_GET['suggestion_status'])){
        $suggestion_id=$_GET['suggestion_id'];
        if ($_GET['suggestion_status']=='delete'){
            //echo 'Delete';
            $obj_admin-> delete_suggestion_by_id($suggestion_id);
        }
         if ($_GET['suggestion_status']=='edit'){
            $result_qu = $obj_admin-> get_suggestion_by_id($suggestion_id);
             $sug_info =  mysqli_fetch_assoc($result_qu);
             
             
        }
    }
    if(isset($_POST['update_sug'])){
        //echo 'ok';
        //print_r($_POST);
         $obj_admin->update_suggestion_info($_POST);
    }
       
       
       
       ?>
       
       

       

<?php 
    if(isset($sug_info)){ ?>
        
    
    <div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Contact Information</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h4 style="color: green;">
                <?php
                if(isset($_SESSION['message'])){
                if ($_SESSION['message']) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }}
                ?>
            </h4>
             
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Group Nmae </label>
                        <div class="controls">
                            <textarea id="text" name="group_name" rows="0" cols="0" class="required"><?php echo $sug_info['group_name']; ?> </textarea>
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Subject Name </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $sug_info['subject_name']; ?>" name="subject_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Suggestion</label>
                        <div class="controls">
                           <textarea id="text" name="suggestion" rows="0" cols="0" class="required"><?php echo $sug_info['suggestion']; ?> </textarea>
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $sug_info['suggestion_id']; ?>" name="suggestion_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                          
                    
                    <div class="form-actions">
                        <button type="submit" name="update_sug" class="btn btn-primary">Update Suggestion </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
        
    <?php } else { ?>




<table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
        <tr>
            <th> Suggestion ID</th>
            <th>Uploaded BY</th>
            <th>Upload Date</th>
            <th>class</th>
            <th>Group</th>
            <th>Subject Names</th>
            <th>Suggestion</th>

            <th>Actions</th>
        </tr>
    </thead>   
    <tbody>
        <?php while ($qu_info = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $qu_info['suggestion_id']; ?></td>
                <td class="center"><?php echo $qu_info['user_id']; ?></td>
                <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                <td class="center"><?php echo $qu_info['class']; ?></td>
                <td class="center"><?php echo $qu_info['group_name']; ?></td>
                <td class="center"><?php echo $qu_info['subject_name']; ?></td>
                <td class="center"><?php echo $qu_info['suggestion']; ?></td>
                <td class="center">

                    <a class="btn btn-danger" href="?suggestion_status=delete&suggestion_id=<?php echo $qu_info['suggestion_id']; ?>" title=" Delete Suggection">
                        <i class="halflings-icon white box-icon"></i>  
                    </a>

                    <a class="btn btn-success" href="?suggestion_status=edit&suggestion_id=<?php echo $qu_info['suggestion_id']; ?>" title=" Edit Suggestion">
                        <i class="halflings-icon white box-icon"></i>  
                    </a>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table> 


    <?php } ?>

 