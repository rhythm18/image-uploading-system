<?php session_start();
if(!isset($_SESSION['adminID']) || $_SESSION['adminID']=="")
{
	header("Location:index.php");
}
?>