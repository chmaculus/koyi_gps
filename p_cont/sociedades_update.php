<?php
include("sociedades_base.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");

include("../includes/connect.php");

#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into sociedades set
		id="'.$_POST["id"].'",
		sociedad="'.$_POST["sociedad"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_sociedades=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from sociedades where id="'.$id_sociedades.'"';
	$array_sociedades=mysql_fetch_array(mysql_query($query));
	include("sociedades_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_sociedades=$_POST["id_sociedades"];
		
		$query='update sociedades set
		id="'.$_POST["id"].'",
		sociedad="'.$_POST["sociedad"].'"
				where id="'.$id_sociedades.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from sociedades where id="'.$id_sociedades.'"';
	$array_sociedades=mysql_fetch_array(mysql_query($query));
	include("sociedades_muestra.inc.php");
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
 	$query='delete from sociedades where id="'.$id_sociedades.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
