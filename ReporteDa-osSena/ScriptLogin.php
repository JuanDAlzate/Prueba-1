 <?php 
                  include "Conexion.php"
                  session_start();
                   if($_POST["FormLogin"]){
                       $Usuario=$_POST["User"];
                       $Cargo=$_POST["SelectCargo"];
                       $Pass=$_POST["Password"];
                       if(!empty(Usuario))
                        {
                         if(!empty(Pass))
                          {
                         	$consulta=mysql_query("select * from usuarios where Username="'Usuario'" and Password="'$Pass'"");
                         	    if(mysql_num_rows($consulta))
                         	    {
                         	     $arreglo=mysql_fetch_array($consulta);
                         	      $_SESSION["Usuario"]=$arreglo["Username"];
                         	      session_start();
                         	      header(location:Index.html);
                         	    }else
                         	    {
                                  $error[3]="Usuario o contraseña incorrecto";
                         	    }

                         }else{
                             $error[1]="Ingrese la contraseña";
                         }
                        }else{
                        	$error[2]="Ingrese un Usuario";
                        }
                   }



                ?>