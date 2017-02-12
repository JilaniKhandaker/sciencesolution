<?php

require '../application.php';
        $obj_app = new Application();
        
require './admin.php';
     $obj_admin = new Admin();
  $result = $obj_admin -> select_all_question_category();
        
// cheking Class 
if (isset($_GET['class'])) {
    $count_error = 0;
    if (empty($_GET['class'])) {
        $count_error+=1;
        echo "Class is required";
    } else {
        ?>

        <?php
        
        $class = $_GET['class'];
        $batch_by_class = $obj_app->select_all_batch_info($class);
        ?>

        <div class="top-margin">
            <label>Select Batch  <span class="text-danger">* <a id="batchres" > </a> </span> </label>
            <select class="form-control" name="batch_id" onblur="check_Batch(this.value, 'batchres');" >
                <option> </option>
        <?php while ($batch_info = mysqli_fetch_assoc($batch_by_class)) { ?> 
                    <option value="<?php echo $batch_info['batch_id']; ?>" >

                    <?php echo $batch_info['batch_name']; ?>   </option> 

                    <?php } ?>

            </select>
        </div>
    <?php
    }
}

if(isset($_GET['puser_id'])){
    
    $user_id = $_GET['puser_id'];
//    echo $user_id;
//    echo 'is present';
    
    $obj_app-> insert_present_info($user_id);
}

if(isset($_GET['auser_id'])){
    
    $user_id = $_GET['auser_id'];
    echo $user_id;
    echo 'absent';
}

if(isset($_GET['notice'])){
   $val= $_GET['notice'];
   if($val== 'sn'){ ?>
 
    <form method="post" name="contact" action=""  > 
        <label for="author"> Write Short Notice:</label> <textarea type="text" id="author"  name="notice_des"  class="required input_field" /> </textarea> 
            <div class="cleaner h10"></div>
            <input name="notice_type" value="main" type="hidden" /> 
      
            <input type="submit" value="Publish Notice "  name="btn" class="submit_btn float_r" /> 
     </form>
       

  <?php  } elseif ($val == 'gn') { ?>
      <form method="post" name="contact" action=""  > 
        
          
            <label for="author"> Write Notice Here:</label> <textarea type="text" id="author"  name="notice_des"  class="required input_field" /> </textarea> 
      <div class="cleaner h10"></div>
       <input name="notice_type" value="regular" type="hidden" /> 
            <input type="submit" value="Publish Notice "  name="btn" class="submit_btn float_r" /> 
     </form>
      
   <?php }elseif ($val = 'mn') {
      
     require './admin.php';
     $obj_admin = new Admin();
       $result = $obj_admin -> select_all_notice();  ?>
       
       
<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Notice ID</th>
                        <th>Notice Description</th>
                        <th>Notice Type</th>
                        <th>Published Date </th>
                         
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['notice_id']; ?></td>
                        <td class="center"><?php echo $qu_info['notice_des']; ?></td>
                        <td class="center"><?php echo $qu_info['notice_type']; ?></td>
                        <td class="center"><?php echo $qu_info['date']; ?></td>
                        <td class="center">
                            
                           <a class="btn btn-danger" href="?n_status=delete&notice_id=<?php echo $qu_info['notice_id']; ?>" title=" Delete Notice">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
       
  <?php  }
    
}

if (isset($_GET['history'])){
   
    $history_type = $_GET['history'];
    if( $history_type == 'ph'){
        echo 'Payment History';
    } elseif ($history_type == 'ah') {
        echo 'Attendance History';
}elseif ( $history_type == 'sh') {
    echo 'Students history';
    }
    
}

if (isset($_GET['question'])){
    
    $question= $_GET['question'];
    
    //echo $question;
    if($question == 'add_category'){ ?>
      
          <form method="post" name="contact" action=""  > 
        <label for="author"> <b>Enter Category Name: </b></label>
        <input type="text" id="author"  name="question_category_name"  class="required input_field" /> 
        
        <label for="author"> <b> Enter Category Description ( Like: SSC 2015 Board Question, SSC 2015 Test Question ):</b></label>
        <input type="text" id="author"  name="question_category_des"  class="required input_field" /> 
        <label></label>
        <button type="submit" name="question_category_btn" > Submit </button>
          </form>
        
        <?php
        }
        if ( $question == 'upload_question' ){ ?> 
            
            <form method="post" name="contact" action=""  enctype="multipart/form-data" > 
        <label for="author"> <b>Choose Question Category: </b></label>
        
        <select name="question_category_id">
             <option value=" ">---select question category---</option>
         <?php while ($quc_info = mysqli_fetch_assoc($result)) { ?> 
                   
                    <option value="<?php echo $quc_info['question_category_id']; ?>" >

                    <?php echo $quc_info['question_category_name']; ?>   </option> 
        
                    <?php } ?>
        </select>
        <label for="author"> <b> Exam Short Description ( Subject Name, School Name or Board Name or Exam name ) : </b></label>
        <input type="text" id="author"  name="question_des"  class="required input_field" /> 
        
        <label> <b> Upload Your File: </b></label>
                <input type="file" name="resource" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">

        <label></label>
        <button type="submit" name="upload_question_btn" > Submit </button>
          </form>
        
            
            
       <?php }
        if ( $question == 'manage_question' ){
            echo 'Manage';
        }
      
        
}
if(isset($_GET['article_req'])){
    
    $article_req = $_GET['article_req'];
   // echo $article_req;
    
    $all_article_category = $obj_admin->all_article_category();
    if($article_req = 'write_article'){ ?> 
        <form method="post" name="contact" action=""  > 
        <label for="author"> <b>Select Category Name: </b></label>
        <div class="top-margin">
                   
                    <select class="form-control" name="article_category_id"  >
                        <option value="">--Select Category-- </option>
                        <?php while ($article_cate = mysqli_fetch_assoc($all_article_category)) { ?>
                            <option value="<?php echo $article_cate['article_category_id']; ?>"><?php echo $article_cate['article_category_name']; ?></option>
                        <?php } ?>

                    </select>
                </div>
        
         <label for="author"> <b> Article's Title:</b></label>
        <input type="text" id=""  name="article_title"  class="required input_field" /> 
        <label for="author"> <b> Article's Short Description:</b></label>
        <textarea type="text" id="author"  name="article_short_des"  class="required input_field" ></textarea> 
        
        <label for="author"> <b> Article's Long Description:</b></label>
        <textarea type="text" id="author"  name="article_long_des"  class="required input_field" ></textarea> 
        <label for="author"> <b> Shared Link:</b></label>
        <input type="text" id="author"  name="resource"  class="required input_field" />
        
        <label></label>
        <button type="submit" name="add_article_btn" > Submit </button>
          </form>
       
              <?php    
    }
}


?>