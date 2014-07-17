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
		<td><b><?=utf8_decode("Cupos")?><b></td>
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
			<td class="tableTd"><?=utf8_decode("Tipo Colono")?></td>
                        <td class="tableTd">Usuario Creador</td>
                        <td class="tableTd"><?=utf8_decode("Cantidad")?></td>
                        <td class="tableTd">Fecha Inicio</td>
                        <td class="tableTd">Fecha Fin</td>
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['Cupo']['CUPO_ID'].'</td>';
			echo '<td class="tableTdContent">'.utf8_decode($row['TipoColono']['TIPO_NOMBRE']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Usuario']['USU_EMAIL']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Cupo']['CUPO_CANTIDAD']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Cupo']['CUPO_FECHA_DESDE']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Cupo']['CUPO_FECHA_HASTA']).'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

