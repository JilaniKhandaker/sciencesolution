
<script>
    function question(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?question='+given_text;
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
    if (isset($_POST['question_category_btn'])){
       // print_r($_POST);
       if($_POST['question_category_name']=="" || $_POST['question_category_des']==""  ){
         echo 'Give all information correctly.';
    } else {
        $obj_admin-> save_question_category($_POST);
        }

    }
     if (isset($_POST['upload_question_btn'])){
       //print_r($_POST);
       
         if($_POST['question_category_id']=="" || $_POST['question_des']=="" ){
         echo 'Give all information correctly.';
    } else {
       $obj_admin-> upload_question($_POST);
        //echo 'Ok';
        }
         
        
    }
    if(isset($_GET['question_status'])){
    if($_GET['question_status']){
                
                $question_status=$_GET['question_status'];
                $question_id = $_GET['question_id'];
                $obj_admin-> delete_question($question_id);
    }}
    
    ?>
    
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Question Bank</h2>
           
        </div>
        <div class="box-content">
            
            <list>
            <ul>
                <li> <button style=" width: 20%;  " onclick="question(this.value, 'resq');" value="add_category" > Add Question Category  </button></li>
                <li> <button style=" width: 20%;  " onclick="question(this.value, 'resq');" value="upload_question" > Upload Question  </button></li>
                <li> <button  style=" width: 20%;  "onclick="question(this.value, 'resq');" value="manage_question" > Manage Question  </button></li>
                
            </ul>
            </list>
            
        </div>
    </div><!--/span-->    
</div>
    
    <a id="resq"> jilani  </a>
    