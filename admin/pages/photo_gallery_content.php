
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
    if(isset($_POST['btn'])){
        //print_r($_POST);
        $obj_admin-> save_notice($_POST);
    }
    if (isset($_GET['n_status'])){
        $notice_id=$_GET['notice_id'];
        if (isset($_GET['n_status'])=='delete'){
            $obj_admin-> delete_notice_by_id($notice_id);
        }
    }
    
     if (isset($_POST['upload_photo_btn'])){
       //print_r($_POST);
        $obj_admin-> upload_gallery_photo($_POST);
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
    
    <a id="resq"> jilani  </a>
    