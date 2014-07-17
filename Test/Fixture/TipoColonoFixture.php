<?php
/**
 * TipoColonoFixture
 *
 */
class TipoColonoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'TIPO_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'TIPO_NOMBRE' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'TIPO_ID', 'unique' => 1)
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
			'TIPO_ID' => 1,
			'TIPO_NOMBRE' => 'Lorem ipsum dolor sit amet'
		),
	);

}
