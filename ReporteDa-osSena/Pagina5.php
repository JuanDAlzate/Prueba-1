
<?php
  SESSION_START();
  $nom=$_SESSION['nombre'];
  echo "$nom<br>";
   echo "<a href='Pagina4.php'>Cerrar Session</a><br><br>";
  

            $host="localhost";
        	$user="root";
        	$pw="1094940683";
        	$bd="reporte";
        	$conexion=mysql_connect($host,$user,$pw) or die("Problemas al conectar con el host");
        	          mysql_select_db($bd,$conexion) or die("Problemas al conectar con la base de datos");
               $query=("SELECT * FROM ensayo WHERE nombre='$nom'");
            $resultado=mysql_query($query);	
            while ($fila=mysql_fetch_array($resultado)) 
            {
            	   
            	   	
            	   echo "<b>Hola:</b> $fila[nombre]<br>";
            	   echo "<hr></hr>";

                   
            	   

            }

        
?>