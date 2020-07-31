<?php 
include ("inc/connect.php");
$art_id=$_GET['artid'];
$sts=$_GET['sts'];
$sql="update articles set status='$sts' where art_id='$art_id'";
mysqli_query($conn,$sql);


	if($sts==1)
	{
		$sql="select user_id from articles where art_id=".$art_id;
		$userID=ReturnAnyValue($conn,$sql);
		
		

		$sql="select count(*) from user_points where pt_type='2' and user_id=".$userID." and art_id=".$art_id;
		$cnt=ReturnAnyValue($conn,$sql);
		

		if($cnt==0)
		{
			$sql="select write_pt from settings where id=1";
			$writePt=ReturnAnyValue($conn,$sql);

			$dt=date('Y-m-d h:i:s');


			$sql="insert into user_points(user_id,art_id,pt_type,points,pt_dt) values('$userID','$art_id','2','$writePt','$dt')";
			mysqli_query($conn,$sql);

		}

	}
header("Location:manage_article.php");
?>