<?php echo  $this->element('header_asignacion'); ?>

<div  class="inside">
<?php echo $this->Html->script('autorizacion'); ?>
<div class="asignaciones form">

    <!--<div class="asignaciones index">-->
    <h2><?php echo __('Autorizaci&oacute;n'); ?></h2>





<!-- <div class="input date"><label for="CodigoAut"><b>C&oacute;digo de Autorizaci&oacute;n:</b> <?php echo $codigo_aut; ?></label>
</div>

 <div class="input date"><label for="CodigoResVuelo"><b>C&oacute;digo de Reserva de Vuelo:</b> <?php echo $codigo_reserva; ?></label>
</div>-->

     <p>
        <?
        echo $this->Form->label('COD_AUT',"<b>C&oacute;digo de Autorizaci&oacute;n:</b> ");
        ?>

         <span class="code_autorizacion"><?=$codigo_aut?></span>
        </p>

    <p>
    <label for="CedulaResidente"><b>C&eacute;dula Residente:</b></label> <?php echo $cedula_residente; ?>

    </p>

    <p class="bg">
    <label for="NombresResidente"><b>Nombres Residente:</b></label>  <?php echo $nombres_residente; ?>
  
    </p>

    <?php 
    if(trim($apellidos_residente)==""){
        $apellidos_residente="-";
    }
     ?>

    <p>
    <label for="ApellidosResidente"><b>Apellidos Residente:</b></label> <?php echo $apellidos_residente; ?>
    </p>

    <p  class="bg">
    <label for="TipoColono"><b>Tipo Colono:</b></label> <?php echo $tipo_colono[0]['TipoColono']['TIPO_NOMBRE']; ?>
    </p>
<!--
    <div class="input date"><label for="Cupos"><b>Cupos Usados / Cupos Disponibles:</b> <?php echo count($cuposUsados) + 1; ?>/<?php echo $cupoSeleccionado['Cupo']['CUPO_CANTIDAD']; ?></label>
    </div>

    
   <div class="input date"><label for="ValorAut"><b>Valor a Pagar:</b> <?php echo $valor_aut; ?></label>
  </div>
    -->

<!--<div class="input date"><label for="ValorDesc">Valor de Descuento: <?php echo $valor_aut; ?></label>
</div>-->

    <div id="aut_error" class="notice"></div>
    
    <?php echo $this->Form->create('Autorizacion', array("class"=>"default_form")); ?>
  

        <?php $url = Router::url('/', true) ?>
        <?php
        echo $this->Form->input("URL", array(
            "type" => "hidden",
            "value" => $url
                )
        );

        ?>
       
        <div class="bg">
        <?
        echo $this->Form->input('AUT_TICKET', array('type' => 'text', "label" => "N&uacute;mero de Ticket" , "class"=>"required"));
        ?>
    

            <input type="hidden" name="asignacion_id" id="asignacion_id" value="<?php echo $asig_id; ?>">
            <input type="hidden" name="codigo_aut" id="codigo_aut" value="<?php echo $codigo_aut; ?>">
            <input type="hidden" name="aut_id" id="aut_id" value="<?php echo $aut_id; ?>">

        </div>
        <?php
        //echo $this->Form->end(__('Confirmar y Descontar Cupo'));
        $options = array
            (
            'label' => 'Confirmar y Descontar Cupo',
            'value' => 'Confirmar y Descontar Cupo',
            'id' => 'submit_aut'/*,
            'div' => array(
                'class' => 'glass-pill',
            )*/
            ,'class' => "boton_grande"
        );
        echo $this->Form->end($options);
        ?>

             <div class="cancelar_proceso" >
          ¿Deseas  <?php echo $this->Html->link(__('Cancelar Proceso'), array('action' => 'residente')); ?> ?
        </div>
</div>       

</div>