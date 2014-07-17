<div class="periodos form">
<?php echo $this->Form->create('Periodo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Período'); ?></legend>
	<?php
		echo $this->Form->input('PERI_ID');
                echo $this->Form->label('PERI_FECHA_INICIO',"<b> Fecha Inicio: </b> " . $this->request->data['Periodo']['PERI_FECHA_INICIO']);
                echo $this->Form->label('PERI_FECHA_FIN',"<b> Fecha Fin: </b> " . $this->request->data['Periodo']['PERI_FECHA_FIN']);
		//echo $this->Form->input('PERI_FECHA_INICIO', array("label" => "Fecha Inicio", "type" => "date"));
		//echo $this->Form->input('PERI_FECHA_FIN', array("label" => "Fecha Inicio", "type" => "date"));
		//echo $this->Form->input('PERI_CONFIRMADO_CONCILIADOR', array("label" => "Cerrar Período"));
                
                //echo $this->Form->input('PERI_OBSERVACIONES_CONC',  array("label" => "Observaciones", "type" => "textarea" ));
		echo $this->Form->input('PERI_CONFIRMADO_DGAC', array("label" => "Confirmar Pago Período"));
		//echo $this->Form->input('PERI_CONFIRMADO_PAGO');
		//echo $this->Form->input('PERI_OBSERVACIONES_CONC');
		echo $this->Form->input('PERI_OBSERVACIONES_DGAC', array("label" => "Observaciones", "type" => "textarea" ));
	echo $this->Form->label('PERI_FECHA_INICIO',"<b> Observaciones Aerolínea: </b> ");
	?>
                
        <p><?=$this->request->data['Periodo']['PERI_OBSERVACIONES_CONC'] ?> </p>    
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
    
 <div id="link_reporte">
     <a target="_blank" href="<?= Router::url('/', true) ?>DGAC/reporte_volados_por_periodo.pdf?per_id=<?= $this->request->data['Periodo']['PERI_ID'] ?>">Reporte Vuelos del Período</a>
 </div>  
 
<?php echo $this->Html->css('/js/datatables/css/jquery.dataTables.css'); ?>

<?php echo $this->Html->script('jquery.min.2.0.0'); ?>
<?php echo $this->Html->script('/js/datatables/js/jquery.dataTables.min.js'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<?php echo $this->Html->script('aerolineas_datatables'); ?>

<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php //echo $this->Html->script('historial_conciliados'); ?>

    <?php /* echo $this->Html->link(__('Exportar'), array('controller' => 'conciliados', 'action' => 'export_historial_conciliados_xls' , "?" => array("ini" => $fecha_ini , "fin" => $fecha_fin ))); */ ?> </li>                 
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">
    <input type="hidden" name="peri_id" id="peri_id" value="<?= $this->request->data['Periodo']['PERI_ID'] ?>">
  
  
    <table id="data_table_historial_conciliados_periodo_dgac" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ticket</th>
                <th>C&oacute;digo Autorizaci&oacute;n</th>
                <th>C&eacute;dula</th>
                <th>Gal&aacute;pagos</th>
                <th>Continente</th>
                <th>Fecha</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>    
    
    
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Reporte mensual'), array('controller' => 'DGAC', 'action' => 'reportes')); ?> </li>
                <li><?php echo $this->Html->link(__('Historial Residente'), array('controller' => 'DGAC', 'action' => 'residente')); ?> </li>
                <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'DGAC', 'action' => 'periodos')); ?> </li>
                <li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'conciliador', 'action' => 'mi_cuenta')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>
</div>
