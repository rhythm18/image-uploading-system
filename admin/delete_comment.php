<?php include("inc/connect.php");
$id=$_GET['id'];
$sql="delete from comments where cmt_id=$id";
mysqli_query($conn,$sql);
header("Location:manage_comment.php");






?>