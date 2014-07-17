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
		<td><b><?=utf8_decode("Historial de Asignaciones")?><b></td>
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
			<td class="tableTd">Residente</td>
                        <td class="tableTd">Partida</td>
                        <td class="tableTd">Destino</td>
                        <td class="tableTd"><?=utf8_decode("Código Autorización")?></td>
                        <td class="tableTd"><?=utf8_decode("Fecha")?></td>
                        <td class="tableTd"><?=utf8_decode("Agente")?></td>
                        <td class="tableTd"><?=utf8_decode("Ticket")?></td>
                        <td class="tableTd"><?=utf8_decode("Tipo Vuelo")?></td>
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['Asignacione']['ASIG_ID'].'</td>';
			echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_CEDULA']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Catalogo']['CATAG_VALOR']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['CatalogoDestino']['CATAG_VALOR']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Asignacione']['ASIG_FECHA_CREACION']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Usuario']['USU_NOMBRE_COMPLETO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Autorizacion']['AUT_TICKET']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Asignacione']['ASIG_DET_TIPO_VUELO']).'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

