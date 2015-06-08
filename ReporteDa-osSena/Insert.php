<?php
   
   $host="localhost";
   $user="root";
   $pw="1094940683";
   $bd="reporte";
   SESSION_START();
   $nom=$_SESSION['nombre'];
   echo "$nom";

   $conexion=mysql_connect($host,$user,$pw) or die ("problemas a conectar el host");
    	mysql_select_db($bd,$conexion) or die("Problemas con las database");
        mysql_query("INSERT  INTO ensayo(nombre) values('$nom')",$conexion);
    	echo "datos insertados correctamente<br>";
    	
    }else{
    	echo "problemas al insertar los datos";
    }
?>