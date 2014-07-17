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
		<td><b><?=utf8_decode("Historial de Conciliados")?><b></td>
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
			<td class="tableTd">Ticket</td>
                        <td class="tableTd"><?=utf8_decode("Código Autorización")?></td>
                        <td class="tableTd"><?=utf8_decode("Cédula")?></td>
                        <td class="tableTd"><?=utf8_decode("Aeropuerto Galápagos")?></td>
                        <td class="tableTd"><?=utf8_decode("Aeropuerto Continente")?></td>
                        <td class="tableTd"><?=utf8_decode("Fecha Conciliado")?></td>
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['Conciliado']['CONC_ID'].'</td>';
			echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_NUM_TICKET']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION']).'</td>';
                       $residenteModel = new Residente();
                       $cond = array('AND' => array("Residente.RES_ID = " . $row['Asignacione']['RES_ID'])); //Asignacion creada por el counter    
                       $residente = $residenteModel->find('all', array('conditions' => $cond));
                        echo '<td class="tableTdContent">'.utf8_decode($residente[0]['Residente']['RES_CEDULA']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_CIUDAD_ORIGEN']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Volado']['VOL_CIUDAD_DESTINO']).'</td>';
                        echo '<td class="tableTdContent">'.utf8_decode($row['Conciliado']['CONC_FECHA']).'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

