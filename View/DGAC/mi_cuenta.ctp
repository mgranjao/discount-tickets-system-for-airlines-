<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
	<fieldset>
		<legend><?php echo __('Mi Cuenta'); ?></legend>
	<?php
		/*echo $this->Form->input('USU_ID');
		echo $this->Form->input('PER_ID');
		echo $this->Form->input('AERO_ID');
		echo $this->Form->input('USU_EMAIL');
		echo $this->Form->input('USU_PASSWORD');
		echo $this->Form->input('USU_TELEFONO');
		echo $this->Form->input('USU_DIRECCION');*/
        
       /* echo $this->Form->input("PER_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $perfiles,
                "label" => "Perfil"
                    )
               );*/

              /* echo $this->Form->input("AERO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $aerolineas,
                "label" => "Aerol&iacute;nea"
                    )
                  );*/
            
                 //echo $this->Form->label('AERO_ID','Aerolinea: '.$aerolinea[0]['Aerolinea']['AERO_NOMBRE']);
                 echo $this->Form->label('PER_ID','Perfil: '.$perfil[0]['Perfile']['PER_NOMBRE']);
                 echo $this->Form->label('USU_NOMBRE_COMPLETO','Nombre Completo: '.$user[0]['Usuario']['USU_NOMBRE_COMPLETO']);
                 echo $this->Form->label('USU_EMAIL','E-mail: '.$user[0]['Usuario']['USU_EMAIL']);

                 //echo $this->Form->input('USU_EMAIL', array("label" => "E-mail" ));
	  	 
                //echo $this->Form->input('USU_PASSWORD');
                echo $this->Form->input("USU_PASSWORD", array(
                "type" => "password",
                "label" => "Password"    
                    )
                );
                
                echo $this->Form->input("USU_PASSWORD_CONFIRM", array(
                "type" => "password",
                "label" => "Confirmar Password" ,
                "value" => $password
                    )
                );
		echo $this->Form->input('USU_TELEFONO', array("label" => "Tel&eacute;fono" ));
		echo $this->Form->input('USU_DIRECCION', array("label" => "Direcci&oacute;n" ));
                
                
                
                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Reporte mensual'), array('controller' => 'DGAC', 'action' => 'reportes')); ?> </li>
                <li><?php echo $this->Html->link(__('Historial Residente'), array('controller' => 'DGAC', 'action' => 'residente')); ?> </li>
                <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'DGAC', 'action' => 'periodos')); ?> </li>
                <li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'DGAC', 'action' => 'mi_cuenta')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>
</div>