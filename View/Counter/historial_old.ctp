<div class="asignaciones index">
    <h2><?php echo __('Asignaciones'); ?></h2>

    <div class="datatable">


        <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_estadodecuenta">

            <thead>
                <tr>
                    <th>C&oacute;digo Autorizaci&oacute;n</th>
                    <th>C&oacute;digo Reserva</th>
                    <th>C&eacute;dula</th>
                    <th>Nombre </th>
                    <th>Cupos Ocupados / Cupos Totales</th>
                    <th>Fecha</th>
                    

                </tr>

            
            </thead>
            <tbody>

                <?php 
                for ($i = 0; $i < count($asignaciones); $i++) {

                                         ?>

                <tr>
                <td class="alinear-izq"><?= $asignaciones[$i]['Asignacione']['ASIG_DET_CODIGO_RESERVA'] ?>
                <td class="alinear-izq"><?= $asignaciones[$i]['Autorizacion'][0]['AUT_CODIGO_AUTORIZACION'] ?>
                <td class="alinear-izq"><?= $asignaciones[$i]['Residente']['RES_CEDULA'] ?>
                <td class="alinear-izq"><?= $asignaciones[$i]['Residente']['RES_NOMBRES']." ".$asignaciones[$i]['Residente']['RES_APELLIDOS'] ?>
                <td class="alinear-izq"><?= "/".$asignaciones[$i]['Cupo']['CUPO_CANTIDAD'] ?>
                <td class="alinear-izq"><?= $asignaciones[$i]['Asignacione']['ASIG_FECHA_CREACION'] ?>
                        
                </td>     

                        <?php
                   // }
                }
                ?>

            </tbody>
        </table>




    </div>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
		<li><?php echo $this->Html->link(__('Asignar Descuento'), array('controller' => 'asignacion','action' => 'paso1')); ?></li>
		<li><?php echo $this->Html->link(__('Historial'), array('controller' => 'counter', 'action' => 'historial')); ?> </li>
		<li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'counter', 'action' => 'mi_cuenta')); ?> </li>
	</ul>
</div>
