
<div  class="inside"> 

<?php echo $this->Html->script('asignacion'); ?>

<div class="asignaciones form">
    <?php echo $this->Form->create('Asignacione'); ?>
    <fieldset>
        <legend><?php echo __('Consulta Residente'); ?></legend>


        <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'consulta_residente'), array('class' => 'regresar')); ?>



        <?php $url = Router::url('/', true) ?>
        <?php
        echo $this->Form->input("URL", array(
            "type" => "hidden",
            "value" => $url
                )
        );

        ?>
        <p>
        <?
        echo $this->Form->label("<b> C&eacute;dula:</b> ")." ".$residente[0]['Residente']['RES_CEDULA'];
        /*
          $nombres_arr = explode(" ", $residente[0]['Residente']['RES_NOMBRES']);
          $apellidos_arr = explode(" ", $residente[0]['Residente']['RES_APELLIDOS']);
          $nombres="";$apellidos="";
          for ($i = 0; $i < count($nombres_arr); $i++) {
          $nombres.= $nombres_arr[$i]."&nbsp";
          }
          for ($i = 0; $i < count($apellidos_arr); $i++) {
          $apellidos.= $apellidos_arr[$i]."&nbsp";
          }
          echo $this->Form->label('RES_NOMBRE_COMPLETO',"<b> Nombre: </b> " . $nombres . "&nbsp" . $apellidos); */
        ?>
        </p>
        <p class="bg">
        <?
        echo $this->Form->label('RES_NOMBRE_COMPLETO', "<b> Nombre: </b> ")." ".$residente[0]['Residente']['RES_NOMBRES'] . "&nbsp" . $residente[0]['Residente']['RES_APELLIDOS'];
        ?>
        </p>

        <!-- 
        echo $this->Form->label('CUPO_ID', "<b>Cupo:</b> Id:" . $cupos[0]['Cupo']['CUPO_ID']);
        -->

        <p>
          <?
           echo $this->Form->label("Fecha Desde: ")." ".$cupos[0]['Cupo']['CUPO_FECHA_DESDE'];
          ?>
        </p>

        <p class="bg">
          <?
           echo $this->Form->label("Fecha Hasta: ")." ".$cupos[0]['Cupo']['CUPO_FECHA_HASTA'];
          ?>
        </p>

        <p>
          <?
          echo $this->Form->label("Tipo Colono: ")." ".$cupos[0]['TipoColono']['TIPO_NOMBRE'];
          ?>
        </p>

        <p class="bg">
          <?
          echo $this->Form->label('CUPO_ID', "<b>Cupos Usados/Cupos Totales:</b>  ").count($cupos_usados) . "/" . $cupos[0]['Cupo']['CUPO_CANTIDAD'];
          ?>
        </p>

    </fieldset>
        <?php /* echo $this->Form->end(__('Confirmar')); */ ?>
</div>

</div>