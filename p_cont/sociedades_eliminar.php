

<?php
include("sociedades_base.php");
include_once("sociedades_base.php");
include_once("connect.php");
echo "<center>";
if($_GET["id_sociedades"]){
	$id_sociedades=$_GET["id_sociedades"];
}
if($_POST["id_sociedades"]){
	$id_sociedades=$_POST["id_sociedades"];
}if($_POST["decision"]=="ELIMINAR"){
	include("sociedades_update.php");
echo "<center>";
	echo "<font1>Los datos se eliminaron correctamente</font1>";
	exit;
}
if($_POST["decision"]=="CANCELAR"){
	include("sociedades_muestra.inc.php");
	echo "<font1>Los datos no se han eliminado</font1>;"
	exit;
}
$query='select * from sociedades where id="'.$id_sociedades.'"';
$array_sociedades=mysql_fetch_array(mysql_query($query));
include("sociedades_muestra.inc.php");
echo '
<form action="sociedades_eliminar.php" method="post">
		<input type="hidden" name="id_sociedades" value="'.$id_sociedades.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
