<?php
include('session.php');
include('header.php');
?>
<script>
$(document).ready(function(){
  $("#submit").click(function(e) { 
		e.preventDefault();
var $subject = $('#subject').val();
var $body = $('#body').val();
var $mnum = $('#mnum').val();
	$(".allmailedit").colorbox({iframe:true, width:"50%", height:"20%", href: "allmailedit.php?subject="+$subject+"&body="+$body+"&mnum="+$mnum;});
  });
</script>
<?php
if (!$_GET["subject"]) {
$subject = $_GET['subject'];
$body = $_GET['mail_body'];
$mnum = $_GET['mnum'];
include('config.php');
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="UPDATE mail_body SET msub=$subject,body=$body WHERE mnum=$mnum";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
?>
<h1 style='font-size: 2.00em;'>Your Mail has been Saved.</h1>
<?php
} else {
$mnum = $_GET['mnum'];

$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT msub, body FROM mail_body WHERE mnum=$mnum");

if($result==null){
  echo "<h1 style='font-size: 2.00em;'>No Mail Found</h1>";
} else {
while($row = mysqli_fetch_array($result)) {
$subject = $row['msub'];
$body = $row['body'];
}
}
mysqli_close($con);
?>
<center style="margin-bottom:5px">Edit Your Mail</center>
<div id="wrapper">
<form class="mailform" name="mailform" method="post" enctype="multipart/form-data">
<input id="mnum" type="hidden" name="mnum" value="<?php echo $mnum ?>">
<table width="100%">
<tr>
 <td valign="top" width="30%">
  <label for="subject">Subject: </label>
 </td>
 <td valign="top" width="65%">
  <input id="subject" type="text" name="subject" size="100" value="<?php echo $subject?>">
 </td>
</tr>
<tr>
 <td valign="top" width="30%">
  <label for="mail_body" style="margin-top:0px;">Mail Body:</label>
 </td>
 <td valign="top" width="65%">
  <textarea id="mail_body" name="mail_body" cols="15" rows="10" style="font-size:14px;height:300px;width:100%"><?php echo $body ?></textarea>
 </td>
</tr>
<tr>
 <td></td>
 <td style="text-align:center">
 <br>
  <input id="allmailedit" name="allmailedit" class="allmailedit button scrolly"  type="submit" value="Save Changes" href="allmailedit.php"/>
 </td>
</tr>
</table>
</form>
</div>
<?php
}
?>