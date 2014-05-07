<?php
include('session.php');
include('header.php');
include('menu.php');
?>
<div id="wrapper">
<h1 style="font-size: 2.00em;">Send Direct MAIL - Step 1 of 2</b></h1>
<form class="mailform" name="mailform" method="post" enctype="multipart/form-data" action="directcompose.php">
<table width="100%">
<tr>
 <td valign="top" width="30%">
  <label for="email_ids" style="margin-top:0px;">Email IDs:<br><br><br><i>Enter your email ids separated by coma ",".<br>Ex: abc@domain.com,xyz@domain.com</i><br><br></label>
 </td>
 <td valign="top" width="65%">
  <textarea id="email_ids" name="email_ids" cols="15" rows="15" style="font-size:14px;height:300px;width:100%"></textarea>
 </td>
</tr>
<tr>
 <td></td>
 <td style="text-align:center">
 <br>
  <input id="submit" name="submit" class="preview button scrolly"  type="submit" value="Compose Mail"/>
 </td>
</tr>
</table>
</form>
</div>
<?
include('footer.php');
?>