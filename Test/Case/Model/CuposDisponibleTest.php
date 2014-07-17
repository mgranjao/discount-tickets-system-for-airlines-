<?php
App::uses('CuposDisponible', 'Model');

/**
 * CuposDisponible Test Case
 *
 */
class CuposDisponibleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cupos_disponible',
		'app.cupo',
		'app.usuario',
		'app.perfile',
		'app.aerolinea',
		'app.asignacione',
		'app.residente',
		'app.tipo_colono',
		'app.asignacion_detalle',
		'app.autorizacion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CuposDisponible = ClassRegistry::init('CuposDisponible');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CuposDisponible);

		parent::tearDown();
	}

}
