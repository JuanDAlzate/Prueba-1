<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recaptcha</title>
	<script src ='https://www.google.com/recaptcha/api.js'></script>
	<style>
     div.contenedor{
       width: 20px;
       background: black;
     }

	</style>

</head>
<body>
	<form action="" method="POST">
		<fieldset>
			<legend>Casas</legend>
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
		<div class="contenedor">
			</div>
		</fieldset>
				
		<input type="submit" name="BtnEnviar" value="Enviar">
	</form>
	   
?>

	
</body>
</html>