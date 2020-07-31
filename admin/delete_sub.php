<?php include("inc/connect.php");
$id=$_GET['id'];
$sql="delete from subscribers where sid=$id";
mysqli_query($conn,$sql);
header("Location:manage_sub.php");






?>