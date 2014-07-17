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
		<td><b><?=utf8_decode("Residentes")?><b></td>
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
                        <td class="tableTd"><?=utf8_decode("Número Certificado")?></td>
                        <td class="tableTd"><?=utf8_decode("Cedula")?></td>
                        <td class="tableTd"><?=utf8_decode("Nombres")?></td>
                        <td class="tableTd"><?=utf8_decode("Apellidos")?></td>
                        <td class="tableTd"><?=utf8_decode("Sexo")?></td>
                        <td class="tableTd"><?=utf8_decode("Fecha Nacimiento")?></td>
                        <td class="tableTd"><?=utf8_decode("Fecha Emisión Carné")?></td>
                        <td class="tableTd"><?=utf8_decode("Fecha Expiración")?></td>
                        <td class="tableTd"><?=utf8_decode("Observaciones")?></td>
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['Residente']['RES_ID'].'</td>';
			echo '<td class="tableTdContent">'.utf8_decode($row['TipoColono']['TIPO_NOMBRE']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_NUMERO_CERTIFICADO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_CEDULA']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_NOMBRES']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_APELLIDOS']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_SEXO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_FECHA_NACIMIENTO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_FECHA_CARNE_EMIS']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_FECHA_EXPIRA']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Residente']['RES_OBSERVACION']).'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

