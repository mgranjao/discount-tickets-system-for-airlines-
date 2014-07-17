



<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('historial_conciliador'); ?>



<div  class="inside"> 

<div class="asignaciones index">
    <h2><?php echo __('Historial de Asignaciones Confirmadas'); ?></h2>


    <?php echo $this->Form->create('Asignacione'); ?>
    <div  class="fechas_historial">
    <ul>
        <li class="titulo">
             <?php echo __('Seleccione Rango de Fechas:'); ?>
        </li>
        <li>
            <?
            echo $this->Form->input('FECHA_INICIO', array(
        'label' => 'Fecha Inicio',
        'type' => 'text',
        'id' => 'datepickerIniHistorialConciliador',
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
        'id' => 'datepickerFinHistorialConciliador',
        'value' => $fecha_fin
    ));
    ?>
        <input type="hidden" name="fecha_fin" id="fecha_fin" value="<?= $fecha_fin ?>">
        </li>
        <li>
          <?php echo $this->Form->end(__('Seleccionar')); ?>   
        </li>
    </ul>
</div>


        <div class="menu_datatable">
            <ul>
                <li>

<?php echo $this->Html->link(__('Exportar'), array('controller' => 'asignaciones', 'action' => 'export_historial_conciliador_xls', "?" => array("ini" => $fecha_ini , "fin" => $fecha_fin )),  array('class' => 'exportar_excel')); ?> </li>      
            </ul>
        </div>

<input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">    



<?php if ($this->Session->read('Configuracione.PasosAsignacion')==1){ ?>

    <table id="data_table_asignaciones_conciliador" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Residente</th>
                <th>Partida</th>
                <th>Destino</th>
                <th>C&oacute;digo Autorizaci&oacute;n</th>
                <th>Fecha</th>
                <th>Agente</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>



<?php } if ($this->Session->read('Configuracione.PasosAsignacion')==2){ ?>

    <table id="data_table_asignaciones_conciliador_2_pasos" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Residente</th>
                <th>Partida</th>
                <th>Destino</th>
                <th>C&oacute;digo Autorizaci&oacute;n</th>
                <th>Fecha</th>
                <th>Ticket</th>
                <th>Agente</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


<?php } ?>
</div>

</div>
