<?php
/**
 * AsignacionDetalleFixture
 *
 */
class AsignacionDetalleFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'asignacion_detalle';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ASIG_DET_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ASIG_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'ASIG_DET_CODIGO_RESERVA' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'ASIG_DET_PARTIDA' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'ASIG_DET_DESTINO' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'ASIG_DET_VALOR' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'ASIG_DET_TIPO_VUELO' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ASIG_DET_ID', 'unique' => 1),
			'FK_RELATIONSHIP_4' => array('column' => 'ASIG_ID', 'unique' => 0)
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
			'ASIG_DET_ID' => 1,
			'ASIG_ID' => 1,
			'ASIG_DET_CODIGO_RESERVA' => 'Lorem ipsum dolor sit amet',
			'ASIG_DET_PARTIDA' => 'Lorem ipsum dolor sit amet',
			'ASIG_DET_DESTINO' => 'Lorem ipsum dolor sit amet',
			'ASIG_DET_VALOR' => 1,
			'ASIG_DET_TIPO_VUELO' => 'Lorem ipsum dolor sit amet'
		),
	);

}
