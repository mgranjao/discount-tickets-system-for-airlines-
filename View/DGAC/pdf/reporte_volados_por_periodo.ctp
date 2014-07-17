<?php /*
<p>
Prueba
</p>

CHUCHA
<?php print_r($periodo); ?>
<pre>
<?php print_r($vuelos); ?>
</pre>

<table>
    <tr><td>Fecha</td><td>Nombre Residente</td><td>Residente</td> <td>Ticket No.</td> <td>Aerol&iacute;nea</td> <td>Ruta</td> <td>Fecha Salida</td><td>Vuelo Salida</td> <td>Fecha Retorno</td> <td>Vuelo Retorno</td> <td>Valor</td> <td>Cod. Autorizaci&oacute;n</td></tr>

<?php foreach ($vuelos as $vuelo) {?>
    <?php
    
    ?>
    <tr><td>Fecha</td><td>Nombre Residente</td><td>Residente</td> <td>Ticket No.</td> <td>Aerol&iacute;nea</td> <td>Ruta</td> <td>Fecha Salida</td><td>Vuelo Salida</td> <td>Fecha Retorno</td> <td>Vuelo Retorno</td> <td>Valor</td> <td>Cod. Autorizaci&oacute;n</td></tr>
<?php } ?>

</table>



*/

?>
 <style type="text/css">
  body {
    background:none repeat scroll 0 0 #FFFFFF;
    /*border:1px solid #CCCCCC;*/
    color:#000000;
    font-family:Helvetica,Arial,sans-serif;
    font-size:12px;
    padding:10px;  
  }
  </style>
<body >
<h2>REPORTE GENERAL MENSUAL RESIDENTES VOLADOS CON DESCUENTO</h2>

<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="140">
 <tr>
     <td><Center>Aerol&iacute;nea</td><td><Center><?=$periodo['Conciliado'][0]['Asignacione']['Aerolinea']['AERO_NOMBRE']?></td>
 </tr>
</table>
<br/>

<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="240">
 <tr>
     <td><Center>Fecha Inicio</td><td><?=$periodo['Periodo']['PERI_FECHA_INICIO']?></td><td><Center>Fecha Fin</td><td><?=$periodo['Periodo']['PERI_FECHA_FIN']?></td>
 </tr>
</table>

<br/>


<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="760">
    <tr> 
         <td colspan="4"><Center>Residente</td><td rowspan="2"><Center>Aerol&iacute;nea</td><td rowspan="2"><Center>Ruta</td> <td colspan="2"><Center>Salida</td> <td colspan="2" ><Center>Retorno</td>  <td ><Center>Valor</td> <td rowspan="2" ><Center>Cod. Autorizaci&oacute;n</td>
        </tr>
    
    <tr> 
         <td><Center>Fecha</td><td><Center>Nombre Residente</td><td><Center>Residente</td> <td><Center>Ticket No.</td>  <td><Center>Fecha Salida</td><td><Center>Vuelo Salida</td> <td><Center>Fecha Retorno</td> <td><Center>Vuelo Retorno</td> <td><Center>Descuento</td> 
        </tr>
        <?php foreach ($periodo['Conciliado'] as $conciliado) {?>
       <tr> 
         <td><Center><?=$conciliado['Asignacione']['Asignacione']['ASIG_FECHA_CREACION']?></Center></td>
         <td><Center><?=$conciliado['Asignacione']['Residente']['RES_NOMBRES']." ".$conciliado['Asignacione']['Residente']['RES_APELLIDOS']?></Center></td>
         <td><Center><?=$conciliado['Asignacione']['Residente']['RES_CEDULA']?></Center></td> 
         <td><Center><?=$conciliado['Asignacione']['Autorizacion']['AUT_TICKET']?></Center></td> 
         <td><Center><?=$conciliado['Asignacione']['Aerolinea']['AERO_NOMBRE']?></Center></td> 
         <td><Center><?=$conciliado['Volado_ida']['Volado']['VOL_CIUDAD_ORIGEN']."-".$conciliado['Volado_ida']['Volado']['VOL_CIUDAD_DESTINO']."-".$conciliado['Volado_ida']['Volado']['VOL_CIUDAD_ORIGEN']?></Center></td> 
         <td><Center><?=$conciliado['Volado_ida']['Volado']['VOL_FECHA_VUELO']?></Center></td>
         <td><Center><?=$conciliado['Volado_ida']['Volado']['VOL_NUMERO_VUELO']?></Center></td> 
         <td><Center><?=$conciliado['Volado_retorno']['Volado']['VOL_FECHA_VUELO']?></Center></td>
         <td><Center><?=$conciliado['Volado_retorno']['Volado']['VOL_NUMERO_VUELO']?></Center></td> 
         <!--<td><?=$conciliado['Volado_retorno']['Volado']['VOL_TARIFA']+$conciliado['Volado_retorno']['Volado']['VOL_TARIFA']?></td> -->
         <td><Center><?=$conciliado['Volado_ida']['Volado']['CatalogoDestino'][0]['Catalogo']['CATAG_TARIFA']?></Center></td> 
         <td><Center><?=$conciliado['Asignacione']['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION']?></Center></td>
        </tr>
        <?php } ?>
</table>

<br/>
<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="200">
 <tr>
     <td>Total Residentes Volados</td><td><?=count($periodo['Conciliado'])?></td>
 </tr>
</table>
<br/>

<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="200">
 <tr>
     <td>Devoluci&oacute;n para Aerol&iacute;nea</td><td><?=$total?></td>
 </tr>
</table>
<br/>

</body>