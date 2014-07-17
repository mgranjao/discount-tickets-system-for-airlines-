<?php echo  $this->element('header_configuraciones'); ?>


<div class="inside">

<div class="tipoColonos index">
	<h2><?php echo __('Tipo Colonos'); ?></h2>
                    
        
	<div class="menu_datatable">
            <ul>
                
                <li><?php echo $this->Html->link(__('Nuevo Tipo de Colono'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'tipocolonos', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?>  </li>

                <div class="clear"></div>
            </ul>
    </div>


    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_tipocolonos" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                 <th></th>
                 <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>           
        
</div>

</div>