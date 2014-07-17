<div  class="inside"> 

<div class="asignaciones view">
<h2><?php  echo __('Asignación'); ?></h2>

	
	<p>Información de la signación realizada: </p>

          <?php echo $this->Html->link(__('<- Regresar'), array('action' => 'historial_conciliador'), array('class' => 'regresar')); ?>

	<dl>
		<dt><?php echo __('ASIG ID'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_ID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cupo'); ?></dt>
        <dd>
            <?php // echo $this->Html->link($asignacione['Cupo']['CUPO_ID'], array('controller' => 'cupos', 'action' => 'view', $asignacione['Cupo']['CUPO_ID'])); ?>
            <?php echo h($asignacione['Cupo']['CUPO_ID']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Aerolinea'); ?></dt>
        <dd>
            <?php //echo $this->Html->link($asignacione['Aerolinea']['AERO_NOMBRE'], array('controller' => 'aerolineas', 'action' => 'view', $asignacione['Aerolinea']['AERO_ID'])); ?>
            <?php echo h($asignacione['Aerolinea']['AERO_NOMBRE']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Residente'); ?></dt>
        <dd>
            <?php //echo $this->Html->link($asignacione['Residente']['RES_CEDULA'], array('controller' => 'residentes', 'action' => 'view', $asignacione['Residente']['RES_ID'])); ?>
            <?php
            $nombres_arr = explode(" ", $asignacione['Residente']['RES_NOMBRES']);
            $apellidos_arr = explode(" ", $asignacione['Residente']['RES_APELLIDOS']);
            $nombres = "";
            $apellidos = "";
            for ($i = 0; $i < count($nombres_arr); $i++) {
                $nombres.= $nombres_arr[$i] . "&nbsp";
            }
            for ($i = 0; $i < count($apellidos_arr); $i++) {
                $apellidos.= $apellidos_arr[$i] . "&nbsp";
            }
            ?>
<?php echo $asignacione['Residente']['RES_CEDULA'] . " - " . $nombres." &nbsp ".$apellidos; ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Fecha Asignación'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_FECHA_CREACION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Código Autorización'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aeropuerto Partida'); ?></dt>
		<dd>
			<?php echo h($asignacione['Catalogo']['CATAG_VALOR']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aeropuerto Destino'); ?></dt>
		<dd>
			<?php echo h($asignacione['CatalogoDestino']['CATAG_VALOR']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agente'); ?></dt>
		<dd>
			<?php echo h($asignacione['Usuario']['USU_NOMBRE_COMPLETO']); ?>
			&nbsp;
		</dd>
                <!--<dt><?php echo __('ASIG DET VALOR'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_DET_VALOR']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Tipo Vuelo'); ?></dt>
		<dd>
			<?php echo h($asignacione['Asignacione']['ASIG_DET_TIPO_VUELO']); ?>
			&nbsp;
		</dd>
	</dl>

<br/>

</div>

</div>