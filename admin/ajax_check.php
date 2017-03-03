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
        $class = $_GET['class'];
        $batch_by_class = $obj_app->select_all_batch_info($class);
        ?>

        <div class="top-margin">
            <label>Select Batch  <span class="text-danger">*  </span> </label>
            <select class="form-control" name="batch_id" onblur="check_Batch(this.value, 'batchres');" >
                <option value="">--Select Batch--</option>
        <?php while ($batch_info = mysqli_fetch_assoc($batch_by_class)) { ?> 
                    <option value="<?php echo $batch_info['batch_id']; ?>" >

                Batch Name:    <?php echo $batch_info['batch_name']; ?>
                    -> Group: <?php echo $batch_info['group']; ?>   </option> 

                    <?php } ?>

            </select>
        </div>
<div id="batchres" > </div>
    <?php
    }
}
if(isset($_GET['batch'])){
    if (empty($_GET['batch'])) {
        
        echo "Batch is required";
    } else {
        $batch_id = $_GET['batch'];
        //echo $batch_id;
        $student_by_batch_id = $obj_admin->select_all_roll_by_batch_id($batch_id);
        //print_r($student_by_batch_id);?>


      <div class="top-margin">
            <label>Select Roll  <span class="text-danger">*  </span> </label>
            <select class="form-control" name="pass_roll" onblur="check_Batch(this.value, 'rollres');" >
                <option value="">--Select Roll--</option>
        <?php while ($batch_info = mysqli_fetch_assoc($student_by_batch_id)) { ?> 
                    <option value="<?php echo $batch_info['pass_roll']; ?>" >

                 <?php echo $batch_info['pass_roll']; ?>
                     </option> 

                    <?php } ?>

            </select>
        </div>
<div id="cres" > </div>
<?php    }
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
                            <a class="btn btn-success" href="?n_status=edit&notice_id=<?php echo $qu_info['notice_id']; ?>" title=" Edit Notice">
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
             <option value="">---select question category---</option>
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
           $query_result_question= $obj_admin->select_all_question();
            
            ?>
            
            <div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Question..</h2>
           
        </div>
        <div class="box-content">
            
            <h4>
                <?php
                    if(isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
            </h4>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Question Category</th>
                        <th>Subject Name</th>
                        <th>Upload date</th>
                         <th>Uploaded By</th>
                         <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($query_result_question)) { ?>
                    <tr>
                        <td><?php echo $qu_info['question_category_name']; ?></td>
                        <td class="center"><?php echo $qu_info['question_des']; ?></td>
                         <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                        <td class="center"><?php echo $qu_info['name']; ?></td>
                         <td class="center">
                            
                            
                            <a class="btn btn-danger" href="?question_status=delete&question_id=<?php echo $qu_info['question_id']; ?>" title=" Delete Question ">
                                <i class="halflings-icon white danger"></i>  
                            </a>
                            
                            
                            
                           
                            
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>
            
            
            
       <?php }
      
        
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


if (isset($_GET['photo'])){
    
    $photo= $_GET['photo'];
    
    if ( $photo == 'upload_photo' ){ ?> 
            
            <form method="post" name="contact" action=""  enctype="multipart/form-data" > 
        
        <label for="author"> <b> Image Tile : </b></label>
        <input type="text" id="author"  name="photo_title"  class="required input_field" /> 
         <label for="author"> <b> Image Description : </b></label>
        <input type="text" id="author"  name="photo_des"  class="required input_field" /> 
        
        <label> <b> Upload Your Photo: </b></label>
                <input type="file" name="resource" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">

        <label></label>
        <button type="submit" name="upload_photo_btn" > Submit </button>
          </form>
        
            
            
       <?php }
        if ( $photo == 'manage_photo' ){
            $result = $obj_app->select_all_gallery_photo();
            ?>
           <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Photo Title</th>
                        <th> Photo Description</th>
                        <th>Uploaded Date </th>
                    <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $qu_info['photo_title']; ?></td>

                            <td class="center"><?php echo $qu_info['photo_des']; ?></td>
                            <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                            <td class="center"><img src="../<?php echo $qu_info['resource']; ?>"  height="42" width="42" /></td>
                           
                            <td class="center">

                                <a class="btn btn-danger" href="?photo_status=delete&photo_id=<?php echo $qu_info['photo_id']; ?>" title=" Delete Photo">
                                    <i class="halflings-icon white box-icon"></i>  
                                </a>
                                <a class="btn btn-success" href="?photo_status=edit&photo_id=<?php echo $qu_info['photo_id']; ?>" title=" Edit Photo">
                                    <i class="halflings-icon white box-icon"></i>  
                                </a>
                               
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
       <?php }
        
}

if (isset($_GET['advertise'])){
    
    $photo= $_GET['advertise'];
    
    if ( $photo == 'upload_advertise' ){ ?> 
            
            <form method="post" name="contact" action=""  enctype="multipart/form-data" > 
        
        <label for="author"> <b> Advertise Tile : </b></label>
        <input type="text" id="author"  name="adv_heading"  class="required input_field" /> 
         <label for="author"> <b> Advertise Description : </b></label>
         <textarea type="text" id="author"  name="adv_desc"  class="required input_field" > 
         </textarea>
        <br/>
        <button type="submit" name="upload_advertise_btn" > Submit </button>
          </form>
        
            
            
       <?php }
        if ( $photo == 'manage_advertise' ){
            
            $result = $obj_admin->select_all_advertise();
            ?>


    
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Advertise heading</th>
                        <th> Advertise Description</th>
                        <th>Uploaded By</th>
                        <th>Uploaded Date </th>

                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $qu_info['adv_heading']; ?></td>

                            <td class="center"><?php echo $qu_info['adv_desc']; ?></td>
                            <td class="center"><?php echo $qu_info['name']; ?></td>
                            <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                            <td class="center">

                                <a class="btn btn-danger" href="?adv_status=delete&adv_id=<?php echo $qu_info['adv_id']; ?>" title=" Delete Advertise">
                                    <i class="halflings-icon white box-icon"></i>  
                                </a>
                                <a class="btn btn-success" href="?adv_status=edit&adv_id=<?php echo $qu_info['adv_id']; ?>" title=" Edit dvertise">
                                    <i class="halflings-icon white box-icon"></i>  
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 

           
        <?php }
        
}

if(isset($_GET['suggestion'])){
   $val= $_GET['suggestion'];
   if($val== 'upload_suggestion'){ ?>
 
    <form method="post" name="contact" action=""  > 
        <select name="class">
             <option value=" ">---Select Class---</option>
        <option value="8" > Eight </option>  
        <option value="9" > Nine </option>  
        <option value="10" > Ten </option>  
        </select>
        <select name="group_name">
             <option value=" ">---Select Group---</option>
        <option value="none" > None </option>  
        <option value="science" > Science </option>  
        <option value="commerce" > Commerce </option> 
        <option value="arts" > Arts </option> 
        </select>
        <select name="subject_name">
             <option value=" ">---Select Subject---</option>
        <option value="physics" > Physics  </option> 
        <option value="chemistry" > Chemistry  </option>
        <option value="general_math" > General Math  </option>
        <option value="higher_math" > Higher Math  </option>
        <option value="biology" > Biology </option>  
        <option value="general_science" > General Science  </option>  
        </select>
        
        <label for="author"> Write Suggestion:</label> <textarea type="text" id="author"  name="suggestion"  class="required input_field" /> </textarea> 
            <div class="cleaner h10"></div>
            
      
            <input type="submit"  name="btn" class="submit_btn float_r" /> 
     </form>
       

  <?php  }elseif ($val = 'manage_suggestion') {
      
     //require './admin.php';
     $obj_admin = new Admin();
       $result = $obj_admin -> select_all_suggesstion();  ?>
       
       
<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Suggestion ID</th>
                        <th>Uploaded BY</th>
                        <th>Upload Date</th>
                        <th>class</th>
                        <th>Group</th>
                        <th>Subject Names</th>
                        <th>Suggestion</th>
                         
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info=  mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $qu_info['suggestion_id']; ?></td>
                        <td class="center"><?php echo $qu_info['user_id']; ?></td>
                        <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                        <td class="center"><?php echo $qu_info['class']; ?></td>
                        <td class="center"><?php echo $qu_info['group_name']; ?></td>
                        <td class="center"><?php echo $qu_info['subject_name']; ?></td>
                        <td class="center"><?php echo $qu_info['suggestion']; ?></td>
                        <td class="center">
                            
                           <a class="btn btn-danger" href="?n_status=delete&notice_id=<?php echo $qu_info['notice_id']; ?>" title=" Delete Suggection">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>
                            <a class="btn btn-success" href="?n_status=delete&notice_id=<?php echo $qu_info['notice_id']; ?>" title="Publish Suggestion">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>
                            <a class="btn btn-success" href="?n_status=delete&notice_id=<?php echo $qu_info['notice_id']; ?>" title=" Edit Suggestion">
                                <i class="halflings-icon white box-icon"></i>  
                            </a>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
       
  <?php  }
    
}










?>