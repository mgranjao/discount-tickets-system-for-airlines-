
	<h2><?php echo __('Períodos'); ?></h2>



<div id="link_reporte"></div>        
        
<?php echo $this->Html->css('/js/datatables/css/jquery.dataTables.css'); ?>

<?php echo $this->Html->script('jquery.min.2.0.0'); ?>
<?php echo $this->Html->script('/js/datatables/js/jquery.dataTables.min.js'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<?php echo $this->Html->script('aerolineas_datatables'); ?>


    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_periodos_dgac" class="table table-bordered table-striped table_vam">
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
        
        
        
