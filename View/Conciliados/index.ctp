<div class="conciliados index">
	<h2><?php echo __('Conciliados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('CONC_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_VOL_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('ASIG_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('CONC_FECHA'); ?></th>
			<th><?php echo $this->Paginator->sort('CONC_CONFIRMADO'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($conciliados as $conciliado): ?>
	<tr>
		<td><?php echo h($conciliado['Conciliado']['CONC_ID']); ?>&nbsp;</td>
		<td><?php echo h($conciliado['Conciliado']['VOL_ID']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($conciliado['Volado']['VOL_ID'], array('controller' => 'volados', 'action' => 'view', $conciliado['Volado']['VOL_ID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($conciliado['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION'], array('controller' => 'asignaciones', 'action' => 'view', $conciliado['Asignacione']['ASIG_ID'])); ?>
		</td>
		<td><?php echo h($conciliado['Conciliado']['CONC_FECHA']); ?>&nbsp;</td>
		<td><?php echo h($conciliado['Conciliado']['CONC_CONFIRMADO']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $conciliado['Conciliado']['CONC_ID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $conciliado['Conciliado']['CONC_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $conciliado['Conciliado']['CONC_ID']), null, __('Are you sure you want to delete # %s?', $conciliado['Conciliado']['CONC_ID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Conciliado'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Volados'), array('controller' => 'volados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volado'), array('controller' => 'volados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
