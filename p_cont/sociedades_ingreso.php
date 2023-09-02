mediumint(8) unsignedvarchar(20)<?php
include("sociedades_base.php");
?>

<form method="post" action="sociedades_update.php" name="form_sociedades">

<center>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>sociedad</th>
		<td><input type="text" name="sociedad" id="sociedad" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>