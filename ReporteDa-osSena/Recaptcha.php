  <?php

  if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
  	    if(!$captcha){
                        echo "<h2>Ingrese al captcha</h2>";
                        exit;
                    }else{

       var_dump($_POST);
  	   $secret= "6LdnRgcTAAAAAKSVNuYXmVmiacOe3eBk4utpdKAX";
  	   $ip=$_SERVER['REMOTE_ADDR'];
  	   $captcha=$_POST['g-recaptcha-response'];
  	   $rsp= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
         var_dump($rsp);
         $arr=json_decode($rsp,TRUE);
          }
            if ($arr['success']) {
            include("conexion.php");
           SESSION_START();
           $_SESSION['Cedula']=$_POST['User'];
          $Cedula=$_SESSION['Cedula'];

          $User=$_POST["User"];
          $Cargo=$_POST["SelectCargo"];
          $Pw=$_POST["Password"];

          $conexion=mysql_connect($host,$user,$pw);
          mysql_select_db($bd,$conexion);
          $sql="SELECT idUser FROM usuarios WHERE Cedula='$User' AND Cargo='$Cargo' AND Password='$Pw'";
          $comprobar=mysql_query($sql);
 
          if(mysql_num_rows($comprobar)>0){
          $idUser=mysql_result($comprobar,0);
          setcookie("sitioReportes","$idUser",time() +3600);
          echo "<FONT SIZE=3>Logueado Correctamente</FONT>";
          if ($Cargo=="1") {
             header("Location:ControlUsuarios.php");
             }else if ($Cargo=="2") {
              header("Location:ControlAdministrador.php");
             }
            else if ($Cargo=="3") {
            header("Location:ControlEncargado.php");
              }
              }
             else{
            echo "<p style='color:white;  font-size:15px;'>Usuario o contraseña incorrectos <a href='PaginaInicio00.php'>Volver Login</a></p>";

              }
                   
               }
  
  ?>