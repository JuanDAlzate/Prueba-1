
<?php
 include("ConexionAdmin.php");
 error_reporting(E_ALL ^ E_NOTICE);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina Oficial</title>
	<link rel="stylesheet" href="css/stylo2.css">

	<meta name="description" content="Estructura basica de diseño html5 con response design">
	<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
</head>
<body>
	
	<div><h1>Reporte de daños SENA CDTCI</h1> <img class="logo" src="imagenes/sena.png" alt=""></div>
	<header>
		<figure>
			<img src="imagenes/Banner-Reporte.jpg" alt="">
		</figure>
	</header>
		<nav>
			<ul>
				<li><a href="PaginaInicio00.php"><img src="imagenes/BotonIhome.jpg"></a></li>
				<li><a href="UsuarioReporte.php"><img src="imagenes/BotonUCrear.jpg"></a></li>
				<li><a href="UsuarioEliminar.php"><img src="imagenes/BotonUEliminarr.jpg"></a></li>
				<li><a href="UsuarioVer.php"><img src="imagenes/BotonIView.jpg"></a></li>
				
				
					
				
			</ul>
		</nav>
		<div class="NombreUsuario">
		 	<?php
                     
                    SESSION_START();
           
                     $Cedula=$_SESSION['Cedula'];
                             
                       $Consulta="SELECT Nombre FROM usuarios WHERE Cedula='$Cedula'";
                        $css=mysql_query($Consulta,$con);
                         while ($Nombre=mysql_fetch_array($css)) {
                             echo "<b style='color:orange; font-size:25px; text-shadow:4px 5px 10px aqua;'>$Nombre[Nombre]</b>";                          
                                                                   } 
               ?>
        </div>
		<input type="submit" class="BtnCerrarSession" value="CERRAR SESSION" onClick="location.href='cerrarSESSION.php'" />
		
	   <section id="contenedor">
		 <aside id="FotosDocumentos">
			
			<p class="Parrafo1">Centro para el desarrollo tecnologico de la construccion y la industria</p>
		</aside>
		 <section id="principal">
		  <article>
			 <div class="slider">
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<div class="contenedor-imagenes cuatro-imagenes">
			 		<img src="imagenes/1Slider.jpg" height="450px" width="400px" alt="">
			 		<img src="imagenes/s1.jpg" height="450px" width="400px" alt="">
			 		<img src="imagenes/s2.jpg" height="450px" width="400px" alt="">
			 		<img src="imagenes/vigo-reparaciones.jpg" height="450px" width="400px" alt="">
			 	</div>
			 </div>
		  </article>
	    </section>
		<aside id="FotosDocumentos2">
			
			
		</aside>
	</section>
	<footer>
		<p>CDTCI</p>
	</footer>
	 
</body>
</html>