<?php echo  $this->element('header_residentes'); ?>


<div class="inside">

<div class="residentes view">
<h2><?php  echo __('Residente'); ?></h2>

 <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Colono'); ?></dt>
		<dd>
			<?php echo $this->Html->link($residente['TipoColono']['TIPO_NOMBRE'], array('controller' => 'tipo_colonos', 'action' => 'view', $residente['TipoColono']['TIPO_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Número Certificado'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_NUMERO_CERTIFICADO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cédula'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_CEDULA']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombres'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_NOMBRES']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellidos'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_APELLIDOS']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
                    <?php if($residente['Residente']['RES_SEXO']=="0"){?>
			<?php echo h("M");} ?>
                    <?php if($residente['Residente']['RES_SEXO']=="1"){?>
			<?php echo h("F"); }?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Nacimiento'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_FECHA_NACIMIENTO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Emisión Carné'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_FECHA_CARNE_EMIS']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Expiración'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_FECHA_EXPIRA']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($residente['Residente']['RES_OBSERVACION']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Cupos Disponibles'); ?></h3>

	<div class="menu_datatable">
            <ul>
                <li><?php echo $this->Html->link(__('New Cupos Disponible'), array('controller' => 'cupos_disponibles', 'action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <div class="clear"></div>
            </ul>
    </div>

	<?php if (!empty($residente['CuposDisponible'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('CUPO DISP ID'); ?></th>
		<th><?php echo __('RES ID'); ?></th>
		<th><?php echo __('CUPO ID'); ?></th>
		<th><?php echo __('CUPO DISP DISPONIBLES'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($residente['CuposDisponible'] as $cuposDisponible): ?>
		<tr>
			<td><?php echo $cuposDisponible['CUPO_DISP_ID']; ?></td>
			<td><?php echo $cuposDisponible['RES_ID']; ?></td>
			<td><?php echo $cuposDisponible['CUPO_ID']; ?></td>
			<td><?php echo $cuposDisponible['CUPO_DISP_DISPONIBLES']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cupos_disponibles', 'action' => 'view', $cuposDisponible['CUPO_DISP_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cupos_disponibles', 'action' => 'edit', $cuposDisponible['CUPO_DISP_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cupos_disponibles', 'action' => 'delete', $cuposDisponible['CUPO_DISP_ID']), null, __('Are you sure you want to delete # %s?', $cuposDisponible['CUPO_DISP_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Related Asignaciones'); ?></h3>

	<div class="menu_datatable">
            <ul>
                <li><?php echo $this->Html->link(__('New Asignaciones'), array('controller' => 'asignaciones', 'action' => 'add'),  array('class' => 'nuevo_registro')); ?></li>
                <div class="clear"></div>
            </ul>
    </div>


	<?php if (!empty($residente['Asignacione'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ASIG ID'); ?></th>
		<th><?php echo __('CUPO ID'); ?></th>
		<th><?php echo __('AERO ID'); ?></th>
		<th><?php echo __('RES ID'); ?></th>
		<th><?php echo __('ASIG FECHA CREACION'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($residente['Asignacione'] as $asignacione): ?>
		<tr>
			<td><?php echo $asignacione['ASIG_ID']; ?></td>
			<td><?php echo $asignacione['CUPO_ID']; ?></td>
			<td><?php echo $asignacione['AERO_ID']; ?></td>
			<td><?php echo $asignacione['RES_ID']; ?></td>
			<td><?php echo $asignacione['ASIG_FECHA_CREACION']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'asignaciones', 'action' => 'view', $asignacione['ASIG_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'asignaciones', 'action' => 'edit', $asignacione['ASIG_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'asignaciones', 'action' => 'delete', $asignacione['ASIG_ID']), null, __('Are you sure you want to delete # %s?', $asignacione['ASIG_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>

</div>

