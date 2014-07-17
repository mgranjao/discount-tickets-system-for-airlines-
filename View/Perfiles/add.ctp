<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="perfiles form">
<?php echo $this->Form->create('Perfile'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Perfil'); ?></legend>

                  <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>
                
	<?php
		echo $this->Form->input('PER_NOMBRE',array("label" => "Nombre"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>

</div>