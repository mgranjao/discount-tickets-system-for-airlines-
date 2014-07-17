<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="periodos view">
<h2><?php  echo __('Período'); ?></h2>

	
	  <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_FECHA_INICIO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_FECHA_FIN']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmado Conciliador'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_CONFIRMADO_CONCILIADOR']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmado DGAC'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_CONFIRMADO_DGAC']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmado Pago'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_CONFIRMADO_PAGO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones Conciliador'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_OBSERVACIONES_CONC']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones DGAC'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_OBSERVACIONES_DGAC']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Conciliados'); ?></h3>

	

	<div class="menu_datatable">
            <ul>
      
               <li><?php echo $this->Html->link(__('New Conciliado'), array('controller' => 'conciliados', 'action' => 'add'), array('class' => 'nuevo_registro')); ?> </li>
                <div class="clear"></div>
            </ul>
    </div>


	<?php if (!empty($periodo['Conciliado'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('CONC ID'); ?></th>
		<th><?php echo __('VOL ID'); ?></th>
		<th><?php echo __('VOL VOL ID'); ?></th>
		<th><?php echo __('ASIG ID'); ?></th>
		<th><?php echo __('PERI ID'); ?></th>
		<th><?php echo __('CONC FECHA'); ?></th>
		<th><?php echo __('CONC CONFIRMADO'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($periodo['Conciliado'] as $conciliado): ?>
		<tr>
			<td><?php echo $conciliado['CONC_ID']; ?></td>
			<td><?php echo $conciliado['VOL_ID']; ?></td>
			<td><?php echo $conciliado['VOL_VOL_ID']; ?></td>
			<td><?php echo $conciliado['ASIG_ID']; ?></td>
			<td><?php echo $conciliado['PERI_ID']; ?></td>
			<td><?php echo $conciliado['CONC_FECHA']; ?></td>
			<td><?php echo $conciliado['CONC_CONFIRMADO']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conciliados', 'action' => 'view', $conciliado['CONC_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'conciliados', 'action' => 'edit', $conciliado['CONC_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'conciliados', 'action' => 'delete', $conciliado['CONC_ID']), null, __('Are you sure you want to delete # %s?', $conciliado['CONC_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>

</div>
