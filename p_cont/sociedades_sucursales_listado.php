<?php
include("sociedades_sucursales_base.php");
?>




<center>
<?php
include("../includes/connect.php");
echo '<br>';
$query="select * from sociedades_sucursales limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_sociedad</th>";
	echo "<th>id_sucursal</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_sociedad"].'</td>';
	echo '<td>'.nombre_sucursal($row["id_sucursal"]).'</td>';
	echo '<td><A HREF="sociedades_sucursales_ingreso.php?id_sociedades_sucursales='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="sociedades_sucursales_eliminar.php?id_sociedades_sucursales='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}




#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
        $query='select * from koyikun.sucursales where id="'.$id_sucursal.'"';
        $array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["sucursal"];
}
#-----------------------------------------------------------------






?>
</table></center>
