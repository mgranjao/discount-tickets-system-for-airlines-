<?php
App::uses('Asignacione', 'Model');

/**
 * Asignacione Test Case
 *
 */
class AsignacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asignacione',
		'app.cupo',
		'app.usuario',
		'app.perfile',
		'app.aerolinea',
		'app.tipo_colono',
		'app.residente',
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
		$this->Asignacione = ClassRegistry::init('Asignacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Asignacione);

		parent::tearDown();
	}

}
