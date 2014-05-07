<!DOCTYPE html>
<html>
	<head>
		<title>CronMail</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/skel.min.js"></script>
		<script src="../js/init.js"></script>
		<!--
		<link rel="stylesheet" href="css/colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/light/jquery.colorbox.js"></script>
		-->
			<link rel="stylesheet" href="../css/skel-noscript.css" />
			<link rel="stylesheet" href="../css/style.css" />
			<link rel="stylesheet" href="../css/style-wide.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	<style>
	.topbar{
	position:fixed;
	width:100%;
	margin-top:0px;
	background: url('../images/header.jpg');
	padding: 0px 10px;
	z-index:2;
	}
	</style>
	</head>
	<body>
<div class="topbar">
<div id="left"><h1 style="font-size: 2.00em;margin:1px;color: #fff;"><b><a href="index.php">Cron Mail</a></b>  v1.0 (Beta)</h1></div>
<div id="center"></div>
<div id="right"></div>
</div>
<?php
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

$fp = fopen("../config.php", "w");
fwrite($fp, $string);
fclose($fp);

$string = '<?php header ("Location: ../index.php"); ?>';
$fp = fopen("index.php", "w");
fwrite($fp, $string);
fclose($fp);
?>
<div class="topbar">
<div id="left"><h1 style="font-size: 2.00em;margin:1px;color: #fff;"><b><a href="index.php">Cron Mail</a></b>  v1.0 (Beta)</h1></div>
<div id="center"></div>
<div id="right"></div>
</div>
<div id="wrapper">
<center>
<h1 style="font-size: 2.00em;">Cron MAIL Configurations Saved</h1>
<br>
<div style="margin:2px;width:90%;">
<h2 style="font-size: 1.3em;">Thank You For Your Time. All Changes Has Been Saved Successfully.<br><br>
We Highly Recommend That You Delete The INSTALL Folder From Your Server.<Br><br><br>
You May Now Proceed To Your Application.</h2>
</div>
</center>
<?php include('../footer.php');?>