<?php include("../admin/inc/connect.php"); include ("inc/security.php");
$id=$_GET['id'];
$sql="delete from users where user_id=$id";
//mysqli_query($conn,$sql);
//header("Location:manage_article.php");
if (mysqli_query($conn,$sql))
    {
      header("Location:manage_user.php");


    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_user.php?std=f&msg=$msg";
        gotopage($url); 
    }

?>