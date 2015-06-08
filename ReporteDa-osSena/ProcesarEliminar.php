<?php
   include("conexion.php");
      
    $Fecha=$_POST['Fecha'];

    
    $conexion=mysql_connect($host,$user,$pw) or die("Problemas al conectar con el host");
        	          mysql_select_db($bd,$conexion) or die("Problemas al conectar con la base de datos");
        	          $registro=mysql_query("SELECT idReporte FROM reportes WHERE idReporte='$Fecha'",$conexion) or die ("Problemas con la consultas").mysql_error();
                     
                      if($req=mysql_fetch_array($registro))
                      {
                      	mysql_query("DELETE FROM reportes WHERE idReporte='$Fecha'",$conexion) or die("Error al Eliminar Datos").mysql_error();;
        	            echo "Se ha eliminado el reporte";
                      }else{
                      	echo "No se han eliminado los datos".$Fecha;

                      }
        	         


?>