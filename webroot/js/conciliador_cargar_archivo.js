/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function () {
    
   
 
   
    /*$("#VoladoVOLARCHIVO").change(function(event){
        //alert("mijin");
    });*/
    
         $("#VoladoVOLARCHIVO").change(function(event){
         check_extension(this.value,"upload");
	});
        
    
//Validar archivos que pueden subir desde el formulario de sinietro    
    var hash2 = {
    '.xls'  : 1,
    //'.xlsx' : 1,
    //'.XLSX' : 1, 
    '.XLS'  : 1
    };

function check_extension(filename,submitId) {
      var re = /\..+$/;
      var ext = filename.match(re);
     // var submitEl = document.getElementById(submitId);
      
      if (hash2[ext]) {
        //submitEl.disabled = false;
        return true;
      } else {
        alert("Archivo Invalido, seleccione otro archivo");
        $("#VoladoVOLARCHIVO").val("");
        //submitEl.disabled = true;
        document.getElementById("error_archivo").style.display='none';
        return false;
      }
}
  
  var periodo_abierto = 0;
$.ajax({
            type: "post",  // Request method: post, get
            url: $("#url").val()+"Periodos/periodo_abierto/", // URL to request
           // data: data,  // post data
            success: function(response) {
                //alert(response);
                  if(response == 1)
                      periodo_abierto = 1;
                  
            },
            error:function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus+" "+XMLHttpRequest.responseText+" "+errorThrown);
            }
        });      
 
 
  $("#submit_cargar").click(function(){//validar_polizas
      archivo = jQuery.trim($("#VoladoVOLARCHIVO").val());	
      
      if(archivo==""){
         alert("Seleccione un archivo");
         return false;  
        }
        
      if(periodo_abierto == 0){
         alert("El período actual se encuentra cerrado");
         return false;   
      }  
    
    
        
}); 

     
}); 