<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">

<div class="usuarios form">
<?php echo $this->Html->script('usuarios_add'); ?>
<?php echo $this->Form->create('Usuario'); ?>
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">
	<fieldset>
		<legend><?php echo __('Nuevo Usuario'); ?></legend>

         <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

        

	<?php
		//echo $this->Form->input('PER_ID');
		//echo $this->Form->input('AERO_ID');
                
               echo $this->Form->input("PER_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $perfiles,
                "label" => "Perfil"
                    )
               );

               echo $this->Form->input("AERO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $aerolineas,
                "label" => "Aerol&iacute;nea"
                    )
                  );
               ?>
            <div id="oficinas"></div>
            <?php
                echo $this->Form->input('USU_NOMBRE_COMPLETO', array("label" => "Nombre Completo" ));
		echo $this->Form->input('USU_EMAIL', array("label" => "E-mail" ));
		//echo $this->Form->input('USU_PASSWORD');
                echo $this->Form->input("USU_PASSWORD", array(
                "type" => "password",
                "label" => "Password"    
                    )
                );
                echo $this->Form->input("USU_PASSWORD_CONFIRM", array(
                "type" => "password",
                "label" => "Confirmar Password"    
                    )
                );
                
		echo $this->Form->input('USU_TELEFONO', array("label" => "Tel&eacute;fono" ));
		echo $this->Form->input('USU_DIRECCION', array("label" => "Direcci&oacute;n" ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar')); ?>
</div>

</div>