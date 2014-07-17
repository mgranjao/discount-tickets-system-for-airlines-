
<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">
<div class="aerolineas view">

<h2><?php  echo __('Aerolinea'); ?></h2>
	
	     <p>Visualización de los campos ingresados: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<dl>
		<dt><?php echo __('AERO ID'); ?></dt>
		<dd>
			<?php echo h($aerolinea['Aerolinea']['AERO_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($aerolinea['Aerolinea']['AERO_NOMBRE']); ?>
			&nbsp;
		</dd>
                
                <dt><?php echo __('Prefijo'); ?></dt>
		<dd>
			<?php echo h($aerolinea['Aerolinea']['AERO_PREFIJO']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('¿Usar Tasas?'); ?></dt>
		<dd>
			<?php echo h($aerolinea['Aerolinea']['AERO_USAR_TASAS']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
