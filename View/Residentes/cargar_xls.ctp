<?php echo  $this->element('header_residentes'); ?>

<div class="inside">

<div class="residentes form">
<?php echo $this->Form->create('Residente', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Cargar Residentes'); ?></legend>

        <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>
        
	<?php
		
		echo $this->Form->input("RES_ARCHIVO", array(
                "type" => "file", // también sirve "radio"
                //"options" => $tipoColonos,
                "label" => "Archivo excel"
                    )
                  );
       
	?>
            <!--<label for="cupos_disponibles">Cupos Disponibles: <?php echo $residente_cupos; ?></label>-->            
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

</div>