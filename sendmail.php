<?php
/**
 * This example shows making an SMTP connection with authentication.
 */
 
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
 
require 'PHPMailer/PHPMailerAutoload.php';
 
//header("MIME-Version: 1.0; Content-Type: text/html; charset=ISO-8859-1", true);
 
  //Create a new PHPMailer instance
function sendmail($email, $subject, $file_name)
{

	//$message = file_get_contents($file_name);	
	$message = $file_name;
	$mail = new PHPMailer(true);
  $mail->CharSet = "UTF-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;
  ////Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "smtp.zoho.com";
	//$mail->Host = "smtp-relay.gmail.com";
  //$mail->Host = "aspmx.l.google.com";
  //Set the SMTP port number - likely to be 25, 465 or 587
 	// $mail->Port = 25;
 	$mail->Port = 465;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'ssl';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  //~~$mail->Username = "rene.certrebel@gmail.com";
  //~~
$mail->Username = "support@certrebel.com";
  //~~$mail->Username = "support.certrebel@zoho.com";
  //Password to use for SMTP authentication
  //~~
$mail->Password = 'Bunnytitties123';
  //~~$mail->Password = '$lice0fbread@611';
  //Set who the message is to be sent from
  //~~$mail->setFrom('rene.certrebel@gmail.com', 'CertRebel Support ');
  //~~
$mail->setFrom('support@certrebel.com', 'CertRebel Support');
  //~~$mail->setFrom('support.certrebel@zoho.com', 'CertRebel Support');
  //Set an alternative reply-to address
  //$mail->addReplyTo('replyto@example.com', 'First Last');
  //Set who the message is to be sent to
  $mail->addAddress($email);
  //Set the subject line
  $mail->Subject = $subject;
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('template.html'), dirname(__FILE__));
  $mail->msgHTML($message);                                                                                                                                                       
  //Replace the plain text body with one created manually
  $mail->AltBody = 'This is a plain-text message body';
  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');
	
	//send the message, check for errors
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
      echo "Message sent!";
  }  
}
?>
