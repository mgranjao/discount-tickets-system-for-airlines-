<?php 
$this->request->params["controller"]=strtolower($this->request->params["controller"]);


$this->request->params["action"]=strtolower($this->request->params["action"]);


if($_SESSION['html']['perfil']=="1"){
?>
<ul>

	<!-- 
	<li>
		<? 
		$class="";
		if($this->request->params["controller"]=="administrador"){ 
			$class="active";
		}
		?>
		<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'administrador', 'action' => 'index'), array('class' => 'home '.$class)); ?>

	</li>
	-->

	<li>
		<?
		$class=""; 
		if(($this->request->params["controller"]=="aerolineas")||($this->request->params["controller"]=="oficinas")||($this->request->params["controller"]=="supervisores")||($this->request->params["controller"]=="usuarios")){
			$class="active";
		}
		?>
		<?php echo $this->Html->link(__('Aerolíneas'), array('controller' => 'aerolineas', 'action' => 'index'), array('class' => 'aerolinea '.$class)); ?>
	</li>

	<li>
		<? 
		$class="";
		if(($this->request->params["controller"]=="catalogos")||($this->request->params["controller"]=="tasas")||($this->request->params["controller"]=="ciudades")){
			$class="active";
		}
		?>
		<?php echo $this->Html->link(__('Aeropuertos'), array('controller' => 'catalogos', 'action' => 'index'), array('class' => 'aeropuerto '.$class)); ?>
	</li>

	<li>
		<? 
		$class="";
		if($this->request->params["controller"]=="residentes"){
			$class="active";
		}
		?>
		<?php echo $this->Html->link(__('Residentes'), array('controller' => 'residentes','action' => 'index'), array('class' => 'residente '.$class)); ?>

	</li>

	<li>
		<? 
		$class="";
		if(($this->request->params["controller"]=="configuraciones")||($this->request->params["controller"]=="cupos")||($this->request->params["controller"]=="estados")||($this->request->params["controller"]=="perfiles")||($this->request->params["controller"]=="periodos")||($this->request->params["controller"]=="tipocolonos")){
			$class="active";
		}
		?>
		<?php echo $this->Html->link(__('Configuraciones'), array('controller' => 'configuraciones', 'action' => 'index'), array('class' => 'configuracion '.$class)); ?> 
	</li>
</ul>
<?php 
}


if($_SESSION['html']['perfil']=="2"){
?>

		<ul>
			<!-- 
			<li>
			<? 
			$class="";
			if(($this->request->params["controller"]=="counter")&&($this->request->params["action"]=="index")){ 
				$class="active";
			}
			?>
			<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'counter', 'action' => 'index'), array('class' => 'home '.$class)); ?>

			</li>
			-->
			
			<? 
			$class="";
			if(($this->request->params["action"]=="residente")||($this->request->params["action"]=="asignacion")||($this->request->params["action"]=="autorizacion")){ 
				$class="active";
			}
			?>

			<li><?php echo $this->Html->link(__('Asignacion'), array('controller' => 'asignacion','action' => 'paso1'), array('class'=>'asignacion '.$class)); ?></li>
			
			<? 
			$class="";
			if(($this->request->params["action"]=="consulta_residente")||($this->request->params["action"]=="consulta_asignacion")){ 
				$class="active";
			}
			?>
			<li>
			<?php echo $this->Html->link(__('Consulta Cupos'), array('controller' => 'asignaciones','action' => 'consulta_residente'), array('class'=>'consulta_cupos '.$class)); ?>
			</li>

			<? 
			$class="";
			if($this->request->params["action"]=="historial_counter"){ 
				$class="active";
			}
			?>
			<li><?php echo $this->Html->link(__('Historial'), array('controller' => 'asignaciones', 'action' => 'historial_counter'),array('class'=>'historial '.$class)); ?></li>

			<li>
				<? 
			$class="";


			if(($this->request->params["controller"]=="counter")&&($this->request->params["action"]=="mi_cuenta")){ 
				$class="active";
			}
			?>

				<?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'counter', 'action' => 'mi_cuenta'), array('class'=>'configuracion '.$class)); ?>

			</li>

		</ul>
		

<?
} 


if($_SESSION['html']['perfil']=="3"){
?>
	<ul>
		<!-- 
		<li>
			<? 
			$class="";
			if(($this->request->params["controller"]=="supervisor")&&($this->request->params["action"]=="index")){ 
				$class="active";
			}
			?>

			<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'supervisor', 'action' => 'index'), array('class' => 'home '.$class)); ?>
		</li>
		-->
		<li>
				
			<? 
			$class="";
			if((($this->request->params["controller"]=="asignaciones")&&($this->request->params["action"]=="historial_supervisor"))||($this->request->params["action"]=="view_supervisor")){ 
				$class="active";
			}
			?>
			<?php echo $this->Html->link(__('Asignaciones'), array('controller' => 'asignaciones', 'action' => 'historial_supervisor'), array('class' => 'asignacion '.$class)); ?>

		</li>

		<li>
			<? 
			$class="";
			if(($this->request->params["controller"]=="asignaciones")&&($this->request->params["action"]=="historial_supervisor_reversadas")){ 
				$class="active";
			}
			?>
			<?php echo $this->Html->link(__('Reversos'), array('controller' => 'asignaciones', 'action' => 'historial_supervisor_reversadas'), array('class' => 'historial '.$class)); ?>


		</li>

	

		<li>
			<? 
			$class="";
			if((($this->request->params["controller"]=="usuarios")&&($this->request->params["action"]=="agentes_supervisor"))||($this->request->params["action"]=="edit_agente")){ 
				$class="active";

			}
			?>
			<?php echo $this->Html->link(__('Agentes'), array('controller' => 'usuarios', 'action' => 'agentes_supervisor'), array('class' => 'agentes '.$class)); ?>
		</li>


		<li>
			<? 
			$class="";
			if(($this->request->params["controller"]=="supervisor")&&($this->request->params["action"]=="mi_cuenta")){ 
				$class="active";

			}
			?>
			<?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'supervisor', 'action' => 'mi_cuenta'), array('class' => 'residente '.$class)); ?>
		</li>

	</ul>
<?
}

if($_SESSION['html']['perfil']=="4"){
?>
	<ul>

		<!-- 
		<li>
			<? 
			$class="";
			if(($this->request->params["controller"]=="conciliador")&&($this->request->params["action"]=="index")){ 
				$class="active";
			}
			?>

			<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'conciliador', 'action' => 'index'), array('class' => 'home '.$class)); ?>
		</li>
		-->

		<li>

			<? 
			$class="";
			if(($this->request->params["controller"]=="conciliador")&&($this->request->params["action"]=="carga_archivos")){ 
				$class="active";
			}
			?>


		<?php echo $this->Html->link(__('Carga Archivos'), array('controller' => 'conciliador', 'action' => 'carga_archivos'), array('class' => 'carga_archivos '.$class)); ?> 

		</li>

		<li>

			<? 
			$class="";
			if((($this->request->params["controller"]=="asignaciones")&&($this->request->params["action"]=="historial_conciliador"))||($this->request->params["action"]=="view_conciliador")){ 
				$class="active";
			}
			?>

			<?php echo $this->Html->link(__('Asignaciones'), array('controller' => 'asignaciones', 'action' => 'historial_conciliador'), array('class' => 'asignacion '.$class)); ?>

		</li>


		 <li>

		 	<? 
			$class="";
			if(($this->request->params["controller"]=="conciliados")&&($this->request->params["action"]=="historial_conciliados")){ 
				$class="active";
			}
			?>

		 	<?php echo $this->Html->link(__('Conciliados'), array('controller' => 'conciliados', 'action' => 'historial_conciliados'), array('class' => 'historial '.$class)); ?> 

		 </li>

		  <li>

		  	<? 
			$class="";
			if((($this->request->params["controller"]=="periodos")&&($this->request->params["action"]=="historial_periodos"))||($this->request->params["action"]=="edit_conciliador")){ 
				$class="active";
			}
			?>


		  	<?php echo $this->Html->link(__('Períodos'), array('controller' => 'periodos', 'action' => 'historial_periodos'), array('class' => 'periodos '.$class)); ?> 

		  </li>

		  <li>

		  	<? 
			$class="";
			if(($this->request->params["controller"]=="volados")&&(($this->request->params["action"]=="historial_volados")||($this->request->params["action"]=="view"))){ 
				$class="active";
			}
			?>
		  
		  	<?php echo $this->Html->link(__('Volados'), array('controller' => 'volados', 'action' => 'historial_volados'), array('class' => 'volados '.$class)); ?> 
		  
		  </li>

		  <li>

		  	<? 
			$class="";
			if(($this->request->params["controller"]=="conciliador")&&($this->request->params["action"]=="mi_cuenta")){ 
				$class="active";
			}
			?>

		  	<?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'conciliador', 'action' => 'mi_cuenta') , array('class' => 'residente '.$class)); ?>
		  </li>

	</ul>
<?
}


if($_SESSION['html']['perfil']=="5"){
	?>
		<ul>
			<!-- 
			<li>
				<? 
			$class="";
			if(($this->request->params["controller"]=="reportes")&&($this->request->params["action"]=="index")){ 
				$class="active";
			}
			?>

				<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'reportes', 'action' => 'index'), array('class' => 'home '.$class)); ?>
			</li>
			-->
			<li>

				<? 
			$class="";
			if(($this->request->params["controller"]=="reportes")&&($this->request->params["action"]=="residente")){ 
				$class="active";
			}
			?>

				<?php echo $this->Html->link(__('Residentes'), array('controller' => 'Reportes', 'action' => 'residente'), array('class' => 'asignacion '.$class)); ?>

			</li>


			<li>
					<? 
			$class="";
			if(($this->request->params["controller"]=="reportes")&&($this->request->params["action"]=="periodos")){ 
				$class="active";
			}
			?>

				<?php echo $this->Html->link(__('Períodos'), array('controller' => 'Reportes', 'action' => 'periodos'),  array('class' => 'periodos '.$class)); ?> 
			</li>

			<li>
					<? 
			$class="";
			if(($this->request->params["controller"]=="reportes")&&($this->request->params["action"]=="mi_cuenta")){ 
				$class="active";
			}
			?>

				<?php echo $this->Html->link(__('Mi cuenta'), array('controller' => 'reportes', 'action' => 'mi_cuenta'), array('class' => 'residente '.$class)); ?>
			</li>

		</ul>
	<?
}
?>


