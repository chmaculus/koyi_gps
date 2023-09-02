<?php
include("inf_contable_base.php");
include("../includes/connect.php");
?>

<link type="text/css" href="../includes/fecha_desde_hasta/js/css/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/ui.core.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/i18n/ui.datepicker-es.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/funciones.js"> </script>
        
<br>



<?php
if($_GET["id_inf_contable"]){
    include_once("connect.php");
    $query='select * from inf_contable where id="'.$_GET["id_inf_contable"].'"';
    $array_inf_contable=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_inf_contable"]){
    include_once("connect.php");
    $query='select * from inf_contable where uuid="'.$_GET["uuid_inf_contable"].'"';
    $array_inf_contable=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="inf_contable_update.php" name="form_inf_contable">

<center>
<table class="t1" border="1">

	<tr>
		<th>tipo1</th>
		<td>
		<?php include("./includes/tipo1.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>sociedad</th>
		<td>
		<?php include("./includes/sociedades.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>proveedor</th>
		<td>
		<?php include("./includes/proveedores.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>tipo2</th>
		<td>
		<?php include("./includes/tipo2.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="<?php if($array_inf_contable["fecha"]){echo $array_inf_contable["fecha"];}?>" size="10"></td>
	</tr>
	</tr>
	<tr>
		<th>importe</th>
		<td><input type="text" name="importe" id="importe" value="<?php if($array_inf_contable["importe"]){echo $array_inf_contable["importe"];}?>" size="10"></td>
	</tr>

</table>


</table>

<?php
if($_GET["id_inf_contable"] OR $array_inf_contable["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_inf_contable" value="'.$array_inf_contable["id"].'">';
    echo '<input type="hidden" name="uuid_inf_contable" value="'.$array_inf_contable["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
