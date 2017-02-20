
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
           
       }
    else {
            echo 'Please give all the infomations.';
    }
    
        
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
    
    <a id="sn"> jilani </a>