<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">




<div class="aerolineas index">
	<h2><?php echo __('Aerolíneas'); ?></h2>

    <div class="menu_datatable">
            <ul>
                
                <li><?php echo $this->Html->link(__('Nueva Aerolínea'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'aerolineas', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>

                <div class="clear"></div>
            </ul>
    </div>
        
	        
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_aerolineas" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Prefijo C&oacute;digo</th>
                <th>Usar Tasas</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>        
        
</div>

</div>

