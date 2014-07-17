<div class="tipoColonos form">
<?php echo $this->Form->create('TipoColono'); ?>
	<fieldset>
		<legend><?php echo __('Editar Tipo Colono'); ?></legend>
	<?php
		echo $this->Form->input('TIPO_ID');
		echo $this->Form->input('TIPO_NOMBRE',array("label" => "Nombre"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('TipoColono.TIPO_ID')), null, __('¿Esta seguro de borrar # %s?', $this->Form->value('TipoColono.TIPO_ID'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Tipo Colonos'), array('action' => 'index')); ?></li>
                <br/>
                <li><?php echo $this->Html->link(__('Aerolíneas'), array('controller' => 'aerolineas', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Aeropuertos'), array('controller' => 'catalogos', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Ciudades'), array('controller' => 'ciudades', 'action' => 'index')); ?> </li> <li><?php echo $this->Html->link(__('Configuraciones'), array('controller' => 'configuraciones', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Cupos'), array('controller' => 'cupos', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Oficinas'), array('controller' => 'oficinas', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Perfiles'), array('controller' => 'perfiles', 'action' => 'index')); ?> </li> <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'periodos', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Residentes'), array('controller' => 'residentes','action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Supervisores'), array('controller' => 'supervisores','action' => 'index')); ?></li>                 <li><?php echo $this->Html->link(__('Tasas'), array('controller' => 'tasas', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Tipos de Colonos'), array('controller' => 'tipocolonos', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>
</div>
