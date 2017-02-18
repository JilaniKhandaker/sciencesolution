<br/><br/><br/><br/><br/><br/><br/><br/>
<?php 

$query_result=$obj_app->select_all_gallery_photo();


?>
<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Photo Gallery</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-sm-9 maincontent">
            <header class="page-header">
                <h1 class="page-title">Photo Gallery</h1>
            </header>

            <?php while ($qu_info = mysqli_fetch_assoc($query_result)) { ?>
                           
                            
            <b> <h3> <?php echo $qu_info['photo_title']; ?>  </h3> </b> 
                      <i> <?php echo $qu_info['upload_date']; ?> </i> <br/> 
            <?php echo $qu_info['photo_des']; ?> <br/>
            <img src="<?php echo $qu_info['resource']; ?>"  
                 height="90%" width="90%" >
                       
                        <br/>
                    <?php } ?>
                    
                    
            
            

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
            
            <?php include 'include/advertise.php';?>

        </aside>
        <!-- /Sidebar -->

    </div>
</div>