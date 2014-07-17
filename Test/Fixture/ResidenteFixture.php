<?php
/**
 * ResidenteFixture
 *
 */
class ResidenteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'RES_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'TIPO_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'RES_NUMERO_CERTIFICADO' => array('type' => 'integer', 'null' => true, 'default' => null),
		'RES_CEDULA' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'RES_NOMBRES' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'RES_APELLIDOS' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'RES_SEXO' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'RES_FECHA_NACIMIENTO' => array('type' => 'date', 'null' => true, 'default' => null),
		'RES_FECHA_CARNE_EMIS' => array('type' => 'date', 'null' => true, 'default' => null),
		'RES_FECHA_EXPIRA' => array('type' => 'date', 'null' => true, 'default' => null),
		'RES_CUPO_DISPONIBLE' => array('type' => 'integer', 'null' => true, 'default' => null),
		'RES_OBSERVACION' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1024, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'RES_ID', 'unique' => 1),
			'FK_RELATIONSHIP_9' => array('column' => 'TIPO_ID', 'unique' => 0)
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
			'RES_ID' => 1,
			'TIPO_ID' => 1,
			'RES_NUMERO_CERTIFICADO' => 1,
			'RES_CEDULA' => 'Lorem ipsum dolor sit amet',
			'RES_NOMBRES' => 'Lorem ipsum dolor sit amet',
			'RES_APELLIDOS' => 'Lorem ipsum dolor sit amet',
			'RES_SEXO' => 'Lorem ipsum dolor sit ame',
			'RES_FECHA_NACIMIENTO' => '2013-02-12',
			'RES_FECHA_CARNE_EMIS' => '2013-02-12',
			'RES_FECHA_EXPIRA' => '2013-02-12',
			'RES_CUPO_DISPONIBLE' => 1,
			'RES_OBSERVACION' => 'Lorem ipsum dolor sit amet'
		),
	);

}
