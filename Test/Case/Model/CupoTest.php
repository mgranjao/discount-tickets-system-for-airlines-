<?php
App::uses('Cupo', 'Model');

/**
 * Cupo Test Case
 *
 */
class CupoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cupo',
		'app.usuario',
		'app.tipo_colono',
		'app.residente',
		'app.cupos_disponible',
		'app.asignacione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cupo = ClassRegistry::init('Cupo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cupo);

		parent::tearDown();
	}

}
