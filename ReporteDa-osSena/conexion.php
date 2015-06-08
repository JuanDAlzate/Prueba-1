<?php
       
        $host="localhost";
        $user="root";
        $pw="1094940683";
        $bd="sena"; 

   class conexion{
        function recuperarDatos(){
        	SESSION_START();
            
            $Cedula=$_SESSION['Cedula'];
            $host="localhost";
        	$user="root";
        	$pw="1094940683";
        	$bd="sena";
        	$conexion=new mysqli($host,$user,$pw,$bd);
            if ($conexion->errno) {
                 echo "No conectado";
            }else {
                $consulta="SELECT * FROM reportes WHERE Cedula='$Cedula' ORDER BY idReporte DESC";
            $resultado=$conexion->query($consulta); 
            while ($fila=$resultado->fetch_assoc()) 
            {
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>idReporte:</b> {$fila['idReporte']}<br>";
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Fecha del reporte:</b> {$fila['Fecha']}<br>";
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Elemento dañado:</b> <img src='".$fila['Foto']."' width=100 height=50><br>";
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Estado:</b> {$fila['Estado']}<br>";
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Descripcion:</b> {$fila['Descripcion']}<br>";
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Codigo Elemento:</b> {$fila['CodElemento']}<br>";
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Cedula:</b> {$fila['Cedula']}<br>";
                   echo "<b style='color:orange; font-size:18px; text-shadow:4px 4px 10px aqua;'>Encargado:</b> {$fila['Obreros']}<br>";
                   echo "<hr></hr>";
          }
            }

           

        }
        function Eliminar(){

        	
        	$Fecha=$_POST['Fecha'];
        	echo $Fecha;

        	$conexion=mysql_connect($host,$user,$pw) or die("Problemas al conectar con el host");
        	          mysql_select_db($bd,$conexion) or die("Problemas al conectar con la base de datos");
        	          $Eliminar=("DELETE * FROM reportes WHERE idReporte='$Fecha'");
        	          mysql_query($Eliminar,$conexion) or die("Error al Eliminar Datos").mysql_error();

        }
    }

  
?>