<?php
/**
 * UsuarioFixture
 *
 */
class UsuarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'USU_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'PER_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'AERO_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'USU_EMAIL' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'USU_PASSWORD' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'USU_TELEFONO' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'USU_DIRECCION' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'USU_ID', 'unique' => 1),
			'FK_RELATIONSHIP_13' => array('column' => 'PER_ID', 'unique' => 0),
			'FK_RELATIONSHIP_6' => array('column' => 'AERO_ID', 'unique' => 0)
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
			'USU_ID' => 1,
			'PER_ID' => 1,
			'AERO_ID' => 1,
			'USU_EMAIL' => 'Lorem ipsum dolor sit amet',
			'USU_PASSWORD' => 'Lorem ipsum dolor sit amet',
			'USU_TELEFONO' => 'Lorem ipsum dolor sit amet',
			'USU_DIRECCION' => 'Lorem ipsum dolor sit amet'
		),
	);

}
