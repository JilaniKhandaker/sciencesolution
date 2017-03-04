<?php
ob_start();
session_start();

require './admin.php';
$obj_admin = new Admin();

require '../application.php';
$obj_app = new Application();


$user_id = $_SESSION['user_id'];
if ($user_id == NULL) {
    header('Location: index.php');
}
if (isset($_GET['status'])) {
    $obj_admin->admin_logout();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>MaSa</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Dennis Ji">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>      
        <link rel="shortcut icon" href="img/favicon.ico">       
        <script>
            function check_delete() {
                $check = confirm('Are you sure to delete this !');
                if ($check) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>


    </head>

    <body>
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="../index.php"><span>Science Solution</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                            
                           
                            
                            
                            
                            
                            <!-- start: User Dropdown -->
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i>
                                    <?php echo $_SESSION['name']; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Account Settings</span>
                                    </li>
                                    <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                                    <li><a href="?status=logout"><i class="halflings-icon off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">

                            <li><a href="admin_master.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> My Profile</span></a></li>	
                            <li><a href="edit_profile.php"><i class="icon-font"></i><span class="hidden-tablet"> Edit Profile</span></a></li>
                            <li><a href="change_password.php"><i class="icon-font"></i><span class="hidden-tablet"> Change Password</span></a></li>
                            <?php if ($_SESSION['user_type'] == 'tearcher') { ?>


                                <li><a href="add_details_info.php"><i class="icon-edit"></i><span class="hidden-tablet"> Add Details Info</span></a></li>
                                <li><a href="add_new_chamber.php"><i class="icon-edit"></i><span class="hidden-tablet"> Add New Chamber </span></a></li>
                                <li><a href="mymessage.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Messages</span></a></li>

                                <li><a href="manage_appointment.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Appointment</span></a></li>



                            <?php } else if ($_SESSION['user_type'] == 'admin') { ?>
                                <li><a href="article.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Article</span></a></li>
                                <li><a href="manage_student.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Student</span></a></li>
                                <li><a href="question_bank.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Question Bank</span></a></li>
                                
                                <li><a href="batch.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Batch </span></a></li>
                                 <li><a href="add_batch.php"><i class="icon-edit"></i><span class="hidden-tablet"> Add Batch</span></a></li>
                                 <li><a href="advertise.php"><i class="icon-edit"></i><span class="hidden-tablet"> Advertisement </span></a></li>
                               
                                 <li><a href="attendance.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Attendance </span></a></li>
                                 <li><a href="payment.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Payment</span></a></li>
                                 <li><a href="photogallery.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Gallery Photo</span></a></li>
                                 <li><a href="suggestion.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Suggestion</span></a></li>
                                 
                                 <li><a href="upload_lecture.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Upload Lectures</span></a></li>
                            

                                <li><a href="contact_msg.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Contact Message</span></a></li>
                                <li><a href="contact_info.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Edit Contact Info</span></a></li>
                                <li><a href="notice.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Notice </span></a></li>
                                <li><a href="history.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Manage History</span></a></li>
                                
                                
                            <?php } else { ?>


                            <?php } ?>

                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                <!-- start: Content -->
                <div id="content" class="span10">
                    <?php
                    if (isset($pages)) {
                        if ($pages == 'add_course') {
                            include './pages/add_course_content.php';
                        } else if ($pages == 'add_batch') {
                            include './pages/add_batch_content.php';
                        } else if ($pages == 'batch') {
                            include './pages/batch_page_content.php';
                        } else if ($pages == 'attendance') {
                            include './pages/attendance_content.php';
                        } else if ($pages == 'payment') {
                            include './pages/payment_content.php';
                        } else if ($pages == 'edit_profile') {
                            include './pages/edit_profile_content.php';
                        } else if ($pages == 'change_password') {
                            include './pages/change_password_content.php';
                        } else if ($pages == 'manage_student') {
                            include './pages/manage_student_content.php';
                        } else if ($pages == 'manage_doctor') {
                            include './pages/manage_doctor_content.php';
                        } else if ($pages == 'contact_msg') {
                            include './pages/contact_msg_content.php';
                        } else if ($pages == 'notice') {
                            include './pages/notice_content.php';
                        } else if ($pages == 'contact_info') {
                            include './pages/contact_info_content.php';
                        }
                        else if ($pages == 'contact_msg') {
                        include './pages/contact_msg_content.php';
                        }
                        else if ($pages == 'history') {
                        include './pages/history_content.php';
                        }
                        else if ($pages == 'question_bank') {
                        include './pages/question_bank_content.php';
                        }
                        else if ($pages == 'upload_lecture') {
                        include './pages/upload_lecture_content.php';
                        }
                        else if ($pages == 'article') {
                        include './pages/article_content.php';
                        }
                        else if ($pages == 'photo') {
                        include './pages/photo_gallery_content.php';
                        }
                        else if ($pages == 'advertise') {
                        include './pages/advertise_content.php';
                        }
                        else if ($pages == 'suggestion') {
                        include './pages/suggestion_content.php';
                        }
                        else if ($pages == 'approve_student') {
                        include './pages/approve_student_content.php';
                        }
                        else if ($pages == 'suggestion_show') {
                        include './pages/suggestion_show_content.php';
                        }
                    } else {
                        include './pages/home_content.php';
                    }
                    ?>
                    <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                    <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                    <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                    <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                    <br/> <br/> <br/> 
                    
                </div><!--/.fluid-container-->

                <!-- end: Content -->
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>

        <div class="clearfix">
            
            
        </div>

        <footer>

            <p>
                <span style="text-align:left;float:left" >&copy; 2017<a>MaSa </a></span>

            </p>

        </footer>

        <!-- start: JavaScript-->

        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery-migrate-1.0.0.min.js"></script>

        <script src="js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="js/jquery.ui.touch-punch.js"></script>

        <script src="js/modernizr.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script src="js/jquery.cookie.js"></script>

        <script src='js/fullcalendar.min.js'></script>

        <script src='js/jquery.dataTables.min.js'></script>

        <script src="js/excanvas.js"></script>
        <script src="js/jquery.flot.js"></script>
        <script src="js/jquery.flot.pie.js"></script>
        <script src="js/jquery.flot.stack.js"></script>
        <script src="js/jquery.flot.resize.min.js"></script>

        <script src="js/jquery.chosen.min.js"></script>

        <script src="js/jquery.uniform.min.js"></script>

        <script src="js/jquery.cleditor.min.js"></script>

        <script src="js/jquery.noty.js"></script>

        <script src="js/jquery.elfinder.min.js"></script>

        <script src="js/jquery.raty.min.js"></script>

        <script src="js/jquery.iphone.toggle.js"></script>

        <script src="js/jquery.uploadify-3.1.min.js"></script>

        <script src="js/jquery.gritter.min.js"></script>

        <script src="js/jquery.imagesloaded.js"></script>

        <script src="js/jquery.masonry.min.js"></script>

        <script src="js/jquery.knob.modified.js"></script>

        <script src="js/jquery.sparkline.min.js"></script>

        <script src="js/counter.js"></script>

        <script src="js/retina.js"></script>

        <script src="js/custom.js"></script>
        <!-- end: JavaScript-->

    </body>
</html>
