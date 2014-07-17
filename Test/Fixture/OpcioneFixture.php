<?php
/**
 * OpcioneFixture
 *
 */
class OpcioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'OP_ID' => array('type' => 'integer', 'null' => false, 'default' => 'nextval(\'"opciones_OP_ID_seq"\''),
		'OP_CONTROLADOR' => array('type' => 'string', 'null' => true),
		'OP_ACCION' => array('type' => 'string', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => '"OP_ID"'),
			'OPCIONES_PK' => array('unique' => true, 'column' => '"OP_ID"')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'OP_ID' => 1,
			'OP_CONTROLADOR' => 'Lorem ipsum dolor sit amet',
			'OP_ACCION' => 'Lorem ipsum dolor sit amet'
		),
	);

}
