
<div class="inside">
<div class="asignaciones form">
	<h2><?php echo __('Reportes'); ?></h2>

    <p>
        
    </p>

        <?php echo $this->Form->create('DGAC'); ?>
	

    <fieldset>
		
	<?php
		//echo $this->Form->input('AERO_ID');
                echo $this->Form->input("RES_CEDULA", array(
                "type" => "text", // también sirve "radio"
                //"options" => $aerolineas,
                "label" => "Cédula:"
                    )
                  );
                
                /*echo $this->Form->input("CUPO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $cupos,
                "label" => "Cupo:"
                    )
                  );
                */
                
		
	?>
           
            <div id="periodos"></div>
           
            
	</fieldset>
<?php echo $this->Form->end(__('Consultar')); ?>

</div>
<<<<<<< .mine
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
             <li><?php echo $this->Html->link(__('Historial Residente'), array('controller' => 'Reportes', 'action' => 'residente')); ?> </li>
                <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'Reportes', 'action' => 'periodos')); ?> </li>
                <li><?php echo $this->Html->link(__('Desglosado'), array('controller' => 'Reportes', 'action' => 'reporte_desglosado')); ?> </li>
                <li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'Reportes', 'action' => 'mi_cuenta')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>
</div>=======
</div>


>>>>>>> .r159
