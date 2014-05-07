<link rel="stylesheet" href="vendor/colorbox/css/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="vendor/colorbox/js/jquery.colorbox.js"></script>
<style>
	.topbar{
	position:fixed;
	width:100%;
	margin-top:0px;
	background: url('images/header.jpg');
	padding: 0px 10px;
	z-index:2;
	}
a:active, a:selected, a:visited { 
    border: none;
    outline: none;
}
* :focus { outline: 0; -moz-outline-style: none; }
</style>
<script>
$(document).ready(function(){
	$(".mailview").colorbox({inline:true, width:"40%", height:"50%"});
	$(".under_construction").colorbox({inline:true, width:"1000px", height:"600px"});
	$(".mailactive").colorbox({iframe:true, width:"90%", height:"90%", href: "mailactive.php"});
	$(".maildeactive").colorbox({iframe:true, width:"90%", height:"90%", href: "maildeactive.php"});
	$(".settings").colorbox({iframe:true, width:"50%", height:"90%", href: "settings.php"});
	});
</script>
<div class="topbar">
<div id="left"><h1 style="font-size: 2.00em;margin:1px;color: #fff;"><b><a href="index.php">Cron Mail</a></b>  v1.0 (Beta)</h1></div>
<div id="center"></div>
<div id="right">
<a href="index.php" style="border:none" ><img src="images/home.png" title="Home" alt="Home" width="40px" height="40px" border="0"></a>
<img src="images/space.png" height="40px" border="0">
<a href="#mailview_content" style="border:none" class="mailview"><img src="images/email.png" title="View Email List" alt="View Email List" width="40px" height="40px" border="0"></a>
<img src="images/space.png" height="40px" border="0">
<a href="#under_construction" style="border:none" class="under_construction"><img src="images/edit.png" title="Edit Template" alt="Edit Template" width="40px" height="40px" border="0"></a>
<img src="images/space.png" height="40px" border="0">
<a href="#under_construction" style="border:none" class="under_construction"><img src="images/imgupload.png" title="Upload Image" alt="Upload Image" width="40px" height="40px" border="0"></a>
<img src="images/space.png" height="40px" border="0">
<a href="allcron.php" style="border:none"><img src="images/allcron.png" title="All Cron Mail" alt="All Cron Mail" width="40px" height="40px" border="0"></a>
<img src="images/space.png" height="40px" border="0">
<a href="allmail.php" style="border:none"><img src="images/mail.png" title="All Mail" alt="All Mail" width="40px" height="40px" border="0"></a>
<img src="images/space.png" height="40px" border="0">
<a href="setting.php" style="border:none" class="settings"><img src="images/setting.png" title="Setting" alt="Setting" width="40px" height="40px" border="0"></a>
<img src="images/space.png" height="40px" border="0">
<a href="logout.php" style="border:none"><img src="images/logout.png" title="Logout" alt="Logout" width="40px" height="40px" border="0"></a>
</div>
</div>
		<div style="display:none">
			<div id="mailview_content" style="padding:10px; margin:auto; background:#fff;">
			<center style="margin-bottom:5px">List of Active and De-active Emails IDs</center><br>
			<p style="text-align: center;"><a href="mailactive.php" style="border:none" class="mailactive button scrolly">View Active Emails</a></p>
			<p style="text-align: center;"><a href="maildeactive.php" style="border:none" class="maildeactive button scrolly">View Deactivate Emails</a></p>
			</div>
			<div id="under_construction" style="padding:10px; margin:auto; background:#fff;">
			<center><br><img src="images/under-construction.jpg" alt="Under Construction"></center>
			</div>
		</div>
