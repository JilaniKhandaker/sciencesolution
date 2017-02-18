<?php 
$query_res = $obj_app -> get_advertise();

?>
<?php while ($qu_info=  mysqli_fetch_assoc($query_res)) { ?>
<div  style="background-color: yellow; width: 100%; float: left;">
    <marquee> <h3> <?php echo $qu_info['adv_heading']; ?>  </h3></marquee>
    <p> <?php echo $qu_info['adv_desc']; ?> </p>
    <p>Uploaded Date: <i> <?php echo $qu_info['upload_date']; ?> </i></p>
    <a href="http://localhost/ScienceSolution/contact.php"> For details.please contact with me..</a>
    <br/> <br/>  <hr> 
</div>


<?php } ?> 