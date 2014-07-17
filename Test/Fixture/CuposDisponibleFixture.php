<?php
/**
 * CuposDisponibleFixture
 *
 */
class CuposDisponibleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'CUPO_DISP_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'RES_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'CUPO_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'CUPO_DISP_DISPONIBLES' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'CUPO_DISP_ID', 'unique' => 1),
			'FK_RELATIONSHIP_10' => array('column' => 'CUPO_ID', 'unique' => 0),
			'FK_RELATIONSHIP_11' => array('column' => 'RES_ID', 'unique' => 0)
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
			'CUPO_DISP_ID' => 1,
			'RES_ID' => 1,
			'CUPO_ID' => 1,
			'CUPO_DISP_DISPONIBLES' => 1
		),
	);

}
