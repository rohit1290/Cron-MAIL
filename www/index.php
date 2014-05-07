<?php
include('session.php');
include('header.php');
include('config.php');
include('menu.php');
?>
<div id="wrapper">
<div id="left" style="position:fixed;width:30%">
<h1 style="font-size: 2.00em;">Welcome to <b>Cron MAIL</b></h1>
Cron MAIL is a special type of open source application designed to help those web user whose hosting provider has limited there mailing service to a limited number of mails that can be sent per hour.<br><Br>
Cron MAIL helps those user to schedule mail via cron job where the mails are scheduled in chunk and the application send the mail automatically without exceeding the mail limit and reduces manual effort.
<br><br><br>
<center>
<a href="new.php" class="button scrolly" style="padding: 0.55em 1.0em 0.55em 1.0em;">Scheduled New Mail</a>
<a href="direct.php" class="button scrolly" style="padding: 0.55em 1.0em 0.55em 1.0em;">Send Direct Mail</a>
</center>
</div>
<div id="right" style="margin-top:10px;padding:5px;margin:5px;width:52%;min-height:300px">
<center style="margin-bottom:5px">List of 10 Scheduled Mail <font size="2px">(<a href="allcron.php" style="border-bottom:none">View All</a>)</font></center>
<table width="100%" id="rounded-corner">
<thead>
<tr>
<th width="10%" class="rounded-company">S.No.</th>
<th width="20%">Sent to</th>
<th width="40%">Subject</th>
<th width="30%" class="rounded-q4">Status</th>
</tr>
</thead>
<tbody>
<?php
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT el.enum, el.elist, mb.msub, mb.body, el.status FROM email_list el INNER JOIN mail_body mb ON el.mnum=mb.mnum where el.status='Pending' ORDER BY el.enum LIMIT 0 , 10");

if($result==null){
  echo "<tr valign='middle'>";
  echo "<td colspan='4' align='center' height='300px'><br>No Scheduled Mail Found</td>";
  echo "</tr>";  
} else {
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['enum'] . "</td>";
  echo "<td>" . substr_count($row['elist'], ",") . "</td>";
  echo "<td>" . $row['msub'] . "</td>";
  echo "<td>" . $row['status'] . "</td>";
  echo "</tr>";
}
}
mysqli_close($con);
?>
</tbody>
<tfoot>
<tr>
<td colspan="3" class="rounded-foot-left">&nbsp;</td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
</table>
</div>
</div>

<?php
include('footer.php');
?>