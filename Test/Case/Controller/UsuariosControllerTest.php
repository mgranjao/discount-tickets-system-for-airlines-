<?php
App::uses('UsuariosController', 'Controller');

/**
 * UsuariosController Test Case
 *
 */
class UsuariosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usuario',
		'app.perfile',
		'app.aerolinea',
		'app.asignacione',
		'app.residente',
		'app.tipo_colono',
		'app.cupo',
		'app.cupos_disponible',
		'app.asignacion_detalle',
		'app.autorizacion'
	);

}
