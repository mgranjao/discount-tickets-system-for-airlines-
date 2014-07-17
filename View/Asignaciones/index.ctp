<div class="asignaciones index">
	<h2><?php echo __('Asignaciones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ASIG_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('CUPO_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('AERO_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('RES_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_FECHA_CREACION'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_DET_CODIGO_RESERVA'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_DET_PARTIDA'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_DET_DESTINO'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_DET_VALOR'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_DET_TIPO_VUELO'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php $aero_id = $this->Session->read('Aerolinea.AERO_ID');
	foreach ($asignacioness as $asignacione): ?>
        <?php //Controla que se muestre las asignaciones de la aerolinea del usuario iniciado sesion
        if($asignacione['Aerolinea']['AERO_ID'] == $aero_id){?>
	<tr>
		<td><?php echo h($asignacione['Asignacione']['ASIG_ID']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($asignacione['Cupo']['CUPO_ID'], array('controller' => 'cupos', 'action' => 'view', $asignacione['Cupo']['CUPO_ID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($asignacione['Aerolinea']['AERO_NOMBRE'], array('controller' => 'aerolineas', 'action' => 'view', $asignacione['Aerolinea']['AERO_ID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($asignacione['Residente']['RES_CEDULA'], array('controller' => 'residentes', 'action' => 'view', $asignacione['Residente']['RES_ID'])); ?>
		</td>
		<td><?php echo h($asignacione['Asignacione']['ASIG_FECHA_CREACION']); ?>&nbsp;</td>
		<td><?php echo h($asignacione['Asignacione']['ASIG_DET_CODIGO_RESERVA']); ?>&nbsp;</td>
		<td><?php echo h($asignacione['Asignacione']['ASIG_DET_PARTIDA']); ?>&nbsp;</td>
		<td><?php echo h($asignacione['Asignacione']['ASIG_DET_DESTINO']); ?>&nbsp;</td>
		<td><?php echo h($asignacione['Asignacione']['ASIG_DET_VALOR']); ?>&nbsp;</td>
		<td><?php echo h($asignacione['Asignacione']['ASIG_DET_TIPO_VUELO']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $asignacione['Asignacione']['ASIG_ID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $asignacione['Asignacione']['ASIG_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $asignacione['Asignacione']['ASIG_ID']), null, __('Are you sure you want to delete # %s?', $asignacione['Asignacione']['ASIG_ID'])); ?>
		</td>
	</tr>
        <?php }?>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Residentes'), array('controller' => 'residentes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Residente'), array('controller' => 'residentes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cupos'), array('controller' => 'cupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cupo'), array('controller' => 'cupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aerolineas'), array('controller' => 'aerolineas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aerolinea'), array('controller' => 'aerolineas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autorizacions'), array('controller' => 'autorizacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Autorizacion'), array('controller' => 'autorizacions', 'action' => 'add')); ?> </li>
	</ul>
</div>
