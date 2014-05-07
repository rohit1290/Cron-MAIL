<?php
include('session.php');
include('header.php');
?>
<link rel="stylesheet" href="vendor/colorbox/css/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="vendor/colorbox/js/jquery.colorbox.js"></script>
<?php
include('menu.php');
?>
<script>
$(document).ready(function(){
 $("#preview").click(function(e) { 
			e.preventDefault();
             var sub = $('#subject').val();
			 var body = $('#mail_body').val();
			$(".preview").colorbox({iframe:true, width:"70%", height:"90%", href: 'newpreview.php?subject='+sub+'&mail_body='+body});
  });
  $("#testmail").click(function(e) { 
			e.preventDefault();
             var sub = $('#subject').val();
			 var body = $('#mail_body').val();
			$(".testmail").colorbox({iframe:true, width:"60%", height:"25%", href: 'newtestmail.php?subject='+sub+'&mail_body='+body});
  });
  $("#send").click(function(e) { 
			e.preventDefault();
             var sub = $('#subject').val();
			 var body = $('#mail_body').val();
			$(".send").colorbox({iframe:true, width:"50%", height:"30%", href: 'newsave.php?subject='+sub+'&mail_body='+body});	
  });
});
</script>
<div id="wrapper">
<h1 style="font-size: 2.00em;">Schedule a New Cron MAIL</b></h1>
<form class="mailform" name="mailform" method="post" enctype="multipart/form-data">
<table width="100%">
<tr>
 <td valign="top" width="30%">
  <label for="subject">Subject: </label>
 </td>
 <td valign="top" width="65%">
  <input id="subject" type="text" name="subject" size="100" value="">
 </td>
</tr>
<tr>
 <td valign="top" width="30%">
  <label for="mail_body" style="margin-top:0px;">Mail Body:<br><br><br><i>(You have to paste your raw html code here)</i><br><br></label>
 </td>
 <td valign="top" width="65%">
  <textarea id="mail_body" name="mail_body" cols="15" rows="10" style="font-size:14px;height:300px;width:100%"></textarea>
 </td>
</tr>
<tr>
 <td></td>
 <td style="text-align:center">
 <br>
  <input id="preview" name="preview" class="preview button scrolly"  type="submit" value="Preview Mail" href="newpreview.php"/>
  <input id="testmail" name="testmail" class="testmail button scrolly" type="submit" value="Send Test Mail" href="newtestmail.php"/>
  <input id="send" name="send" class="send button scrolly" type="submit" value="Save Mail" href="newsave.php"/>
 </td>
</tr>
</table>
</form>
</div>
<?
include('footer.php');
?>