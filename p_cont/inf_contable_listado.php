<?php

include("inf_contable_base.php");
include("../includes/connect.php");
echo '<br>';

$query="select * from inf_contable limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<center><table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>tipo1</th>";
	echo "<th>sociedad</th>";
	echo "<th>proveedor</th>";
	echo "<th>tipo2</th>";
	echo "<th>fecha</th>";
	echo "<th>fecha_sistema</th>";
	echo "<th>tipo3</th>";
	echo "<th>importe</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["tipo1"].'</td>';
	echo '<td>'.$row["sociedad"].'</td>';
	echo '<td>'.$row["proveedor"].'</td>';
	echo '<td>'.$row["tipo2"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["tipo3"].'</td>';
	echo '<td>'.$row["importe"].'</td>';
	echo '<td><A HREF="inf_contable_ingreso.php?id_inf_contable='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="inf_contable_eliminar.php?id_inf_contable='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
