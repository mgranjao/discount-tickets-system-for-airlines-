/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function () {
    
     
  
    $("#UsuarioAEROID").change(function(event){
        cargar_oficinas();
    });
    
    
function cargar_oficinas(){
 var valor =  $('#UsuarioAEROID').val(); 
 var usu =  $('#UsuarioUSUID').val(); 
        var data =  "id="+ valor+"&usu="+usu;
        
        $.ajax({
            type: "post",  // Request method: post, get
            url: $("#url").val()+"Usuarios/oficinas_por_aerolinea/", // URL to request
            data: data,  // post data
            success: function(response) {
                // document.getElementById("post-view").innerHTML = response;
                $("#oficinas").html(response);
                                 
            //$("#tarifa_aero").html = response;
            },
            error:function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus+" "+XMLHttpRequest.responseText+" "+errorThrown);
            }
        });   
}

}); 