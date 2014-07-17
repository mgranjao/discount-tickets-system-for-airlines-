<?php echo  $this->element('header_aeropuertos'); ?>
<div class="inside">

<div class="catalogos view">
<h2><?php  echo __('Aeropuerto'); ?></h2>
	
	  <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>


	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($catalogo['Catalogo']['CATAG_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($catalogo['Catalogo']['CATAG_VALOR']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($catalogo['Catalogo']['CATAG_TIPO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($catalogo['Catalogo']['CATAG_DESCRIPCION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tarifa'); ?></dt>
		<dd>
			<?php echo h($catalogo['Catalogo']['CATAG_TARIFA']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($catalogo['Ciudade']['CIU_NOMBRE']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($catalogo['Catalogo']['CATAG_ESTADO']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

</div>