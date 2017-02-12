
<script>
    function question(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?article_req='+given_text;
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
    
     if (isset($_POST['add_article_btn'])){
       //print_r($_POST);
        $obj_admin-> add_article($_POST);
    }
    
    
    ?>
    
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Articles </h2>
           
        </div>
        <div class="box-content">
            
            <list>
            <ul>
                <li> <button style=" width: 20%;  " onclick="question(this.value, 'resq');" value="write_article" > Write an article  </button></li>
                <li> <button style=" width: 20%;  " onclick="question(this.value, 'resq');" value="manage_article" > Manage your articles  </button></li>
                
                
            </ul>
            </list>
            
        </div>
    </div><!--/span-->    
</div>
    
    <a id="resq"> jilani  </a>
    