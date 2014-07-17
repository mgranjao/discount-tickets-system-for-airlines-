<?php
App::uses('Autorizacion', 'Model');

/**
 * Autorizacion Test Case
 *
 */
class AutorizacionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.autorizacion',
		'app.asignacione',
		'app.residente',
		'app.tipo_colono',
		'app.cupo',
		'app.usuario',
		'app.perfile',
		'app.aerolinea',
		'app.cupos_disponible',
		'app.asignacion_detalle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Autorizacion = ClassRegistry::init('Autorizacion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Autorizacion);

		parent::tearDown();
	}

}
