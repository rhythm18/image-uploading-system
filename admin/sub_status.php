 <?php 
include ("inc/connect.php");
$sid=$_GET['sid'];
$sts=$_GET['sts'];
$sql="update subscribers set status='$sts' where sid='$sid'";
mysqli_query($conn,$sql);

$sql="select email from subscribers where sid=".$sid;
$email=ReturnAnyValue($conn,$sql);

$sql="update users set sub_status='$sts' where email='$email'";
mysqli_query($conn,$sql);


header("Location:manage_sub.php");
?>