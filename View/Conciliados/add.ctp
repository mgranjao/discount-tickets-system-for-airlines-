<div class="conciliados form">
<?php echo $this->Form->create('Conciliado'); ?>
	<fieldset>
		<legend><?php echo __('Add Conciliado'); ?></legend>
	<?php
		echo $this->Form->input('VOL_ID');
		echo $this->Form->input('VOL_VOL_ID');
		echo $this->Form->input('ASIG_ID');
		echo $this->Form->input('CONC_FECHA');
		echo $this->Form->input('CONC_CONFIRMADO');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Conciliados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Volados'), array('controller' => 'volados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volado'), array('controller' => 'volados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
