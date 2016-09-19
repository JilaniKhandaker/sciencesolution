<br><br><br><br><br><br>

<?php 

$query_result=$obj_app->select_all_notice();


?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Notice</li>
    </ol>
    
    
   
    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h3 class="page-title">Notice Board</h3>
            </header>

        
            <table border="2" width="60%" >
                <tr> <td> Notice ID</td> <td> Notice Description </td> <td> Upload Date</td>  </tr>
                 <?php while ($qu_info=  mysqli_fetch_assoc($query_result)) { ?>
               
                <tr> <td> <?php echo $qu_info['notice_id']; ?></td>
                    <td> <?php echo $qu_info['notice_des']; ?> </td>
                    <td> <?php echo $qu_info['date']; ?></td>
                </tr>
                 <?php } ?>
            </table>
            

        </article>
        <!-- /Article -->

    </div>
</div>