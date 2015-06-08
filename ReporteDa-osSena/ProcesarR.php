<?php
 include("conexion.php");
  SESSION_START();
  $Cedula=$_SESSION['Cedula'];

  
   
 /*if(isset($_POST['Fecha']) && !empty($_POST['Fecha']) &&
 	isset($_POST['Foto']) && !empty('Foto') &&
 	isset($_POST['Estado']) && !empty('Estado') &&
 	isset($_POST['Descripcion']) && !empty($_POST['Descripcion']) &&
  isset($_POST['CodObjeto']) && !empty($_POST['CodObjeto']))
    

 	 {
        $Fecha=$_POST['Fecha'];
        $Foto=$_POST['Foto'];
        $Estado=$_POST['Estado'];
        $Descripcion=$_POST['Descripcion'];
        $CodObjeto=$_POST['CodObjeto'];
                
    	$conexion=mysql_connect($host,$user,$pw) or die ("problemas a conectar el host");
    	mysql_select_db($bd,$conexion) or die("Problemas con las database");
        mysql_query("INSERT  INTO reportes(Fecha,Foto,Estado,Descripcion,Cedula,CodElemento) values('$Fecha','$Foto','$Estado','$Descripcion','$Cedula','$CodObjeto')",$conexion);
    	header("Location:UsuarioVer.php");
        echo "datos insertados correctamente<br>";
     }*/
                                $tFecha=$_POST['txtFecha'];
                                $ruta="ImgElementos";
                                $archivo=$_FILES['txtFoto']['tmp_name'];
                                $nombreArchivo=$_FILES['txtFoto']['name'];
                                move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
                                $ruta=$ruta."/".$nombreArchivo;
                                echo $ruta;
                                $tEstado=$_POST['txtEstado'];
                                $tDescripcion=$_POST['txtDescripcion'];
                                $tElemento=$_POST['txtCodElemento'];
                               
                               $sql="INSERT INTO reportes(Fecha,Foto,Estado,Descripcion,Cedula,CodElemento) values('$tFecha','$ruta','$tEstado','$tDescripcion','$Cedula','$tElemento')";
                               $cs=mysql_query($sql,$con);
                               
                                  echo "<script>alert ('Se insertaron datos');</script>";
                                
                               
                               
                              
    
?>