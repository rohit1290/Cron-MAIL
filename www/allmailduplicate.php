<?php
include ('session.php');
include ('config.php');
include ('header.php');
$mnum = $_GET['mnum'];

// Saving the mail in Mail Database
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT msub, body FROM mail_body WHERE mnum=$mnum");
while($row = mysqli_fetch_array($result)) {
$subject = $row['msub'];
$body = $row['body'];
}

$sql="INSERT INTO mail_body (msub, body) VALUES ('".$subject."','".$body."')";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$result = mysqli_fetch_array(mysqli_query($con,"SELECT MAX(mnum) AS max FROM mail_body"));
$last = $result['max'];

// Storing the email ids in buckets in email database
$result = mysqli_query($con,"SELECT unelist FROM unsub_list")
or die("Error: ".mysqli_error($con));
while($row = mysqli_fetch_array($result)) {
$unsubscribe[] = $row['unelist'];
}

mysqli_close($con);

$con=mysqli_connect($emailhost,$emailuser,$emailpass,$emaildb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$unsublist = implode("','", $unsubscribe); 
$result = mysqli_query($con,"SELECT $emailatt from $emailtable where $emailatt NOT IN ('".$unsublist."')")
or die("Error: ".mysqli_error($con));

mysqli_close($con);

$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$count =0;
$list[]="$test_email";
while($row = mysqli_fetch_array($result)) {
	$count++;
			if($count%$limit==0) {
			$sql="INSERT INTO email_list (elist, mnum, status) VALUES ('".implode(",",$list)."',".$last.",'Pending')";
			if (!mysqli_query($con,$sql)) {
				die('Error: ' . mysqli_error($con));
			}			
			unset($list);				
			} else {
			$list[] = $row["$emailatt"];			
			}
}
			if($count%$limit!=0) {
			$sql="INSERT INTO email_list (elist, mnum, status) VALUES ('".implode(",",$list)."',".$last.",'Pending')";
			if (!mysqli_query($con,$sql)) {
				die('Error: ' . mysqli_error($con));
			}			
			}
mysqli_close($con);
?>
<h1 style='font-size: 2.00em;'>Mail has been Scheduled.<br>To know more visit the <a href="allcron.php" TARGET="_PARENT">All Cron Page</a></b></h1>