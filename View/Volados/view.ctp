

<div  class="inside"> 

<div class="asignaciones view">
<h2><?php  echo __('Volado'); ?></h2>

<p>Detalle de la información ticket volado: </p>

         
           <a href="javascript:history.back(1)" class="regresar"><- Regresar</a>

	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Código Aerolínea'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_COD_AERO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ticket'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_NUM_TICKET']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cupón'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_CUPON']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Número Vuelo'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_NUMERO_VUELO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Vuelo'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_FECHA_VUELO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Origen'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_CIUDAD_ORIGEN']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destino'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_CIUDAD_DESTINO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tarifa'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_TARIFA']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tasa'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_TASA']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Impuestos'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_IMPUESTOS']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_VALOR_TOTAL']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Código Autorización'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_CODIGO_AUT']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php echo __('Confirmado'); ?></dt>
		<dd>
			<?php echo h($volado['Volado']['VOL_CONFIRMADO']); ?>
			&nbsp;
		</dd>-->
	</dl>
</div>

</div>






<!--
<div class="related">
	<h3><?php echo __('Related Conciliados'); ?></h3>
	<?php if (!empty($volado['Conciliado'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('CONC ID'); ?></th>
		<th><?php echo __('VOL ID'); ?></th>
		<th><?php echo __('VOL VOL ID'); ?></th>
		<th><?php echo __('ASIG ID'); ?></th>
		<th><?php echo __('CONC FECHA'); ?></th>
		<th><?php echo __('CONC CONFIRMADO'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($volado['Conciliado'] as $conciliado): ?>
		<tr>
			<td><?php echo $conciliado['CONC_ID']; ?></td>
			<td><?php echo $conciliado['VOL_ID']; ?></td>
			<td><?php echo $conciliado['VOL_VOL_ID']; ?></td>
			<td><?php echo $conciliado['ASIG_ID']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Conciliados'); ?></h3>
	<?php if (!empty($volado['ConciliadoRetorno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('CONC ID'); ?></th>
		<th><?php echo __('VOL ID'); ?></th>
		<th><?php echo __('VOL VOL ID'); ?></th>
		<th><?php echo __('ASIG ID'); ?></th>
		<th><?php echo __('CONC FECHA'); ?></th>
		<th><?php echo __('CONC CONFIRMADO'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($volado['ConciliadoRetorno'] as $conciliadoRetorno): ?>
		<tr>
			<td><?php echo $conciliadoRetorno['CONC_ID']; ?></td>
			<td><?php echo $conciliadoRetorno['VOL_ID']; ?></td>
			<td><?php echo $conciliadoRetorno['VOL_VOL_ID']; ?></td>
			<td><?php echo $conciliadoRetorno['ASIG_ID']; ?></td>
			<td><?php echo $conciliadoRetorno['CONC_FECHA']; ?></td>
			<td><?php echo $conciliadoRetorno['CONC_CONFIRMADO']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conciliados', 'action' => 'view', $conciliadoRetorno['CONC_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'conciliados', 'action' => 'edit', $conciliadoRetorno['CONC_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'conciliados', 'action' => 'delete', $conciliadoRetorno['CONC_ID']), null, __('Are you sure you want to delete # %s?', $conciliadoRetorno['CONC_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>

-->
