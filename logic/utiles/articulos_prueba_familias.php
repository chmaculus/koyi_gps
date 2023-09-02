<?php
include("connect.php");
$q='select distinct marca from koyikun.articulos';
$r=mysql_query($q);
if(mysql_error()){echo mysql_error();}
while($row=mysql_fetch_array($r)){
	$q2='insert into familias set nombre="'.$row["marca"].'";';
	echo $q2.chr(10);
//	mysql_query($q2);
}
?>