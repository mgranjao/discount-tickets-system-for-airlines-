<?php echo  $this->element('header_residentes'); ?>

<div class="inside">
<div class="residentes form">
<?php echo $this->Form->create('Residente'); ?>
	<fieldset>
		<legend><?php echo __('Editar Residente'); ?></legend>

        <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<?php
		echo $this->Form->input('RES_ID');
		echo $this->Form->input("TIPO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $tipoColonos,
                "label" => "Tipo Colono"
                    )
                  );
        echo $this->Form->input('RES_NUMERO_CERTIFICADO', array('label' => 'N&uacute;mero de Certificado'));
        echo $this->Form->input('RES_CEDULA', array('label' => 'C&eacute;dula/Pasaporte'));
        echo $this->Form->input('RES_NOMBRES', array('label' => 'Nombres'));
        echo $this->Form->input('RES_APELLIDOS', array('label' => 'Apellidos'));
        //echo $this->Form->input('RES_SEXO', array('label' => 'Sexo'));
        echo $this->Form->input("RES_SEXO", array(
                "type" => "select", // también sirve "radio"
                "options" => array('M','F'),
                "label" => "Sexo"
                    )
                  );
        echo $this->Form->input('RES_FECHA_NACIMIENTO', array('label' => 'Fecha de Nacimiento',
            'dateFormat' => 'DMY',
            'minYear' => date('Y') - 100,
            'maxYear' => date('Y') - 0));

        echo $this->Form->input('RES_FECHA_CARNE_EMIS',array('label' => 'Fecha de Emisión de Carné'));
        echo $this->Form->input('RES_FECHA_EXPIRA', array('label' => 'Fecha de Expiración'));
       // echo $this->Form->input('RES_CUPO_DISPONIBLE', array('label' => 'Cupos Disponibles'));
        echo $this->Form->input('RES_OBSERVACION', array('label' => 'Observaciones', 'type' => 'textarea'));
	?>
            <!--<label for="cupos_disponibles">Cupos Disponibles: <?php echo $residente_cupos; ?></label>-->            
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>