<?php

$servername="localhost";
$username="root";
$password="mysql";
$dbname="singleleg";

$domain="http://dhanyog.in/";
$domainName="dhanyog.in";

$conn=mysqli_connect($servername,$username,$password,$dbname);


if(!$conn)
{
	die("connection failed".mysqli_error($conn));

}


function gotopage($url)
{
	echo "<script language=\"javascript\">";
	echo "window.location = '".$url."'; \n";
	echo "</script>";
}


function ReturnAnyValue($con,$Ssql){
	//firequery($Ssql);
	$TempRst = mysqli_query($con,$Ssql);
	$EOF = @mysqli_num_rows($TempRst);
	if ($EOF != 0){
		$TempRow = mysqli_fetch_row($TempRst);
		$Retun = $TempRow[0];
	}else{
		$Retun = "";
	}
	return $Retun;
}



function GetUserId($con,$mID)
{
	//firequery($Ssql);
	$sql="select user_id from users where member_id=".$mID;
	$TempRst = mysqli_query($con,$sql);
	$EOF = @mysqli_num_rows($TempRst);
	if ($EOF != 0){
		$TempRow = mysqli_fetch_row($TempRst);
		$Retun = $TempRow[0];
	}else{
		$Retun = "";
	}
	return $Retun;
}

function dispMessage($msg,$url)
{
	echo "<script language=\"javascript\">";
	echo "alert('".$msg."'); \n";
	echo "window.location = '".$url."'; \n";
	echo "</script>";
}

function sponsorTeamCnt($conn,$id)
{
	static $cnt=0;

$sql="select user_id from users where pay_status=1 and sponsor_id=".$id;
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($rs))
	{
		//echo "<br>".$row['user_id'];
		sponsorTeamCnt($conn,$row['user_id']);
		$cnt++;
	}
	return $cnt;
}
?>