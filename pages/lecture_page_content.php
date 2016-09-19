<br><br><br><br><br><br>

<?php 
$query_result=$obj_app->select_all_lecture();
?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Lectures</li>
    </ol>
    
    
   
    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Lectures</h1>
            </header>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th> Serial No. </th>
                        <th> Lecture Title </th>
                        <th>Upload Time </th>
                        <th>Download</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($qu_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td><?php echo $qu_info['lecture_id']; ?></td>
                            <td><?php echo $qu_info['lecture_title']; ?></td>
                            <td class="center"><?php echo $qu_info['upload_date']; ?></td>
                            <td class="center">  <a href="ScienceSolution/<?php echo $qu_info['slide_name']; ?>" >  Download Here </a> </td>
                            
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            
            
            
            
            

        </article>
        <!-- /Article -->

    </div>
</div>