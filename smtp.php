<?php
include_once "mailer/PHPMailerAutoload.php";
?>

<?php
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.zoho.com;smtp.zoho.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'Your email Address';                 // SMTP username
$mail->Password = '**your password**';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('pghall3@zoho.com', 'MS Bhawan PG3');
$mail->addReplyTo('pghall3@zoho.com', 'Helpdesk');
   // Optional name
$mail->isHTML(true);
?>