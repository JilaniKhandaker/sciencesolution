<br><br><br><br><br><br>
<?php
$query_result=$obj_app->select_all_question_category();
$query_result_question=$obj_app->select_all_question();

?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Question Bank</li>
    </ol>
    
    
   
    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h2 class="page-title">Question Bank</h2>
                <h4 class="page-title"> 
                    <?php while ($qu_info = mysqli_fetch_assoc($query_result)) { ?>
                        <b>   <a href=""> <?php echo $qu_info['question_category_name']; ?> </a> </b>
                       
                        <br/>
                    <?php } ?>
                </h4> 
            </header>

            <?php while ($qu_info_ques = mysqli_fetch_assoc($query_result_question)) { ?>
            <h4> HSC 2015 Board Question </h4> 
            <b> Posted By :</b> <i> <?php echo $qu_info_ques['name']; ?> </i>  <p> Upload Date: <?php echo $qu_info_ques['upload_date']; ?> </p>
            
            <p> <b>  <?php echo $qu_info_ques['question_des']; ?> </b> 
            </p> <br/> <br/>
            <img src="<?php echo $qu_info_ques['resource']; ?>"  
                 height="900" width="500" >
            
            <br/><br/>
            <?php } ?>
            
        
            
        </article>
        <!-- /Article -->

    </div>
</div>