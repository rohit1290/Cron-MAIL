<?php
include('session.php');
include('header.php');
include('config.php');
$enum = $_GET['enum'];
?>

<center style="margin-bottom:5px">List of Email IDs
<table width="99%" id="rounded-corner">
<thead>
<tr>
<th width="20%" class="rounded-company">Email ID</th>
<th width="20%">Email ID</th>
<th width="20%">Email ID</th>
<th width="20%" class="rounded-q4">Email ID</th>
</tr>
</thead>
<tbody>
<?php
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$count =0;
$result = mysqli_query($con,"SELECT elist FROM email_list WHERE enum=$enum");

if($result==null){
  echo "<tr valign='middle'>";
  echo "<td colspan='4' align='center' height='300px'><br>No E-Mail ID Found</td>";
  echo "</tr>";  
} else {
  echo "<tr>";
while($row = mysqli_fetch_array($result)) {
$email = $row['elist'];
$list = explode(",", $email);
foreach($list as $key){
$count++;
if($count%5==0) { echo "</tr><tr>";  } else { echo "<td>" . $key . "</td>";}
}
}
for($i=1;$i<(5-($count%5));$i++) {
echo "<td></td>";
}
  echo "</tr>";
}
mysqli_close($con);
?>
</tbody>
<tfoot>
<tr>
<td colspan="3" class="rounded-foot-left">&nbsp;</td>
<td class="rounded-foot-right">Total: <?php echo $count ?></td>
</tr>
</tfoot>
</table></center>