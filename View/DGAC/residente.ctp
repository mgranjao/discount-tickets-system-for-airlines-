
<div class="aerolineas index">
	<h2><?php echo __('Reportes'); ?></h2>
        <br/><br/>
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