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
    <h2>REPORTE DESGLOSADO</h2>


                            <table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="760">
                                <tr>
                                    <td><Center>A&ntilde;o</td><td><Center>Mes</td><td><Center>Volados</td><td><Center>Tarifa Total</td>    
                                </tr>
                                <?php foreach ($data as $d) { ?>
                                    <tr>
                                        <td><Center><b><?= $d['ANIO']['NUM'] ?></td>
                                        <td><Center> - </td>
                                        <td><Center><b><?= $d['ANIO']['TOT']['VOLADOS'] ?> </td>
                                        <?php if (isset($d['ANIO']['TOT']['TARIFA_TOTAL_ANIO'])){ ?>
                                        <td><Center><b> <?= $d['ANIO']['TOT']['TARIFA_TOTAL_ANIO'] ?> </td>
                                                <?php } else{?>
                                                <td><Center><b> 0.00 </td>
                                                <?php } ?>
                                        
                                    </tr>
                                    
                                    <?php if (isset($d['ANIO']['MES'])){ ?>
                                    <?php foreach ($d['ANIO']['MES'] as $m) { ?>
                                    <tr>
                                    <td><Center> - </td>    
                                    <td><Center> <?= $m['NUM'] ?> </td>   
                                    <td><Center> <?= $m['VOLADOS'] ?> </td>
                                    <td><Center> <?= $m['VALOR_TOTAL_MES'] ?> </td>
                                    </tr>   
                                        
                                    <?php } ?>
                                    <?php } ?>

                                <?php } ?>

                            </table>


                            </body>