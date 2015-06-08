<?php
 if(isset($_COOKIE["sitioReportes"]))
  {
    echo "Usuario con sesion iniciada";
  }else{
  	echo "no se ha iniciado sesion </br > <a href='PaginaInicio00.html'>Iniciar session</a>";
  }
?>