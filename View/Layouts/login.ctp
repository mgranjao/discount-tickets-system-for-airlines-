<!DOCTYPE html>
<!--[if lt IE 7]><html lang="es" class="ie6"><![endif]-->
<!--[if IE 7]><html lang="es" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="es" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="es" class="ie9"><![endif]-->
<!--[if gt IE 9]><html lang="es"><![endif]-->
<!--[if !IE]>-->
<html lang="es"><!--<![endif]-->
<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Sistema de Seguimiento de Colonos y Residentes Galápagos - <?php echo $title_for_layout?> </title>

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<!-- Include external files and scripts here (See HTML helper for more info.) -->
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->Html->css('login');
	echo $this->Html->css('colorbox');

	?>

	<?php echo $this->Html->script('jquery.min.2.0.0'); ?>
	<?php echo $this->Html->script('/js/jquery.validate.min.js'); ?>
	<?php echo $this->Html->script('/js/additional-methods.min.js'); ?>

	<?php echo $this->Html->script('/js/jquery.colorbox-min.js'); ?>

	

	<?php echo $this->Html->script('/js/validate.spanish.js'); ?>
	<?php echo $this->Html->script('aerolineas_login'); ?>


	<!--[if lte IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->
	
	
</head>
<body>

	<div class="wrapper">
	
	<div class="content_login">
		
		<div class="header">
			<?
				echo $this->Html->image('logos.png', array('alt' => 'Aerolinea'));
			?>
		</div>
		
		<div class="panel">
			
			<div class="box">
				
				<div class="inside">
					

					<?php echo $this->fetch('content'); ?>

								
				</div>
				
			</div>
			
		</div>
		
		<div class="container_message">
			<?php echo $this->Session->flash(); ?>
		</div>
		
		
		
	</div>



	</div>


	<div class="footer">
		<div class="push">
			<a href="#inline_content" class="boton_soporte inline">Soporte T&eacute;cnico</a>
		</div>
		
	</div>


	<!-- This contains the hidden content for inline calls -->
		<div style='display:none'>
			<div id='inline_content'>
				
				<!-- Formulario de Soporte -->
					<?php echo  $this->element('formulario_soporte'); ?>
				<!-- Fin de Formulario -->
				
			</div>
		</div>


</body>
</html>