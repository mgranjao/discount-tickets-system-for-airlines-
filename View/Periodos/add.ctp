<div class="periodos form">
<?php echo $this->Form->create('Periodo'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Período'); ?></legend>
	<?php
		echo $this->Form->input('PERI_FECHA_INICIO',array("label" => "Fecha Inicio"));
		echo $this->Form->input('PERI_FECHA_FIN',array("label" => "Fecha Fin"));
                 echo $this->Form->input("AERO_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $aerolineas,
                "label" => "Aerolínea:"
                    )
                  );
		/*echo $this->Form->input('PERI_CONFIRMADO_CONCILIADOR');
		echo $this->Form->input('PERI_CONFIRMADO_DGAC');
		echo $this->Form->input('PERI_CONFIRMADO_PAGO');
		echo $this->Form->input('PERI_OBSERVACIONES_CONC');
		echo $this->Form->input('PERI_OBSERVACIONES_DGAC');*/
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Período'), array('action' => 'add')); ?></li>
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
