<div class="asignaciones index">
    <h2><?php echo __('Historial de Asignaciones'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('ASIG_ID','Id Asignación'); ?></th>
            <th><?php echo $this->Paginator->sort('CUPO_ID','Cupo'); ?></th>


            <th><?php echo $this->Paginator->sort('AUT_CODIGO_AUTORIZACION','Código Autorización'); ?></th>
           <!-- <th><?php echo $this->Paginator->sort('ASIG_DET_CODIGO_RESERVA','Código Reserva'); ?></th>-->

            <th><?php echo $this->Paginator->sort('RES_ID','Cedula'); ?></th>
            <th><?php echo $this->Paginator->sort('RES_APELLIDOS','Nombre Completo'); ?></th>
            <th><?php echo $this->Paginator->sort('ASIG_FECHA_CREACION','Fecha Asignación'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php
        $aero_id = $this->Session->read('Aerolinea.AERO_ID');
        
        foreach ($asignaciones as $asignacione):
            ?>
            <?php
            //Controla que se muestre las asignaciones de la aerolinea del usuario iniciado sesion
            if ($asignacione['Aerolinea']['AERO_ID'] == $aero_id) {
                ?>
                <tr>
                    <td><?php echo h($asignacione['Asignacione']['ASIG_ID']); ?>&nbsp;</td>
                    <td>
        <?php echo $this->Html->link($asignacione['Cupo']['CUPO_ID'], array('controller' => 'cupos', 'action' => 'view', $asignacione['Cupo']['CUPO_ID'])); ?>
                    </td>


                    <td><?php echo h($asignacione['Autorizacion'][0]['AUT_CODIGO_AUTORIZACION']); ?>&nbsp;</td>
                    <!--<td><?php echo h($asignacione['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION']); ?>&nbsp;</td>-->
                    <td>
        <?php echo $this->Html->link($asignacione['Residente']['RES_CEDULA'], array('controller' => 'residentes', 'action' => 'view', $asignacione['Residente']['RES_ID'])); ?>
                    </td>
                    <td><?php echo h($asignacione['Residente']['RES_NOMBRES'] . " " . $asignacione['Residente']['RES_APELLIDOS']); ?>&nbsp;</td>
                    <td><?php echo h($asignacione['Asignacione']['ASIG_FECHA_CREACION']); ?>&nbsp;</td>

                    <td class="actions">
                        <?php //echo $this->Html->link(__('View'), array('action' => 'view', $asignacione['Asignacione']['ASIG_ID'])); ?>
                        <!--<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $asignacione['Asignacione']['ASIG_ID'])); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $asignacione['Asignacione']['ASIG_ID']), null, __('Are you sure you want to delete # %s?', $asignacione['Asignacione']['ASIG_ID'])); ?>
                        -->
                    </td>
                </tr>
            <?php } ?>
<?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
		<li><?php echo $this->Html->link(__('Asignar Descuento'), array('controller' => 'asignacion','action' => 'paso1')); ?></li>
		<li><?php echo $this->Html->link(__('Consulta Cupos'), array('controller' => 'asignaciones','action' => 'consulta_residente')); ?></li>
                <li><?php echo $this->Html->link(__('Historial'), array('controller' => 'counter', 'action' => 'historial')); ?> </li>
		<li><?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'counter', 'action' => 'mi_cuenta')); ?> </li>
	</ul>
</div>
