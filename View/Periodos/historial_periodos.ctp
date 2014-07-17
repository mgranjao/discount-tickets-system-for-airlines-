<div class="inside">

<div class="asignaciones index">
	<h2><?php echo __('Períodos'); ?></h2>
<!--	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('PERI_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('PERI_FECHA_INICIO'); ?></th>
			<th><?php echo $this->Paginator->sort('PERI_FECHA_FIN'); ?></th>
			<th><?php echo $this->Paginator->sort('PERI_CONFIRMADO_CONCILIADOR'); ?></th>
			<th><?php echo $this->Paginator->sort('PERI_CONFIRMADO_DGAC'); ?></th>
			<th><?php echo $this->Paginator->sort('PERI_CONFIRMADO_PAGO'); ?></th>
			<th><?php echo $this->Paginator->sort('PERI_OBSERVACIONES_CONC'); ?></th>
			<th><?php echo $this->Paginator->sort('PERI_OBSERVACIONES_DGAC'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($periodos as $periodo): ?>
	<tr>
		<td><?php echo h($periodo['Periodo']['PERI_ID']); ?>&nbsp;</td>
		<td><?php echo h($periodo['Periodo']['PERI_FECHA_INICIO']); ?>&nbsp;</td>
		<td><?php echo h($periodo['Periodo']['PERI_FECHA_FIN']); ?>&nbsp;</td>
		<td><?php echo h($periodo['Periodo']['PERI_CONFIRMADO_CONCILIADOR']); ?>&nbsp;</td>
		<td><?php echo h($periodo['Periodo']['PERI_CONFIRMADO_DGAC']); ?>&nbsp;</td>
		<td><?php echo h($periodo['Periodo']['PERI_CONFIRMADO_PAGO']); ?>&nbsp;</td>
		<td><?php echo h($periodo['Periodo']['PERI_OBSERVACIONES_CONC']); ?>&nbsp;</td>
		<td><?php echo h($periodo['Periodo']['PERI_OBSERVACIONES_DGAC']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $periodo['Periodo']['PERI_ID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $periodo['Periodo']['PERI_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $periodo['Periodo']['PERI_ID']), null, __('Are you sure you want to delete # %s?', $periodo['Periodo']['PERI_ID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Periodo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Conciliados'), array('controller' => 'conciliados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conciliado'), array('controller' => 'conciliados', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

	

	  <div class="menu_datatable">
            <ul>
                <li>
                	<?php echo $this->Html->link(__('Exportar'), array('controller' => 'periodos', 'action' => 'export_xls'),  array('class' => 'exportar_excel')); ?>

                </li>
             </ul>
       </div>



    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_periodos_conciliador" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Confirmado Conciliador</th>
                <th>Confirmado DGAC</th>
                <th>Confirmado Pago</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
        
        
        
</div>
</div>
