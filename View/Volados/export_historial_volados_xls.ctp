<?php App::uses('Residente', 'Model');?>
<STYLE type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid; 
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bolder;
	}
   
</STYLE>
<table>
	<tr>
		<td><b><?=utf8_decode("Historial de Volados")?><b></td>
	</tr>
        <tr>
		<td></td>
	</tr>
	<tr>
		<td><b>Fecha:</b></td>
		<td><?php echo date("Y-m-d")." ".date("H:i:s")//echo date("F j, Y, g:i a"); ?></td>
	</tr>
	<tr>
		<td><b>Registros:</b></td>
		<td style="text-align:left"><?php echo count($rows);?></td>
	</tr>
	<tr>
		<td></td>
	</tr>
		<tr id="titles">
			<td class="tableTd">ID</td>
                        <td class="tableTd"><?=utf8_decode("Código Aerolínea")?></td>
                        <td class="tableTd"><?=utf8_decode("Ticket")?></td>
                        <td class="tableTd"><?=utf8_decode("Cupón")?></td>
                        <td class="tableTd"><?=utf8_decode("Número de Vuelo")?></td>
                        <td class="tableTd"><?=utf8_decode("Fecha Vuelo")?></td>
                        <td class="tableTd"><?=utf8_decode("Origen")?></td>
                        <td class="tableTd"><?=utf8_decode("Destino")?></td>
                        <td class="tableTd"><?=utf8_decode("Código Autorización")?></td>
                        <td class="tableTd"><?=utf8_decode("Tarifa")?></td>
                        <td class="tableTd"><?=utf8_decode("Tasas")?></td>
                        <td class="tableTd"><?=utf8_decode("Impuestos")?></td>
                        <td class="tableTd"><?=utf8_decode("Valor Total")?></td>
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['Volado']['VOL_ID'].'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_COD_AERO']).'</td>';
			echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_NUM_TICKET']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_CUPON']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_NUMERO_VUELO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_FECHA_VUELO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_CIUDAD_ORIGEN']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_CIUDAD_DESTINO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_CODIGO_AUT']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_TARIFA']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_TASA']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_IMPUESTOS']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_VALOR_TOTAL']).'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

