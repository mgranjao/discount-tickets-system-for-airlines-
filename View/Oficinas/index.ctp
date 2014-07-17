<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">

<div class="oficinas index">
	<h2><?php echo __('Oficinas'); ?></h2>

        
      <div class="menu_datatable">
            <ul>
                
                <li><?php echo $this->Html->link(__('Nueva Oficina'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'oficinas', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>
            </ul>
        </div>       
        
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_oficinas" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aerol&iacute;nea</th>
                <th>C&oacute;digo</th>
                <th>Direcci&oacute;n</th>
                <th>Ciudad</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
        
        
        
</div>

</div>