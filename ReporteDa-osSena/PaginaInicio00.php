<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pagina Oficial</title>
	<link rel="stylesheet" href="css/stylo2.css">

	<meta name="description" content="Estructura basica de diseño html5 con response design">
	<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<script src ='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
	   $(document).ready(function(){
	   	 $('#Mostrar').click(function(){
	   	 	$('.contenedor, .contenedorForm').fadeIn(1000);
	   	 })
	   	 $('#Cerrar').click(function(){
	   	 	$('.contenedor, .contenedorForm').fadeOut(1000);
	   	 })
	   	
	   })
	    function CerrarVentana(){
	    	$(".contenedor").slideUp("fast");
	    }
	</script>
	<style type="text/css">

	</style>

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
					<li><a href="GaleriaHome.html"><img src="imagenes/BotonIGallery.jpg"></a></li>
					<li><a href=""><img src="imagenes/BotonIPersonal.jpg"></a></li>
					<li><a href=""><img src="imagenes/BotonINosotrosl.jpg"></a></li>
				
			</ul>
		</nav>
		
	   <section id="contenedor">
		 <aside id="FotosDocumentos">
			
			 <button id="Mostrar" class="Button">
			 	Iniciar sesion
			 </button>
			  <button id="Cerrar" class="Button">
			 	Cerrar sesion
			 </button>
			 
			<p class="Parrafo1">Centro para el desarrollo tecnologico de la construccion y la industria</p>
		</aside>
		 <section id="principal">
		  <article>
			 <!--<div class="slider">
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<input type="radio" class="boton" name="boton" checked="checked">
			 	<label></label>
			 	<div class="contenedor-imagenes cuatro-imagenes">
			 		<img src="imagenes/vigo-reparaciones.jpg" height="450px" width="400px" alt="">
			 		<img src="imagenes/s1.jpg" height="450px" width="400px" alt="">
			 		<img src="imagenes/s2.jpg" height="450px" width="400px" alt="">
			 		<img src="imagenes/Reparp.jpg" height="450px" width="400px" alt="">
			 	</div>
			 </div>-->
			 <div class="contenedor">
			 	<div class="contenedorForm">
			 <div class="cajaLogin">
			 	
			     <form action="" method="POST">
		<fieldset>
			<legend>Ingreso Al sistema</legend>
       <input type="text" class="Caja" id="nombre" name="User" placeholder="Cedula">
        
              </p><br>
              <p>Cargo:<select class="Caja" name="SelectCargo" id="">
                   <option value="0"></option>
                   <option value="1">Usuario</option>
                   <option value="2">Administrador</option>
                   <option value="3">Encargado</option>
                   </select></p><br>
                     <p>
               <input type="password" class="Caja" id="password" name="Password" placeholder="PASSWORD">
               </p><br>
               <p>
               <div id="Captcha" class="g-recaptcha" data-sitekey="6LdnRgcTAAAAAMElKGuFlFWYvEm6We5vWGtM2Y4z" data-type="image"></div>
    
                          
               </p>
               <p>          
              <input type="submit" class="BtnGeneral" name="BotonEnviar" onclick="return Validation(SelectCargo)" value=" Ingresar "/>
              <input type="reset" class="BtnGeneral" value=" Borrar " name="BotonBorrar" />
              </p>
              </fieldset>         
          </form>
          <?php
                  if(isset($_POST['BotonEnviar'])){
                    $captcha;
        
                    if(isset($_POST['g-recaptcha-response'])){
                        $captcha=$_POST['g-recaptcha-response'];
                      }
                      if(!$captcha){
                        echo '<h2>Please check the the captcha form.</h2>';
                        exit;
                      }
                      $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdnRgcTAAAAAKSVNuYXmVmiacOe3eBk4utpdKAX&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                      if($response==false)
                      {
                        echo '<h2>You are spammer ! Get the @$%K out</h2>';
                      }else
                      {
                         include("conexion.php");
                                       SESSION_START();
                                       $_SESSION['Cedula']=$_POST['User'];
                                       $Cedula=$_SESSION['Cedula'];

                                       $User=$_POST["User"];
                                       $Cargo=$_POST["SelectCargo"];
                                       $Pw=$_POST["Password"];

                                      $conexion=mysql_connect($host,$user,$pw);
                                      mysql_select_db($bd,$conexion);
                                      $sql="SELECT idUser FROM usuarios WHERE Cedula='$User' AND Cargo='$Cargo' AND Password='$Pw'";
                                      $comprobar=mysql_query($sql);
                             
                                      if(mysql_num_rows($comprobar)>0){
                                    $idUser=mysql_result($comprobar,0);
                                    setcookie("sitioReportes","$idUser",time() +3600);
                                    echo "<FONT SIZE=3>Logueado Correctamente</FONT>";
                                     if ($Cargo=="1") {
                                  header("Location:ControlUsuarios.php");
                                    }else if ($Cargo=="2") {
                                  header("Location:ControlAdministrador.php");
                                    }
                                    else if ($Cargo=="3") {
                                      header("Location:ControlEncargado.php");
                                          }
                              }
                              else{
                              echo "<p style='color:white;  font-size:15px;'>Usuario o contraseña incorrectos <a href='PaginaInicio00.php'>Volver Login</a></p>";


                             
                            }
                                    }
                                                  }
                                                     
          ?>
			   </div>
		     </div>
		     </div>
		  </article>
	    </section>
		<aside id="FotosDocumentos2">
			<p class="Parrafo"> Registro</p>
			<div class="cajaRegistro">
				<form action="" method="POST">
				 <fieldset>
				 	<legend>Registro al Sistema</legend>
				<p><input type="text" class="Caja" id="RegistroCedula" name="RCedula" placeholder="Cedula"></p><br>
				<p>Cargo:<select  class="Caja" name="RegistroListCargo" id="">
					<option value="0"></option>
					<option value="1">Usuario</option>
					<option value="2">Administrador</option>
					<option value="3">Encargado</option>
				         </select></p><br>
				<p><input type="text" class="Caja" id="RegistroNombre" name="RNombre" placeholder="Nombre"></p><br>
				<p><input type="text" class="Caja" id="RegistroApellido" name="RApellido" placeholder="Apellido"></p><br>
				<p><input type="text" class="Caja" id="Email" name="REmail" placeholder="EM@IL"></p><br>
				<p><input type="text" class="Caja" id="UsernameR" name="RUsername" placeholder="Username"></p><br>
				<p><input type="password" class="Caja" id="PasswordR" name="RPassword" placeholder="Password"></p><br>
				
    			 <p>
					<input type="submit" class="BtnGeneral" name="BtnRegistrase" value=" registrase " onclick="return Validation2(RegistroListCargo)">
					<input type="reset" class="BtnGeneral" value=" Reset ">

				</p>
				</fieldset>
				</form>
				<?php
                   if(isset($_POST['BtnRegistrase'])){
                     include("ValidarCaptcha.php");
                     $Captcha1=new Captcha();
                     $Captcha->ValidarInsert();
                   }
				?>
			</div>

			
		</aside>
	</section>
	<footer>
		<p>CDTCI</p>

	</footer>
	 
</body>
</html>