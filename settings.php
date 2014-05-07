<?php
include('session.php');
include('header.php');
?>
<center style="margin-bottom:5px">Configure Your Config File</center>
<script>
$(document).ready(function(){
  $("#submit").click(function(e) { 
		e.preventDefault();
var $path = $('#path').val();
var $password = $('#password').val();
var $newsdb = $('#newsdb').val();
var $newshost = $('#newshost').val();
var $newsuser = $('#newsuser').val();
var $newspass = $('#newspass').val();
var $limit = $('#limit').val();
var $emaildb = $('#emaildb').val();
var $emailhost = $('#emailhost').val();
var $emailuser = $('#emailuser').val();
var $emailpass = $('#emailpass').val();
var $emailtable = $('#emailtable').val();
var $emailatt = $('#emailatt').val();
var $from = $('#from').val();
var $from_email = $('#from_email').val();
var $test_email = $('#test_email').val();
var data = "path="+$path+"&password="+$password+"&newsdb="+$newsdb+"&newshost="+$newshost+"&newsuser="+$newsuser+"&newspass="+$newspass+"&limit="+$limit+"&emaildb="+$emaildb+"&emailhost="+$emailhost+"&emailuser="+$emailuser+"&emailpass="+$emailpass+"&emailtable="+$emailtable+"&emailatt="+$emailatt+"&from="+$from+"&from_email="+$from_email+"&test_email="+$test_email;
alert(data);
	$(".settings").colorbox({iframe:true, width:"50%", height:"90%", href: "settings.php?"+data});
  });
</script>
<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
$string = '<?php
/************************************************************************/
// Cron Mail Path
$path = "'. $_POST["path"]. '";

// Login Password
$password = "'. $_POST["password"]. '";

/************************************************************************/
// Connecting to newsletter database //

$newsdb = "'. $_POST["newsdb"]. '";					// Newsletter Database
$newshost = "'. $_POST["newshost"]. '";				// Newsletter Host
$newsuser = "'. $_POST["newsuser"]. '";						// Newsletter User
$newspass = "'. $_POST["newspass"]. '";							// Newsletter Password


// Definition of mail limit //
$limit = "'. $_POST["limit"]. '";							// Define the mail limit of your server 
										// (Eg: 500 mails/hour or 1000 mails/hour)

/************************************************************************/

// Connecting to email id database (Elgg) //

$emaildb = "'. $_POST["emaildb"]. '";					// Elgg Database
$emailhost = "'. $_POST["emailhost"]. '";				// Elgg Host
$emailuser = "'. $_POST["emailuser"]. '";					// Elgg User
$emailpass = "'. $_POST["emailpass"]. '";						// Elgg Password


// Definition of email table database //

$emailtable = "'. $_POST["emailtable"]. '";		// Elgg table that stored email ids
$emailatt = "'. $_POST["emailatt"]. '";					// Attribute name in the elgg table

/************************************************************************/
// Setup the name and email if to send the mail //
$from = "'. $_POST["from"]. '";					// Name of the Organization
$from_email = "'. $_POST["from_email"]. '";// Email from which the mail will be sent
$test_email = "'. $_POST["test_email"]. '"; // Email used for send testing mail

/************************************************************************/
?>';

$fp = fopen("config.php", "w");
fwrite($fp, $string);
fclose($fp);

echo '<center><div style="background:lightyellow;margin:2px;width:80%;"><i>Changes Saved Sucessfully</i></div></center>';
}
include('config.php');
?>

<form name="settingform" method="post">
<table width="100%">
<tr><td colspan="2"><b><i>Global Settings</b></i></td></tr>
<tr><td valign="top" width="30%">Installation Path: </td><td width="70%"><input name="path" type="text" id="path" value="<?php echo $path ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Password: 			</td><td><input name="password" type="text" id="password" value="<?php echo $password ?>" size="38"></td></tr>
<tr><td colspan="2"><b><i>Cron MAIL Settings</b></i></td></tr>
<tr><td valign="top" width="30%">Database Name: </td><td><input name="newsdb" type="text" id="newsdb" value="<?php echo $newsdb ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Database Host: </td><td><input name="newshost" type="text" id="newshost" value="<?php echo $newshost ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Database User: </td><td><input name="newsuser" type="text" id="newsuser" value="<?php echo $newsuser ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Database Pass: </td><td><input name="newspass" type="text" id="newspass" value="<?php echo $newspass ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Mail Limit (Per Hour): </td><td><input name="limit" type="text" id="limit" value="<?php echo $limit ?>" size="38"></td></tr>
<tr><td colspan="2"><b><i>Email List Settings (Wordpress, Elgg or Inbuilt)</b></i></td></tr>
<tr><td valign="top" width="30%">Database Name: </td><td><input name="emaildb" type="text" id="emaildb" value="<?php echo $emaildb ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Database Host: </td><td><input name="emailhost" type="text" id="emailhost" value="<?php echo $emailhost ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Database User: </td><td><input name="emailuser" type="text" id="emailuser" value="<?php echo $emailuser ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Database Pass: </td><td><input name="emailpass" type="text" id="emailpass" value="<?php echo $emailpass ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Email ID Table: </td><td><input name="emailtable" type="text" id="emailtable" value="<?php echo $emailtable ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Table's Column Name: </td><td><input name="emailatt" type="text" id="emailatt" value="<?php echo $emailatt ?>" size="38"></td></tr>
<tr><td colspan="2"><b><i>Mail Settings</b></i></td></tr>
<tr><td valign="top" width="30%">From Name: </td><td><input name="from" type="text" id="from" value="<?php echo $from ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">From Email ID: </td><td><input name="from_email" type="text" id="from_email" value="<?php echo $from_email ?>" size="38"></td></tr>
<tr><td valign="top" width="30%">Test Email ID: </td><td><input name="test_email" type="text" id="test_email" value="<?php echo $test_email ?>" size="38"></td></tr>
<tr><td></td><td><br><input id="submit" name="submit" class="settings button scrolly"  type="submit" value="Save Settings" href="settings.php" /></td></tr>
</table>
</form>