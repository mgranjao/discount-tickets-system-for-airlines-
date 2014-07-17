<?php echo  $this->element('header_aeropuertos'); ?>
<div class="inside">

<div class="tasas view">
<h2><?php  echo __('Tasa'); ?></h2>

	
	  <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($tasa['Tasa']['TASA_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aerolinea'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tasa['Aerolinea']['AERO_NOMBRE'], array('controller' => 'aerolineas', 'action' => 'view', $tasa['Aerolinea']['AERO_ID'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Aeropuerto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tasa['Catalogo']['CATAG_VALOR'], array('controller' => 'catalogos', 'action' => 'view', $tasa['Catalogo']['CATAG_ID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tasas'); ?></dt>
		<dd>
			<?php echo h($tasa['Tasa']['TASA_TASAS']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Impuestos'); ?></dt>
		<dd>
			<?php echo h($tasa['Tasa']['TASA_IMPUESTOS']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee'); ?></dt>
		<dd>
			<?php echo h($tasa['Tasa']['TASA_FEE']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

</div>