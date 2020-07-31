<?php 
include ("inc/connect.php");
$cmt_id=$_GET['cmtid'];
$sts=$_GET['sts'];
$sql="update comments set cmt_status='$sts' where cmt_id='$cmt_id'";
mysqli_query($conn,$sql);
header("Location:manage_comment.php");
?>