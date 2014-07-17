<?php
App::uses('Aerolinea', 'Model');

/**
 * Aerolinea Test Case
 *
 */
class AerolineaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aerolinea',
		'app.asignacione',
		'app.usuario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aerolinea = ClassRegistry::init('Aerolinea');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aerolinea);

		parent::tearDown();
	}

}
