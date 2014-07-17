<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">
<div class="periodos form">
<?php echo $this->Form->create('Periodo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Período'); ?></legend>

		<p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>
		
	<?php
		echo $this->Form->input('PERI_ID');
		echo $this->Form->input('PERI_FECHA_INICIO', array("label" => "Fecha Inicio", "type" => "date"));
		echo $this->Form->input('PERI_FECHA_FIN', array("label" => "Fecha Inicio", "type" => "date"));
		 echo $this->Form->input("AERO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $aerolineas,
                "label" => "Aerolínea:"
                    )
                  );
		/*echo $this->Form->input('PERI_CONFIRMADO_DGAC');
		echo $this->Form->input('PERI_CONFIRMADO_PAGO');
		echo $this->Form->input('PERI_OBSERVACIONES_CONC');
		echo $this->Form->input('PERI_OBSERVACIONES_DGAC');*/
	?>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>

</div>