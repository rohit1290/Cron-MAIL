<?php
include('session.php');
include('header.php');
include('config.php');

$enum = $_GET['enum'];

$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="DELETE FROM email_list WHERE enum=$enum";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}else{
echo "<h1 style='font-size: 2.00em;'>One Entry Deleted.<br><a href='javascript:void(0);' onclick='parent.window.location.reload();' >Click Here</a> To Refresh The Page<h1>";
}
?>