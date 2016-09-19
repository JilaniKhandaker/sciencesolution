<script>
    function check_class(given_text, obj_id) {
        xmlhttp = new XMLHttpRequest();
        server_page = 'ajax_check.php?class=' + given_text;
        xmlhttp.open('GET', server_page);
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>
<?php
if(isset($_POST['btn'])){
 
    //if values are not empty
            if(!empty($_POST['class'])&&!empty($_POST['batch_id'])&&!empty($_POST['roll'])&&!empty($_POST['month'])&&!empty($_POST['amount'])){
                $obj_admin->save_payment_info($_POST);
                
            }else{
                echo ' not okk';
            }
 
            
}


?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon box"></i><span class="break"></span>Monthly payment.</h2>

        </div>
        <div class="box-content">
            <h4>
<?php
if (isset($message)) {
    echo $message;
    unset($message);
}
?>
            </h4>
            <h4>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </h4>

            <form method="post" name="contact" action=""  enctype="multipart/form-data">
                <div class="top-margin">
                    <label>Select Class <span class="text-danger">* </span>  </label>
                    <select class="form-control" name="class" onblur="check_class(this.value, 'cres');">
                        <option> </option>
                        <option value="8"> Eight </option>
                        <option value="9">Nine</option>
                        <option value="10">Ten</option>

                    </select>
                </div>
                <div id="cres" > </div>



                <div class="top-margin">
                    <label>Enter Roll Number:  <span class="text-danger">* <a color="red" id="res" > </a></span></label>
                    <input type="text" class="form-control" name="roll" >
                </div>
                
                <div class="top-margin">
                    <label>Select Month <span class="text-danger">* </span>  </label>
                    <select class="form-control" name="month" >
                        <option></option>
                        <option value="January"> January  </option>
                        <option value="February"> February  </option>
                        <option value="March"> March  </option>
                        <option value="April"> April  </option>
                        <option value="May"> May  </option>
                        <option value="June"> June  </option>
                        <option value="July"> July  </option>
                        <option value="August"> August  </option>
                        <option value="September"> September  </option>
                        <option value="October"> October  </option>
                        <option value="November"> November  </option>
                        <option value="December"> December  </option>
                            
                        

                    </select>
                </div>

                <div class="top-margin">
                    <label>Enter Amount:  <span class="text-danger">* <a color="red" id="res" > </a></span></label>
                    <input type="text" class="form-control" name="amount" >
                </div>



                <button class="btn btn-action"  name="btn" type="submit">Submit</button>



            </form>   


        </div>
    </div><!--/span-->
</div>