<?php include("inc/connect.php");
$id=$_GET['catid'];
$sql="delete from category where cat_id=$id";
mysqli_query($conn,$sql);
header("Location:manage_category.php");






?>