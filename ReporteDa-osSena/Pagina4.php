<?php
  
  SESSION_START();
  SESSION_UNSET();
  SESSION_DESTROY();
  echo "SESSION_Cerrada";
  header("Location:XX.php");

?>