<div class="volados index">
	<h2><?php echo __('Volados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('VOL_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_COD_AERO'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_NUM_TICKET'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_CUPON'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_NUMERO_VUELO'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_FECHA_VUELO'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_CIUDAD_ORIGEN'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_CIUDAD_DESTINO'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_TARIFA'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_TASA'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_IMPUESTOS'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_VALOR_TOTAL'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_CODIGO_AUT'); ?></th>
			<th><?php echo $this->Paginator->sort('VOL_CONFIRMADO'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($volados as $volado): ?>
	<tr>
		<td><?php echo h($volado['Volado']['VOL_ID']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_COD_AERO']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_NUM_TICKET']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_CUPON']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_NUMERO_VUELO']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_FECHA_VUELO']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_CIUDAD_ORIGEN']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_CIUDAD_DESTINO']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_TARIFA']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_TASA']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_IMPUESTOS']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_VALOR_TOTAL']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_CODIGO_AUT']); ?>&nbsp;</td>
		<td><?php echo h($volado['Volado']['VOL_CONFIRMADO']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $volado['Volado']['VOL_ID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $volado['Volado']['VOL_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $volado['Volado']['VOL_ID']), null, __('Are you sure you want to delete # %s?', $volado['Volado']['VOL_ID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Volado'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Conciliados'), array('controller' => 'conciliados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conciliado'), array('controller' => 'conciliados', 'action' => 'add')); ?> </li>
	</ul>
</div>
