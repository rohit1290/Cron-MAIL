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
<center style="margin-bottom:5px">List of All Mails
<table width="500px" id="rounded-corner">
<thead>
<tr>
<th width="15%" class="rounded-company">S.No.</th>
<th width="45%">Subject</th>
<th width="40%" class="rounded-q4">Menu</th>
</tr>
</thead>
<tbody>
<?php
$con=mysqli_connect($newshost,$newsuser,$newspass,$newsdb);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT mnum, msub FROM mail_body ORDER BY mnum");

if($result==null){
  echo "<tr valign='middle'>";
  echo "<td colspan='5' align='center' height='300px'><br>No Mail Found</td>";
  echo "</tr>";  
} else {
while($row = mysqli_fetch_array($result)) {
$mnum = $row['mnum'];
  echo "<tr>";
  echo "<td>" . $row['mnum'] . "</td>";
  echo "<td>" . $row['msub'] . "</td>";
  echo "<td><a class='iframe1' href='allmailedit.php?mnum=$mnum'>Edit</a> |
			<a class='iframe2' href='allmaildelete.php?mnum=$mnum'>Delete</a> |
			<a class='iframe2' href='allmailduplicate.php?mnum=$mnum'>Duplicate</a>
		</td>";
  echo "</tr>";
}
}
mysqli_close($con);
?>
</tbody>
<tfoot>
<tr>
<td colspan="2" class="rounded-foot-left">&nbsp;</td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
</table>
</center>
</div>
</div>

<?php
include('footer.php');
?>