			<div class="header_box">
			        <div class="inside">
			                <h1>Información Aeropuertos</h1>
			                <span>Información referida a las aerolíneas registradas en el sistema.</span>
			        </div>
					<div class="submenu">
							<ul>
											<? 
											$this->request->params["controller"]=strtolower($this->request->params["controller"]);

											$class="";
											if($this->request->params["controller"]=="catalogos"){ 
													$class="active";
											}
											?>
							
											<li><?php echo $this->Html->link(__('Aeropuertos'), array('controller' => 'catalogos', 'action' => 'index'), array('class' => $class)); ?> </li>
											
											<? 
											$class="";
											if($this->request->params["controller"]=="tasas"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Tasas'), array('controller' => 'tasas', 'action' => 'index'), array('class' => $class)); ?> </li>

											<? 
											$class="";
											if($this->request->params["controller"]=="ciudades"){ 
													$class="active";
											}
											?>

											<li><?php echo $this->Html->link(__('Ciudades'), array('controller' => 'ciudades', 'action' => 'index'), array('class' => $class)); ?> </li> 

											<div class="clear"></div>




										</ul>
					</div>
			</div>