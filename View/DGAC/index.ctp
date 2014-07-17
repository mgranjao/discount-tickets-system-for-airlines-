<div class="aerolineas index">
	<h2><?php echo __('Menú DGAC'); ?></h2>
        <br/><br/>
        <ul>
		<li><?php echo $this->Html->link(__('Reportes mensual'), array('controller' => 'DGAC', 'action' => 'reportes')); ?> </li>
                <li><?php echo $this->Html->link(__('Historial Residente'), array('controller' => 'DGAC', 'action' => 'residente')); ?> </li>
                <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'DGAC', 'action' => 'periodos')); ?> </li>
                <li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'DGAC', 'action' => 'mi_cuenta')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>

</div>
