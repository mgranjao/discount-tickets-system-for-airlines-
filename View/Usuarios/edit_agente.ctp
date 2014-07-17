<div class="inside">
<div class="usuarios asignaciones form">
<?php echo $this->Form->create('Usuario', array("class"=>"default_form")); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuario'); ?></legend>

     <?php echo $this->Html->link(__('<- Regresar'), array('controller'=>'usuarios','action' => 'agentes_supervisor'), array('class' => 'regresar')); ?>


<p class="no_bg">
  <?php
		echo $this->Form->label('AERO_ID','Aerolinea: ').$this->request->data['Aerolinea']['AERO_NOMBRE'];
  ?>
  </p>
<p class="bg">
  <?
                 echo $this->Form->label('PER_ID','Perfil: ').$this->request->data['Perfile']['PER_NOMBRE'];
  ?>
</p>
  <?

                 //echo $this->Form->label('USU_EMAIL','E-mail: '.$user[0]['Usuario']['USU_EMAIL']);
                 
       /* echo $this->Form->input("PER_ID", array(
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
                  );*/
    ?>
     <div class="no_bg">
    <?
               echo $this->Form->input("OFI_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $oficinas,
                "label" => "Oficina",
                "class" => "required" 
                    )
                  );
      ?>
      </div>

      <?         
               echo $this->Form->input('AERO_ID', array("type" => "hidden" ));
               echo $this->Form->input('Aerolinea.AERO_NOMBRE', array("type" => "hidden", "value" => $this->request->data['Aerolinea']['AERO_NOMBRE'] ));
               echo $this->Form->input('Perfile.PER_NOMBRE', array("type" => "hidden", "value" => $this->request->data['Perfile']['PER_NOMBRE']));

       ?>
        <div class="bg">
       <?        
               echo $this->Form->input('USU_NOMBRE_COMPLETO', array("label" => "Nombre Completo" ,
                "class" => "required"  ));
         ?>
       </div>
        <div class="no_bg">
         <?      
	       echo $this->Form->input('USU_EMAIL', array("label" => "E-mail" ,
                "class" => "required"  ));
	  	  ?>
      </div>
       <div class="bg">
        <?
       //echo $this->Form->input('USU_PASSWORD');
                echo $this->Form->input("USU_PASSWORD", array(
                "type" => "password",
                "label" => "Password"   ,
                "class" => "required"  
                    )
                );
        ?>
      </div>
      <div class="no_bg">
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
      <div class="bg">
        <?
    echo $this->Form->input('USU_TELEFONO', array("label" => "Tel&eacute;fono" ,
                "class" => "required" ));
		  ?>
    </div>
    <div class="no_bg">
      <?

    echo $this->Form->input('USU_DIRECCION', array("label" => "Direcci&oacute;n",
                "class" => "required"  ));
                
	?>
</div>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
</div>
