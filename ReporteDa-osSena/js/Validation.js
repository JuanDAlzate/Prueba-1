
function Validation(SelectCargo){
    
var Nombre=document.getElementById("nombre").value;
var Pasword=document.getElementById("password").value; 

  if(Nombre==""){
  	alert("INGRESE USERNAME");
  	return false;
  }
  if (SelectCargo.value=="0"){
      alert("LLENE UN CARGO");
      return false;
  }


  if (Pasword=="") {
    alert("INGRESE PASSWORD");
    return false;

  }

}
function Validation2(RegistroListCargo){
   var RCedula=document.getElementById("RegistroCedula").value; 
   var RNombre=document.getElementById("RegistroNombre").value;
   var RApellido=document.getElementById("RegistroApellido").value;
   var REmail=document.getElementById("Email").value;
   var RUsername=document.getElementById("UsernameR").value;
   var RPassword=document.getElementById("PasswordR").value;


    if(RCedula==""){
     alert("INGRESE UNA CEDULA");
     return false;
  }
  if(RegistroListCargo.value=="0"){
     alert("INGRESE UN CARGO");
     return false;

   }
   if(RNombre==""){
      alert("INGRESE UN NOMBRE");
      return false;
   }
   if (RApellido=="") {
       alert("INGRESE UN APELLIDO");
       return false;
   }
   
   if(REmail==""){
    alert("INGRESE UN EM@IL");
    return false;
   }
   if(RUsername==""){
    alert("INGRESE UN USERNAME");
    return false;
  }
   if(RPassword==""){
    alert("INGRESE UN PASSWORD");
    return false;
   }
     }
     function validarActualizar(){
      var IdReporte=document.getElementById("IdObjeto").value;

      if(IdReporte=="") {
        alert("Ingrese el id del reporte que quiera actualizar consulte con el boton listar");
        return false;
        alert("HOla");

      }
    }


  
