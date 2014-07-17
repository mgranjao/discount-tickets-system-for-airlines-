<?php
/**
 * CupoFixture
 *
 */
class CupoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'CUPO_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'TIPO_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'USU_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'CUPO_CANTIDAD' => array('type' => 'integer', 'null' => true, 'default' => null),
		'CUPO_FECHA_DESDE' => array('type' => 'date', 'null' => true, 'default' => null),
		'CUPO_FECHA_HASTA' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'CUPO_ID', 'unique' => 1),
			'FK_RELATIONSHIP_7' => array('column' => 'TIPO_ID', 'unique' => 0),
			'FK_RELATIONSHIP_8' => array('column' => 'USU_ID', 'unique' => 0)
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
			'CUPO_ID' => 1,
			'TIPO_ID' => 1,
			'USU_ID' => 1,
			'CUPO_CANTIDAD' => 1,
			'CUPO_FECHA_DESDE' => '2013-02-12',
			'CUPO_FECHA_HASTA' => '2013-02-12'
		),
	);

}
