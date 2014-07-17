<?php echo  $this->element('header_configuraciones'); ?>


<div class="inside">

<div class="estados index">
	<h2><?php echo __('Estados'); ?></h2>
   



 	 <div class="menu_datatable">
            <ul>
                
                <li><?php echo $this->Html->link(__('Nuevo Estado'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'estados', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>

                <div class="clear"></div>
            </ul>
    </div>
        


    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_estados" class="table table-bordered table-striped table_vam">
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