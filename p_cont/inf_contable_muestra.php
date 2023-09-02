
<?php
include("inf_contable_base.php");
include("../includes/connect.php");
echo '<br>';
#muestra registro ingresado
$query='select * from inf_contable where id="'.$id_inf_contable.'"';
$array_inf_contable=mysql_fetch_array(mysql_query($query));

include("inf_contable_muestra.inc.php");
?>

