<?php
App::uses('AppModel', 'Model');
/**
 * Opcione Model
 *
 * @property OpXPer $OpXPer
 */
class Opcione extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'OP_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'OP_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'OpXPer' => array(
			'className' => 'OpXPer',
			'foreignKey' => 'OP_ID',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
