
<script>
    function suggestion(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?suggestion='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }
    
    </script>
    <?php
    if (isset($_POST['btn'])) {
        //print_r($_POST);
       if($_POST['class']!=" " && $_POST['group_name']!=" " && $_POST['subject_name']!=" " && $_POST['suggestion']!=" "){
          $obj_admin-> save_suggestion($_POST);
          //echo 'okk';
           
       }
    else {
            echo 'Please give all the infomations.';
    }
    
        
    }
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
    
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Suggestion </h2>
           
        </div>
        <div class="box-content">
            
            <list>
            <ul>
                <li> <button onclick="suggestion(this.value, 'sn');" value="upload_suggestion" > Upload suggestion  </button></li>
                <li> <button onclick="suggestion(this.value, 'sn');" value="manage_suggestion" > Manage suggestion   </button></li>
               
            </ul>
            </list>
            
        </div>
    </div><!--/span-->    
</div>
    
    <a id="sn"> . </a>
    
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
        
    <?php } ?>