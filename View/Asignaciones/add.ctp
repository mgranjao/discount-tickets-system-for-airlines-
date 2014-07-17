<div class="asignaciones form">
<?php echo $this->Form->create('Asignacione'); ?>
	<fieldset>
		<legend><?php echo __('Add Asignacione'); ?></legend>
	<?php
		echo $this->Form->input('CUPO_ID');
		echo $this->Form->input('AERO_ID');
		echo $this->Form->input('RES_ID');
		echo $this->Form->input('ASIG_FECHA_CREACION');
		echo $this->Form->input('ASIG_DET_CODIGO_RESERVA');
		echo $this->Form->input('ASIG_DET_PARTIDA');
		echo $this->Form->input('ASIG_DET_DESTINO');
		echo $this->Form->input('ASIG_DET_VALOR');
		echo $this->Form->input('ASIG_DET_TIPO_VUELO');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Asignaciones'), array('action' => 'index')); ?></li>
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
