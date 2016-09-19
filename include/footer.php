<?php 
$query_res = $obj_app -> get_contact_info();
$contact_info = mysqli_fetch_assoc($query_res);
//print_r($contact_info);
?>

<footer id="footer" class="top-space">

    <div class="footer1">
        <div class="container">
            <div class="row">

                <div class="col-md-3 widget">
                    <h3 class="widget-title">Contact</h3>
                    <div class="widget-body">
                        <p><?php   echo $contact_info['phone']; ?><br>
                            <a href="mailto:#"><?php   echo $contact_info['email']; ?></a><br>
                            <?php   echo $contact_info['address']; ?> 
                        </p>	
                    </div>
                </div>

                <div class="col-md-6 widget">
                    <h3 class="widget-title">Follow me</h3>
                    <div class="widget-body">
                        <p class="follow-me-icons">
                            <a href=""><i class="fa fa-twitter fa-2"></i></a>
                            
                            <a href="https://www.facebook.com/jilanikhandaker"><i class="fa fa-facebook fa-2"></i></a>
                        </p>	
                    </div>
                </div>

               
                

            </div> <!-- /row of widgets -->
        </div>
    </div>

    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        
                    </div>
                </div>

                <div class="col-md-6 widget" >
                    <div class="widget-body" >
                        <p class="text-right" >
                            Copyright &copy: Science Solution. Developed by: jilani khandaker, CSE,JnU
                        </p>
                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </div>

</footer>