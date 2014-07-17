<?php
App::uses('OpXPer', 'Model');

/**
 * OpXPer Test Case
 *
 */
class OpXPerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.op_x_per',
		'app.perfile',
		'app.usuario',
		'app.aerolinea',
		'app.asignacione',
		'app.residente',
		'app.tipo_colono',
		'app.cupo',
		'app.cupos_disponible',
		'app.autorizacion',
		'app.opcione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OpXPer = ClassRegistry::init('OpXPer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OpXPer);

		parent::tearDown();
	}

}
