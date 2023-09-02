<?php

include_once("inf_contable_base.php");
include_once("../includes/connect.php");
echo "<center>";
if($_GET["id_inf_contable"]){
	$id_inf_contable=$_GET["id_inf_contable"];
}
if($_POST["id_inf_contable"]){
	$id_inf_contable=$_POST["id_inf_contable"];
}if($_POST["decision"]=="ELIMINAR"){
	include("inf_contable_update.php");
echo "<center>";
	echo "<font1>Los datos se eliminaron correctamente</font1>";
	exit;
}
if($_POST["decision"]=="CANCELAR"){
	include("inf_contable_muestra.inc.php");
	echo "<font1>Los datos no se han eliminado</font1>";
	exit;
}
$query='select * from inf_contable where id="'.$id_inf_contable.'"';
echo $query."<br>";

$array_inf_contable=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error();}

include("inf_contable_muestra.inc.php");
echo '
<form action="inf_contable_eliminar.php" method="post">
		<input type="hidden" name="id_inf_contable" value="'.$id_inf_contable.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
