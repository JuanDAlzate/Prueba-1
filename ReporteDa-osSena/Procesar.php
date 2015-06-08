<?php
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
    
?>