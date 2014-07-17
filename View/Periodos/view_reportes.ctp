<div class="periodos view">
<h2><?php  echo __('Período'); ?></h2>

<div id="link_reporte">
     <a target="_blank" href="<?= Router::url('/', true) ?>Reportes/reporte_volados_por_periodo.pdf?per_id=<?= $this->request->data['Periodo']['PERI_ID'] ?>">Reporte Vuelos del Período</a>
 </div>  

	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_FECHA_INICIO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_FECHA_FIN']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmado Conciliador'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_CONFIRMADO_CONCILIADOR']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmado DGAC'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_CONFIRMADO_DGAC']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmado Pago'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_CONFIRMADO_PAGO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones Conciliador'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_OBSERVACIONES_CONC']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones DGAC'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['PERI_OBSERVACIONES_DGAC']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
             <li><?php echo $this->Html->link(__('Historial Residente'), array('controller' => 'Reportes', 'action' => 'residente')); ?> </li>
                <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'Reportes', 'action' => 'periodos')); ?> </li>
                <li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'Reportes', 'action' => 'mi_cuenta')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>
</div>

