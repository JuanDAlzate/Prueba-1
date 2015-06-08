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
	<script languaje="javascript" src="js/Validation.js"></script>

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
			
			<p class="Parrafo1">Bienvenido Administrador</p>
		</aside>
		 <section id="principal">
		  <article>
			    <div>
			    	<?php
			    	  
                       SESSION_START();
           
                       $Cedula=$_SESSION['Cedula'];
                       echo "$Cedula";


                          
			    	                 $var="";
                             	 	 $var1="";
                             	 	 $var2="";
                             	 	 $var3="";
                             	 	 $var4="";
                             	 	 $var5=""; 
                             	 	 $var6="";

                         if(isset($_POST["Btn1"])){
                             $btn=$_POST["Btn1"];
                             $CampoBuscar=$_POST["SelectCodigo"];
                             if ($btn==" Buscar reporte dañado ")
                              {
                             	 $sql="SELECT * FROM reportes WHERE CodElemento='$CampoBuscar'";
                             	 $cs=mysql_query($sql,$con);
                             	 while($resul=mysql_fetch_array($cs)) {
                             	 	  $var=$resul[0];
                             	 	 $var1=$resul[1];
                             	 	 $var2=$resul[2];
                             	 	 $var3=$resul[3];
                             	 	 $var4=$resul[4];
                             	 	 $var5=$resul[5]; 
                             	 	 $var6=$resul[6];
                             	 	 echo "<script> alert ('Datos buscados');</script>";
                             	 }
                               	 if ($var3=="1") {
                               	 	 $var3="selected";
                               	 }
                             }

                            if($btn==" Crear "){
                             	$tFecha=$_POST['txtFecha'];
                                $ruta="ImgElementos";
                                $archivo=$_FILES['txtFoto']['tmp_name'];
                                $nombreArchivo=$_FILES['txtFoto']['name'];
                                move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
                                $ruta=$ruta."/".$nombreArchivo;
                                echo $ruta;
                                $tEstado=$_POST['txtEstado'];
                                $tDescripcion=$_POST['txtDescripcion'];
                                $tElemento=$_POST['txtCodElemento'];
                             	 
                             	 $sql="INSERT INTO reportes(Fecha,Foto,Estado,Descripcion,Cedula,CodElemento) values('$tFecha','$ruta','$tEstado','$tDescripcion','$Cedula','$tElemento')";
                             	 $cs=mysql_query($sql,$con);
                             	  echo "<script>alert ('Se insertaron datos');</script>";
                             	  }
                             	
                               	  if ($btn==" Actualizar "){

                             	       $tFecha=$_POST['txtFecha'];
                                     $tFoto=$_POST['txtFoto'];
                                     $tEstado=$_POST['txtEstado'];
                                     $tDescripcion=$_POST['txtDescripcion'];
                                     $tElemento=$_POST['txtCodElemento'];
                                     $idElemento=$_POST['txtIdElemento'];
                                     $Obrero=$_POST['txtEncargado'];
                             	 
                             	     $sql="UPDATE reportes SET Fecha='$tFecha',Foto='$tFoto',Estado='$tEstado',Descripcion='$tDescripcion',Obreros='$Obrero' WHERE idReporte=' $idElemento'";
                             	     $cs=mysql_query($sql,$con);
                             	     echo "<script>alert ('Se Actualizo el reporte ');</script>";
                                     header("Location:AdministradorVer.php");  
                               	 }
                               	  
                                  if($btn==" Eliminar "){                             	
                                    $tElemento=$_POST['txtIdElemento'];                             	 
                             	     $sql="DELETE FROM reportes WHERE idReporte='$tElemento'";
                             	     $cs=mysql_query($sql,$con);
                             	     echo "<script>alert ('Se Eliminaron los datos');</script>";
                             	  
                             	 
                             	 }
                               	 
                             }
                          
			    	?>
			    	
			    	<form action="" method="POST" enctype="multipart/form-data">
			    		<fieldset>
			    			<legend>Tramitar reporte:<?php echo $_POST['SelectCodigo']?></legend>
                             <table>
                              <tr>
                              	<td>Codigo de Objetos dañados: <select name="SelectCodigo" class="CajaTXTcodElemento" onchange="submit()" id="">
                                		<?php
                                		  
                                           $sql="SELECT * FROM reportes WHERE estado='1'";
                                           $cs=mysql_query($sql);
                                           while($Fila=mysql_fetch_array($cs)) {
                                                
                                           echo "<option value='".$Fila['CodElemento']."'";
                                           if($_POST['SelectCodigo']==$Fila['CodElemento']) {
                                           	 echo "SELECTED";
                                           }
                                           echo ">";
                                           echo $Fila['CodElemento'];
                                           echo "</option>";
                                           }
                                           ?>


                            </select><br><br> <input type="submit" class="BtnGeneral" name="Btn1" value=" Buscar reporte dañado " ><br><br>
                                </td>
                                <tr>
                                    <td>
                                        <label for="Encargado">Seleccione encargado:</label><select id="Encargado" name="txtEncargado" class="CajaArea" onchange="submit()" value=""/>
                                            <?php
                                             $sql="SELECT * FROM usuarios WHERE Cargo='3'";
                                              $cs=mysql_query($sql);
                                               while ($fila=mysql_fetch_array($cs)) {
                                                     echo "<option value='".$fila['Cedula']."'";
                                                     if($_POST['txtEncargado']==$fila['Nombre']) {
                                                           echo "SELECTED";
                                                     }
                                                     echo ">";
                                                     echo $fila['Nombre'];
                                                     echo "</option>";
                                               }
                                                
                                            ?>
                                        </select><br>
                                    </td>
                                </tr>
                                <td>
                                	
                                	</select>
                                </td>
                              <tr>
			 				  <td><label for="Fecha">Fecha:</label> <input type="date" name="txtFecha" id="Fecha" class="Caja" value="<?php echo $var1?>"><br><br>
			 				  </td>
			 	            </tr>
			 	            <tr>
			 				  <td><label for="Foto">Foto:</label> <input type="file" name="txtFoto" id="Foto" class="Caja" value="<?php echo $var2?>"><br><br>
			 				  </td>
			 	            </tr>

			 	            <tr>
			 	              <td><label for="Estado">Estado:</label> 
			 	             	        <select name="txtEstado" class="Caja" id="Estado" required>
			 	             	              <option value="0"></option>
			 	             	              <option value="1">Dañado</option>
			 	             	              <option value="2">Averiado</option>
			 	             	              <option value="3">Arreglado</option>
			 	                        </select><br><br>
			 	              </td>
			 	             </tr>
			 	             <tr>
			 	             <td><label for="Descripcion">Descripcion:</label> <input type="text" id="Descripcion" name="txtDescripcion" class="CajaArea" weigth="5px" value="<?php echo $var4?>" /><br><br></td>
			 	            </tr>
			 	             <tr>
			 	             <td><label for="CodObjeto">Codigo elemento:</label> <select id="CodObjeto" onchange="submit()" name="txtCodElemento" class="Caja" /><br>
			 	                    <?php
                                         
                                         $sql="SELECT * FROM elemento";
                                         $rec=mysql_query($sql);
                                         while ($row=mysql_fetch_array($rec)) {
                                         echo "<option value='".$row['CodElemento']."' ";
                                         if ($_POST['txtCodElemento']==$row['CodElemento']) 
                                         	echo "SELECTED";
                                         	echo ">";
                                         echo $row['CodElemento'];
                                         echo "</option>";
                                         }

                                     ?>

			 	             </td>
			 	             <br>	
			 	             <tr>
			 	             <td><label for="IdObjeto">Id reporte:</label> <input type="text" id="IdObjeto" name="txtIdElemento" class="Caja" value="<?php echo $var?>" /><br><br>
                             
			 	            </td>
			 	            </tr>
			 	            <tr>
			 	              <td>
			 	            		<input type="submit" class="BtnGeneral" name="Btn1" value=" Crear " >
			 	            		<input type="submit" class="BtnGeneral" name="Btn1" value=" Actualizar " onclick="return validarActualizar()" >
			 	            		<input type="submit" class="BtnGeneral" name="Btn1" value=" Eliminar ">
			 	            		<input type="submit" class="BtnGeneral" name="Btn1" value=" Listar ">
			 	             </td>
			 	            </tr>
			 	        </table>
			 	        
			    		</fieldset>
			    	</form>
			    	<div id="ListaAdministrador">
			    		<h1 style="color:orange; text-shadow:5px 5px 40px yellow,
			    		                                     -5px -5px 20px aqua;">Todos los reportes</h1>
			    	<div>	
			    	
			    	<?php
                       if ($_POST['Btn1']) {
                            $button=$_POST['Btn1'];
                             if ($button==" Listar ") {
                               # code...
                             $sql="SELECT * FROM reportes ORDER BY idReporte DESC";
                             	 $cs=mysql_query($sql,$con);
                             	 echo "<center>
			    		              <table border='1' class='tableBuscar'>
			    		              <tr>
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