
<script>
    function advertise(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?advertise='+given_text;
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
    if(isset($_POST['btn'])){
        //print_r($_POST);
        $obj_admin-> save_notice($_POST);
    }
    if (isset($_GET['adv_status'])){
        $adv_id=$_GET['adv_id'];
        if ($_GET['adv_status']=='delete'){
           $obj_admin-> delete_adv_by_id($adv_id);
            //echo 'Delete';
        }
         if ($_GET['adv_status']=='edit'){
             //echo 'edit';
            $result_qu = $obj_admin-> get_all_advertise($adv_id);
             $adv_info =  mysqli_fetch_assoc($result_qu);
        }
    }
    if (isset($_POST['upload_advertise_btn'])){
       // print_r($_POST);
        if($_POST['adv_heading']!="" && $_POST['adv_desc']!=""){
            $obj_admin-> upload_advertise($_POST);
            //echo 'Ok ';
        }
    else {
            echo 'Please give all the infomations.';
    }
       
    }
    
    if(isset($_POST['update_adv'])){
        //echo 'ok';
        //print_r($_POST);
         $obj_admin->update_avd_info($_POST);
    } 
    ?>
    
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Advertisement</h2>
           
        </div>
        <div class="box-content">
            
            <list>
            <ul>
                <li> <button style=" width: 20%;  " onclick="advertise(this.value, 'resq');" value="upload_advertise" > Upload Advertise  </button></li>
                <li> <button  style=" width: 20%;  "onclick="advertise(this.value, 'resq');" value="manage_advertise" > Manage Advertise  </button></li>
                
            </ul>
            </list>
            
        </div>
    </div><!--/span-->    
</div>
    
    <a id="resq"> .....  </a>
    
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
                        <label class="control-label" for="typeahead">Advertise Heading</label>
                        <div class="controls">
                            <textarea id="text" name="adv_heading" rows="0" cols="0" class="required"><?php echo $adv_info['adv_heading']; ?> </textarea>
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Advertise Description</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $adv_info['adv_desc']; ?>" name="adv_desc" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $adv_info['adv_id']; ?>" name="adv_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                          
                    
                    <div class="form-actions">
                        <button type="submit" name="update_adv" class="btn btn-primary">Update Advertisement </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
        
    <?php } ?>