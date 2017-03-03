
<script>
    function select_notice(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?notice='+given_text;
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
       // print_r($_POST);
        
        $val= $_POST['notice_des'];
         if($val!=" " ){
             $obj_admin-> save_notice($_POST);
        
         //echo 'Okk';;
        }
    else {
           echo 'Write something to publish.';
    }
    
    }
    if (isset($_GET['n_status'])){
        $notice_id=$_GET['notice_id'];
        if ($_GET['n_status']=='delete'){
            echo 'delete';
            $obj_admin-> delete_notice_by_id($notice_id);
        }
        
        if ($_GET['n_status']=='edit'){
            echo 'Update';
            $result_qu = $obj_admin-> get_notice_by_id($notice_id);
             $adv_info =  mysqli_fetch_assoc($result_qu);
        }
    }
    
    
    
    if(isset($_POST['update_notice'])){
        //echo 'ok';
        //print_r($_POST);
         $obj_admin->update_notice_info($_POST);
    } 
    
    ?>
    
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Notice.</h2>
           
        </div>
        <div class="box-content">
            
            <list>
            <ul>
                <li> <button onclick="select_notice(this.value, 'sn');" value="sn" > Short Notice  </button></li>
                <li> <button onclick="select_notice(this.value, 'sn');" value="gn" > General Notice   </button></li>
                <li> <button onclick="select_notice(this.value, 'sn');" value="mn" > Manage Notice  </button></li>
            </ul>
            </list>
            
        </div>
    </div><!--/span-->    
</div>
    
    <a id="sn">  </a>
    
    
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
                        <label class="control-label" for="typeahead">Notice Description</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $adv_info['notice_des']; ?>" name="notice_des" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $adv_info['notice_id']; ?>" name="notice_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                     <input type="hidden" value="<?php echo $adv_info['notice_type']; ?>" name="notice_type" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                          
                    
                    <div class="form-actions">
                        <button type="submit" name="update_notice" class="btn btn-primary">Update Notice </button>
                        
                        
                    </div>
                    
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
        
    <?php } ?>