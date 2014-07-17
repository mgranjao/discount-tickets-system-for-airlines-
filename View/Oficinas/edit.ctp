<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">

<div class="oficinas form">
<?php echo $this->Form->create('Oficina'); ?>
	<fieldset>
		<legend><?php echo __('Edit Oficina'); ?></legend>

         <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

	<?php
		echo $this->Form->input('OFI_ID');
		//echo $this->Form->input('AERO_ID');
                echo $this->Form->input("AERO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $aerolineas,
                "label" => "Aerolínea:"
                    )
                  );
		echo $this->Form->input('OFI_CODIGO',array("label" => "Código"));
		echo $this->Form->input('OFI_DIRECCION',array("label" => "Dirección"));
		//echo $this->Form->input('OFI_CIUDAD',array("label" => "Ciudad"));
                echo $this->Form->input("CIU_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $ciudades,
                "label" => "Ciudad"
                    )
               );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

</div>