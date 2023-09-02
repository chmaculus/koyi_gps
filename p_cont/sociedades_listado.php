
<?php

include("sociedades_base.php");
echo "<br>";

include("../includes/connect.php");
$query="select * from sociedades limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<center><table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>sociedad</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["sociedad"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
