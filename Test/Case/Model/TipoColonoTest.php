<?php
App::uses('TipoColono', 'Model');

/**
 * TipoColono Test Case
 *
 */
class TipoColonoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipo_colono',
		'app.residente',
		'app.cupo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TipoColono = ClassRegistry::init('TipoColono');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TipoColono);

		parent::tearDown();
	}

}
