
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
	
	<script>
    function ValidarEncargado(txtEstado){

               var id=document.getElementById("ID").value;
                if (id=="") {
                  alert("Ingrese un Id ");
                  return false;
                }
                if (id !=parseInt(id)) {
                	alert("Ingrese un numero en el id");
                }

                if (txtEstado.value=="0") {
                	alert("Ingrese un Estado");
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
		<nav class="navEncargado">
			<ul>
				<li><a href="PaginaInicio00.php"><img src="imagenes/BotonIhome.jpg"></a></li>
				<li><a href="EncargadoAllReporte.php"><img src="imagenes/BotonAtender.jpg"></a></li>
				<li><a href="ControlEncargado.php"><img src="imagenes/BotonAllreportesE.jpg"></a></li>
				
				
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
		 <aside id="EncargadoPrincipal">
		 	<div class="CajaUpdateEncargado">
		 		<form action="" method="POST" enctype="multipart/form-data">
			 Atender: <input type="submit" name="btnActualizar" id="idReporte" class="BtnGeneral" value=" Reparado " onclick="return ValidarEncargado(txtEstado)"/><br><br>
			 Ingrese el idReporte <input type="text" name="Idreporte" id="ID" placeholder="IdReporte" class="Caja"/><br><br>
			 Estado del reporte:  <select name="txtEstado" id="ListCodigo" class="Caja" id="Estado" required>
			 	             	              <option value="0"></option>
			 	             	              <option value="1">Dañado</option>
			 	             	              <option value="2">Averiado</option>
			 	             	              <option value="3">Arreglado</option>
			 	                        </select><br><br>
			 Elemento reparado:<input type="file" name="txtFoto" required >
			 <?php
			    include 'conexion.php';
			         SESSION_START();
           
                     $Cedula=$_SESSION['Cedula'];
                     echo "Cedula Ecargado: ".$Cedula."<br>";
                       
                     
                       
                       	           
                                 $sql="SELECT * FROM `reportes` WHERE Obreros='$Cedula' ORDER BY `Obreros` ASC";
                             	 $cs=mysql_query($sql,$con);
                             	
                             	 while($fila=mysql_fetch_array($cs)){
                             	 	   

                             	 	   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>idReporte:</b> $fila[idReporte]<br>";
            	                       echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Fecha del reporte:</b> $fila[Fecha]<br>";
            	                       echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Elemento dañado:</b> <img src='".$fila['Foto']."' width=100 height=50><br>";
            	                       echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Estado:</b> $fila[Estado]<br>";
            	                       echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Descripcion:</b> $fila[Descripcion]<br>";
                                       echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Codigo Elemento:</b> $fila[CodElemento]<br>";
                                       echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Cedula:</b> $fila[Cedula]<br>";
                                       echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Encargado:</b> $fila[Obreros]<br>";
                                      
                                       echo "<hr></hr>";


			    			     }
			    			     if(isset($_POST['btnActualizar'])){
			    			     	 $btnActualizarEncargado=$_POST['btnActualizar'];
			    			     	  if ($btnActualizarEncargado==" Reparado ") {

			    			     	  	 $idReporte=$_POST['Idreporte'];
			    			     	  	 $Estado=$_POST['txtEstado'];
                                         $ruta="ImgElementos";
                                         $archivo=$_FILES['txtFoto']['tmp_name'];
                                         $nombreArchivo=$_FILES['txtFoto']['name'];
                                         move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
                                         $ruta=$ruta."/".$nombreArchivo;
                                         

                                             $sql="UPDATE reportes SET Estado='$Estado',ElementoReparado='$ruta' WHERE idReporte='$idReporte'";
                             	              $cs=mysql_query($sql,$con);
                             	              /*echo "<script>alert ('Se Actualizo el reporte');</script>";
			    			     	  	     /* header("Location:EncargadoAllReporte.php");	    		     	 
			    			     	  	       */	} 
			    			     	  	        }
			    			     	  	        
                      ?>
			    </form>


			 </div>
			<p class="Parrafo1">Actualiza e ingresa los datos del reporte que has reparado</p>
		</aside>
		 <section id="principalEncargado">
		  <article>
		  	   <div id="VistaEncargado">

			</div>
		 </article>
	    </section>
		
	</section>
	<footer>
		<p>CDTCI</p>
	</footer>
	 
</body>
</html>