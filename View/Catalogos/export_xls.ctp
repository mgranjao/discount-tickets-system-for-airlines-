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
		<td><b><?=utf8_decode("Aeropuertos")?><b></td>
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
			<td class="tableTd">Valor</td>
                        <td class="tableTd">Tipo</td>
                        <td class="tableTd">Tarifa</td>
                        <td class="tableTd">Ciudad</td>
                        <td class="tableTd">Estado</td>
                        <td class="tableTd"><?=utf8_decode("Descripción")?></td>
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['Catalogo']['CATAG_ID'].'</td>';
			echo '<td class="tableTdContent">'.utf8_decode($row['Catalogo']['CATAG_VALOR']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Catalogo']['CATAG_TIPO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Catalogo']['CATAG_TARIFA']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Ciudade']['CIU_NOMBRE']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Catalogo']['CATAG_ESTADO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Catalogo']['CATAG_DESCRIPCION']).'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

