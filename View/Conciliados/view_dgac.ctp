<div class="conciliados view">
<h2><?php  echo __('Conciliado'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($conciliado['Conciliado']['CONC_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volado Ida'); ?></dt>
		<dd>
			<?php //echo h($conciliado['Conciliado']['VOL_ID']); ?>
                        <?php echo $this->Html->link($conciliado['Volado']['VOL_ID'], array('controller' => 'volados', 'action' => 'view_dgac', $conciliado['Volado']['VOL_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volado Retorno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($conciliado['VoladoDestino']['VOL_ID'], array('controller' => 'volados', 'action' => 'view_dgac', $conciliado['VoladoDestino']['VOL_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo Autorización'); ?></dt>
		<dd>
			<?php //echo $this->Html->link($conciliado['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION'], array('controller' => 'asignaciones', 'action' => 'view', $conciliado['Asignacione']['ASIG_ID'])); ?>
			<?php echo h($conciliado['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION']); ?>
                        &nbsp;
		</dd>
		<dt><?php echo __('Fecha Conciliado'); ?></dt>
		<dd>
			<?php echo h($conciliado['Conciliado']['CONC_FECHA']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmado'); ?></dt>
		<dd>
			<?php echo h($conciliado['Conciliado']['CONC_CONFIRMADO']); ?>
			&nbsp;
		</dd>
	</dl>
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
