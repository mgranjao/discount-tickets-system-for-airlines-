/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function () {
     
   if($("#asignacion_id").val()!="" || $("#asignacion_id").val()!=null){  
   $('form#Paso2AsignacionForm').submit();
   }  
   
   
   
   
   //var valor =  $('#AsignacioneASIGDETDESTINO').val(); 
   
   /*
   $('#AsignacioneASIGDETDESTINO').val("1");    
    $("#AsignacioneTarifa").val($("#AsignacioneHdtarifaUio").val());
    $("#tarifa_gye").css("display", "none");//Empieza con el Vlaor en Quito, por lo cual se oculta la tarifa de Guayaquil
   */ 
 
   
        
   /*
   
   $("#AsignacioneASIGDETDESTINO").change(function(event){
        var valor =  $('#AsignacioneASIGDETDESTINO').val(); 
	var data =  "id="+ valor;
        $("#tarifa_aero").html = "sadfghj jhgfd";
        
        $.ajax({
             type: "post",  // Request method: post, get
             url: $("#AsignacioneURL").val()+"asignaciones/obtener_subcategorias/", // URL to request
             data: data,  // post data
             success: function(response) {
                                 // document.getElementById("post-view").innerHTML = response;
                                 //alert("valio "+response);
                                 //$("#tarifa_aero").html = response;
                           },
                           error:function (XMLHttpRequest, textStatus, errorThrown) {
                                  //alert(textStatus+" "+XMLHttpRequest.responseText+" "+errorThrown);
                           }
          });
        
        if(valor == "1")
        {
            $("#tarifa_gye").css("display", "none");
            $("#tarifa_uio").css("display", "block");
            $("#AsignacioneTarifa").val($("#AsignacioneHdtarifaUio").val());
            
        }
        else
        {
            $("#tarifa_gye").css("display", "block");
            $("#tarifa_uio").css("display", "none");
            $("#AsignacioneTarifa").val($("#AsignacioneHdtarifaGye").val());
            
        }    


    });
    
    */
    
    
    
    $('#datatable').dataTable({
        "aaSorting": [[ 0, "desc" ]]
    });
    
    


}); 