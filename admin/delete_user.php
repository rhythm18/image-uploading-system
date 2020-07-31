<?php include("inc/connect.php");
$id=$_GET['id'];
$sql="delete from users where user_id=$id";
//mysqli_query($conn,$sql);
//header("Location:manage_users.php");


if (mysqli_query($conn,$sql))
    {
    	
    	  $msg="User Deleted Successfully !";
	      $url="manage_users.php?stu=s&msg=$msg";
	      gotopage($url);
    }

else
    { 
        $msg="There was a problem ";
        $url="manage_users.php?stu=f&msg=$msg";
        gotopage($url); 
    }



?>