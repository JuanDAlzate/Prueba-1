<?php
 include("conexion.php");
  SESSION_START();
  $Cedula=$_SESSION['Cedula'];

  
   
 if(isset($_POST['Fecha']) && !empty($_POST['Fecha']) &&
 	isset($_POST['Foto']) && !empty('Foto') &&
 	isset($_POST['Estado']) && !empty('Estado') &&
 	isset($_POST['Descripcion']) && !empty($_POST['Descripcion']) &&
  isset($_POST['CodObjeto']) && !empty($_POST['CodObjeto']))
    

 	 {
        $Fecha=$_POST['Fecha'];
        $Foto=$_POST['Foto'];
        $Estado=$_POST['Estado'];
        $Descripcion=$_POST['Descripcion'];
        $CodObjeto=$_POST['CodObjeto'];
                
    	$conexion=mysql_connect($host,$user,$pw) or die ("problemas a conectar el host");
    	mysql_select_db($bd,$conexion) or die("Problemas con las database");
        mysql_query("INSERT  INTO reportes(Fecha,Foto,Estado,Descripcion,Cedula,CodElemento) values('$Fecha','$Foto','$Estado','$Descripcion','$Cedula','$CodObjeto')",$conexion);
    	header("Location:AdministradorVer.php");
        echo "datos insertados correctamente<br>";
     }
     else{
    	echo "problemas al insertar los datos";
    }
    
?>