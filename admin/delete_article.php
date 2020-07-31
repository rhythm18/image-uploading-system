<?php include("inc/connect.php");
$id=$_GET['id'];
$sql="delete from articles where art_id=$id";
mysqli_query($conn,$sql);
header("Location:manage_article.php");

?>