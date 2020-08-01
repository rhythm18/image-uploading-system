<?php 
include ("inc/connect.php");
$doc_id=$_GET['docid'];
$sts=$_GET['sts'];
$sql="update documents set status='$sts' where doc_id='$doc_id'";
mysqli_query($conn,$sql);


	
header("Location:manage_doc.php");
?>