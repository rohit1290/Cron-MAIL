<?php

// Initialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['pageview'])) {
header('Location: index.php');
}
if (isset($_SESSION['error'])){ 
$error_msg = $_SESSION['error'];
}else{
$error_msg = "";
}
include ('header.php');
?>

		<!-- Main -->
			<section id="header" class="dark">
				<header>
					<h1>Welcome to Cron MAIL</h1>
					<p>An Open Source to send mail via cron jobs</p>
				</header>
				<footer>
					<a href="#login" class="button scrolly">Proceed to login</a>
				</footer>
			</section>
			
			<section id="login" class="main">
				<header>
					<div class="container">
						<h2>Enter the security password to login to Cron MAIL</h2>
						<p>
						<form method="post" action="login.php#login" name="loginform" id="loginform">
							<font color="red"><?php echo $error_msg; ?></font><br />
							<input class="button scrolly" type="password" id="access_pwd" name="access_pwd" value="" onfocus="javascript:if(this.defaultValue == this.value){this.value = '';}" size="20" required/><br />
							<input class="button scrolly" type="submit" name="login" value="Shut the f*ck up and log me in!" />
						</form>
						</p>
						<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					</div>
				</header>
			</section>
<?
include('footer.php');
include('config.php');
// Inialize session
if(isset($_POST['login'])){
	
session_start();
$pwd=$_POST['access_pwd'];

if($pwd==$password){
$_SESSION['pageview'] = 1;
$_SESSION['error'] = "";
// Jump to secured page
header('Location: index.php');
}
else {
$_SESSION['error'] = "Invalid Login";
// Jump to login page
header('Location: login.php');
}
}

?>