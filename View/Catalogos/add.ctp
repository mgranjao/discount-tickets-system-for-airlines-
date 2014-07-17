<?php echo  $this->element('header_aeropuertos'); ?>
<div class="inside">

<div class="catalogos form">
<?php echo $this->Form->create('Catalogo'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Aeropuerto'); ?></legend>

         <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<?php
		echo $this->Form->input('CATAG_VALOR', array("label" => "Código"));
		//echo $this->Form->input('CATAG_TIPO', array("label" => "Tipo"));
                echo $this->Form->input("CATAG_TIPO", array(
                "type" => "select", // también sirve "radio"
                "options" => $tipos,
                "label" => "Tipo"
                    )
               );
		echo $this->Form->input('CATAG_DESCRIPCION', array("label" => "Descripción"));
		echo $this->Form->input('CATAG_TARIFA', array("label" => "Tarifa"));
                echo $this->Form->input("CIU_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $ciudades,
                "label" => "Ciudad"
                    )
               );
		echo $this->Form->input('CATAG_ESTADO', array("label" => "Estado"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>