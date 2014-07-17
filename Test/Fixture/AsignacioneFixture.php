<?php
/**
 * AsignacioneFixture
 *
 */
class AsignacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ASIG_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'CUPO_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'AERO_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'RES_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'ASIG_FECHA_CREACION' => array('type' => 'date', 'null' => true, 'default' => null),
		'ASIG_DET_CODIGO_RESERVA' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ASIG_DET_PARTIDA' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ASIG_DET_DESTINO' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ASIG_DET_VALOR' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'ASIG_DET_TIPO_VUELO' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ASIG_ID', 'unique' => 1),
			'FK_RELATIONSHIP_12' => array('column' => 'CUPO_ID', 'unique' => 0),
			'FK_RELATIONSHIP_2' => array('column' => 'AERO_ID', 'unique' => 0),
			'FK_RELATIONSHIP_3' => array('column' => 'RES_ID', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ASIG_ID' => 1,
			'CUPO_ID' => 1,
			'AERO_ID' => 1,
			'RES_ID' => 1,
			'ASIG_FECHA_CREACION' => '2013-03-01',
			'ASIG_DET_CODIGO_RESERVA' => 'Lorem ipsum dolor sit amet',
			'ASIG_DET_PARTIDA' => 'Lorem ipsum dolor sit amet',
			'ASIG_DET_DESTINO' => 'Lorem ipsum dolor sit amet',
			'ASIG_DET_VALOR' => 1,
			'ASIG_DET_TIPO_VUELO' => 'Lorem ipsum dolor sit amet'
		),
	);

}
