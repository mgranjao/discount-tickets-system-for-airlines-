<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">
<div class="estados view">
<h2><?php  echo __('Estado'); ?></h2>

	<p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['EST_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['EST_NOMBRE']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Autorizacions'); ?></h3>

	<div class="menu_datatable">
            <ul>
      
                <li><?php echo $this->Html->link(__('New Autorizacion'), array('controller' => 'autorizacions', 'action' => 'add'),  array('class' => 'nuevo_registro')); ?> </li>
                <div class="clear"></div>
            </ul>
    </div>
        

	<?php if (!empty($estado['Autorizacion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('AUT ID'); ?></th>
		<th><?php echo __('ASIG ID'); ?></th>
		<th><?php echo __('EST ID'); ?></th>
		<th><?php echo __('AUT CODIGO AUTORIZACION'); ?></th>
		<th><?php echo __('AUT VALOR PAGADO'); ?></th>
		<th><?php echo __('AUT TICKET'); ?></th>
		<th><?php echo __('RES ID'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($estado['Autorizacion'] as $autorizacion): ?>
		<tr>
			<td><?php echo $autorizacion['AUT_ID']; ?></td>
			<td><?php echo $autorizacion['ASIG_ID']; ?></td>
			<td><?php echo $autorizacion['EST_ID']; ?></td>
			<td><?php echo $autorizacion['AUT_CODIGO_AUTORIZACION']; ?></td>
			<td><?php echo $autorizacion['AUT_VALOR_PAGADO']; ?></td>
			<td><?php echo $autorizacion['AUT_TICKET']; ?></td>
			<td><?php echo $autorizacion['RES_ID']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'autorizacions', 'action' => 'view', $autorizacion['AUT_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'autorizacions', 'action' => 'edit', $autorizacion['AUT_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'autorizacions', 'action' => 'delete', $autorizacion['AUT_ID']), null, __('Are you sure you want to delete # %s?', $autorizacion['AUT_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
</div>
