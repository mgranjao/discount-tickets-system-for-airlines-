<?php
/**
 * OpXPerFixture
 *
 */
class OpXPerFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'op_x_per';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'OP_X_PER_ID' => array('type' => 'integer', 'null' => false, 'default' => 'nextval(\'"op_x_per_OP_X_PER_ID_seq"\''),
		'OP_ID' => array('type' => 'integer', 'null' => true),
		'PER_ID' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => '"OP_X_PER_ID"'),
			'OP_X_PER_PK' => array('unique' => true, 'column' => '"OP_X_PER_ID"'),
			'RELATIONSHIP_14_FK' => array('unique' => false, 'column' => '"PER_ID"')
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
			'OP_X_PER_ID' => 1,
			'OP_ID' => 1,
			'PER_ID' => 1
		),
	);

}
