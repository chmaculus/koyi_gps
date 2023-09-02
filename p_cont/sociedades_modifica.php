<?php
include("sociedades_base.php");
include("../includes/connect.php");

if($_GET["id_sociedades"]){
    include_once("connect.php");
    $query='select * from sociedades where id="'.$_GET["id_sociedades"].'"';
    $array_sociedades=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_sociedades"]){
    include_once("connect.php");
    $query='select * from sociedades where uuid="'.$_GET["uuid_sociedades"].'"';
    $array_sociedades=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="sociedades_update.php" name="form_sociedades">

<center>
<table class="t1" border="1">
	<tr>
		<th>sociedad</th>
		<td><input type="text" name="sociedad" id="sociedad" value="<?php if($array_sociedades["sociedad"]){echo $array_sociedades["sociedad"];}?>" size="10"></td>
	</tr>

</table>


<?php
if($_GET["id_sociedades"] OR $array_sociedades["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_sociedades" value="'.$array_sociedades["id"].'">';
    echo '<input type="hidden" name="uuid_sociedades" value="'.$array_sociedades["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
