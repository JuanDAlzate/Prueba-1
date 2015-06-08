<?php
 include("conexion2.php");
 	if(isset($_POST['RNombre']) && !empty($_POST['RDescripcion']) &&
      isset($_POST['RDescripcion']) && !empty($_POST['RDescripcion']))
       {
          $con=mysql_connect($Host,$User,$Pw) or die("Problemas al conectarme");
          mysql_select_db($Bd,$con) or die("Problemas al conectarme con la base de datos");
          mysql_query("INSERT INTO  cargo (Nombre,Descripcion) VALUES ('$_POST[RNombre]','$_POST[RDescripcion]')",$con); 
          echo "Datos insertados";
      }else{
      	echo "Problemas al insertar datos";
      }


?>