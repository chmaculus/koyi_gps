<select name="id_sucursal">
<option value="">Seleccione</option>
<?php
include("../includes/connect.php");
$q='select id, sucursal from koyikun.sucursales order by sucursal';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row[0].'">'.$row[1].'</option>'.chr(10);	
}
?>





</select>