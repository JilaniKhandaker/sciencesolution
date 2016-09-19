
<script>
    function upload_question(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?uq='+given_text;
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
    ?>
    
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Question Bank</h2>
           
        </div>
        <div class="box-content">
            
            <list>
            <ul>
                <li> <button onclick="upload_question(this.value, 'upload_question');" value="upload_question" > Upload Question  </button></li>
                <li> <button onclick="select_notice(this.value, 'mq');" value="mq" > Manage Question  </button></li>
                
            </ul>
            </list>
            
        </div>
    </div><!--/span-->    
</div>
    
    <a id="upload_question"> jilani </a>