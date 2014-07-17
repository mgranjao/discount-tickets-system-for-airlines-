<?php echo  $this->element('header_aeropuertos'); ?>

<div class="inside">

<div class="catalogos index">
	<h2><?php echo __('Catálogo Aeropuertos'); ?></h2>
        
	 <div class="menu_datatable">
	 	<ul>
	 		<li><?php echo $this->Html->link(__('Nuevo Aeropuerto'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
	 		<li><?php echo $this->Html->link(__('Exportar'), array('controller' => 'catalogos', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>   

	 	</ul>
	 </div>
  
        



    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_catalogos" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>C&oacute;digo</th>
                <th>Tipo</th>                
                <th>Tarifa</th>
                <th>Ciudad</th>
                <th>Estado</th>
                 <th></th>
                 <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>               
        
</div>

</div>
