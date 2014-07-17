<?php //echo $this->Html->script('jquery.mtz.monthpicker'); ?>
<?php //echo $this->Html->script('MonthPicker.2.1.min'); ?>
<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('reportes_desglosado'); ?>
<div class="aerolineas index">
	<h2><?php echo __('Reportes'); ?></h2>
        <br/><br/>
        <?php echo $this->Form->create('REPORTES'); ?>
	<fieldset>
		
	<?php
		
            echo $this->Form->input('FECHA_INI', array('label' => 'Año Desde:',
                                                             'type' => 'date',
                                                             'dateFormat' => 'Y',
                                                             'empty' => true,
                                                             'minYear' => 2013, // start year
                                                             'maxYear' => date('Y') // current 
                                                            )
                                      ); 
            
            echo $this->Form->input('FECHA_FIN', array('label' => 'Año Hasta:',
                                                             'type' => 'date',
                                                             'dateFormat' => 'Y',
                                                             'empty' => true,
                                                             'minYear' => 2013, // start year
                                                             'maxYear' => date('Y') // current 
                                                            )
                                      ); 
                
                //echo $this->Form->input('AERO_ID');
               /* echo $this->Form->input("FECHA_INICIO", array(
                "type" => "text", 
                "label" => "Fecha Inicio:",
                'id' => 'datepickerInicio',    
                    )
                  );
                
                echo $this->Form->input("FECHA_FIN", array(
                "type" => "text", 
                "label" => "Fecha Fin:",
                'id' => 'datepickerFin',
                    )
                 );*/
                
                
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
                <li><?php echo $this->Html->link(__('Historial Residente'), array('controller' => 'Reportes', 'action' => 'residente')); ?> </li>
                <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'Reportes', 'action' => 'periodos')); ?> </li>
                <li><?php echo $this->Html->link(__('Desglosado'), array('controller' => 'Reportes', 'action' => 'reporte_desglosado')); ?> </li>
                <li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'Reportes', 'action' => 'mi_cuenta')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>
</div>