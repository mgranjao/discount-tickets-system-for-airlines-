<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">

<div class="usuarios index">
	<h2><?php echo __('Usuarios'); ?></h2>

     <div class="menu_datatable">
            <ul>
                
                <li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'usuarios', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>
            </ul>
        </div>   


                                    
        
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_usuarios" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>Id</th>
                <th>Perfil</th>
                <th>Aerol&iacute;nea</th>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Tel&eacute;fono</th>
                <th>Direcci&oacute;n</th> 
                 <th></th>
                 <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>            
        
</div>

</div>