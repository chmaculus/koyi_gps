<?php
include("inf_contable_base.php");
?>

<link type="text/css" href="../includes/fecha_desde_hasta/js/css/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/ui.core.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/i18n/ui.datepicker-es.js"></script>
<script type="text/javascript" src="../includes/fecha_desde_hasta/js/funciones.js"> </script>
        
<br>


<form method="post" action="inf_contable_update.php" name="form_inf_contable">

<center>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>tipo1</th>
		<td><input type="text" name="tipo1" id="tipo1" value="" size="10"></td>
	</tr>
	<tr>
		<th>sociedad</th>
		<td><input type="text" name="sociedad" id="sociedad" value="" size="10"></td>
	</tr>
	<tr>
		<th>proveedor</th>
		<td><input type="text" name="proveedor" id="proveedor" value="" size="10"></td>
	</tr>
	<tr>
		<th>tipo2</th>
		<td><input type="text" name="tipo2" id="tipo2" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_sistema</th>
		<td><input type="text" name="fecha_sistema" id="fecha_sistema" value="" size="10"></td>
	</tr>
	<tr>
		<th>importe</th>
		<td><input type="text" name="importe" id="importe" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>