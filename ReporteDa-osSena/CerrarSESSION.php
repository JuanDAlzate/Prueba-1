<?php
  SESSION_START();
  SESSION_UNSET();
  SESSION_DESTROY();
  header("Location:PaginaInicio00.php");
  echo "<script>alert('SESSION CERRADA')</script>;";
  
?>