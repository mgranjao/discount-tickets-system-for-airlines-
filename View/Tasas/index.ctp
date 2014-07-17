<?php echo  $this->element('header_aeropuertos'); ?>

<div class="inside">

<div class="tasas index">
	<h2><?php echo __('Tasas'); ?></h2>


        <div class="menu_datatable">
            <ul>
                <li><?php echo $this->Html->link(__('Nueva Tasa'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'tasas', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>
            </ul>
        </div>
                       
       
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_tasas" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>Id</th>
                <th>Aerol&iacute;nea</th>
                <th>Aeropuerto</th>
                <th>Tasas</th>                
                <th>Impuestos</th>
                <th>Fee</th>
                 <th></th>
                 <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>    
    
</div>

</div>