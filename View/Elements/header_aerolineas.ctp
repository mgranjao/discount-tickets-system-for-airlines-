			<div class="header_box">
			        <div class="inside">
			                <h1>Información Aerolineas</h1>
			                <span>Información referida a las aerolíneas registradas en el sistema.</span>
			        </div>
					<div class="submenu">
							<ul>
											<? 
											$class="";


											$this->request->params["controller"]=strtolower($this->request->params["controller"]);

											if($this->request->params["controller"]=="aerolineas"){ 
													$class="active";
											}
											?>
											<li><?php echo $this->Html->link(__('Aerolineas'), array('controller' => 'aerolineas', 'action' => 'index'), array('class' => $class)); ?> </li>
											<? 
											$class="";
											if($this->request->params["controller"]=="oficinas"){ 
													$class="active";
											}
											?>
											<li><?php echo $this->Html->link(__('Oficinas'), array('controller' => 'oficinas', 'action' => 'index'), array('class' => $class)); ?> </li>
											<? 
											$class="";
											if($this->request->params["controller"]=="supervisores"){ 
													$class="active";
											}
											?>
											<li><?php echo $this->Html->link(__('Supervisores'), array('controller' => 'supervisores','action' => 'index'), array('class' => $class)); ?></li>

											

											<? 
											$class="";
											if($this->request->params["controller"]=="usuarios"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Usuarios'), array('controller' => 'usuarios', 'action' => 'index'), array('class' => $class)); ?> </li>
											<div class="clear"></div>


										</ul>
					</div>
			</div>