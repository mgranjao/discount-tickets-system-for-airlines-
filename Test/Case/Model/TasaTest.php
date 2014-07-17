<?php
App::uses('Tasa', 'Model');

/**
 * Tasa Test Case
 *
 */
class TasaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tasa',
		'app.aerolinea',
		'app.asignacione',
		'app.residente',
		'app.tipo_colono',
		'app.cupo',
		'app.usuario',
		'app.perfile',
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
		$this->Tasa = ClassRegistry::init('Tasa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tasa);

		parent::tearDown();
	}

}
