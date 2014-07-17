<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">
<div class="perfiles form">
<?php echo $this->Form->create('Perfiles'); ?>
	<fieldset>
		<legend><?php echo __('Editar Perfil'); ?></legend>

		  <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<?php
		echo $this->Form->input('PER_ID');
		echo $this->Form->input('PER_NOMBRE',array("label" => "Nombre"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
</div>
