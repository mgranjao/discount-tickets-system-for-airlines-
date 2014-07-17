<div class="inside">

<div class="periodos index">
    <h2><?php echo __('Períodos'); ?></h2>
    <?php echo $this->Html->script('historial_periodos_reportes'); ?>

    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">
    <?php echo $this->Html->script('aerolineas_datatables'); ?>
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_periodos_reportes" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Confirmado Conciliador</th>
                <th>Confirmado DGAC</th>
                <th>Confirmado Pago</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
        
        

</div>
<<<<<<< .mine
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
             <li><?php echo $this->Html->link(__('Historial Residente'), array('controller' => 'Reportes', 'action' => 'residente')); ?> </li>
                <li><?php echo $this->Html->link(__('Períodos'), array('controller' => 'Reportes', 'action' => 'periodos')); ?> </li>
                <li><?php echo $this->Html->link(__('Desglosado'), array('controller' => 'Reportes', 'action' => 'reporte_desglosado')); ?> </li>
                <li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'Reportes', 'action' => 'mi_cuenta')); ?> </li>
                <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'login', 'action' => 'logout'), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
	</ul>
=======

>>>>>>> .r159
</div>