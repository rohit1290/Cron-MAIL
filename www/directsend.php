<?php
include('session.php');
include('header.php');
include('config.php');
$subject = $_GET['subject'];
$headers = "From: '$from' <$from_email> \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = $_GET['mail_body'];
$email = $_GET['email_ids'];
$receipt = explode(",", $email); 
$count = 0;
foreach($receipt as $to){
mail($to, $subject, $message, $headers);
$count++;
}?>
<h1 style='font-size: 2.00em;'>Mail Sent to <b><?php echo $count?> recipient</b></h1>