
<script>
    function question(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?photo='+given_text;
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
    
    if (isset($_GET['photo_status'])){
        $photo_id=$_GET['photo_id'];
        if ($_GET['photo_status']=='delete'){
           $obj_admin-> delete_gallery_photo_by_id($photo_id);
            //echo 'Delete';
        }
        if ($_GET['photo_status']=='edit'){
             //echo 'edit';
            $result_qu = $obj_admin-> get_photo_info($photo_id);
             $adv_info =  mysqli_fetch_assoc($result_qu);
        }
         
    }
    
     if (isset($_POST['upload_photo_btn'])){
       //print_r($_POST);
       if( $_POST['photo_title'] != "" && $_POST['photo_des']!="" && $_FILES['resource'] != "" ){
          //echo 'Okk';
        $obj_admin-> upload_gallery_photo($_POST);
        
         
    } else {
        echo 'Give all information correctly.';
        }
        }
    
        if(isset($_POST['update_photo'])){
        //echo 'ok';
        //print_r($_POST);
         $obj_admin->update_photo_info($_POST);
    } 
    
    ?>
    
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Gallery Photo</h2>
           
        </div>
        <div class="box-content">
            
            <list>
            <ul>
                <li> <button style=" width: 20%;  " onclick="question(this.value, 'resq');" value="upload_photo" > Upload Photo  </button></li>
                <li> <button  style=" width: 20%;  "onclick="question(this.value, 'resq');" value="manage_photo" > Manage Photo  </button></li>
                
            </ul>
            </list>
            
        </div>
    </div><!--/span-->    
</div>
    
    <a id="resq"> .  </a>
    
    
    <?php 
    if(isset($adv_info)){ ?>
        
    
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
                        <label class="control-label" for="typeahead">Photo Title</label>
                        <div class="controls">
                            <textarea id="text" name="photo_title" rows="0" cols="0" class="required"><?php echo $adv_info['photo_title']; ?> </textarea>
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Photo Description</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $adv_info['photo_des']; ?>" name="photo_des" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $adv_info['photo_id']; ?>" name="photo_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                          
                    
                    <div class="form-actions">
                        <button type="submit" name="update_photo" class="btn btn-primary">Update Photo info </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
        
    <?php } ?>