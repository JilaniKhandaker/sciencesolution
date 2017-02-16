<?php
ob_start();
session_start();

require 'application.php';
$obj_app = new Application();

if (isset($_GET['status_logout'])) {
    $obj_app->user_logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>MaSa</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php include './include/menu.php'; ?>
	<!-- /.navbar -->

	


        <?php
        if(isset($pages)){
        if ($pages == 'contact') {
                        include './pages/contact_page_content.php';
                    } else if ($pages == 'signin') {
                        include './pages/signin_page_content.php';
                    } else if ($pages == 'signup') {
                        include './pages/signup_page_content.php';
                    } else if ($pages == 'contact_page') {
                        include './pages/contact_page_content.php';
                    }
                    else if ($pages == 'result_page') {
                        include './pages/result_page_content.php';
                    }
                    else if ($pages == 'notice_page') {
                        include './pages/notice_page_content.php';
                    }
                    else if ($pages == 'class8') {
                        include './pages/class8_page_content.php';
                    }
                    else if ($pages == 'class9') {
                        include './pages/class9_page_content.php';
                    }
                    else if ($pages == 'class10') {
                        include './pages/class10_page_content.php';
                    }
                    else if ($pages == 'class11') {
                        include './pages/class11_page_content.php';
                    }
                    else if ($pages == 'check') {
                        include './pages/check_page_content.php';
                    }
                    else if ($pages == 'article') {
                        include './pages/article_page_content.php';
                    }
                    else if ($pages == 'lecture') {
                        include './pages/lecture_page_content.php';
                    }else if ($pages == 'question_bank') {
                        include './pages/question_bank_page_content.php';
                    }
                    else if ($pages == 'student_info') {
                        include './pages/student_info_page_content.php';
                    }
                    else if ($pages == 'photo_gallery') {
                        include './pages/photo_gallery_page_content.php';
                    }
                    
                    
                    
        
        }
        
        else {
            include './pages/home_page_content.php';
        }
        ?>


	<?php include './include/footer.php'; ?>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>