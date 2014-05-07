<?php
include('session.php');
include('header.php');
include('config.php');
?>
<center style="margin-bottom:5px">List of Active Users
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
$unsubscribe[] = "";
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
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
$count = 0;
if($result==null){
  echo "<tr valign='middle'>";
  echo "<td colspan='4' align='center' height='300px'><br>No E-Mail ID Found</td>";
  echo "</tr>";  
} else {
  echo "<tr>";
while($row = mysqli_fetch_array($result)) { $count++;
if($count%5==0) { echo "</tr><tr>";  } else { echo "<td>" . $row["$emailatt"] . "</td>";}
}
for($i=0;$i<(4-($count%5));$i++){
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