<br/><br/><br/><br/><br/><br/><br/><br/>
<?php 

$query_result=$obj_app->select_all_question_category();
$query_result_question=$obj_app->select_all_question();
if (isset($_GET['question_category_id'])) {
   //print_r($_GET);
    $question_category_id= $_GET['question_category_id'];
   $question_by_category= $obj_app->select_all_question_by_category($question_category_id);
    
    
}

?>
<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Question Bank</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-sm-9 maincontent">
            <header class="page-header">
                <h1 class="page-title">Question Bank</h1>
            </header>

            <?php while ($qu_info = mysqli_fetch_assoc($query_result)) { ?>
                        <b>   <a href="?question_category_id=<?php echo $qu_info['question_category_id']; ?>" >
                        <?php echo $qu_info['question_category_name']; ?> </a> </b>
                       
                        <br/>
                    <?php }
                    
                    if(isset($question_by_category)){
                        
                        while ($qu_info_ques = mysqli_fetch_assoc($question_by_category)) { ?>
            <h4><?php echo $qu_info_ques['question_category_name']; ?> </h4> 
            <b> Posted By :</b> <i> <?php echo $qu_info_ques['name']; ?> </i>  <p> Upload Date: <?php echo $qu_info_ques['upload_date']; ?> </p>
            
            <p> <b>  <?php echo $qu_info_ques['question_des']; ?> </b> 
            </p> <br/> <br/>
            <img src="<?php echo $qu_info_ques['resource']; ?>"  
                 height="900" width="500" >
            
            <br/><br/>
                    <?php }
                    }
                    else {
                    while ($qu_info_ques = mysqli_fetch_assoc($query_result_question)) { ?>
            <h4> <?php echo $qu_info_ques['question_category_name']; ?> </h4> 
            <b> Posted By :</b> <i> <?php echo $qu_info_ques['name']; ?> </i>  <p> Upload Date: <?php echo $qu_info_ques['upload_date']; ?> </p>
            
            <p> <b>  <?php echo $qu_info_ques['question_des']; ?> </b> 
            </p> <br/> <br/>
            <img src="<?php echo $qu_info_ques['resource']; ?>"  
                 height="900" width="500" >
            
            <br/><br/>
                    <?php }} ?>
            
            

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
            
            <div  style="background-color: yellow; width: 100%; float: left;">
                <marquee> <h3> Training is Going on  </h3></marquee>
                <p> description about training. description about
                    training description about training 
                    description about training </p>
                <a href="http://localhost/ScienceSolution/contact.php"> For details.please contact with me..</a>
                
            </div>

        </aside>
        <!-- /Sidebar -->

    </div>
</div>