<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message = 'No phone entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Message</td>
    <td><?=$message;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

$to = 'ray@raysmith.co.uk';
$email = 'ray@raysmith.co.uk';
$fromaddress = "ray@raysmith.co.uk";
$fromname = "Online Contact";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "ray@raysmith.co.uk";
$mail->FromName = "Contact Form";
$mail->AddAddress("ray@raysmith.co.uk","Ray"); // Put your email
$mail->AddAddress("webmaster@webdesignray.co.uk","Webmaster"); // addresses here

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Demo Form:  Contact form submitted";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'ray@raysmith.co.uk';
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: ray@raysmith.co.uk\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
