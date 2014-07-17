<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">
<div class="aerolineas form">
<?php echo $this->Form->create('Aerolinea'); ?>


	<fieldset>
		<legend><?php echo __('Editar Aerolínea'); ?></legend>


         <p>Editar los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<?php
		echo $this->Form->input('AERO_ID');
		echo $this->Form->input('AERO_NOMBRE',array(
                "label" => "Nombre"));
                
                echo $this->Form->input("ASIGNACION_PASOS", array(
                "label" => "Pasos en proceso de asignación",
                "type" => "select",
                //"value" => $cupos[0]['Cupo']['CUPO_ID'],
                "options" => $paso_config,
                "default"=> $pasos_selected
                    ) );
                        
                        echo $this->Form->input("CONFIG_X_AERO_ID", array(
                "type" => "hidden",
                "value" => $id_config
                    ) );
                echo $this->Form->input('AERO_PREFIJO',array("label" => "Prefijo para código de autorización"));        
                echo $this->Form->input('AERO_USAR_TASAS', array("label" => "¿Usar tasas predefinidas?"));        
           
	?>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>

</div>