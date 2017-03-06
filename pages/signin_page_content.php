<br/><br/><br/><br/><br/><br/>
<?php 
if (isset($_POST['btn'])) {    
    $obj_app->login_check($_POST);
   //echo 'jilani';
  //print_r($_POST);
}
?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">User access</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Sign in</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Sign in to your account</h3>
                        <hr>

                        <form action="" method="post">
                            
                            <div class="top-margin">
                                <label> Give Your Password </label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-8">
                                    <b><a href="">Forgot password?</a></b>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-action" type="submit" name="btn">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </article>
        <!-- /Article -->

    </div> </div>
