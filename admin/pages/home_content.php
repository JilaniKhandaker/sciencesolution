<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="../index.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">My Profile</a></li>
</ul>

<?php
//echo $_SESSION['user_type'];
//echo $_SESSION['user_name'];
   
  $user_id = $_SESSION['user_id'];
echo $user_id;
$query_res = $obj_app->search_user_by_id($user_id);
$search_info_by_id = mysqli_fetch_assoc($query_res);
//print_r($search_info_by_id);
?>

<br/>
<br/>
<br/>


<table class="table table-striped table-bordered bootstrap-datatable datatable" width='400' border='1' >


    <tr>
        <td > <h5>Name</h5></td> <td class="center"> <h6><?php echo $search_info_by_id['name']; ?></h6></td> </tr>
    
    <tr> <td><h5>Address</h5></td><td class="center"><h6><?php echo $search_info_by_id['address']; ?></h6></td></tr>  
   
    <tr> <td><h5>Phone No.</h5></td><td class="center"><h6><?php echo $search_info_by_id['phone_number']; ?> </h6></tr>
    
    
    <tr> <td><h5> <img src="../<?php echo $search_info_by_id['user_image']; ?>" width="100" height="100"> </h5></td></tr>



</table>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
