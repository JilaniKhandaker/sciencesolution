<br><br><br><br><br><br>
<?php
$query_result=$obj_app->select_all_question_category();

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

            
            
            <h4> HSC 2015 Board Question </h4> 
            <b> Posted By :</b> <i> jilnai khandaker</i>  <p>Date: 20:8:2016 </p>
            
            <p> <b> Subject Name: physics 1st paper </b> 
            </p> <br/> <br/>
            <img src="assets/images/questions/physics-1st-paper-question-2015-dhaka-board.png"  
                 height="900" width="500" >
            
            <br/><br/>
            
            <br/> <br/>
            <img src="assets/images/questions/physics-1st-paper-question-2015-dinajpur-board.png"  
                 height="900" width="500" >
            
            <br/><br/>
            
            
            
            
            

        </article>
        <!-- /Article -->

    </div>
</div>