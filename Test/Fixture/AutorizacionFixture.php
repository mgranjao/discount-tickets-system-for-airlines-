<?php
/**
 * AutorizacionFixture
 *
 */
class AutorizacionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'autorizacion';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'AUT_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ASIG_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'AUT_CODIGO_AUTORIZACION' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1024, 'collate' => 'latin1_spanish_ci', 'charset' => 'latin1'),
		'AUT_VALOR_PAGADO' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,2'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'AUT_ID', 'unique' => 1),
			'FK_RELATIONSHIP_5' => array('column' => 'ASIG_ID', 'unique' => 0)
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
			'AUT_ID' => 1,
			'ASIG_ID' => 1,
			'AUT_CODIGO_AUTORIZACION' => 'Lorem ipsum dolor sit amet',
			'AUT_VALOR_PAGADO' => 1
		),
	);

}
