<?php
include("sociedades_sucursales_base.php");
include("../includes/connect.php");
echo '<br>';



if($_GET["id_sociedades_sucursales"]){
    $query='select * from sociedades_sucursales where id="'.$_GET["id_sociedades_sucursales"].'"';
    $array_sociedades_sucursales=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo "<br>".mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_sociedades_sucursales"]){
    $query='select * from sociedades_sucursales where uuid="'.$_GET["uuid_sociedades_sucursales"].'"';
    $array_sociedades_sucursales=mysql_fetch_array(mysql_query($query));
}
?>

<form method="post" action="sociedades_sucursales_update.php" name="form_sociedades_sucursales">

<center>
<table class="t1" border="1">
	<tr>
	<tr>
		<th>Sociedad</th>
		<td>
		<?php include("./includes/sociedades.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>Sucursal</th>
		<td>
		<?php include("./includes/sucursales.inc.php");?>
		</td>
	</tr>

</table>

<?php
/*
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<th>id_sociedad</th>
		<th>id_sucursal</th>
	</tr>
*/
/*
	<tr>
		<td><input type="text" name="id" id="id" value="<?php if($array_sociedades_sucursales["id"]){echo $array_sociedades_sucursales["id"];}?>" size="10"></td>
		<td><input type="text" name="id_sociedad" id="id_sociedad" value="<?php if($array_sociedades_sucursales["id_sociedad"]){echo $array_sociedades_sucursales["id_sociedad"];}?>" size="10"></td>
		<td><input type="text" name="id_sucursal" id="id_sucursal" value="<?php if($array_sociedades_sucursales["id_sucursal"]){echo $array_sociedades_sucursales["id_sucursal"];}?>" size="10"></td>
	</tr>
*/
?>

</table>

<?php
if($_GET["id_sociedades_sucursales"] OR $array_sociedades_sucursales["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_sociedades_sucursales" value="'.$array_sociedades_sucursales["id"].'">';
    echo '<input type="hidden" name="uuid_sociedades_sucursales" value="'.$array_sociedades_sucursales["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
