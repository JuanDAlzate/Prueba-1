<?php
   SESSION_START();
   $nom=$_SESSION['nombre'];
   $ape=$_SESSION['apellido'];

   if(isset($nom) && !empty($nom) &&
   	  isset($ape) && !empty($ape)){

   	 $host="localhost";
   	 $user="root";
   	 $pw="1094940683";
   	 $bd="reporte";

   	  $con=mysql_connect($host,$user,$pw) or die("Problemas al conectar en el host");
   	       mysql_select_db($bd,$con) or die("Problemas al conectar con la db");
           mysql_query("INSERT INTO ensayo(nombre) VALUES ('$nom')",$con);
           echo "<legend>Datos registrados</legend><br><hr></hr>";
           echo "<fieldset>";
           echo "Las variables son:<br>";
           echo "Hola: $nom<br> De Apellido: $ape<br>";
           echo "<a href='Pagina5.php'>Pagina 5<a>";
           echo "</fieldset>";
   }else{
   	echo "no se Pudo insertar los datos";
   }

 
?>
