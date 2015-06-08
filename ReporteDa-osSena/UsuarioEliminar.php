
<?php
 include("ConexionAdmin.php");
 error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pagina Oficial</title>
	<link rel="stylesheet" href="css/stylo2.css">

	<meta name="description" content="Estructura basica de diseño html5 con response design">
	<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<script>
           function Eliminar(){
             var TxtCargo=document.getElementById("CampoEliminar").value;
                 if(TxtCargo=="")
             {
           	     alert("Llene el cargo para eliminar");
           	     return false;
           	 }
           }
        
	</script>
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
		 <div class="NombreUsuario"><?php
                     
                    SESSION_START();
           
                     $Cedula=$_SESSION['Cedula'];
                             
                       $Consulta="SELECT Nombre FROM usuarios WHERE Cedula='$Cedula'";
                          $css=mysql_query($Consulta,$con);
                           while ($Nombre=mysql_fetch_array($css)) {
                                      echo "<b style='color:orange; font-size:25px; text-shadow:4px 5px 10px aqua;'>$Nombre[Nombre]</b>";                          
                                                                   } ?>
        </div>
				<input type="submit" class="BtnCerrarSession" value="CERRAR SESSION" onClick="location.href='cerrarSESSION.php'" />
		
	   <section id="contenedor">
		 <aside id="AsideSolo0">
			
			<p class="Parrafo1">SENA<br> Aca puedes eliminar todos tus reportes</p>
		</aside>
		 <section id="principal">
		  <article>
		  	     <form action="" method="POST">
		  	     	<fieldset>
		  	     		<legend>Eliminar Datos</legend>
		  	     		 <table>
		  	     		 	<tr>
		  	     		 		<td><label for="Eliminar">Eliminar Reporte con Id:</label></td>
		  	     		 		<td><input type="text" name="Fecha" id="CampoEliminar" class="Caja">  <input type="submit" name="BtnEliminar" class="BtnGeneral" onclick="Eliminar()" value=" Eliminar "> <input type="reset" name="reset" class="BtnGeneral" value=" Borrar "></td>
                           </tr>
                           <tr>
		  	     		 		<td><input type="submit" class="BtnGeneral"name="BtnBuscar" value=" Buscar reportes "><br><br></td>
		  	     		   </tr>
		  	     		 </table>
		  	     	</fieldset>
		  	     </form>
		  	     <div id="VistaEliminar">
		  	     	<div>
		  	         <?php
                 if(isset($_POST['BtnEliminar'])){
                    include("ProcesarEliminar.php");
                 }
   
                 if(isset($_POST['BtnBuscar'])){
                    include("conexion.php");
                    $Con=new conexion();
                    $Con->recuperarDatos();
             }
                 ?>
                       </div>
                    </div>
                 
		  </article>
	    </section>
		<aside id="AsideSolo1">
			
			</aside>
	</section>0
	<footer>
		<p>CDTCI</p>
	</footer>
	 
</body>
</html>
             