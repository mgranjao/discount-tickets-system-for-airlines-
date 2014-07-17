$(function() {
    
    //Activar Validate
    $(".default_form").validate();
    $(".formulario_soporte").validate();
    $(".inline").colorbox({inline:true, width:"541px"});
    // basic usage see app/Controllers/CitiesController::index
    
    /*********************HISTORIAL ASIGNACIONES EN COUNTER****************************/
    if($('#datepickerIniHistorialCounter').val()!="" && $('#datepickerFinHistorialCounter').val()!="") //Si es que hay definidas las fechas de inicio y fin
   {     
    $('#data_table_asignaciones_counter').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_counter.json?ini="+$('#datepickerIniHistorialCounter').val()+"&fin="+$('#datepickerFinHistorialCounter').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_counter/'+nRow.cells[0].innerHTML+'" target="_blank">Ver</a>');
        }
    });
    
    $('#data_table_asignaciones_counter_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_counter.json?ini="+$('#datepickerIniHistorialCounter').val()+"&fin="+$('#datepickerFinHistorialCounter').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_counter/'+nRow.cells[0].innerHTML+'" target="_blank">Ver</a>');
        }
    });
   }
   else //Si no hay las fechas de inicio y fin
    {
     $('#data_table_asignaciones_counter').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_counter.json", 
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_counter/'+nRow.cells[0].innerHTML+'" target="_blank">Ver</a>');
        }
    });
    
    $('#data_table_asignaciones_counter_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_counter.json", 
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_counter/'+nRow.cells[0].innerHTML+'" target="_blank">Ver</a>');
        }
    });
    }   
   
   
   /*****************************************HISTORIAL SUPERVISOR*****************************/
   
   if($('#datepickerIniHistorialSupervisor').val()!="" && $('#datepickerFinHistorialSupervisor').val()!="") //Si es que hay definidas las fechas de inicio y fin
   { 
    $('#data_table_asignaciones_supervisor').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_json.json?ini="+$('#datepickerIniHistorialSupervisor').val()+"&fin="+$('#datepickerFinHistorialSupervisor').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    
    $('#data_table_asignaciones_supervisor_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_json.json?ini="+$('#datepickerIniHistorialSupervisor').val()+"&fin="+$('#datepickerFinHistorialSupervisor').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
   }
   else
  {
  $('#data_table_asignaciones_supervisor').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    
    $('#data_table_asignaciones_supervisor_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'"  >Ver</a>'); //<!--target="_blank"-->
        }
    });      
  }
    
    
    /*********************HISTORIAL SUPERVISOR REVERSADAS*******************/
    
  if($('#datepickerIniHistorialSupervisorReversadas').val()!="" && $('#datepickerFinHistorialSupervisorReversadas').val()!="") //Si es que hay definidas las fechas de inicio y fin
   {  
    $('#data_table_asignaciones_reversadas_supervisor').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_reversadas_json.json?ini="+$('#datepickerIniHistorialSupervisorReversadas').val()+"&fin="+$('#datepickerFinHistorialSupervisorReversadas').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    
    $('#data_table_asignaciones_reversadas_supervisor_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_reversadas_json.json?ini="+$('#datepickerIniHistorialSupervisorReversadas').val()+"&fin="+$('#datepickerFinHistorialSupervisorReversadas').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
   }
   else
    {
     $('#data_table_asignaciones_reversadas_supervisor').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_reversadas_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    
    $('#data_table_asignaciones_reversadas_supervisor_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_supervisor_reversadas_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_supervisor/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    }
    
   /********************************************************************************/
   
   
    $('#data_table_agentes_supervisor').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Usuarios/agentes_supervisor_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,           
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(5)', nRow).html('<a href="'+$("#url").val()+'Usuarios/edit_agente/'+nRow.cells[0].innerHTML+'"  >Editar</a>'); //<!--target="_blank"-->
        }
    });
    
    
     $('#data_table_supervisores').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Usuarios/supervisores_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null, 
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(5)', nRow).html('<a href="'+$("#url").val()+'Usuarios/edit_supervisor/'+nRow.cells[0].innerHTML+'" >Editar</a>');
        }
    });
    
    
    
     $('#data_table_oficinas_supervisor').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"SupXOfis/sup_x_ofi_json/"+$("#usu_id").val()+".json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(3)', nRow).html('<a onclick="if(!confirm(\'¿Estas seguro que desea desvincular la oficina #'+nRow.cells[0].innerHTML+' del supervisor?\')){return false;}   " href="'+$("#url").val()+'SupXOfis/delete?ofi_id='+nRow.cells[0].innerHTML+'&usu_id='+$("#usu_id").val()+'" >Desvincular</a>');
        }
    });
    
    $('#data_table_oficinas_no_supervisadas_por_id').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Oficinas/oficinas_no_supervisadas_por_id_json/"+$("#usu_id").val()+".json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(3)', nRow).html('<a onclick="if(!confirm(\'¿Desea vincular la oficina #'+nRow.cells[0].innerHTML+' al supervisor?\')){return false;}   " href="'+$("#url").val()+'SupXOfis/add?ofi_id='+nRow.cells[0].innerHTML+'&usu_id='+$("#usu_id").val()+'" >Asignar</a>');
        }
    });
    
    
    
    
    
    
    
    $('#data_table_residentes').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Residentes/index.json",
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "sDom": 'CRTfrtip',
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Residentes/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Residentes/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
            
           // $('td:eq(8)', nRow).html('<a onclick="if(!confirm(\'¿Estas seguro que desea eliminar al Residente #'+nRow.cells[0].innerHTML+' ?\')){return false;}   " href="'+$("#url").val()+'Residentes/delete/'+nRow.cells[0].innerHTML+'" >Eliminar</a>');
        }
    });
    
    
    
    $('#data_table_oficinas').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Oficinas/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(5)', nRow).html('<a href="'+$("#url").val()+'Oficinas/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Oficinas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    
    $('#data_table_aerolineas').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Aerolineas/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(4)', nRow).html('<a href="'+$("#url").val()+'Aerolineas/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(5)', nRow).html('<a href="'+$("#url").val()+'Aerolineas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    
    $('#data_table_catalogos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Catalogos/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Catalogos/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Catalogos/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    $('#data_table_cupos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Cupos/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
             null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Cupos/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Cupos/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    
    $('#data_table_estados').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Estados/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(2)', nRow).html('<a href="'+$("#url").val()+'Estados/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(3)', nRow).html('<a href="'+$("#url").val()+'Estados/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    $('#data_table_perfiles').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Perfiles/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(2)', nRow).html('<a href="'+$("#url").val()+'Perfiles/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(3)', nRow).html('<a href="'+$("#url").val()+'Perfiles/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
     $('#data_table_tipocolonos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"TipoColonos/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(2)', nRow).html('<a href="'+$("#url").val()+'TipoColonos/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(3)', nRow).html('<a href="'+$("#url").val()+'TipoColonos/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    
    
    $('#data_table_usuarios').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Usuarios/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
             null,
             null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Usuarios/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Usuarios/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    $('#data_table_configuraciones').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Configuraciones/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(4)', nRow).html('<a href="'+$("#url").val()+'Configuraciones/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(5)', nRow).html('<a href="'+$("#url").val()+'Configuraciones/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    
    
    $('#data_table_tasas').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Tasas/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Tasas/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Tasas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    $('#data_table_ciudades').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Ciudades/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(3)', nRow).html('<a href="'+$("#url").val()+'Ciudades/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(4)', nRow).html('<a href="'+$("#url").val()+'Ciudades/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
    if($('#datepickerIniHistorialConciliados').val()!="" && $('#datepickerFinHistorialConciliados').val()!="") //Si es que hay definidas las fechas de inicio y fin
   { 
     $('#data_table_historial_conciliados').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Conciliados/historial_conciliados.json?ini="+$('#datepickerIniHistorialConciliados').val()+"&fin="+$('#datepickerFinHistorialConciliados').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Conciliados/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
         //   $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Oficinas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
   }
   else
   {
   $('#data_table_historial_conciliados').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Conciliados/historial_conciliados.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Conciliados/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
         //   $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Oficinas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    }); 
   }    
   
   
   
   
   
   
   
    /*********************HISTORIAL CONCILIADOR*******************/
    
  if($('#datepickerIniHistorialConciliador').val()!="" && $('#datepickerFinHistorialConciliador').val()!="") //Si es que hay definidas las fechas de inicio y fin
   {  
    $('#data_table_asignaciones_conciliador').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_conciliador_json.json?ini="+$('#datepickerIniHistorialConciliador').val()+"&fin="+$('#datepickerFinHistorialConciliador').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_conciliador/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    
    $('#data_table_asignaciones_conciliador_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_conciliador_json.json?ini="+$('#datepickerIniHistorialConciliador').val()+"&fin="+$('#datepickerFinHistorialConciliador').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_conciliador/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
   }
   else
    {
     $('#data_table_asignaciones_conciliador').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_conciliador_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_conciliador/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    
    $('#data_table_asignaciones_conciliador_2_pasos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Asignaciones/historial_conciliador_json.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Asignaciones/view_conciliador/'+nRow.cells[0].innerHTML+'?reversado=1"  >Ver</a>'); //<!--target="_blank"-->
        }
    });
    }
    
    
    
    
    
    if($('#datepickerIniHistorialVolados').val()!="" && $('#datepickerFinHistorialVolados').val()!="") //Si es que hay definidas las fechas de inicio y fin
   { 
    $('#data_table_volados').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Volados/historial_volados.json?ini="+$('#datepickerIniHistorialVolados').val()+"&fin="+$('#datepickerFinHistorialVolados').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(10)', nRow).html('<a href="'+$("#url").val()+'Volados/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            //$('td:eq(10)', nRow).html('<a href="'+$("#url").val()+'Oficinas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
   }else
  {
   $('#data_table_volados').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Volados/historial_volados.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(10)', nRow).html('<a href="'+$("#url").val()+'Volados/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            //$('td:eq(10)', nRow).html('<a href="'+$("#url").val()+'Oficinas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });     
  }
  
  
    $('#data_table_periodos').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Periodos/index.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Periodos/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            $('td:eq(8)', nRow).html('<a href="'+$("#url").val()+'Periodos/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
   $('#data_table_periodos_conciliador').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Periodos/historial_periodos_conciliador.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Periodos/edit_conciliador/'+nRow.cells[0].innerHTML+'" >Ver/Editar</a> ');
            //$('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Periodos/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    }); 
    
     var aero_id = $("#DGACAEROID").val();
     $('#data_table_periodos_dgac').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Periodos/historial_periodos_dgac.json?aero_id="+$('#DGACAEROID').val(),
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Periodos/edit_dgac/'+nRow.cells[0].innerHTML+'" >Ver/Editar</a> ');
            //$('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Periodos/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    }); 
    
     $('#data_table_periodos_reportes').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Periodos/historial_periodos_reportes.json",
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false}
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Periodos/view_reportes/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
            //$('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Periodos/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    }); 
    
    $('#data_table_historial_conciliados_periodo').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Conciliados/conciliados_por_periodo.json?peri_id="+$('#peri_id').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Conciliados/view/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
         //   $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Oficinas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    
     $('#data_table_historial_conciliados_periodo_dgac').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": $("#url").val()+"Conciliados/conciliados_por_periodo.json?peri_id="+$('#peri_id').val(), //?ini=2013-10-01&fin=2013-10-31
        "sDom": 'CRTfrtip',
        "oLanguage": {
                        "sUrl": $("#url").val()+"js/dataTables.spanish.txt"
        },
        "aoColumns":[
            {bVisible: true},
            null,
            null,
            null,
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
            //{bSortable: false, bSearchable: false},
        ],
         "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(7)', nRow).html('<a href="'+$("#url").val()+'Conciliados/view_dgac/'+nRow.cells[0].innerHTML+'" >Ver</a> ');
         //   $('td:eq(6)', nRow).html('<a href="'+$("#url").val()+'Oficinas/edit/'+nRow.cells[0].innerHTML+'" >Editar</a> ');
        }
    });
    
    /*
    // using linkable behavior see app/Controllers/CitiesController::linkable
    $('#linkable').dataTable({
        "iDisplayLength": 100,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/cities/linkable.json",
        "sDom": 'CRTfrtip',
        "aoColumns":[
            {bVisible: false},
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(3)', nRow).html('<button onclick="alert(\'City.id is '+aData[0]+'\')">Button</button>');
        }
    });
    
    // using containable behavior see app/Controllers/CitiesController::containable
    $('#containable').dataTable({
        "iDisplayLength": 100,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/cities/containable.json",
        "sDom": 'CRTfrtip',
        "aoColumns":[
            {bVisible: false},
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(3)', nRow).html('<button onclick="alert(\'City.id is '+aData[0]+'\')">Button</button>');
        }
    });
    
    // using concat see app/Controllers/CitiesController::concat
    // note: concat is not recommended
    $('#concat').dataTable({
        "iDisplayLength": 100,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/cities/concat.json",
        "sDom": 'CRTfrtip',
        "aoColumns":[
            {bVisible: false},
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(2)', nRow).html('<button onclick="alert(\'City.id is '+aData[0]+'\')">Button</button>');
        },
        "fnInitComplete": function(){
            alert('WARNING!\n CONCAT is NOT recommended. I advise using virtualFields instead. Right now the code does not handle sorting or search on CONCATS too well');
        }
    });    
    
    // using virtualFields see app/Controllers/CitiesController::virtualFields
    $('#virtualFields').dataTable({
        "iDisplayLength": 100,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/cities/virtualFields.json",
        "sDom": 'CRTfrtip',
        "aoColumns":[
            {bVisible: false},
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(2)', nRow).html('<button onclick="alert(\'City.id is '+aData[0]+'\')">Button</button>');
        }
    });
    
    // using noJsonHandler see app/Controllers/CitiesController::noJsonHandler
    $('#noJsonHandler').dataTable({
        "iDisplayLength": 100,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/cities/noJsonHandler",
        "sDom": 'CRTfrtip',
        "aoColumns":[
            {bVisible: false},
            null,
            null,
            null,
            {bSortable: false, bSearchable: false},
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(3)', nRow).html('<button onclick="alert(\'City.id is '+aData[0]+'\')">Button</button>');
        }
    }); */
});