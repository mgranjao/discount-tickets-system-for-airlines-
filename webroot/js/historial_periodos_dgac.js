/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function () {
    
     cargar_periodos();
     //var link = '<a target="_blank" href="'+$("#url").val()+'DGAC/reporte_volados_por_periodo.pdf?per_id='+$("#DGACAEROID").val()+'">Reporte Vuelos del Período</a>';
     // $("#link_reporte").html(link); 
  
    $("#DGACAEROID").change(function(event){
        cargar_periodos();
        
       // var link = '<a target="_blank" href="'+$("#url").val()+'DGAC/reporte_volados_por_periodo.pdf?per_id='+$("#DGACAEROID").val()+'">Reporte Vuelos del Período</a>';
       // $("#link_reporte").html(link); 
    });
    
    
function cargar_periodos(){
 
        var data =  "aero_id=" + $("#DGACAEROID").val();
        
        $.ajax({
            type: "post",  // Request method: post, get
            url: $("#url").val()+"Periodos/historial_periodos_dgac/", // URL to request
            data: data,  // post data
            success: function(response) {
                // document.getElementById("post-view").innerHTML = response;
                $("#periodos").html(response);
                                 
            //$("#tarifa_aero").html = response;
            },
            error:function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus+" "+XMLHttpRequest.responseText+" "+errorThrown);
            }
        });   
}

}); 