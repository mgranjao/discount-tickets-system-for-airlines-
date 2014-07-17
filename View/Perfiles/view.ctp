<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="perfiles view">
<h2><?php  echo __('Perfile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($perfile['Perfile']['PER_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($perfile['Perfile']['PER_NOMBRE']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Usuarios'); ?></h3>

		<div class="menu_datatable">
            <ul>
      
                <li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'usuarios', 'action' => 'add'),  array('class' => 'nuevo_registro')); ?> </li>
                <div class="clear"></div>
            </ul>
    </div>


	<?php if (!empty($perfile['Usuario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('USU ID'); ?></th>
		<th><?php echo __('PER ID'); ?></th>
		<th><?php echo __('AERO ID'); ?></th>
		<th><?php echo __('USU EMAIL'); ?></th>
		<th><?php echo __('USU PASSWORD'); ?></th>
		<th><?php echo __('USU TELEFONO'); ?></th>
		<th><?php echo __('USU DIRECCION'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($perfile['Usuario'] as $usuario): ?>
		<tr>
			<td><?php echo $usuario['USU_ID']; ?></td>
			<td><?php echo $usuario['PER_ID']; ?></td>
			<td><?php echo $usuario['AERO_ID']; ?></td>
			<td><?php echo $usuario['USU_EMAIL']; ?></td>
			<td><?php echo $usuario['USU_PASSWORD']; ?></td>
			<td><?php echo $usuario['USU_TELEFONO']; ?></td>
			<td><?php echo $usuario['USU_DIRECCION']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'usuarios', 'action' => 'view', $usuario['USU_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'usuarios', 'action' => 'edit', $usuario['USU_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'usuarios', 'action' => 'delete', $usuario['USU_ID']), null, __('Are you sure you want to delete # %s?', $usuario['USU_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>

</div>