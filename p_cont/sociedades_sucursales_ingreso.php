include_once("sociedades_sucursales_base.php");




<form method="post" action="sociedades_sucursales_update.php" name="form_sociedades_sucursales">

<center><br>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>id_sociedad</th>
		<td><input type="text" name="id_sociedad" id="id_sociedad" value="" size="10"></td>
	</tr>
	<tr>
		<th>id_sucursal</th>
		<td><input type="text" name="id_sucursal" id="id_sucursal" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>