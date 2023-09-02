<?php
include("inf_contable_base.php");
include("../includes/connect.php");
echo '<br>';

$fecha=date("Y-n-d");
$hora=date("H:i:s");



$arr=explode("/",$_POST["fecha"]);
$fecha_in=$arr[2]."-".$arr[1]."-".$arr[0];

/*
echo "a".$_POST["fecha"]."<br>";
echo "b".$fecha_in."<br>";
*/


#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into inf_contable set
		tipo1="'.$_POST["tipo1"].'",
		sociedad="'.$_POST["sociedad"].'",
		proveedor="'.$_POST["proveedor"].'",
		tipo2="'.$_POST["tipo2"].'",
		fecha="'.$fecha_in.'",
		fecha_sistema="'.$fecha.'",
		tipo3="'.$_POST["tipo3"].'",
		importe="'.$_POST["importe"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_inf_contable=mysql_insert_id($id_connection);


//echo "<br>".$query."<br>";
	#muestra registro ingresado
	$query='select * from inf_contable where id="'.$id_inf_contable.'"';
	$array_inf_contable=mysql_fetch_array(mysql_query($query));
	include("inf_contable_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_inf_contable=$_POST["id_inf_contable"];
		
		$query='update inf_contable set
		tipo1="'.$_POST["tipo1"].'",
		sociedad="'.$_POST["sociedad"].'",
		proveedor="'.$_POST["proveedor"].'",
		tipo2="'.$_POST["tipo2"].'",
		fecha="'.$fecha_in.'",
		fecha_sistema="'.$fecha.'",
		tipo3="'.$_POST["tipo3"].'",
		importe="'.$_POST["importe"].'"
				where id="'.$id_inf_contable.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

//echo "<br>".$query."<br>";
	#muestra registro ingresado
	$query='select * from inf_contable where id="'.$id_inf_contable.'"';
	$array_inf_contable=mysql_fetch_array(mysql_query($query));
	include("inf_contable_muestra.inc.php");
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
 	$query='delete from inf_contable where id="'.$id_inf_contable.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
