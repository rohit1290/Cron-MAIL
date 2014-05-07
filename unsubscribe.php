<?php
include ('session.php');
include ('header.php');
include ('config.php');
include('config.php');

// Saving the email in Unsubscribe Database
if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
$emailid = $_GET['email'];
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="INSERT INTO unsub_list (unelist) VALUES ('".$emailid."')";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
}
?>
			<section id="header" class="dark">
				<header>
					<h1>We have removed your email address from our list</h1>
					<p>We're sorry to see your go.!</p>
					<p>If there is anything that you would like to share, feel free to write us at <a href="mailto:<?php echo $test_email?>"><?php echo $test_email?></a></p>
				</header>
			</section>
			
<?
include('footer.php');
?>