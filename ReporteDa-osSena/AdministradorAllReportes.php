<?php
 include("ConexionAdmin.php");
  SESSION_START();
?>
<!DOCTYPE html>
<html lang="es">
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
		<nav class="navAdmin">
			<ul>
				<li><a href="PaginaInicio00.php"><img src="imagenes/BotonIhome.jpg"></a></li>
				<li><a href="AdministradorReporte.php"><img src="imagenes/BotonUCrear.jpg"></a></li>
				<li><a href="AdministradorEliminar.php"><img src="imagenes/BotonUEliminarr.jpg"></a></li>
				<li><a href="ControlAdministrador.php"><img src="imagenes/BotonAControl.jpg"></a></li>
				<li><a href="AdministradorVer.php"><img src="imagenes/BotonIView.jpg"></a></li>
				<li><a href="AdministradorAllReportes.php"><img src="imagenes/BotonAReportel.jpg"></a></li>
			
			</ul>
		</nav>
		<div class="NombreUsuario"><?php
                                       
                                        
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
			
			<p class="Parrafo1">Bienvenido Administrador</p>
		</aside>
		 <section id="principal">
		  <article>
			    <div>
			    	
			    	<form action="" method="POST">
			    		<fieldset>
			    			<legend><?php
			    	  
           
                     $Cedula=$_SESSION['Cedula'];
                     echo "<b style='color:orange; font-size:15px; text-shadow:3px 3px 10px aqua;'>Reportes hechos por los usuarios";
  
			    	?></legend>
			 	              <table>
			 	              	<tr>
			 	              <td>
			 	            	
			 	            		<input type="submit" class="BtnGeneral" name="Btn1" value=" Listar ">
			 	             </td>
			 	            </tr>
			 	        </table>
			 	        <div class="tablaImprimida">	
			    	
			    	<?php
                        if (isset($_POST['Btn1'])) {
                        	$btn=$_POST['Btn1'];
                        	if ($btn==" Listar "){
                             	
                             	 
                             	 $sql="SELECT * FROM reportes ORDER BY idReporte DESC";
                             	 $cs=mysql_query($sql,$con);
                             	 echo "<center>
			    		              <table class='tableBuscar' id='tableBuscar1'><tr>
			    				     <td class='Fila'>idReporte</td>
			    				     <td class='Fila'>Fecha</td>
			    				     <td class='Fila'>Foto</td>
			    				     <td class='Fila'>Estado</td>
			    				     <td class='Fila'>Descripcion</td>
			    				     <td class='Fila'>Cedula</td>
			    				     <td class='Fila'>CodElemento</td>
			    			          </tr>";
                             	 while($resul=mysql_fetch_array($cs)){
                             	 	 $var=$resul[0];
                             	 	$var1=$resul[1];
                             	 	$var2=$resul[2];
                             	 	$var3=$resul[3];
                             	 	$var4=$resul[4];
                             	 	$var5=$resul[5];
                             	 	$var6=$resul[6];
                             	 	echo "<tr>
			    				     <td>$var</td>
			    				     <td>$var1</td>
			    				     <td><img src='$var2' width=80 height=60></td>
			    				     <td>$var3</td>
			    				     <td>$var4</td>
			    				     <td>$var5</td>
			    				     <td>$var6</td>
			    			         </tr>";
                             	 }
                             	  echo "</table>
			    	                   </center>";
                             	  echo "<script>alert ('Se listo los reportes ');</script>";
                                 
                               	 }
                      
                        }
			    	?>
			    	</div>
			    	</div>
			    		</fieldset>
			    	</form>
			    	
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