<?php
App::uses('AsignacionDetalle', 'Model');

/**
 * AsignacionDetalle Test Case
 *
 */
class AsignacionDetalleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asignacion_detalle',
		'app.asignacione',
		'app.residente',
		'app.tipo_colono',
		'app.cupo',
		'app.usuario',
		'app.perfile',
		'app.aerolinea',
		'app.cupos_disponible',
		'app.autorizacion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AsignacionDetalle = ClassRegistry::init('AsignacionDetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AsignacionDetalle);

		parent::tearDown();
	}

}
