<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="cupos view">
<h2><?php  echo __('Cupo'); ?></h2>

   <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cupo['Cupo']['CUPO_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Colono'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cupo['TipoColono']['TIPO_NOMBRE'], array('controller' => 'tipo_colonos', 'action' => 'view', $cupo['TipoColono']['TIPO_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario creador'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cupo['Usuario']['USU_EMAIL'], array('controller' => 'usuarios', 'action' => 'view', $cupo['Usuario']['USU_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($cupo['Cupo']['CUPO_CANTIDAD']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Desde'); ?></dt>
		<dd>
			<?php echo h($cupo['Cupo']['CUPO_FECHA_DESDE']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Hasta'); ?></dt>
		<dd>
			<?php echo h($cupo['Cupo']['CUPO_FECHA_HASTA']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


</div>