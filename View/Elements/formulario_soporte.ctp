<div  id="" class="box_formulario">
					<div class="header">
						<div  class="inside">
							<h1>Soporte Técnico</h1>
						<span>Consultas dudas , inquietudes sobre el sistema , ingresa la información en el formulario:</span>


						</div>

					</div>


					<div   class="contenido">
						
						<?php echo $this->Form->create('Soporte' , array('action' => 'send', "class"=>"formulario_soporte" , "id" => "formulario_soporte", 'type' => 'file')); ?>
							<p class="no_bg">
							<?
		       				 echo $this->Form->input('nombre_usuario', array("label" => "Nombre de Usuario:" ,
                "class" => "required"  ));
		        			?>
		        			</p>

		        			<p class="bg">
							<?
		       				 echo $this->Form->input('email', array("label" => "Email:" ,
                "class" => "required email" ));
		        			?>
		        			</p>

		        			<p class="no_bg">
							<?
		       				 echo $this->Form->input('telefono', array("label" => "Tel&eacute;fono:" ,
                "class" => "required number"  ));
		        			?>
		        			</p>

		        			<p class="bg">
							<?
		       				 echo $this->Form->input('mensaje', array("label" => "Mensaje:" , 'type' => 'textarea' ,
                "class" => "required"  ));
		        			?>
		        			</p>


		        			<p class="no_bg">
							<?
		       				 echo $this->Form->input('archivo', array("label" => "Adjuntar Archivo:" ,  'type' => 'file' ));
		        			?>
		        			</p>


		        			<p align="center">
		        				<?php echo $this->Form->end(__('Enviar')); ?>
		        			</p>
							
					</div>

							


				</div>
