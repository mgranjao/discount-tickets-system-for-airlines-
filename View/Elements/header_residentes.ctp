			<div class="header_box">
			        <div class="inside">
			                <h1>Residentes</h1>
			                <span>Información referida a las personas que viven en Galápagos.</span>
			        </div>
					<div class="submenu">
							<ul>
											<? 
											$this->request->params["controller"]=strtolower($this->request->params["controller"]);

											$class="";
											if($this->request->params["controller"]=="residentes"){ 
													$class="active";
											}
											?>
											<li><?php echo $this->Html->link(__('Residentes'), array('controller' => 'residentes','action' => 'index'), array('class' => $class)); ?></li>
											<div class="clear"></div>




										</ul>
					</div>
			</div>




