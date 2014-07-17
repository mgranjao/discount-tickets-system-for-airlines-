<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">
<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
	<fieldset>
		<legend><?php echo __('Editar Supervisor'); ?></legend>

           <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>
        
	<?php
		
        
        echo $this->Form->label('AERO_ID','Aerolinea: '.$this->request->data['Aerolinea']['AERO_NOMBRE']);
                 echo $this->Form->label('PER_ID','Perfil: '.$this->request->data['Perfile']['PER_NOMBRE']);
                 echo $this->Form->label('USU_EMAIL','E-mail: '.$this->request->data['Usuario']['USU_EMAIL']);
                 
       
              /*   
               echo $this->Form->input("OFI_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $oficinas,
                "label" => "Oficina"
                    )
                  );*/
            
              
                
                
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Agregar Oficina')); ?>
<br/>




    <h2><?php echo __('Oficinas Supervisadas'); ?></h2>



    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">
    <input type="hidden" name="usu_id" id="usu_id" value="<?= $usuario_id ?>">

    <table id="data_table_oficinas_supervisor" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>C&oacute;digo</th>
                <th>Ciudad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    
    
    <br/><br/>
    <h2><?php echo __('Oficinas No Asignadas al Supervisor'); ?></h2>


    
    <table id="data_table_oficinas_no_supervisadas_por_id" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>C&oacute;digo</th>
                <th>Ciudad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


</div>
</div>
