<br><br><br><br><br><br>
<script>
 function comment_user(given_text, obj_id) {
        xmlhttp=new XMLHttpRequest();
        server_page='check.php?comment_user='+given_text;
        xmlhttp.open('GET',server_page);
        xmlhttp.onreadystatechange = function () 
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj_id).innerHTML=xmlhttp.responseText;
            } 
        }
        xmlhttp.send(null);
    }

</script>
<?php 

$query_result=$obj_app->select_all_article();

if(isset($_SESSION['user_id'] )){
    if(isset($_GET['like_status'])){
        if ($_GET['like_status'] == 'like') {
         $obj_app->add_article_like($_GET);
           
    } else if ($_GET['like_status'] == 'dislike') {
        
       $obj_app->add_article_dislike($_GET);
    }
    }
    
}

else {
 
}

if(isset($_POST['btn_comment'])){
   //echo 'Hoiseeeeeeeeeeeeeeeeeeeeeeeeeee';
   //print_r($_POST);
   
    $obj_app->add_article_comment($_POST);
    $obj_app->number_article_comments($_POST);
}
?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Articles</li>
    </ol>
    
    
   
    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent" >
            <header class="page-header">

                <h1 class="page-title">Articles</h1>
                <h3 class="page-title"> <b>Categories:  <a href=""> History,</a>
                        <a href=""> Microelectronics,</a><a href=""> Physics,</a>
                        <a href=""> Math</a>                </b>
                </h3> 
            </header>
            
            <div style="width: 65%">
                 <?php while ($qu_info = mysqli_fetch_assoc($query_result)) { ?>
            <h4> <?php echo $qu_info['article_title']; ?></h4> <b>By :</b> <i> <?php echo $qu_info['name']; ?></i> Date: 20:8:2016 
            
            <p><?php echo $qu_info['article_short_des']; ?>
          <a>...See more</a>
            </p> 
            
            
          
            <?php echo $qu_info['resource']; ?>
            
            
            
            <br/> 
            <a class="btn btn-success" 
               href="?like_status=like&article_id=<?php echo $qu_info['article_id']; ?>" title=" Like">
                    <i class="halflings-icon white box-icon"></i> Like 
                </a>
            
            <b>120</b> 
            <a class="btn btn-danger"
               href="?like_status=dislike&article_id=<?php echo $qu_info['article_id']; ?>" title=" Dislike ">
                    <i class="halflings-icon white danger"></i> Dislike  
                </a>

            <b>71</b> 
           <button class="btn btn-action"
                title=" Comment "  value="<?php echo $qu_info['article_id']; ?>" 
                onclick="comment_user(this.value, 'comment');">
                    <i class="halflings-icon white danger"
                       ></i> Comment  
           </button>
             
            <b> <?php 
            $article_id = $qu_info['article_id'];
            //echo $article_id;
           $query_result_sc= $obj_app->tolal_article_comment($article_id);
          $qu_res = mysqli_fetch_assoc($query_result_sc);
          
          
          echo $qu_res['total_comment'];
           ?>
            </b> <br/><br/>
            <a id="comment" > jilani commnet </a>
            
                
                
                
                
            <form method="post" name="contact" action="" >
                
                <div class="top-margin">
                    <input type="hidden" class="form-control" name="article_id" value="<?php echo $qu_info['article_id']; ?>" >
                    </div>
                
                
            <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2" > Put your comment here:</label>
                
            </div>
                <div class="controls">
                    <textarea name="comment" class="cleditor" id="textarea2" rows="2"></textarea>
                      <button class="btn btn-action"  name="btn_comment" type="submit">Submit</button>
                </div>
            </form>
            <br/>
            <?php } ?>
            </div>
           
        </article>
        <!-- /Article -->

    </div>
</div>