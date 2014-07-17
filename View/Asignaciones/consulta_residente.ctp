
<div class="inside">
<div class="asignaciones form">
    <?php echo $this->Form->create('Asignacione', array("class"=>"default_form")); ?>
    <fieldset>
        <legend><?php echo __('Consulta de Descuentos Emitidos'); ?></legend>
        <?php
          /*$ruta = Router::url("", true);
          $arreglo = split("[/.-]", $ruta);
          print_r($arreglo);
          echo $arreglo[count($arreglo)-2];
          echo $arreglo[count($arreglo)-1];*/
          
           
          echo $this->Form->input('RES_CEDULA',array("label" => "C&eacute;dula de Pasajero", "class"=>"required number"));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Siguiente')); ?>
</div>
</div>