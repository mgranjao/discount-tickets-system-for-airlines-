
<?php echo  $this->element('header_aerolineas'); ?>

<div class="inside">

<div class="asignaciones index">
<h2><?php echo __('Supervisores'); ?></h2>


  <div class="menu_datatable">
            <ul>
                
                <li><?php  echo $this->Html->link(__('Nuevo Supervisor'), array('controller' => 'usuarios', 'action' => 'add'), array('class' => 'nuevo_registro')); ?></li>

               
                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'supervisores', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>
            </ul>
        </div>


          

    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_supervisores" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aerol&iacute;nea</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Oficina</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


</div>


</div>