<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="periodos index">
	<h2><?php echo __('Períodos'); ?></h2>

     

     	 <div class="menu_datatable">
            <ul>
                
                <li><?php echo $this->Html->link(__('Nueva Periodo'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'periodos', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>

                <div class="clear"></div>
            </ul>
    </div>
        


    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_periodos" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aerolinea</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Confirmado Conciliador</th>
                <th>Confirmado DGAC</th>
                <th>Confirmado Pago</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
        
        
        
</div>

</div>