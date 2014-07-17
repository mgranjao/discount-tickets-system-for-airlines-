<div class="autorizacions view">
<h2><?php  echo __('Autorizacion'); ?></h2>
	<dl>
		<dt><?php echo __('AUT ID'); ?></dt>
		<dd>
			<?php echo h($autorizacion['Autorizacion']['AUT_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($autorizacion['Asignacione']['ASIG_DET_CODIGO_RESERVA'], array('controller' => 'asignaciones', 'action' => 'view', $autorizacion['Asignacione']['ASIG_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AUT CODIGO AUTORIZACION'); ?></dt>
		<dd>
			<?php echo h($autorizacion['Autorizacion']['AUT_CODIGO_AUTORIZACION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AUT VALOR PAGADO'); ?></dt>
		<dd>
			<?php echo h($autorizacion['Autorizacion']['AUT_VALOR_PAGADO']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Autorizacion'), array('action' => 'edit', $autorizacion['Autorizacion']['AUT_ID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Autorizacion'), array('action' => 'delete', $autorizacion['Autorizacion']['AUT_ID']), null, __('Are you sure you want to delete # %s?', $autorizacion['Autorizacion']['AUT_ID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Autorizacions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Autorizacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
