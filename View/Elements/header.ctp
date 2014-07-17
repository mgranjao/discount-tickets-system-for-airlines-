
			<div class="logo">
				<div class="inside">
					<?php 

					switch($_SESSION["html"]["aerolinea"]){
						case "0":
						echo $this->Html->image('logo_administrador.png', array('alt' => 'Administrador del Sistema'));
						break;
						case "1":
						echo $this->Html->image('logo_lan.png', array('alt' => 'Usuario LAN'));
						break;
						case "2":
						echo $this->Html->image('logo_tame.png', array('alt' => 'Usuario TAME'));
						break;
						case "3":
						echo $this->Html->image('logo_aerogal.png', array('alt' => 'Usuario AVIANCA'));
						break;
						default:

					}

					 ?>
				</div>
			</div>
			
			<div class="option">
				<div class="info">
					<div class="inside">
						<ul>
							


							<li>

								<?=$_SESSION['html']['usuario']?>  
							
							<?php 

							switch($_SESSION['html']['perfil']){
								case "1":
								?>
								<span>(Administrador)</span>
								<?
								break;

								case "2":
								?>
								<span>(Agente)</span>
								<?
								break;

								case "3":
								?>
								<span>(Supervisor)</span>
								<?
								break;

								case "4":
								?>
								<span>(Conciliador)</span>
								<?
								break;

								case "5":
								?>
								<span>(Reportes)</span>
								<?
								break;

								case "6":
								?>
								<span>(DGAC)</span>
								<?
								break;

							}

							 ?>
							 </li>
							


							<li><?php echo $this->Html->link(__('Salir(x)'), array('controller' => 'login', 'action' => 'logout'), array("class"=>"logout"), null, __('¿Está seguro que desea cerrar la sesión?')); ?></li>
						</ul>
					</div>
				</div>
			</div>
			
			
			<div class="clear"></div>
			

