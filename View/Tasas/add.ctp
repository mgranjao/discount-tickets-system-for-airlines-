<?php echo  $this->element('header_aeropuertos'); ?>

<div class="inside">
<div class="tasas form">
<?php echo $this->Form->create('Tasa'); ?>
	<fieldset>
		<legend><?php echo __('Nueva Tasa'); ?></legend>

        <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>
        
	<?php
		echo $this->Form->input("AERO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $aerolineas,
                "label" => "Aerol&iacute;nea"
                    )
                  );
                echo $this->Form->input("CATAG_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $aeropuertos,
                "label" => "Aeropuerto"
                    )
                  );
		echo $this->Form->input('TASA_TASAS',array("label" => "Tasas"));
		echo $this->Form->input('TASA_IMPUESTOS',array("label" => "Impuestos"));
		echo $this->Form->input('TASA_FEE',array("label" => "Fee"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>