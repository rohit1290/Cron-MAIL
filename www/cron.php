<?php
include('config.php');

$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error() ."<br>";
}

$result = mysqli_query($con,"SELECT el.enum, el.elist, mb.msub, mb.body FROM email_list el INNER JOIN mail_body mb ON el.mnum=mb.mnum  WHERE el.status='Pending' LIMIT 0 , 1");

if($result==null){
echo "No Scheduled Mail Found<br>";
} else {
while($row = mysqli_fetch_array($result)) {
$enum = $row['enum'];
$subject = $row['msub'];
$headers = "From: '$from' <$from_email> \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$body = $row['body'];
$email = $row['elist'];
$receipt = explode(",", $email); 
$count = 0;
foreach($receipt as $to){
$message = $body;
$message .= "<br><br><center>You are receiving the mail because you are a member of $from. To unsubscribe <a href='$path/unsubscribe.php?email=$to'>click here</a>.</center><br>";
//mail($to, $subject, $message, $headers);
$count++;
}
}
echo "Mail Sent to $count recipient.<br>";
$time = time();
$timestamp = date('Y-m-d H:i:s',$time);

$sql="UPDATE email_list SET status = '$timestamp' WHERE enum=$enum;";
if (!mysqli_query($con,$sql)) {
  die("Failed to update the status of the scheduled mail #$enum. Reason: " . mysqli_error($con) . "<br>");
}else{
echo "Status update in the database<br>";
}
}

mysqli_close($con);
?>