<?php

include("cabecera.inc.php");
include("../includes/connect.php");
echo '<br><center>';


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("./includes/sociedades.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';

if(!$_POST["sociedad"]){
	exit;
}

$fecha=date("Y-n-d");
$anio=date("Y-");


$query="select * from inf_contable limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<center><table class="t1">';
echo "<tr>";
	echo "<th></th>";
	echo "<th>CO</th>";
	echo "<th>PROFA</th>";
	echo "<th>FA</th>";
	echo "<th>TA</th>";
	echo "<th>DIF</th>";
echo "</tr>";


for($i=1;$i<=12;$i++){
	echo '<tr>';
	echo '<td>'.$anio.$i.'</td>';
	$fecha_desde=$anio.$i.'-01';
	$fecha_hasta=$anio.$i.'-31';
	$q='select sum(importe) from inf_contable where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and sociedad="'.$_POST["sociedad"].'" and tipo1="co"';
	$co=mysql_result(mysql_query($q),0,0);
	echo '<td>'.$co.'</td>';
	//echo '<td>'.$q.'<td>';

	echo '<td>'.round((($co*0.4)+$co),2).'</td>';

	$q='select sum(importe) from inf_contable where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and sociedad="'.$_POST["sociedad"].'" and tipo1="fa"';
	$fa=mysql_result(mysql_query($q),0,0);
	echo '<td>'.$fa.'</td>';
	//echo '<td>'.$q.'<td>';

	$q='select sum(importe) from inf_contable where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and sociedad="'.$_POST["sociedad"].'" and tipo1="ta"';
	$ta=mysql_result(mysql_query($q),0,0);
	echo '<td>'.$ta.'</td>';
	echo '<td>'.($fa-$ta).'</td>';
	//echo '<td>'.$q.'<td>';
	echo '</tr>';
	
}



?>
</table></center>
