<div class="volados form">
<?php echo $this->Form->create('Volado'); ?>
	<fieldset>
		<legend><?php echo __('Add Volado'); ?></legend>
	<?php
		echo $this->Form->input('VOL_COD_AERO');
		echo $this->Form->input('VOL_NUM_TICKET');
		echo $this->Form->input('VOL_CUPON');
		echo $this->Form->input('VOL_NUMERO_VUELO');
		echo $this->Form->input('VOL_FECHA_VUELO');
		echo $this->Form->input('VOL_CIUDAD_ORIGEN');
		echo $this->Form->input('VOL_CIUDAD_DESTINO');
		echo $this->Form->input('VOL_TARIFA');
		echo $this->Form->input('VOL_TASA');
		echo $this->Form->input('VOL_IMPUESTOS');
		echo $this->Form->input('VOL_VALOR_TOTAL');
		echo $this->Form->input('VOL_CODIGO_AUT');
		echo $this->Form->input('VOL_CONFIRMADO');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Volados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Conciliados'), array('controller' => 'conciliados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conciliado'), array('controller' => 'conciliados', 'action' => 'add')); ?> </li>
	</ul>
</div>
