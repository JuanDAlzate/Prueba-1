<?php
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
 		  header("Location:ControlUsuarios.html");
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
?>