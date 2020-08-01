 <?php

 
 $subject = "Document Uploaded by ".$email;
 
 
 $message = "Hi, Admin <br>";

 $message .= 'This is to inform you that the documents uploaded by <b>'.$email.' were uploaded Successfully</b><br>';
 $message .= 'Document Title :'.$title.'<br/>';
 $message .= 'Posted On: <b>'.$dt.'</b><br/><br/>';
//echo $message;
 $message .= '<br>Thanks,<br/>';
 
 $to_email="demomail402@gmail.com";

 $email="info@betechnical.in";
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: '.$email;

 

 mail($to_email,$subject,$message,$headers);


//smtp auth(missing)
 ?>