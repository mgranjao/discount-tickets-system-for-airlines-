<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">

<div class="oficinas view">
<h2><?php  echo __('Oficina'); ?></h2>

<p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($oficina['Oficina']['OFI_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aerolínea'); ?></dt>
		<dd>
			<?php echo $this->Html->link($oficina['Aerolinea']['AERO_NOMBRE'], array('controller' => 'aerolineas', 'action' => 'view', $oficina['Aerolinea']['AERO_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Código'); ?></dt>
		<dd>
			<?php echo h($oficina['Oficina']['OFI_CODIGO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dirección'); ?></dt>
		<dd>
			<?php echo h($oficina['Oficina']['OFI_DIRECCION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($oficina['Ciudade']['CIU_NOMBRE']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

</div>
