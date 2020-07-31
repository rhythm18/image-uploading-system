<?php 
//include "/home/dhanyog/public_html/admin/inc/connect.php";
include ("inc/connect.php");

$dt=date('Y-m-d h:i:s');

$sql="select * from settings where id=1";

$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);

	$mailPerHr=$row['mail_per_hr'];
	$mailFrom=$row['mail_from'];


$sql="SELECT m_id,email,content,title FROM mailing_list,newsletters where mailing_list.n_id=newsletters.n_id and sent_status='0' ORDER BY RAND() LIMIT 1";
	

$r=mysqli_query($conn,$sql);

while($rw=mysqli_fetch_array($r))
 {
	$m_id=$rw['m_id'];
	$to_email=$rw['email'];

	$headers = "MIME-Version: 1.0" . "\r\n";
 	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: '.$mailFrom;
	$message=$rw['content'];
	$subject=$rw['title'];
	
	mail($to_email,$subject,$message,$headers);
	
	

	$sql="update mailing_list set sent_status='1',sent_date='$dt' where m_id='$m_id'";
	
	mysqli_query($conn,$sql);

		
			  
		
	
}

	

      
	



?>