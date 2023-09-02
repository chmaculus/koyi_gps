<?php
include("connect.php");
include("funciones_precios.php");

$q='select * from articulos';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
$array_precio=precio_sucursal($row["id"],1);

$codfamilia=get_codigofamilia($row["marca"]);


$query='insert into logic_production.articulos set 
codarticulo="'.$row["id"].'",
codfamilia='.$codfamilia.',
referencia="'.$row["marca"].'",
descripcion="'.$row["descripcion"].'",
impuesto="21",
datos_producto="'.$row["clasificacion"].'-'.$row["subclasificacon"].'-'.$row["contenido"].'-'.$row["presentacion"].'",
precio_almacen="'.$array_precio["precio_base"].'",
precio_tienda="'.$array_precio["precio_base"].'",
precio_pvp="'.$array_precio["precio_base"].'",
precio_iva="'.$array_precio["precio_base"].'",
codigobarras="'.$row["codigo_barra"].'"
';

echo $query.";".chr(10);
}



function get_codigofamilia($rubro){
        $q='select codfamilia from logic.familias where nombre ="'.$rubro.'"';
        $r=mysql_query($q);
        $rows=mysql_num_rows($r);
        if($rows>0){
                $codfamilia=mysql_result($r,0,0);
                return $codfamilia;

        }else{
                return 0;
        }
}




?>