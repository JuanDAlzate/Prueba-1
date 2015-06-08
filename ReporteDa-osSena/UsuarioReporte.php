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
		 <div class="NombreUsuario"><?php
                     
                    SESSION_START();
           
                     $Cedula=$_SESSION['Cedula'];
                             
                       $Consulta="SELECT Nombre FROM usuarios WHERE Cedula='$Cedula'";
                          $css=mysql_query($Consulta,$con);
                           while ($Nombre=mysql_fetch_array($css)) {
                                      echo "<b style='color:orange; font-size:25px; text-shadow:4px 5px 10px aqua;'>$Nombre[Nombre]</b>";                          
                                                                   } ?>
        </div>
		<input type="submit" class="BtnCerrarSession" value="CERRAR SESSION" onClick="location.href='cerrarSESSION.php'"/>

	   <section id="contenedor">
		 <aside id="AsideReporte0">
			
			<p class="Parrafo1">Aca Puedes Crear Tu Reporte</p>
		</aside>
		 <section id="principal">
		  <article>
			 <div class="CajaReporte">
			 	<!--Se quito la direccion para el form ProcesarR.php"-->
			 	<form action="" method="POST" enctype="multipart/form-data">
			 		<fieldset>
			 			<legend>Datos del Elemento Dañado</legend>
			 			<table>
			 				<tr>
			 				  <td><label for="Fecha">Fecha:</label> <input type="date" name="txtFecha" id="Fecha" placeholder="Fecha" class="Caja"><br>
			 				  </td>
			 	            </tr>
			 	            <tr>
			 	              <td><label for="Foto">Foto:</label> <input type="file" name="txtFoto" id="Foto" class="" required><br><br></td>
			 	            </tr>
			 	            <tr>
			 	               <td><label for="Estado">Estado:</label> 
			 	             	        <select name="txtEstado" class="Caja" id="Estado" required>
			 	             	              <option value="0"></option>
			 	             	              <option value="1">Dañado</option>
			 	             	              <option value="2">Averiado</option>
			 	                        </select><br><br>
			 	               </td>
			 	            </tr>
			 	            <tr>
			 	             <td><label for="Descripcion">Descripcion:</label> <textarea type="" id="Descripcion" name="txtDescripcion" class="Caja" required></textarea><br><br></td>
			 	            </tr>
			 	            <tr>
			 	             <td><label for="CodObjeto">Codigo objeto:</label> <select  id="CodObjeto" name="txtCodObjeto" onchange="submit()" class="Caja" required >
			 	             	                                                      <?php

			 	             	                                                        $sql="SELECT * FROM elemento";
			 	             	                                                         $query=mysql_query($sql);
			 	             	                                                         while ($Fila=mysql_fetch_array($query)) {
			 	             	                                                         	echo "<option value='".$Fila['CodElemento']."'";
                                                                                               if ($_POST['txtCodObjeto']==$Fila['CodElemento']) {
                                                                                               	    echo "SELECTED"; 
                                                                                               	   }   
                                                                                               	    echo ">";   
                                                                                               	    echo $Fila['CodElemento'];                                                                                        }
			 	             	                                                         	        echo "</option>";
			 	             	                                                         
			 	             	                                                      ?>
			 	                                                               </select><br><br></td>
			 	            </tr>
			 	              <td>
			 	            		<input type="submit" class="BtnGeneral" name="submit" value=" Crear " >
			 	            		<input type="reset" class="BtnGeneral" name="reset" value=" Borrar ">
			 	             </td>
			 	            </tr>
			 	        </table>
			 	    </fieldset>
			 	 </form>
			 	  <?php 
			 	       SESSION_START();

           
                        $Cedula=$_SESSION['Cedula'];
                      if(isset($_POST['submit']))
                      {
                        
                      	$btn=$_POST['submit'];
                      	 if ($btn==" Crear ") {

                      	 	    $tFecha=$_POST['txtFecha'];
                      	 	    
                                $ruta="ImgElementos";
                                $archivo=$_FILES['txtFoto']['tmp_name'];
                                $nombreArchivo=$_FILES['txtFoto']['name'];
                                move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
                                $ruta=$ruta."/".$nombreArchivo;
                                
                                $tEstado=$_POST['txtEstado'];
                                
                                
                                $tDescripcion=$_POST['txtDescripcion'];
                                
                                $tElemento=$_POST['txtCodObjeto'];
                             	 
                             	 $sql="INSERT INTO reportes(Fecha,Foto,Estado,Descripcion,Cedula,CodElemento) values('$tFecha','$ruta','$tEstado','$tDescripcion','$Cedula','$tElemento')";
                             	 $cs=mysql_query($sql,$con);
                             	  echo "<script>alert ('Se insertaron datos');</script>";
                      	 }
                      }
			 	  ?>
			 </div>
		  </article>

	    </section>
		<aside id="AsideReporte1">
			<p class="Parrafo"> Login</p>
			
		</aside>
	</section>
	<footer>
		<p>CDTCI</p>
	</footer>
	 
</body>
</html>