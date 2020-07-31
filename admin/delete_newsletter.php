<?php include("inc/connect.php");
$n_id=$_GET['nID'];
$sql="delete from newsletters where n_id=$n_id";
mysqli_query($conn,$sql);
header("Location:manage_newsletter.php");






?>