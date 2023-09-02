<?php
include_once("sociedades_sucursales_base.php");
include("../includes/connect.php");
echo '<br>';



echo "<br><br>";
$query='select * from sociedades_sucursales where id="'.$id_sociedades_sucursales.'"';
$array_sociedades_sucursales=mysql_fetch_array(mysql_query($query));

include("sociedades_sucursales_muestra.inc.php");
?>

