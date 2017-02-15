<br/><br/><br/><br/><br/><br/><br/><br/>
<?php 
$user_id = $_SESSION['user_id'];
echo $user_id;
$query_res = $obj_app->search_user_by_id($user_id);
$search_info_by_id = mysqli_fetch_assoc($query_res);

?>
<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Student Information</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-sm-9 maincontent">
            <header class="page-header">
                 <h5> <img src="<?php echo $search_info_by_id['user_image']; ?>" width="100" height="100">  I'm <?php echo $search_info_by_id['name']; ?></h5>
            </header>
<table class="table table-striped table-bordered bootstrap-datatable datatable" width='400' border='1' >


    <tr>
        <td > <h5>Name</h5></td> <td class="center"> <h6><?php echo $search_info_by_id['name']; ?></h6></td> </tr>
    
    <tr> <td><h5>Address</h5></td><td class="center"><h6><?php echo $search_info_by_id['address']; ?></h6></td></tr>
    <tr> <td><h5>Class</h5></td><td class="center"><h6><?php echo $search_info_by_id['address']; ?></h6></td></tr>
    <tr> <td><h5>Batch Name</h5></td><td class="center"><h6><?php echo $search_info_by_id['address']; ?></h6></td></tr>
   
    <tr> <td><h5>Phone No.</h5></td><td class="center"><h6><?php echo $search_info_by_id['phone_number']; ?> </h6></tr>
    <tr> <td><h5>Attendances</h5></td><td class="center"><h6>value of attendaces </h6></tr>
    
    
    
    



</table>
            
            
            
            

        </article>
        <!-- /Article -->

        <!-- Sidebar -->
        <aside class="col-sm-3 sidebar sidebar-right">

            <div class="widget">
                <b><h3 style="color:red; ">Suggestion For You: </h3></b>
                <p>Physics: </p>
               <p>Chemistry: </p>
                <p>Math: </p>
            </div>

        </aside>
        <!-- /Sidebar -->

    </div>
</div>