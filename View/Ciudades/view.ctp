<?php echo  $this->element('header_aeropuertos'); ?>
<div class="inside">

<div class="ciudades view">
<h2><?php  echo __('Ciudades'); ?></h2>

 <p>Ingrese los campos de acuerdo la información solicitada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($ciudade['Ciudade']['CIU_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ciudade['Ciudade']['CIU_NOMBRE']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo h($ciudade['Ciudade']['CIU_PROVINCIA']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Catalogos'); ?></h3>


	<div class="menu_datatable">
            <ul>
               <li><?php echo $this->Html->link(__('New Catalogo'), array('controller' => 'catalogos', 'action' => 'add'),array('class' => 'nuevo_registro')); ?> </li>
               <div  class="clear"></div>
              
            </ul>
        </div>

	<?php if (!empty($ciudade['Catalogo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('CATAG ID'); ?></th>
		<th><?php echo __('CIU ID'); ?></th>
		<th><?php echo __('CATAG VALOR'); ?></th>
		<th><?php echo __('CATAG TIPO'); ?></th>
		<th><?php echo __('CATAG TARIFA'); ?></th>
		<th><?php echo __('CATAG ESTADO'); ?></th>
		<th><?php echo __('CATAG DESCRIPCION'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ciudade['Catalogo'] as $catalogo): ?>
		<tr>
			<td><?php echo $catalogo['CATAG_ID']; ?></td>
			<td><?php echo $catalogo['CIU_ID']; ?></td>
			<td><?php echo $catalogo['CATAG_VALOR']; ?></td>
			<td><?php echo $catalogo['CATAG_TIPO']; ?></td>
			<td><?php echo $catalogo['CATAG_TARIFA']; ?></td>
			<td><?php echo $catalogo['CATAG_ESTADO']; ?></td>
			<td><?php echo $catalogo['CATAG_DESCRIPCION']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'catalogos', 'action' => 'view', $catalogo['CATAG_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'catalogos', 'action' => 'edit', $catalogo['CATAG_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'catalogos', 'action' => 'delete', $catalogo['CATAG_ID']), null, __('Are you sure you want to delete # %s?', $catalogo['CATAG_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Related Oficinas'); ?></h3>



	<div class="menu_datatable">
            <ul>
             
               <li><?php echo $this->Html->link(__('New Oficina'), array('controller' => 'oficinas', 'action' => 'add'),array('class' => 'nuevo_registro')); ?> </li>
               <div  class="clear"></div>
              
            </ul>
        </div>

	<?php if (!empty($ciudade['Oficina'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('OFI ID'); ?></th>
		<th><?php echo __('AERO ID'); ?></th>
		<th><?php echo __('CIU ID'); ?></th>
		<th><?php echo __('OFI CODIGO'); ?></th>
		<th><?php echo __('OFI DIRECCION'); ?></th>
		<th><?php echo __('OFI CIUDAD'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ciudade['Oficina'] as $oficina): ?>
		<tr>
			<td><?php echo $oficina['OFI_ID']; ?></td>
			<td><?php echo $oficina['AERO_ID']; ?></td>
			<td><?php echo $oficina['CIU_ID']; ?></td>
			<td><?php echo $oficina['OFI_CODIGO']; ?></td>
			<td><?php echo $oficina['OFI_DIRECCION']; ?></td>
			<td><?php echo $oficina['OFI_CIUDAD']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'oficinas', 'action' => 'view', $oficina['OFI_ID'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'oficinas', 'action' => 'edit', $oficina['OFI_ID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'oficinas', 'action' => 'delete', $oficina['OFI_ID']), null, __('Are you sure you want to delete # %s?', $oficina['OFI_ID'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
</div>
