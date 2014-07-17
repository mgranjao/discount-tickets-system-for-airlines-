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
<h2>VUELOS POR RESIDENTE</h2>

<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="500">
 <tr>
     <td><center>Nombre</center></td><td colspan="3"><center><?=$data[0][0]['RES_NOMBRES']." ".$data[0][0]['RES_APELLIDOS']?></center></td>
 </tr>
 <tr>    
     <td><center>Fecha Nacimiento</center></td><td><center><?=$data[0][0]['RES_FECHA_NACIMIENTO']?></center></td><td><center>Edad</center></td><td><center></center></td>
 </tr>
</table>
<br/>

<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="250">
 <tr>
     <td><center>Sexo</center></td><td><center><?=$data[0][0]['RES_SEXO']?></center></td>
 </tr><tr>
     <td><center>Residente</center></td><td><center><?=$data[0][0]['TIPO_NOMBRE']?></center></td>
 </tr>
</table>

<br/>

<!--  -->
<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="760">
<tr>
<td colspan="4"><center>INFORMACI&Oacute;N PARA COMPRA DE TICKET</center></td><td colspan="3"><center>INFORMACI&Oacute;N VUELO IDA</center></td><td colspan="3"><center>INFORMACI&Oacute;N VUELO RETORNO</center></td><td colspan="1" ><center>TOTALES</center></td>    
</tr>
<tr>
<td>Fecha Compra</td><td>No. Ticket</td><td>Aerol&iacute;nea</td><td>Ruta</td><td>Fecha</td><td>No. Vuelo</td><td>Ruta</td><td>Fecha</td><td>No. Vuelo</td><td>Ruta</td><td>Valor Descuento</td>
</tr>
<?php $total=0; ?>
<?php foreach ($data as $fila) {?>
<tr>
<td><?=$fila[0]['ASIG_FECHA_CREACION']?></td><td><?=$fila[0]['AUT_TICKET']?></td><td><?=$fila[0]['AERO_NOMBRE']?></td><td><?=$fila[0]['AERO_PARTIDA']."-".$fila[0]['AERO_DESTINO']."-".$fila[0]['AERO_PARTIDA']?></td><td><?=$fila[0]['VOL_IDA_FECHA_VUELO']?></td><td><?=$fila[0]['VOL_IDA_NUMERO_VUELO']?></td><td><?=$fila[0]['AERO_PARTIDA']."-".$fila[0]['AERO_DESTINO']?></td><td><?=$fila[0]['VOL_RETORNO_FECHA_VUELO']?></td><td><?=$fila[0]['VOL_RETORNO_NUMERO_VUELO']?></td><td><?=$fila[0]['AERO_DESTINO']."-".$fila[0]['AERO_PARTIDA']?></td><td><?php $total+=$fila[0]['VOL_TARIFA']; echo$fila[0]['VOL_TARIFA'];?></td>
</tr>
<?php } ?>
<tr>
<td colspan="10"></td><td><?=$total?></td>    
</tr>    

</table>
