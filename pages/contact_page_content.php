<br/><br/><br/><br/><br/><br/><br/><br/>
<script>
    function check_phone(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?phone='+given_text;
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
    
if($_POST['name']=="" || $_POST['phone']==""|| $_POST['message']=="" ){
         echo 'Give all information correctly.';
    } else {
        
    $obj_app -> contact_page_msg($_POST);
        //echo 'Ok';
        }

}
?>
<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">About</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-sm-9 maincontent">
            <header class="page-header">
                <h1 class="page-title">Contact us</h1>
            </header>

            <p>
                We’d love to hear from you. Interested in working together? Fill out the form below with some info about your project and I will get back to you as soon as I can. Please allow a couple days for me to respond.
            </p>
            <br>
            <form method="post" action="">
                <div class="row">
                    <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Name" name="name">
                    </div>
                    <a id="resphone" > *</a>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" placeholder="Phone" name="phone"
                               onblur="check_phone(this.value, 'resphone');" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea placeholder="Type your message here..." class="form-control" rows="9" name="message"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="checkbox"><input type="checkbox"> Sign up for newsletter</label>
                    </div>
                    <div class="col-sm-6 text-right">
                        <input class="btn btn-action" type="submit" value="Send message" name="btn">
                    </div>
                </div>
            </form>

        </article>
        <!-- /Article -->

        <!-- Sidebar -->
        <aside class="col-sm-3 sidebar sidebar-right">

            <div class="widget">
                <h4>Address</h4>
                <address>
                    2002 Holcombe Boulevard, Houston, TX 77030, USA
                </address>
                <h4>Phone:</h4>
                <address>
                    (713) 791-1414
                </address>
            </div>

        </aside>
        <!-- /Sidebar -->

    </div>
</div>