<?php echo  $this->element('header_residentes'); ?>


<div class="inside">

<div class="residentes index">
	
	
  

	
	
	<div class="menu_datatable">
            <ul>
                <li><?php echo $this->Html->link(__('Nuevo Residente'), array('action' => 'add'), array('class' => 'nuevo_registro')); ?></li>
                <li><?php echo $this->Html->link(__('Cargar Excel'), array('controller' => 'residentes', 'action' => 'cargar_xls'), array('class' => 'cargar_excel')); ?> </li>   
                <li><?php echo $this->Html->link(__('Exportar'), array('controller' => 'residentes', 'action' => 'export_xls'), array('class' => 'exportar_excel')); ?> </li>  
                <div class="clear"></div>
            </ul>
    </div>



    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_residentes" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo Colono</th>
                <th>Nro Certificado</th>
                <th>C&eacute;dula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


</div>


</div>