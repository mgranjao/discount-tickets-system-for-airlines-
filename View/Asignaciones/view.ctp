<div class="asignaciones view">
<h2><?php  echo __('Asignación'); ?></h2>
	<dl>
		<dt><?php echo __('ASIG ID'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asignacione['Cupo']['CUPO_ID'], array('controller' => 'cupos', 'action' => 'view', $asignacione['Cupo']['CUPO_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aerolinea'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asignacione['Aerolinea']['AERO_NOMBRE'], array('controller' => 'aerolineas', 'action' => 'view', $asignacione['Aerolinea']['AERO_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Residente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asignacione['Residente']['RES_CEDULA'], array('controller' => 'residentes', 'action' => 'view', $asignacione['Residente']['RES_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Asignación'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_FECHA_CREACION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Código Autorización'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aeropuerto Partida'); ?></dt>
		<dd>
			<?php echo h($asignacione['Catalogo']['CATAG_VALOR']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aeropuerto Destino'); ?></dt>
		<dd>
			<?php echo h($asignacione['CatalogoDestino']['CATAG_VALOR']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php echo __('ASIG DET VALOR'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_DET_VALOR']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Tipo Vuelo'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_DET_TIPO_VUELO']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Asignacione'), array('action' => 'edit', $asignacione['Asignacione']['ASIG_ID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Asignacione'), array('action' => 'delete', $asignacione['Asignacione']['ASIG_ID']), null, __('Are you sure you want to delete # %s?', $asignacione['Asignacione']['ASIG_ID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Autorizacions'); ?></h3>
	<?php if (!empty($asignacione['Autorizacion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('AUT ID'); ?></th>
		<th><?php echo __('ASIG ID'); ?></th>
		<th><?php echo __('AUT CODIGO AUTORIZACION'); ?></th>
		<th><?php echo __('AUT VALOR PAGADO'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($asignacione['Autorizacion'] as $autorizacion): ?>
		<tr>
			<td><?php echo $autorizacion['AUT_ID']; ?></td>
			<td><?php echo $autorizacion['ASIG_ID']; ?></td>
			<td><?php echo $autorizacion['AUT_CODIGO_AUTORIZACION']; ?></td>
			<td><?php echo $autorizacion['AUT_VALOR_PAGADO']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'autorizacions', 'action' => 'view', $autorizacion['AUT_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'autorizacions', 'action' => 'edit', $autorizacion['AUT_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'autorizacions', 'action' => 'delete', $autorizacion['AUT_ID']), null, __('Are you sure you want to delete # %s?', $autorizacion['AUT_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
