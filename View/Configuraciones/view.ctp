
<?php echo  $this->element('header_configuraciones'); ?>


<div class="inside">

<div class="configuraciones view">
<h2><?php  echo __('Configuraciones'); ?></h2>

  <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

         

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configuracione['Configuracione']['CONFIG_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parámetros'); ?></dt>
		<dd>
			<?php echo h($configuracione['Configuracione']['CONFIG_PARAMETRO']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($configuracione['Configuracione']['CONFIG_VALOR']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($configuracione['Configuracione']['CONFIG_DESCRIPCION']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


</div>