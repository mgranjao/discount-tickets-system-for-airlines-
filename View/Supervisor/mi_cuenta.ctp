<div class="usuarios form">
<?php echo $this->Form->create('Usuario', array("class"=>"default_form")); ?>
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
                ?>
                <p class="no_bg">
                <?
                 echo $this->Form->label('AERO_ID','Aerolinea: ').$aerolinea[0]['Aerolinea']['AERO_NOMBRE'];
                 ?>
                </p>
                <p class="bg">
                 <?
                 echo $this->Form->label('PER_ID','Perfil: ').$perfil[0]['Perfile']['PER_NOMBRE'];
                 ?>
                </p>
                <p class="no_bg">
                 <?
                 echo $this->Form->label('USU_NOMBRE_COMPLETO','Nombre Completo: ').$user[0]['Usuario']['USU_NOMBRE_COMPLETO'];
                 ?>
                </p>
                <p class="bg">
                 <?
                 echo $this->Form->label('USU_EMAIL','E-mail: ').$user[0]['Usuario']['USU_EMAIL'];
                 ?>
                </p>
                <div class="no_bg">
                 <?
                 //echo $this->Form->input('USU_EMAIL', array("label" => "E-mail" ));
	  	 
                //echo $this->Form->input('USU_PASSWORD');
                echo $this->Form->input("USU_PASSWORD", array(
                "type" => "password",
                "label" => "Password",
                "class" => "required"  
                    )
                );
                ?>
                </div>
                <div class="bg">
                <?
                echo $this->Form->input("USU_PASSWORD_CONFIRM", array(
                "type" => "password",
                "label" => "Confirmar Password" ,
                "value" => $password,
                "class" => "required"
                    )
                );
                ?>
                </div>
                <div class="no_bg">
                <?
		      echo $this->Form->input('USU_TELEFONO', array("label" => "Tel&eacute;fono",
                "class" => "required"));
		      ?>
                </div>
                <div class="bg">
                <?
                echo $this->Form->input('USU_DIRECCION', array("label" => "Direcci&oacute;n",
                "class" => "required"));
                ?>
                </div>
                
                

	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
