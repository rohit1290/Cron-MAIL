<?php
include('session.php');
include('header.php');
include('config.php');
include('menu.php');
?>
<script>
$(document).ready(function(){
 $(".iframe1").colorbox({iframe:true, width:"80%", height:"80%"});
 $(".iframe2").colorbox({iframe:true, width:"50%", height:"30%"});
});
</script>
<div id="wrapper">
<center style="margin-bottom:5px">List of Scheduled Mails</center>
<table width="100%" id="rounded-corner">
<thead>
<tr>
<th width="10%" class="rounded-company">S.No.</th>
<th width="10%">Sent to</th>
<th width="20%">Subject</th>
<th width="25%" class="rounded-q4">Status</th>
<th width="35%" class="rounded-q4">Menu</th>
</tr>
</thead>
<tbody>
<?php
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT el.enum, el.elist, mb.msub, mb.body, el.status FROM email_list el INNER JOIN mail_body mb ON el.mnum=mb.mnum  ORDER BY el.enum desc");

if($result==null){
  echo "<tr valign='middle'>";
  echo "<td colspan='5' align='center' height='300px'><br>No Scheduled Mail Found</td>";
  echo "</tr>";  
} else {
while($row = mysqli_fetch_array($result)) {
$ecount = substr_count($row['elist'], ",")+1;
$enum = $row['enum'];
if($row['status']=='Pending'){
$fontcolor = 'red';
} else {
$fontcolor = 'darkgreen';
}
  echo "<tr>";
  echo "<td><font color='$fontcolor'>" . $enum . "</font></td>";
  echo "<td><font color='$fontcolor'>" . $ecount . "</font></td>";
  echo "<td><font color='$fontcolor'>" . $row['msub'] . "</font></td>";
  echo "<td><font color='$fontcolor'>" . $row['status'] . "</font></td>";
  echo "<td>
		<a class='iframe1' href='allcronpreview.php?enum=$enum'>Preview Mail</a> |
		<a class='iframe2' href='allcrondelete.php?enum=$enum'>Delete</a> | 
		<a class='iframe1' href='allcronemail.php?enum=$enum'>Email IDs List</a></td>";
  echo "</tr>";
}
}
mysqli_close($con);
?>
</tbody>
<tfoot>
<tr>
<td colspan="4" class="rounded-foot-left">&nbsp;</td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
</table>
</div>
</div>

<?php
include('footer.php');
?>