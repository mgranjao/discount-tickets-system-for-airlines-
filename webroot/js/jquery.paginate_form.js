/**
 *
 * Triggers search
 * @author Geneller Naranjo
 * @version 1.0
 * @license This content is released under the MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 */
// Teclas que no deben disparar la busqueda.
var unavailableKeyCodes = [9, 13, 16, 17, 18, 19, 20, 27, 35, 36, 37, 38, 39, 40, 45, 93, 106, 107, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 144, 145, 186, 187, 189, 190, 191, 192, 219, 220, 221, 222];

// Variables para abortar peticiones ajax.
var requesting = true;
var request = new $.ajax();
var focused = '';

function paginator(url, domId, targetDomId) {
    var ajaxDelay = 8;
    var params = {};

    function paginate(params) {
        if(requesting == true) {
            request.abort();
        }
        if(typeof(params.url) != 'undefined') {
            url = params.url;
        }
        request = $.ajax({
            data: params.data,    type: 'post',    async: true,    url: url,
            beforeSend: function() {requesting = true;    },
            complete: function(data) {
                $('#' + targetDomId).html(data.responseText);
                requesting = false;
            }
        });
    }

    setInterval(function() {
        ajaxDelay++;
        if(ajaxDelay == 8) {
            params.data = $('#' + domId).serialize();
            paginate(params);
        }}, 100);

    $('#' + domId + ' div input').keyup(function(e) {
        if(requesting == true) {
            request.abort();
        }
    });

    $('#' + domId + ' div input').keyup(function(e) {
        delete params.url;
        if(unavailableKeyCodes.indexOf(e.keyCode) == -1) {
            if(typeof(e.currentTarget.attributes[1].nodeValue) != 'undefined') {
                focused = e.currentTarget.attributes[1].nodeValue;
            }
            ajaxDelay = 1;
        }
    });

    $('#' + domId + ' div select').change(function(e) {
        params.data = $('#' + domId).serialize();
        paginate(params);
    });

    $('#' + domId + ' div input:checkbox').change(function(e) {
        params.data = $('#' + domId).serialize();
        paginate(params);
    });
    
    $('#' + domId).submit(function() {
        delete params.url;
        params.data = $('#' + domId).serialize();
        paginate(params);
        return false;
    });

    $('#' + targetDomId + ' .paging a').live('click', function(e) {
        e.preventDefault();
        delete params.url;
        params.data = $('#' + domId).serialize();
        var href = $(this).attr('href');
        params.url = href.replace('index/', 'index_ajax/');
        paginate(params);
    });

    $('#' + targetDomId + ' table th a').live('click', function(e) {
        e.preventDefault();
        delete params.url;
        params.data = $('#' + domId).serialize();
        var href = $(this).attr('href');
        params.url = href.replace('index/', 'index_ajax/');
        paginate(params);
    });

}