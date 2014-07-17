
<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">
<div class="estados form">
<?php echo $this->Form->create('Estado'); ?>
	<fieldset>
		<legend><?php echo __('Add Estado'); ?></legend>

                 <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>
                
	<?php
		echo $this->Form->input('EST_NOMBRE',array("label" => "Nombre"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

</div>