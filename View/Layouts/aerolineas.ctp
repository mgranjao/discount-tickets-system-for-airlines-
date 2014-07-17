<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'Sistema de Seguimiento de Colonos y Residentes Galápagos');
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html lang="es" class="ie6"><![endif]-->
<!--[if IE 7]><html lang="es" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="es" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="es" class="ie9"><![endif]-->
<!--[if gt IE 9]><html lang="es"><![endif]-->
<!--[if !IE]>-->
<html lang="es"><!--<![endif]-->
<head>
<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	
	<!--[if lte IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->
	<?php 
	echo $this->Html->script('jquery-min');
	?>	
	<?php

	echo $this->Html->meta('icon');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
		echo $this->Html->css('colorbox');
	?>

	<?php echo $this->Html->css('/js/datatables/css/jquery.dataTables.css'); ?>
	<?php //echo $this->Html->css('/js/datatables/css/bootstrap.min.css'); ?>
	<?php //echo $this->Html->css('/js/datatables/css/bootstrap-responsive.min.css'); ?>

	<?php echo $this->Html->script('jquery.min.2.0.0'); ?>
	<?php echo $this->Html->script('/js/datatables/js/jquery.dataTables.min.js'); ?>

	<?php echo $this->Html->script('/js/jquery.validate.min.js'); ?>
	<?php echo $this->Html->script('/js/additional-methods.min.js'); ?>
	<?php echo $this->Html->script('/js/validate.spanish.js'); ?>
	<?php echo $this->Html->script('/js/jquery.colorbox-min.js'); ?>

	<?php echo $this->Html->script('bootstrap.min'); ?>

	<?php echo $this->Html->script('aerolineas_datatables'); ?>

	<?
	echo $this->Html->css('style');
	?>
	
	
</head>
<body>

	<div class="wrapper">

	<div class="header">
		<div class="wrap">
			
			<?php echo  $this->element('header'); ?>
			
			
		</div>
	</div>
	
	<div class="menu">
		
		<div class="wrap">
		
		
		 <?php echo  $this->element('menu'); ?>



		</div>
		
	</div>
	
	
	<div class="panel">
		


		<div class="wrap">


			<div class="inside">


					<?php echo $this->Session->flash(); ?>

				
				<div class="box">
					
					<!-- Header -->


					

						<?php echo $this->fetch('content'); ?>

					
					
				</div>
				
			</div>
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