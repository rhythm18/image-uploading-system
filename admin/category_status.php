<?php 
include ("inc/connect.php");
$cat_id=$_GET['catid'];
$sts=$_GET['sts'];
$sql="update category set cat_status='$sts' where cat_id='$cat_id'";
mysqli_query($conn,$sql);
header("Location:manage_category.php");
?>