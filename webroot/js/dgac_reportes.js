/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function () {
    
    $(window).load(function(){
    cargar_periodos();
    });
 
   
    $("#DGACAEROID").change(function(event){
        cargar_periodos();
    });
    
    
function cargar_periodos(){
 var valor =  $('#DGACAEROID').val(); 
        var data =  "id="+ valor;
        
        $.ajax({
            type: "post",  // Request method: post, get
            url: $("#url").val()+"DGAC/periodos_por_aerolinea/", // URL to request
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