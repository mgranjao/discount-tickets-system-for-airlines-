

<div  class="inside"> 

<div class="periodos form">
<?php echo $this->Form->create('Periodo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Período'); ?></legend>
	<?php
		echo $this->Form->input('PERI_ID');
        ?>
        <p>
        <?
        echo $this->Form->label('PERI_FECHA_INICIO',"<b> Fecha Inicio: </b> ").$this->request->data['Periodo']['PERI_FECHA_INICIO'];
        ?>
        </p>
        <p>
        <?
        echo $this->Form->label('PERI_FECHA_FIN',"<b> Fecha Fin: </b> ").$this->request->data['Periodo']['PERI_FECHA_FIN'];
		?>
        </p>
        <p>
        <?
        //echo $this->Form->input('PERI_FECHA_INICIO', array("label" => "Fecha Inicio", "type" => "date"));
		//echo $this->Form->input('PERI_FECHA_FIN', array("label" => "Fecha Inicio", "type" => "date"));
		echo $this->Form->input('PERI_CONFIRMADO_CONCILIADOR', array("label" => "Cerrar Período"));
                
                echo $this->Form->input('PERI_OBSERVACIONES_CONC',  array("label" => "Observaciones", "type" => "textarea" ));
		/*echo $this->Form->input('PERI_CONFIRMADO_DGAC');
		echo $this->Form->input('PERI_CONFIRMADO_PAGO');
		echo $this->Form->input('PERI_OBSERVACIONES_CONC');
		echo $this->Form->input('PERI_OBSERVACIONES_DGAC');*/
        ?>
        </p>
        <?      
                 if ($this->request->data['Periodo']['PERI_CONFIRMADO_DGAC'] == true)
                {
                ?>
                <p>
                <?
                echo $this->Form->label('PERI_CONFIRMADO_DGAC_LABEL',"El período ha sido confirmado por la Autoridad");    
                echo $this->Form->input('PERI_CONFIRMADO_PAGO', array("label" => "Cofirmar Pago Recibido"));
                ?>
                </p>
                <?
                }
                 
	?>
                
        <p>

            <?  echo $this->Form->label('PERI_FECHA_INICIO',"<b> Observaciones DGAC: </b> "); ?>
            <?
            
            if($this->request->data['Periodo']['PERI_OBSERVACIONES_DGAC']==""){

                ?>
                <span class="gris">No hay observaciones</span>
                <?

            }else{
                echo $this->request->data['Periodo']['PERI_OBSERVACIONES_DGAC'];    
            }

            ?> </p>        
                
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>

<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php //echo $this->Html->script('historial_conciliados'); ?>

    <?php /* echo $this->Html->link(__('Exportar'), array('controller' => 'conciliados', 'action' => 'export_historial_conciliados_xls' , "?" => array("ini" => $fecha_ini , "fin" => $fecha_fin ))); */ ?> </li>                 
    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">
    <input type="hidden" name="peri_id" id="peri_id" value="<?= $this->request->data['Periodo']['PERI_ID'] ?>">
  
  
    <table id="data_table_historial_conciliados_periodo" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ticket</th>
                <th>C&oacute;digo Autorizaci&oacute;n</th>
                <th>C&eacute;dula</th>
                <th>Gal&aacute;pagos</th>
                <th>Continente</th>
                <th>Fecha</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>    
    
    
</div>
</div>
