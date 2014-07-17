<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="tipoColonos view">
<h2><?php  echo __('Tipo Colono'); ?></h2>

	
	 <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoColono['TipoColono']['TIPO_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tipoColono['TipoColono']['TIPO_NOMBRE']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Tipo Colono'), array('action' => 'edit', $tipoColono['TipoColono']['TIPO_ID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Tipo Colono'), array('action' => 'delete', $tipoColono['TipoColono']['TIPO_ID']), null, __('¿Esta seguro de borrar # %s?', $tipoColono['TipoColono']['TIPO_ID'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Tipo Colonos'), array('action' => 'index')); ?> </li>
               
	 </ul>
</div>
<div class="related">
	<h3><?php echo __('Related Residentes'); ?></h3>
	<?php if (!empty($tipoColono['Residente'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('RES ID'); ?></th>
		<th><?php echo __('TIPO ID'); ?></th>
		<th><?php echo __('RES NUMERO CERTIFICADO'); ?></th>
		<th><?php echo __('RES CEDULA'); ?></th>
		<th><?php echo __('RES NOMBRES'); ?></th>
		<th><?php echo __('RES APELLIDOS'); ?></th>
		<th><?php echo __('RES SEXO'); ?></th>
		<th><?php echo __('RES FECHA NACIMIENTO'); ?></th>
		<th><?php echo __('RES FECHA CARNE EMIS'); ?></th>
		<th><?php echo __('RES FECHA EXPIRA'); ?></th>
		<th><?php echo __('RES CUPO DISPONIBLE'); ?></th>
		<th><?php echo __('RES OBSERVACION'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipoColono['Residente'] as $residente): ?>
		<tr>
			<td><?php echo $residente['RES_ID']; ?></td>
			<td><?php echo $residente['TIPO_ID']; ?></td>
			<td><?php echo $residente['RES_NUMERO_CERTIFICADO']; ?></td>
			<td><?php echo $residente['RES_CEDULA']; ?></td>
			<td><?php echo $residente['RES_NOMBRES']; ?></td>
			<td><?php echo $residente['RES_APELLIDOS']; ?></td>
			<td><?php echo $residente['RES_SEXO']; ?></td>
			<td><?php echo $residente['RES_FECHA_NACIMIENTO']; ?></td>
			<td><?php echo $residente['RES_FECHA_CARNE_EMIS']; ?></td>
			<td><?php echo $residente['RES_FECHA_EXPIRA']; ?></td>
			<td><?php echo $residente['RES_CUPO_DISPONIBLE']; ?></td>
			<td><?php echo $residente['RES_OBSERVACION']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'residentes', 'action' => 'view', $residente['RES_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'residentes', 'action' => 'edit', $residente['RES_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'residentes', 'action' => 'delete', $residente['RES_ID']), null, __('Are you sure you want to delete # %s?', $residente['RES_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Residente'), array('controller' => 'residentes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cupos'); ?></h3>
	<?php if (!empty($tipoColono['Cupo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('CUPO ID'); ?></th>
		<th><?php echo __('TIPO ID'); ?></th>
		<th><?php echo __('USU ID'); ?></th>
		<th><?php echo __('CUPO CANTIDAD'); ?></th>
		<th><?php echo __('CUPO FECHA DESDE'); ?></th>
		<th><?php echo __('CUPO FECHA HASTA'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipoColono['Cupo'] as $cupo): ?>
		<tr>
			<td><?php echo $cupo['CUPO_ID']; ?></td>
			<td><?php echo $cupo['TIPO_ID']; ?></td>
			<td><?php echo $cupo['USU_ID']; ?></td>
			<td><?php echo $cupo['CUPO_CANTIDAD']; ?></td>
			<td><?php echo $cupo['CUPO_FECHA_DESDE']; ?></td>
			<td><?php echo $cupo['CUPO_FECHA_HASTA']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cupos', 'action' => 'view', $cupo['CUPO_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cupos', 'action' => 'edit', $cupo['CUPO_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cupos', 'action' => 'delete', $cupo['CUPO_ID']), null, __('Are you sure you want to delete # %s?', $cupo['CUPO_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cupo'), array('controller' => 'cupos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

</div>