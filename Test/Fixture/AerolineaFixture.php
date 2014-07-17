<?php
/**
 * AerolineaFixture
 *
 */
class AerolineaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'AERO_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'AERO_NOMBRE' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'AERO_ID', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'AERO_ID' => 1,
			'AERO_NOMBRE' => 'Lorem ipsum dolor sit amet'
		),
	);

}
