<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

include ("../conectar.php");

$cadena_busqueda=$_GET["cadena_busqueda"];

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=split("~",$cadena_busqueda);
	$codarticulo=$array_cadena_busqueda[1];
	$referencia=$array_cadena_busqueda[2];
	$codfamilia=$array_cadena_busqueda[3];
	$descripcion=$array_cadena_busqueda[4];
	$codproveedor=$array_cadena_busqueda[5];
	$codubicacion=$array_cadena_busqueda[6];
} else {
	$codarticulo="";
	$referencia="";
	$codfamilia="";
	$descripcion="";
	$codproveedor="";
	$codubicacion="";
}

?>
<html>
	<head>
		<title>Articulos</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript" src="./funciones.js"></script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar ARTICULO </div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
							<td width="16%">C&oacute;digo de art&iacute;culo </td>
							<td width="68%"><input id="codarticulo" type="text" class="cajaPequena" NAME="codarticulo" maxlength="15" value="<? echo $codarticulo?>" readonly> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>
						<tr>
							<td>Referencia</td>
							<td><input id="referencia" name="referencia" type="text" class="cajaGrande" maxlength="20" value="<? echo $referencia?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<?php
					  	$query_familias="SELECT * FROM familias ORDER BY nombre ASC";
						$res_familias=mysql_query($query_familias);
						$contador=0;
					  ?>
						<tr>
							<td>Familia</td>
							<td><?php include("familias.inc.php");?></td>
					    </tr>
						<tr>
							<td>Descripci&oacute;n</td>
							<td><input id="descripcion" name="descripcion" type="text" class="cajaGrande" maxlength="60" value="<? echo $descripcion?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr><?php include("proveedores.inc.php"); ?></tr>
					<tr><?php include("ubicaciones.inc.php"); ?></tr>
					</table>
			  </div>
					<div id="botonBusqueda"><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar_busqueda()" onMouseOver="style.cursor=cursor">
					 <img src="../img/botonnuevoarticulo.jpg" width="111" height="22" border="1" onClick="nuevo_articulo()" onMouseOver="style.cursor=cursor">
					<img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor"></div>				
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N de articulos encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()"></select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">relacion de ARTICULOS </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="4%">ID</td>
							<td width="5%">COD INT</td>
							<td width="19%">MARCA</td>
							<td width="30%">DESCRIPCION </td>
							<td width="11%">CONTENIDO</td>
							<td width="11%">PRESENTACION</td>
							<td width="11%">CLASIFICACION</td>
							<td width="11%">SUB CLASIF</td>
							<td width="11%">PRECIO T.</td>
							<td width="5%">STOCK</td>
							<td width="5%">STOCK</td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						</tr>
				</table>
				</div>
				<input type="hidden" id="iniciopagina" name="iniciopagina">
				<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
			</form>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">
						<ilayer width="100%" height="250" id="frame_rejilla" name="frame_rejilla"></ilayer>
					</iframe>
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
