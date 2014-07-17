			<div class="header_box">
			        <div class="inside">
			                <h1>Configuración del Sistema</h1>
			                <span>Información referida a las aerolíneas registradas en el sistema.</span>
			        </div>
					<div class="submenu">
							<ul>
											<? 
											$this->request->params["controller"]=strtolower($this->request->params["controller"]);

											$class="";
											if($this->request->params["controller"]=="configuraciones"){ 
													$class="active";
											}
											?>
							
											<li><?php echo $this->Html->link(__('Configuraciones'), array('controller' => 'configuraciones', 'action' => 'index'), array('class' => $class)); ?> </li>
											
											<? 
											$class="";
											if($this->request->params["controller"]=="cupos"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Cupos'), array('controller' => 'cupos', 'action' => 'index'), array('class' => $class)); ?> </li>

											<? 
											$class="";
											if($this->request->params["controller"]=="estados"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => $class)); ?> </li> 

											<? 
											$class="";
											if($this->request->params["controller"]=="perfiles"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Perfiles'), array('controller' => 'perfiles', 'action' => 'index'), array('class' => $class)); ?> </li> 



											<? 
											$class="";
											if($this->request->params["controller"]=="periodos"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Periodos'), array('controller' => 'periodos', 'action' => 'index'), array('class' => $class)); ?> </li> 

											
											<? 
											$class="";
											if($this->request->params["controller"]=="tipocolonos"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Tipos de Colonos'), array('controller' => 'tipocolonos', 'action' => 'index'), array('class' => $class)); ?> </li> 



											<div class="clear"></div>




										</ul>
					</div>
			</div>




