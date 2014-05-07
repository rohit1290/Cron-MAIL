<?php
include('session.php');
include('header.php');
include('config.php');
$subject = $_GET['subject'];
$headers = "From: '$from' <$from_email> \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = $_GET['mail_body'];
$message .= "<br><br><center>You are receiving the mail because you are a member of $from. To unsubscribe <a href='javascript:void(0)'>click here</a>.</center><br>";
$to = "$test_email";
mail($to, $subject, $message, $headers);
?>
<h1 style='font-size: 2.00em;'>Test Mail Sent to <b><?php echo $test_email?></b></h1>