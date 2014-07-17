<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="tipoColonos form">
<?php echo $this->Form->create('TipoColono'); ?>
	<fieldset>
		<legend><?php echo __('Crear Tipo Colono'); ?></legend>

                 <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>
                

	<?php
		echo $this->Form->input('TIPO_NOMBRE',array("label" => "Nombre"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>

</div>