<?php 
include ("inc/connect.php");
$user_id=$_GET['uid'];
$sts=$_GET['sts'];
$sql="update users set status='$sts' where user_id='$user_id'";

if (mysqli_query($conn,$sql))
    {
    	if($sts==1)
    	{
    	  $msg="User Activated !";
	      $url="manage_users.php?st=s&msg=$msg";
	      gotopage($url);
    	}

    	if($sts==0)
    	{
    	  $msg="User De-Activated !";
	      $url="manage_users.php?st=s&msg=$msg";
	      gotopage($url);
    	}
     

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_users.php?st=f&msg=$msg";
        gotopage($url); 
    }
?>