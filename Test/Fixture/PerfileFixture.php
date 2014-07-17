<?php
/**
 * PerfileFixture
 *
 */
class PerfileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'PER_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'PER_NOMBRE' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'PER_ID', 'unique' => 1)
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
			'PER_ID' => 1,
			'PER_NOMBRE' => 'Lorem ipsum dolor sit amet'
		),
	);

}
