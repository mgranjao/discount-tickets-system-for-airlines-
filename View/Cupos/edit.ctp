<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="cupos form">
<?php echo $this->Form->create('Cupo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cupo'); ?></legend>

         <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

        
	<?php
		echo $this->Form->input('CUPO_ID');
		//echo $this->Form->input('TIPO_ID');
                echo $this->Form->input("TIPO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $tipoColonos,
                "label" => "Aplica para:"
                    )
                  );
		//echo $this->Form->input('USU_ID');
		echo $this->Form->input('CUPO_CANTIDAD', array("label" => "Cantidad de Cupos" ));
		echo $this->Form->input('CUPO_FECHA_DESDE', array("label" => "Desde" ));
		echo $this->Form->input('CUPO_FECHA_HASTA', array("label" => "Hasta" ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

</div>