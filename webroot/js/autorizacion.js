/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function () {
     
//$('#aut_error').fadeOut(0);
   
    $("#aut_error").css("display","none");
 
    $("#submit_aut").click(function(){//validar_polizas
        $("#aut_error").css("display","none");
        error=0;
        html="";
        
        nro_ticket = jQuery.trim($("#AutorizacionAUTTICKET").val());	
        $("#AutorizacionAUTTICKET").removeClass("error");
        
        if(nro_ticket==""){
            $("#AutorizacionAUTTICKET").addClass("error");
            error=1;
          // return false;
            html+="<li>Numero de ticket no puede estar en blanco</li>";
        }
        
        if(error==1)
        {
            $("#aut_error").html(html);
            $("#aut_error").css("display","block");
            return false;  
        }
    });


}); 


(function(a){
    a.fn.validCampoFranz=function(b){
        a(this).on({
            keypress:function(a){
                var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;
                (-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()
            }
        })
    }
})(jQuery);