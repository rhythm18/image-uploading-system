 <?php

 
 $subject = "Your registration on ".$domainName;
 
 
 $message = "Hi, ".$fname.'<br>';

 $message .= 'Thanks for registration on  <b>'.$domainName.'</b><br>';
 $message .= 'Please find your login details as below :<br/>';
 $message .= 'User Name : <b>'.$email.'</b><br/>';
 $message .= 'Password : <b>'.$pass.'</b><br/>';
 $message .= 'Registration Date: <b>'.$join_date.'</b><br/><br/>';
 $message .= 'click the link below to verify your E-mail:';
 $message .= '<br><a href=https://betechnical.in/verify_email.php?eMail='.$email.'>Verify Email</a>';
//echo $message;
 $message .= '<br>Thanks,<br/>';
 $message .= 'Be Technical Team<br/><br>';
 $message .= 'website:'.$domain.'<br/>';

 
 
 $to_email = $email;
 $from_email="info@betechnical.in";

 
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: '.$from_email;

 mail($to_email,$subject,$message,$headers);


//smtp auth(missing)
 ?>