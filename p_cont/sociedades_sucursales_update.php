<?php
include_once("sociedades_sucursales_base.php");



include("../includes/connect.php");
echo '<br>';
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into sociedades_sucursales set
		id_sociedad="'.$_POST["sociedad"].'",
		id_sucursal="'.$_POST["id_sucursal"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_sociedades_sucursales=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from sociedades_sucursales where id="'.$id_sociedades_sucursales.'"';
	$array_sociedades_sucursales=mysql_fetch_array(mysql_query($query));
	include("sociedades_sucursales_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_sociedades_sucursales=$_POST["id_sociedades_sucursales"];
		
		$query='update sociedades_sucursales set
		id_sociedad="'.$_POST["sociedad"].'",
		id_sucursal="'.$_POST["id_sucursal"].'"
				where id="'.$id_sociedades_sucursales.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from sociedades_sucursales where id="'.$id_sociedades_sucursales.'"';
	$array_sociedades_sucursales=mysql_fetch_array(mysql_query($query));
	include("sociedades_sucursales_muestra.inc.php");
}
#---------------------------------------------------------------------------------



?>





<?php
if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}
if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from sociedades_sucursales where id="'.$id_sociedades_sucursales.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
