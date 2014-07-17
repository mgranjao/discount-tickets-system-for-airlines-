<?php
/**
 * TasaFixture
 *
 */
class TasaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'TASA_ID' => array('type' => 'integer', 'null' => false, 'default' => 'nextval(\'"tasas_TASA_ID_seq"\''),
		'AERO_ID' => array('type' => 'integer', 'null' => true),
		'TASA_TASAS' => array('type' => 'float', 'null' => true),
		'TASA_IMPUESTOS' => array('type' => 'float', 'null' => true),
		'TASA_FEE' => array('type' => 'float', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => '"TASA_ID"')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'TASA_ID' => 1,
			'AERO_ID' => 1,
			'TASA_TASAS' => 1,
			'TASA_IMPUESTOS' => 1,
			'TASA_FEE' => 1
		),
	);

}
