<?php 
$result = $obj_app-> select_latest_notice();
$latest_notice = mysqli_fetch_assoc($result);
//print_r($latest_notice);

?>
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <h1 style="color: goldenrod; "> <i><b>MaSa </b></i></h1> 
        
        </div>


        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                
                <?php if(isset($pages)) { ?>
                <li><a href="index.php">Home</a></li>
                <?php if ($pages == 'result_page'){ ?>
                <li class="active"><a href="result.php">Online Result</a></li>
                <?php }  else {?>
                <li><a href="result.php">Online Result</a></li>
                <?php } 
                if ($pages == 'class8'|| $pages == 'class9' || $pages == 'class10' ||$pages == 'class11'){ ?>
                <li class="dropdown" class="active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academic Program <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="class8.php">Class 8 </a></li>
                        <li><a href="class9.php">Class 9</a></li>
                        <li><a href="class10.php">Class 10 </a></li>
                        <li><a href="class11.php">Class 11 </a></li>
                    </ul>
                </li>
                <?php }  else {?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academic Program <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="class8.php">Class 8 </a></li>
                        <li><a href="class9.php">Class 9</a></li>
                        <li><a href="class10.php">Class 10 </a></li>
                        <li><a href="class11.php">Class 11 </a></li>
                    </ul>
                </li>
                <?php }
                if ($pages == 'notice_page'){ ?>
                <li   class="active" ><a href="notice.php">Notice </a></li>
                <?php }  else {?>
                <li ><a href="notice.php">Notice </a></li>
                <?php }
                if ($pages == 'contact'){ ?>
                <li class="active" ><a href="contact.php">Contact</a></li>
                <?php }  else {?>
                <li><a href="contact.php">Contact</a></li>
                <?php }
                if ($pages == 'signup'){ ?>
                <li class="active"><a href="signup.php">Registration</a></li>
                <?php }  else {?>
                <li><a href="signup.php">Registration</a></li>
                <?php } ?>
                 <li><a href="admin/index.php">Log In</a></li>
                
                 
                <?php } else { ?>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="result.php">Online Result</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academic Program <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="class8.php">Class 8 </a></li>
                        <li><a href="class9.php">Class 9</a></li>
                        <li><a href="class10.php">Class 10 </a></li>
                        <li><a href="class11.php">Class 11 </a></li>
                    </ul>
                </li>
                <li ><a href="notice.php">Notice </a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="signup.php">Registration</a></li>
                <li><a href="admin/index.php">Log In</a></li>
                <?php } ?>
                
            </ul>
        </div><!--/.nav-collapse -->
    </div>
    <div  style="color: #ffffff; "> <marquee> <?php echo $latest_notice['notice_des']; ?> </marquee></div>
    
</div> 
