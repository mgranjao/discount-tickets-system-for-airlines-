<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="configuraciones form">
<?php echo $this->Form->create('Configuracione'); ?>
	


	<fieldset>
		<legend><?php echo __('Editar Configuración'); ?></legend>

		
  <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

  
		
	<?php
		echo $this->Form->input('CONFIG_ID');
		echo $this->Form->input('CONFIG_PARAMETRO', array("label" => "Parámetro"));
		echo $this->Form->input('CONFIG_VALOR', array("label" => "Valor"));
		echo $this->Form->input('CONFIG_DESCRIPCION', array("label" => "Descripción"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

</div>