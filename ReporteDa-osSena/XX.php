<!DOCTYPE html>
<html lang="es">
	<?php
           
            $host="localhost";
        	$user="root";
        	$pw="1094940683";
        	$bd="reporte";
        	$conexion=mysql_connect($host,$user,$pw) or die("Problemas al conectar con el host");
        	          mysql_select_db($bd,$conexion) or die("Problemas al conectar con la base de datos");
        	          
	  	   echo $_POST['nombre'];
	  	?>
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
</head>
<body>
	
	<form action="" method="POST">
	  <select name="nombre" onchange="submit()"  id="">
             <?php
                 $sql="SELECT * FROM ensayo WHERE nombre='juan'";
                 $rec=mysql_query($sql);
                 while($Fila=mysql_fetch_array($rec)) {
                 	echo "<option value='".$Fila['nombre']."'";
                    if ($_POST['nombre']==$Fila['nombre']) {
                    	echo "SELECTED";                 	# code...
                    }
                 	echo ">";
                 	echo $Fila['nombre'];
                 	echo "</option>";

                 }
                 	 
             ?>
	  </select>
	  <input type="text" name="lastname">
	  <input type="submit" name="i" >
	</form>
	   <?php  
           if (isset($_POST["i"])) {
               require("Pagina1.php");  
           }
       ?>

</body>
</html>