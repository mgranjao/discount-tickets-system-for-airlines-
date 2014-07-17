<?php echo  $this->element('header_asignacion'); ?>


<?php echo $this->Html->script('asignacion'); ?>
<?php if ($asignacion_id != -1) { ?>

<div  class="inside">


   

    <form action="<?= Router::url('/', true) ?>asignacion/paso3" id="Paso2AsignacionForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST">
        <fieldset>
            <legend></legend>
      
            <label for="Asignacion_id">ID de Asignaci&oacute;n: <?php echo $asignacion_id; ?></label>
            <input type="hidden" name="asignacion_id" id="asignacion_id" value="<?php echo $asignacion_id; ?>">
            <input type="hidden" name="codigo_aut" id="codigo_aut" value="<?php echo $codigo_aut; ?>">
            <input type="hidden" name="aut_id" id="aut_id" value="<?php echo $aut_id; ?>">
        </fieldset>
        <div class="submit"><input type="submit"  value="Generar Autorizaci&oacute;n"></div>
      </div>  

      <div class="cargador">
          <? echo $this->Html->image('ajax-loader.gif', array('alt' => 'Procesar')); ?>
          <p> Procensado autorizaci&oacute;n <blink>....</blink> </p>
      </div>

    </form>

<?php } else { ?>
  


    <div class="asignaciones form">
        <?php echo $this->Form->create('Asignacione'); ?>

        
        <fieldset>
            <legend><?php echo __('Asignaci&oacute;n'); ?></legend>
            <?php $url = Router::url('/', true) ?>
            <?php
            echo $this->Form->input("URL", array(
                "type" => "hidden",
                "value" => $url
                    )
            );
            ?>
               <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'residente'), array('class' => 'regresar')); ?>

            <p>
              <? echo $this->Form->label('AUT_CODIGO', "<b> C&oacute;digo de Autorización:</b> "); ?>

              <span class="code_autorizacion"><?=$codigo_aut?></span>

            </p>


            <p class="bg">
            <?
            echo $this->Form->label("<b> C&eacute;dula: </b> ")." ".$residente[0]['Residente']['RES_CEDULA'];
            /* $nombres_arr = explode(" ", $residente[0]['Residente']['RES_NOMBRES']);
              $apellidos_arr = explode(" ", $residente[0]['Residente']['RES_APELLIDOS']);
              $nombres="";$apellidos="";
              for ($i = 0; $i < count($nombres_arr); $i++) {
              $nombres.= $nombres_arr[$i]."&nbsp";
              }
              for ($i = 0; $i < count($apellidos_arr); $i++) {
              $apellidos.= $apellidos_arr[$i]."&nbsp";
              }
              echo $this->Form->label('RES_NOMBRE_COMPLETO',"<b> Nombre: </b> " . $nombres . "&nbsp" . $apellidos);
             */
            ?>
            </p>
            <p>
            <?
            echo $this->Form->label('RES_NOMBRE_COMPLETO', "<b> Nombre: </b> ")." ".$residente[0]['Residente']['RES_NOMBRES'] . "&nbsp" . $residente[0]['Residente']['RES_APELLIDOS'];
            ?>
            </p>

            <!--
            <p>
            <?
            echo $this->Form->label('CUPO_ID', "<b>Cupo:</b> Id:" . $cupos[0]['Cupo']['CUPO_ID'] . " | Fecha Desde: " . $cupos[0]['Cupo']['CUPO_FECHA_DESDE'] . "| Fecha Hasta:" . $cupos[0]['Cupo']['CUPO_FECHA_HASTA'] . " | Tipo Colono:" . $cupos[0]['TipoColono']['TIPO_NOMBRE']);

            ?>
            </p>
  -->

            <p class="bg">
             <?
            echo $this->Form->label('Fecha_Desde', "<b>Fecha Desde: </b> ")." ".$cupos[0]['Cupo']['CUPO_FECHA_DESDE'];
            ?>
            </p>


            <p>
             <?
            echo $this->Form->label('Fecha_Hasta', "<b>Fecha Hasta: </b> ")." ".$cupos[0]['Cupo']['CUPO_FECHA_HASTA'];
            ?>
            </p>

            <p class="bg">
              <?
            echo $this->Form->label('tipo_colono', "<b>Tipo Colono: </b> ")." ".$cupos[0]['TipoColono']['TIPO_NOMBRE'];
            ?>
            </p>


            <p >
            <?
            echo $this->Form->label('CUPO_ID', "<b>Cupos Usados/Cupos Totales:</b>  ")." ".count($cupos_usados) . "/" . $cupos[0]['Cupo']['CUPO_CANTIDAD'];
            
            echo $this->Form->input("CUPO_ID", array(
                "type" => "hidden",
                "value" => $cupos[0]['Cupo']['CUPO_ID']
                    )
            );



            echo $this->Form->input("RES_ID", array(
                "type" => "hidden",
                "value" => $residente_id
                    )
            );

            echo $this->Form->input("AUT_ID", array(
                "type" => "hidden",
                "value" => $aut_id
                    )
            );
            ?>
            </p>
  
            <?
            
            echo $this->Form->input('ASIG_DET_CODIGO_AUTORIZACION', array('type' => 'hidden', "label" => "C&oacute;digo de Autorización", "value" => $codigo_aut));


            /*  echo $this->Form->input('es_dest', array(
              'type'=>'checkbox',
              'label' => 'Destino al Continente?',
              'value' => "1",
              'checked'=>"checked"
              )); */

            ?>
 
            <div class="bg">
            
            <?
            echo $this->Form->input("AERO_PARTIDA_ID", array(//ASIG_DET_PARTIDA
                "type" => "select", // también sirve "radio"
                "options" => $galapagos,
                "label" => "Aeropuerto Partida:"
                    ));
            ?>

            </div>
            
            <div class="no_bg">
              
            <?
            echo $this->Form->input("AERO_DESTINO_ID", array(//ASIG_DET_DESTINO
                "type" => "select", // también sirve "radio"
                "options" => $continente,
                "label" => "Aeropuerto Destino:"
                    )
            );

            ?>
          </div>
            <?

            /*
              echo "<div id='tarifa_aero' class='tarifa_aero' name='tarifa_aero'></div>";

              echo $this->Form->input('tarifa', array("type" => "hidden"));

              echo "<div id='tarifa_gye' class='tarifa_gye' name='tarifa_gye'>";
              echo $this->Form->label('Tarifa.GYE', "Tarifa: ".$tarifa_GYE[0]['Configuracione']['CONFIG_VALOR']);
              echo $this->Form->input('hdtarifa_gye', array("type" => "hidden", "value"=>$tarifa_GYE[0]['Configuracione']['CONFIG_VALOR']));
              echo "</div><div id='tarifa_uio'>";
              echo $this->Form->label('Tarifa.UIO', "Tarifa: ".$tarifa_UIO[0]['Configuracione']['CONFIG_VALOR']);
              echo $this->Form->input('hdtarifa_uio', array("type" => "hidden", "value"=>$tarifa_UIO[0]['Configuracione']['CONFIG_VALOR']));
              echo "</div>";
              echo "<div id='div_tasas' class='div_tasas' name='div_tasas'>";
              echo $this->Form->label('Tasa.TASA_IMPUESTOS', "Tasas: ".$tasa[0]['Tasa']['TASA_TASAS']); echo "<br/>";
              echo $this->Form->label('Tasa.TASA_IMPUESTOS', "Impuestos: ".$tasa[0]['Tasa']['TASA_IMPUESTOS']);echo "<br/>";
              echo $this->Form->label('Tasa.TASA_IMPUESTOS', "Fee: ".$tasa[0]['Tasa']['TASA_FEE']);echo "<br/>";
              echo "</div>";
             */

            echo $this->Form->input("ASIG_DET_TIPO_VUELO", array(
                "type" => "hidden",
                "value" => $tipo_vuelo[0],
                "label" => "Tipo Vuelo"
                    )
            );
            ?>
           
            <p class="bg">
            <?

            echo $this->Form->label("<b> Tipo Vuelo: </b>")." Round Trip";

            // echo $this->Form->input('enviar_email', array("label" => "Enviar Notificación a Email (Opcional)", "name" => "enviar_email", "id" => "enviar_email", "value" => "", 'class'=>'enviar_email'));
            // <p>Date: <input name="ASIG_FECHA_CREACION" type="text" id="datepicker" /></p>
            ?>
          </p>

        </fieldset>

        <?php if ($pasos == 2) { ?>
            <?php echo $this->Form->end(__('Siguiente')); ?>
        <?php } elseif ($pasos == 1) { ?>
            <?php echo $this->Form->end(__('Confirmar y Descontar Cupo')); ?>
        <?php } ?> 


        <div class="cancelar_proceso" >
          ¿Deseas  <?php echo $this->Html->link(__('Cancelar Proceso'), array('action' => 'residente')); ?> ?
        </div>

    </div>


</div>
 


<?php } ?>