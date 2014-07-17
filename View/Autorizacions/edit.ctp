<div class="autorizacions form">
<?php echo $this->Form->create('Autorizacion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Autorizacion'); ?></legend>
	<?php
		echo $this->Form->input('AUT_ID');
		echo $this->Form->input('ASIG_ID');
		echo $this->Form->input('AUT_CODIGO_AUTORIZACION');
		echo $this->Form->input('AUT_VALOR_PAGADO');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Autorizacion.AUT_ID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Autorizacion.AUT_ID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Autorizacions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
