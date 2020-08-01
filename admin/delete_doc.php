<?php include("../admin/inc/connect.php"); include ("inc/security.php");
$id=$_GET['id'];
$sql="delete from documents where doc_id=$id";
//mysqli_query($conn,$sql);
//header("Location:manage_article.php");
if (mysqli_query($conn,$sql))
    {
      $msg="Document Deleted Successfully";
      $url="manage_doc.php?std=s&msg=$msg";
      gotopage($url);

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_doc.php?std=f&msg=$msg";
        gotopage($url); 
    }

?>