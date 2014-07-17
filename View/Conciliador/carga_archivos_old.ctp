<div class="aerolineas index">
	<h2><?php echo __('Carga de Archivos'); ?></h2>
        <br/><br/>
        <ul>
                <li><?php echo $this->Html->link(__('Cargar'), array('controller' => 'conciliador', 'action' => 'valida_carga')); ?> </li>
	</ul>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Carga Archivos'), array('controller' => 'conciliador', 'action' => 'carga_archivos'), null, __('¿Está seguro que desea salir de la carga de archivos en proceso?')); ?></li>
                <li><?php echo $this->Html->link(__('Mi Cuenta'), array('controller' => 'supervisor','action' => 'mi_cuenta'), null, __('¿Está seguro que desea salir de la carga de archivos en proceso?')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea salir de la carga de archivos en proceso y cerrar la sesión?')); ?></li>
	</ul>
</div>