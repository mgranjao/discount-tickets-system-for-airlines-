
<div  class="inside"> 

<div class="asignaciones view">
<h2><?php  echo __('Conciliado'); ?></h2>

	  <p>Detalle de la información conciliada: </p>

         
           <a href="javascript:history.back(1)" class="regresar"><- Regresar</a>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($conciliado['Conciliado']['CONC_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volado Ida'); ?></dt>
		<dd>
			<?php //echo h($conciliado['Conciliado']['VOL_ID']); ?>
                        <?php echo $this->Html->link($conciliado['Volado']['VOL_ID'], array('controller' => 'volados', 'action' => 'view', $conciliado['Volado']['VOL_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volado Retorno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($conciliado['VoladoDestino']['VOL_ID'], array('controller' => 'volados', 'action' => 'view', $conciliado['VoladoDestino']['VOL_ID'])); ?>
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

</div>