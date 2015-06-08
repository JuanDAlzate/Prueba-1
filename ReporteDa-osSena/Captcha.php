<?php
 //Creamo la imagen del captcha
 $imagen= imagecreate(100, 30);
 //Aleatorio variable
 $Aleatorio=rand(100000,999999);
 //Le daremos un color de fondo
 $Fondo=imagecolorallocate($imagen, 58, 176, 199);
 //Color de texto
 $texto=imagecolorallocate($imagen, 255, 255, 255);
 //Rellenamos la imagen
 imagefill($imagen, 50, 0, $Fondo);
 //Creamo una imagen
 imagestring($imagen, 80, 0, 0, $Aleatorio, $texto);
 //Imprimir la imagen
 header('content-type: image/png');
 imagepng($imagen);

 $Codigo=$_POST['Codigo'];
 if ($Codigo==$Aleatorio) {
 	echo "Hola acerto"; 
 }else{
 	echo "No acerto";
 }





?>