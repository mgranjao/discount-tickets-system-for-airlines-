<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">

<div class="usuarios view">
<h2><?php  echo __('Usuario'); ?></h2>

	 <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['USU_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Perfil'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Perfile']['PER_NOMBRE'], array('controller' => 'perfiles', 'action' => 'view', $usuario['Perfile']['PER_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aerolínea'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Aerolinea']['AERO_NOMBRE'], array('controller' => 'aerolineas', 'action' => 'view', $usuario['Aerolinea']['AERO_ID'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Oficina'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Oficina']['OFI_CODIGO'], array('controller' => 'oficinas', 'action' => 'view', $usuario['Oficina']['OFI_ID'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Nombre Completo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['USU_NOMBRE_COMPLETO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('E-mail'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['USU_EMAIL']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php //echo __('Password'); ?></dt>
		<dd>
			<?php //echo h($usuario['Usuario']['USU_PASSWORD']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Teléfono'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['USU_TELEFONO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dirección'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['USU_DIRECCION']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Cupos creados por el Usuario'); ?></h3>


		<div class="menu_datatable">
            <ul>
                
               <li><?php echo $this->Html->link(__('New Cupo'), array('controller' => 'cupos', 'action' => 'add'), array('class' => 'nuevo_registro')); ?> </li>
               <div  class="clear"></div>
              
            </ul>
        </div>


	<?php if (!empty($usuario['Cupo'])): ?>
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
		foreach ($usuario['Cupo'] as $cupo): ?>
		<tr>
			<td><?php echo $cupo['CUPO_ID']; ?></td>
			<td><?php echo $cupo['TIPO_ID']; ?></td>
			<td><?php echo $cupo['USU_ID']; ?></td>
			<td><?php echo $cupo['CUPO_CANTIDAD']; ?></td>
			<td><?php echo $cupo['CUPO_FECHA_DESDE']; ?></td>
			<td><?php echo $cupo['CUPO_FECHA_HASTA']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'cupos', 'action' => 'view', $cupo['CUPO_ID'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'cupos', 'action' => 'edit', $cupo['CUPO_ID'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'cupos', 'action' => 'delete', $cupo['CUPO_ID']), null, __('Are you sure you want to delete # %s?', $cupo['CUPO_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>

</div>