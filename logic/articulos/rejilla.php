<?php
include ("../conectar.php");

$codarticulo=$_POST["codarticulo"];
$descripcion=$_POST["descripcion"];
$codfamilia=$_POST["cboFamilias"];
$referencia=$_POST["referencia"];
$codproveedor=$_POST["cboProveedores"];
$codubicacion=$_POST["cboUbicacion"];

$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($codarticulo <> "") { 
	$where.=" AND codarticulo='$codarticulo'"; 
}
if ($descripcion <> "") { 
	$where.=" AND descripcion like '%".$descripcion."%'"; 
}
if ($codfamilia > "0") { 
	$where.=" AND codfamilia='$codfamilia'"; 
}
if ($codproveedor > "0") { 
	$where.=" AND (codproveedor1='$codproveedor' OR codproveedor2='$codproveedor')"; 
}
if ($codubicacion > "0") { 
	$where.=" AND codubicacion='$codubicacion'"; 
}
if ($referencia <> "") { 
	$where.=" AND referencia like '%".$referencia."%'"; 
}

$where.=" ORDER BY codarticulo ASC";

$query_busqueda="SELECT count(*) as filas FROM koyikun.articulos";
 //WHERE borrado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

?>
<html>
	<head>
		<title>Articulos</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		 <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
		<script language="javascript" src="rejilla.js"></script>
	</head>

	<body onload=inicio()>	
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
			<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
			<input type="hidden" name="numfilas" id="numfilas" value="<? echo $filas?>">
<? 
$iniciopagina=$_POST["iniciopagina"];
if (empty($iniciopagina)) { 
	$iniciopagina=$_GET["iniciopagina"]; 
} else { 
	$iniciopagina=$iniciopagina-1;
}

if (empty($iniciopagina)) { 
	$iniciopagina=0; 
}
if ($iniciopagina>$filas) { $iniciopagina=0; }
	if ($filas > 0) {
		$sel_resultado="SELECT * FROM koyikun.articulos";
		/* 
		WHERE borrado=0 AND ".$where;
		*/
		$sel_resultado=$sel_resultado."  limit ".$iniciopagina.",50";
		$res_resultado=mysql_query($sel_resultado);
		$contador=0;
		while ($contador < mysql_num_rows($res_resultado)) { 
			if ($contador % 2) { 
				$fondolinea="itemParTabla"; 
			} else { 
				$fondolinea="itemImparTabla";	
			}
			echo '<tr class="'.$fondolinea.'">';
			echo '<td class="aCentro" width="4%">'.($contador).'</td>';
			echo '<td width="5%"><div align="left">'.mysql_result($res_resultado,$contador,"id").'</div></td>';
			echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"codigo_interno").'</div></td>';
			echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"marca").'</div></td>';
			echo '<td width="30%"><div align="left">'.mysql_result($res_resultado,$contador,"descripcion").'</div></td>';
			echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"contenido").'</div></td>';
			echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"presentacion").'</div></td>';
			echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"clasificacion").'</div></td>';
			echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"subclasificacion").'</div></td>'.chr(10);

/*
			#--------------------------------------------
			echo '<td width="11%"><div align="left">';
			$codfamilia=mysql_result($res_resultado,$contador,"codfamilia");
			$rs_familia=mysql_query("SELECT nombre FROM familias WHERE codfamilia='$codfamilia'");
			echo mysql_result($rs_familia,0,"nombre");
			echo '</div></td>';
			#--------------------------------------------
*/
			echo '<td class="aCentro" width="11%"><div align="center">'.mysql_result($res_resultado,$contador,"precio_tienda").'</div></td>';
			echo '<td class="aCentro" width="5%">'.mysql_result($res_resultado,$contador,"stock").'</td>';
			echo '<td width="5%">
							<div align="center"><a href="#">
								<img src="../img/modificar.png" width="16" height="16" border="0" 
								onClick="modificar_articulo('.mysql_result($res_resultado,$contador,"codarticulo").')" title="Modificar">
						</a></div></td>';
			echo '<td width="5%">
					<div align="center">
							<a href="#">
								<img src="../img/ver.png" width="16" height="16" border="0" 
									onClick="ver_articulo('.mysql_result($res_resultado,$contador,"codarticulo").')" title="Visualizar">
							</a></div></td>';

			echo '<td width="5%">
							<div align="center">
								<a href="#"><img src="../img/eliminar.png" width="16" height="16" border="0" 
								onClick="eliminar_articulo('.mysql_result($res_resultado,$contador,"codarticulo").')" title="Eliminar">
						</a></div></td>';
			echo '</tr>';

		 $contador++; 
		}//end while

		echo '</table>';
	} else { 
		echo '<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>';
		echo '<tr><td width="100%" class="mensaje">No hay ning&uacute;n art&iacute;culo que cumpla con los criterios de b&uacute;squeda</td></tr>';
		echo '</table>';					
	} 
?>					
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
