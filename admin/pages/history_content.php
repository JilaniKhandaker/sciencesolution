
<script>
    function select_history(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='ajax_check.php?history='+given_text;
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
   
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage History.</h2>
           
        </div>
        <div class="box-content">
            
           <list>
            <ul>
                <li> <button onclick="select_history(this.value, 'his');" value="ph" > Payment History  </button></li>
                <li> <button onclick="select_history(this.value, 'his');" value="ah" > Attendance History </button></li>
                <li> <button onclick="select_history(this.value, 'his');" value="sh" > Students History  </button></li>
             </ul>
            </list>
            
        </div>
    </div><!--/span-->
</div>
    <a id="his"></a>