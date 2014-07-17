<div class="inside">

<?php echo $this->Html->script('conciliador_cargar_archivo'); ?>
 <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>"> 
<div class="residentes form">
    <?php if (!isset($confirmado)) { ?>
        <?php echo $this->Form->create('Volado', array('type' => 'file')); ?>
        <fieldset>
            <legend><?php echo __('Cargar Volados'); ?></legend>
            
             <p>Subir Archivo para conciliar descuentos asignados: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'index'), array('class' => 'regresar')); ?>

         

            <?php
            echo $this->Form->input("VOL_ARCHIVO", array(
                "type" => "file", // también sirve "radio"
                //"options" => $tipoColonos,
                "label" => "Archivo excel"
                    )
            );
            ?>
        <!--<label for="cupos_disponibles">Cupos Disponibles: <?php echo $residente_cupos; ?></label>-->     



        </fieldset>
        <?php
        $options = array
            (
            'label' => 'Cargar',
            'value' => 'Cargar',
            'id' => 'submit_cargar'
        );

        echo $this->Form->end($options);
        ?>
    <?php } ?>  

    <?php if (isset($volados) || isset($no_insertados) || isset($repetidos)) { ?>  
        <?php echo $this->Form->create('Volado'); ?>    
        <table>
            <tr><th>Ticket</th> <th>Vuelo</th> <th>Origen</th> <th>Destino</th> <th>Observaci&oacute;n</th></tr>    
            <?php if (isset($volados)) { ?> 
                <?php
                foreach ($volados as $volado) {
                    ?>
                    <tr> <td><?= $volado['Volado']['VOL_NUM_TICKET'] ?></td><td><?= $volado['Volado']['VOL_NUMERO_VUELO'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_ORIGEN'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_DESTINO'] ?></td> <td><?= "OK" ?></td></tr>
                <?php } ?> 
            <?php } ?>    

            <?php if (isset($no_insertados)) { ?> 
                <?php
                foreach ($no_insertados as $volado) {
                    ?>
                    <tr> <td><?= $volado['Volado']['VOL_NUM_TICKET'] ?></td><td><?= $volado['Volado']['VOL_NUMERO_VUELO'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_ORIGEN'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_DESTINO'] ?></td> <td><?= "ERROR AL GUARDAR" ?></td></tr>
                <?php } ?> 
            <?php } ?> 

            <?php if (isset($sin_asignacion)) { ?> 
                <?php
                foreach ($sin_asignacion as $volado) {
                    ?>
                    <tr> <td><?= $volado['Volado']['VOL_NUM_TICKET'] ?></td><td><?= $volado['Volado']['VOL_NUMERO_VUELO'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_ORIGEN'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_DESTINO'] ?></td> <td><?= "ERROR SIN ASIGNACION" ?></td></tr>
                <?php } ?> 
            <?php } ?> 

            <?php if (isset($repetidos)) { ?> 
                <?php
                foreach ($repetidos as $volado) {
                    ?>
                    <tr> <td><?= $volado['Volado']['VOL_NUM_TICKET'] ?></td><td><?= $volado['Volado']['VOL_NUMERO_VUELO'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_ORIGEN'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_DESTINO'] ?></td> <td><?= "ACTUALIZAR?" ?></td></tr>
                <?php } ?> 
            <?php } ?> 
            
            <?php if (isset($error)) { ?> 
                <?php
                foreach ($error as $volado) {
                    ?>
                    <tr> <td><?= $volado['Volado']['VOL_NUM_TICKET'] ?></td><td><?= $volado['Volado']['VOL_NUMERO_VUELO'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_ORIGEN'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_DESTINO'] ?></td> <td><?= "ACTUALIZAR?" ?></td></tr>
                <?php } ?> 
            <?php } ?>          

             <?php if (isset($error_periodo_cerrado)) { ?> 
                <?php
                foreach ($error_periodo_cerrado as $volado) {
                    ?>
                    <tr> <td><?= $volado['Volado']['VOL_NUM_TICKET'] ?></td><td><?= $volado['Volado']['VOL_NUMERO_VUELO'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_ORIGEN'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_DESTINO'] ?></td> <td><?= "PERÍODO CERRADO" ?></td></tr>
                <?php } ?> 
            <?php } ?> 
                    
            <?php if (isset($no_actualizados)) { ?> 
                <?php
                foreach ($no_actualizados as $volado) {
                    ?>
                    <tr> <td><?= $volado['Volado']['VOL_NUM_TICKET'] ?></td><td><?= $volado['Volado']['VOL_NUMERO_VUELO'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_ORIGEN'] ?></td> <td><?= $volado['Volado']['VOL_CIUDAD_DESTINO'] ?></td> <td><?= "NO SE PUEDE ACTUALIZAR" ?></td></tr>
                <?php } ?> 
            <?php } ?>         
        </table>    




        <fieldset>
            <input type="hidden" name="confirmar" value="1">
            <?php foreach ($volados_id as $id) { ?>
                <input type="hidden" name="volados[]" value="<?= $id ?>">
            <?php } ?>
            <?php foreach ($actualizar_act_id as $id) { ?>
                <input type="hidden" name="voladosAct_act[]" value="<?= $id ?>">
            <?php } ?>
            <?php foreach ($actualizar_id as $id) { ?>
                <input type="hidden" name="volados_act[]" value="<?= $id ?>">
            <?php } ?>
        </fieldset>  
        <?php if (count($volados_id) > 0 || count($actualizar_id) > 0) { ?>
            <?php if ($mensaje == "Confirmar") { ?>
                <?php echo $this->Form->end(__('Confirmar')); ?>  
                <?php
            } else {
                echo $this->Form->label('MENSAJE', $mensaje);
            }
            ?> 
            <?php
        } else {
            echo $this->Form->label('MENSAJE', 'No existen vuelos que se puedan guardar');
        }
        ?> 
    <?php } ?>   


    <?php
    if (isset($conciliados)) {
        if (count($conciliados) > 0) {
            ?> 
            <table>
                <tr><th>Tickets Conciliados</th>  </tr>  
                <?php
                foreach ($conciliados as $conciliado) {
                    ?>
                    <tr> <td><?= $conciliado ?></td> </tr>
                <?php } ?> 
            </table> 
        <?php }
    }
    ?> 

</div>
</div>

