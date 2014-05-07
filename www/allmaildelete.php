<?php
include('session.php');
include('header.php');
include('config.php');

$mnum = $_GET['mnum'];

$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql1="DELETE FROM email_list WHERE mnum=$mnum";
$sql2="DELETE FROM mail_body WHERE mnum=$mnum";
if (!mysqli_query($con,$sql1) || !mysqli_query($con,$sql2) ) {
  die('Error: ' . mysqli_error($con));
}else{
echo "<h1 style='font-size: 2.00em;'>Entry Deleted Successfully.<br><a href='javascript:void(0);' onclick='parent.window.location.reload();' >Click Here</a> To Refresh The Page<h1>";
}
?>