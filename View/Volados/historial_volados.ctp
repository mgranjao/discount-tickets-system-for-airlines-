
<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('jquery-ui');  ?>
<?php echo $this->Html->script('historial_volados'); ?>
<div  class="inside"> 

<div class="asignaciones index">
    <h2><?php echo __('Historial de Volados Cargados'); ?></h2>
    <?php echo $this->Form->create('Asignacione'); ?>



    <div  class="fechas_historial">
    <ul>
        <li class="titulo">
            <?php echo __('Seleccione Rango de Fechas'); ?>
        </li>
        <li>
                <?php
        echo $this->Form->input('FECHA_INICIO', array(
        'label' => 'Fecha Inicio',
        'type' => 'text',
        'id' => 'datepickerIniHistorialVolados',
        'value' => $fecha_ini
        ));
        ?>
        <input type="hidden" name="fecha_ini" id="fecha_ini" value="<?= $fecha_ini ?>">

        </li>
        <li>
            <?
                echo $this->Form->input('FECHA_FIN', array(
                'label' => 'Fecha Fin',
                'type' => 'text',
                'id' => 'datepickerFinHistorialVolados',
                'value' => $fecha_fin
                ));
            ?>
            <input type="hidden" name="fecha_fin" id="fecha_fin" value="<?= $fecha_fin ?>">
        </li>
        <li>
            <?php echo $this->Form->end(__('Seleccionar')); ?>             
        </li>

        <div class="clear"></div>

    </ul>
    </div>

    <!--</fieldset>-->
      <div class="menu_datatable">
            <ul>
                <li>
                <?php echo $this->Html->link(__('Exportar'), array('controller' => 'volados', 'action' => 'export_historial_volados_xls', "?" => array("ini" => $fecha_ini , "fin" => $fecha_fin )), array('class' => 'exportar_excel')); ?>

                 </li>
            </ul>
        </div>                                 
<input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>"> 


    <table id="data_table_volados" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>C&oacute;digo Aaerol&iacute;nea</th>
                <th>Ticket</th>
                <th>Cup&oacute;n</th>
                <th>N&uacute;mero Vuelo</th>
                <th>Fecha Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>C&oacute;digo Autorizaci&oacute;n</th>
                <th>Conciliado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


</div>
</div>