<?php
  
  $con=mysql_connect("localhost","root","1094940683") or die("Problemas con el host");
  $db=mysql_select_db("sena") or die ("Problemas al conectar con la databse");
  return($con);
  return($db);

?>