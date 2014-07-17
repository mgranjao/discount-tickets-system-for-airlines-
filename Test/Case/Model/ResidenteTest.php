<?php
App::uses('Residente', 'Model');

/**
 * Residente Test Case
 *
 */
class ResidenteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.residente',
		'app.tipo_colono',
		'app.cupo',
		'app.cupo_disponible',
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
		$this->Residente = ClassRegistry::init('Residente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Residente);

		parent::tearDown();
	}

}
