<?php echo  $this->element('header_aeropuertos'); ?>
<div class="inside">

<div class="ciudades form">
<?php echo $this->Form->create('Ciudade'); ?>
	<fieldset>
		<legend><?php echo __('Editar Ciudad'); ?></legend>

		     <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

		
	<?php
		echo $this->Form->input('CIU_ID', array("label" => "ID"));
		echo $this->Form->input('CIU_NOMBRE', array("label" => "Nombre"));
		echo $this->Form->input('CIU_PROVINCIA', array("label" => "Provincia"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>