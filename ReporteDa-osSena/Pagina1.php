<?php
  SESSION_START();
  $_SESSION['nombre']=$_POST['nombre'];
  $_SESSION['apellido']=$_POST['lastname'];
  echo "<a href='Pagina2.php'>Enviar a la Pagina2</a>";
  ?>
  

