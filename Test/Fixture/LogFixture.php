<?php
/**
 * LogFixture
 *
 */
class LogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'log_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'log_fecha' => array('type' => 'date', 'null' => true),
		'log_actividad' => array('type' => 'string', 'null' => true, 'length' => 100),
		'log_seccion' => array('type' => 'string', 'null' => true, 'length' => 100),
		'log_opcion' => array('type' => 'string', 'null' => true, 'length' => 100),
		'log_sql' => array('type' => 'string', 'null' => true, 'length' => 1024),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'log_id'),
			'logs_pk' => array('unique' => true, 'column' => 'log_id')
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
			'log_id' => 1,
			'log_fecha' => '2013-04-19',
			'log_actividad' => 'Lorem ipsum dolor sit amet',
			'log_seccion' => 'Lorem ipsum dolor sit amet',
			'log_opcion' => 'Lorem ipsum dolor sit amet',
			'log_sql' => 'Lorem ipsum dolor sit amet'
		),
	);

}
