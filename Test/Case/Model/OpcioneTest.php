<?php
App::uses('Opcione', 'Model');

/**
 * Opcione Test Case
 *
 */
class OpcioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.opcione',
		'app.op_x_per',
		'app.perfile',
		'app.usuario',
		'app.aerolinea',
		'app.asignacione',
		'app.residente',
		'app.tipo_colono',
		'app.cupo',
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
		$this->Opcione = ClassRegistry::init('Opcione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Opcione);

		parent::tearDown();
	}

}
