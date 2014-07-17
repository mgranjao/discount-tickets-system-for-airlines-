
<?php echo  $this->element('header_configuraciones'); ?>


<div class="inside">
<div class="cupos index">
	<h2><?php echo __('Cupos'); ?></h2>

      

 	<div class="menu_datatable">
            <ul>
            	<li><?php echo $this->Html->link(__('Nuevo Cupo'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>  

                <li> <?php echo $this->Html->link(__('Exportar'), array('controller' => 'cupos', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>

                <div class="clear"></div>
            </ul>
    </div>
        


    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_cupos" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo Colono</th>
                <th>Usuario creador</th>                
                <th>Cantidad</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th> 
                 <th></th>
                 <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>    
    
</div>


</div>