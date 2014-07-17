<div class="autorizacions index">
	<h2><?php echo __('Autorizacions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('AUT_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('AUT_CODIGO_AUTORIZACION'); ?></th>
			<th><?php echo $this->Paginator->sort('AUT_VALOR_PAGADO'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($autorizacions as $autorizacion): ?>
	<tr>
		<td><?php echo h($autorizacion['Autorizacion']['AUT_ID']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($autorizacion['Asignacione']['ASIG_DET_CODIGO_RESERVA'], array('controller' => 'asignaciones', 'action' => 'view', $autorizacion['Asignacione']['ASIG_ID'])); ?>
		</td>
		<td><?php echo h($autorizacion['Autorizacion']['AUT_CODIGO_AUTORIZACION']); ?>&nbsp;</td>
		<td><?php echo h($autorizacion['Autorizacion']['AUT_VALOR_PAGADO']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $autorizacion['Autorizacion']['AUT_ID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $autorizacion['Autorizacion']['AUT_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $autorizacion['Autorizacion']['AUT_ID']), null, __('Are you sure you want to delete # %s?', $autorizacion['Autorizacion']['AUT_ID'])); ?>
		</td>
	</tr>
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
		<li><?php echo $this->Html->link(__('New Autorizacion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
