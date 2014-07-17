<?php echo  $this->element('header_configuraciones'); ?>

<div class="inside">

<div class="configuraciones index">
	<h2><?php echo __('Configuraciones'); ?></h2>


	 <div class="menu_datatable">
            <ul>
                
                <li><?php echo $this->Html->link(__('Nueva Configuración'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'configuraciones', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>

                <div class="clear"></div>
            </ul>
    </div>
        
    
              

    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_configuraciones" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>Id</th>
                <th>Par&aacute;metro</th>
                <th>Valor</th>                
                <th>Descripci&oacute;n</th> 
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>            
        
        
</div>

</div>