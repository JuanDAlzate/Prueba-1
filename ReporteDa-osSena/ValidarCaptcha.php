<?php
     
       class Captcha{
       function ValidarLogin(){

        $captcha;
       
        if(isset($_POST['g-recaptcha-response'])){
           
           $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<b style="color:orange; font-size:12px;">Please check the the captcha form.</b>';
          exit;
        }
         $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfnXQcTAAAAANc4kWAfbKfKANmuera1xwLlPMQh&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
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
        function ValidarInsert(){
        	 $captcha;
       
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<b style="color:orange; font-size:12px;">Please check the the captcha form.</b>';
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdnRgcTAAAAAKSVNuYXmVmiacOe3eBk4utpdKAX&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response==false)
        {
          echo '<h2>Usted es un Robot Bye</h2>';
        }else
        {
            include("conexion.php");

 if(isset($_POST['RCedula']) && !empty($_POST['RCedula']) &&
    isset($_POST['RegistroListCargo']) && !empty($_POST['RegistroListCargo']) &&
    isset($_POST['RNombre']) && !empty($_POST['RNombre']) &&
    isset($_POST['RApellido']) && !empty($_POST['RApellido']) &&
    isset($_POST['REmail']) && !empty($_POST['REmail']) &&
    isset($_POST['RUsername']) && !empty($_POST['RUsername']) &&
    isset($_POST['RPassword']) && !empty($_POST['RPassword']))

 	 {
        $cedulaRegistrada=$_POST['RCedula'];
        $CargoRegistrado=$_POST['RegistroListCargo'];
        $NombreRegistrado=$_POST['RNombre'];
        $ApellidoRegistrado=$_POST['RApellido'];
        $EmailRegistrado=$_POST['REmail'];
        $UserNameRegistrado=$_POST['RUsername'];
        $PasswordRegistrado=$_POST['RPassword'];

        
    	$conexion=mysql_connect($host,$user,$pw) or die ("problemas a conectar el host");
    	mysql_select_db($bd,$conexion) or die("Problemas con las database");
        mysql_query("INSERT  INTO usuarios(Cedula,Cargo,Nombre,Apellido,Correo,UserName,Password) values('$cedulaRegistrada','$CargoRegistrado','$NombreRegistrado','$ApellidoRegistrado','$EmailRegistrado','$UserNameRegistrado','$PasswordRegistrado')",$conexion);
    	echo "<FONT SIZE=3>Insertados los datos</FONT>";
        /*echo "<a href='PaginaInicio00.html'>Vovler</a>";
        header("Location:UsuarioVer.php");*/


    }else{
    	echo "<FONT SIZE=3 color=white >problemas al insertar los datos</FONT>";
    }
        }
        }
        

     }
?>