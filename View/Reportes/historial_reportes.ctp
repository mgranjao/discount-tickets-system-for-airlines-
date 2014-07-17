<div class="aerolineas index">
	<h2><?php echo __('Historial de Asignaciones'); ?></h2>
        <br/><br/>
        <ul>
                <li><?php echo $this->Html->link(__('Ver reporte de rutas con mas pasajeros (Quito San Cristobal , Gye - San cristobal)'), array('controller' => 'conciliador', 'action' => 'valida_carga')); ?> </li>
                <li><?php echo $this->Html->link(__('Reporte de Conciliar'), array('controller' => 'conciliador', 'action' => 'valida_carga')); ?> </li>
                <li><?php echo $this->Html->link(__('Facturas Pendientes por mes'), array('controller' => 'conciliador', 'action' => 'valida_carga')); ?> </li>
	</ul>
   





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