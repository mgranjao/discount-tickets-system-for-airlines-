<?php
App::uses('AppModel', 'Model');
/**
 * OpXPer Model
 *
 * @property Perfile $Perfile
 * @property Opcione $Opcione
 */
class OpXPer extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'op_x_per';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'OP_X_PER_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'OP_X_PER_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Perfile' => array(
			'className' => 'Perfile',
			'foreignKey' => 'PER_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Opcione' => array(
			'className' => 'Opcione',
			'foreignKey' => 'OP_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
