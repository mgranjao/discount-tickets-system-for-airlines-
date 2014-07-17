<div class="asignaciones form">
    <?php echo $this->Form->create('Asignacione'); ?>
    <fieldset>
        <legend><?php echo __('Cedula Residente'); ?></legend>
        <?php
       
          echo $this->Form->input('RES_ID',array("label" => "Cedula de Pasajero"));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Asignaciones'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Cupos'), array('controller' => 'cupos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Cupos'), array('controller' => 'cupos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Residentes'), array('controller' => 'residentes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Residentes'), array('controller' => 'residentes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Aerolineas'), array('controller' => 'aerolineas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Aerolineas'), array('controller' => 'aerolineas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Autorizaciones'), array('controller' => 'autorizacions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Autorizaciones'), array('controller' => 'autorizacions', 'action' => 'add')); ?> </li>       
    </ul>
</div>
