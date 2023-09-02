		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function inicio() {
			document.getElementById("form_busqueda").submit();
		}
		function nuevo_articulo() {
			location.href="nuevo_articulo.php";
		}
		
		function imprimir() {
			var codarticulo=document.getElementById("codarticulo").value;
			var referencia=document.getElementById("referencia").value;
			var descripcion=document.getElementById("descripcion").value;
			var proveedores=document.getElementById("cboProveedores").value;			
			var familia=document.getElementById("cboFamilias").value;
			var ubicacion=document.getElementById("cboUbicacion").value;
			window.open("../fpdf/articulos.php?codarticulo="+codarticulo+"&referencia="+referencia+"&descripcion="+descripcion+"&proveedores="+proveedores+"&familia="+familia+"&ubicacion="+ubicacion);
		}
		
		function limpiar_busqueda() {
			document.getElementById("codarticulo").value="";
			document.getElementById("referencia").value="";
			document.getElementById("descripcion").value="";
			document.form_busqueda.cboFamilias.options[0].selected = true;
			document.form_busqueda.cboProveedores.options[0].selected = true;
			document.form_busqueda.cboUbicacion.options[0].selected = true;
		}
		
		function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();
			document.getElementById("cadena_busqueda").value=cadena;
			if (document.getElementById("iniciopagina").value=="") {
				document.getElementById("iniciopagina").value=1;
			} else {
				document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			}
			document.getElementById("form_busqueda").submit();
		}
		
		function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}
		
		function hacer_cadena_busqueda() {
			var codarticulo=document.getElementById("codarticulo").value;
			var referencia=document.getElementById("referencia").value;
			var descripcion=document.getElementById("descripcion").value;
			var proveedores=document.getElementById("cboProveedores").value;			
			var familia=document.getElementById("cboFamilias").value;
			var ubicacion=document.getElementById("cboUbicacion").value;
			var cadena="";
			cadena="~"+codarticulo+"~"+referencia+"~"+familia+"~"+descripcion+"~"+proveedores+"~"+ubicacion+"~";
			return cadena;
			}
		
		function ventanaArticulos(){
			miPopup = window.open("ventana_articulos.php","miwin","width=700,height=500,scrollbars=yes");
			miPopup.focus();
		}
