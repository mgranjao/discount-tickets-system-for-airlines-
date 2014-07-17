<?php
App::uses('AppModel', 'Model');
/**
 * Estado Model
 *
 * @property Autorizacion $Autorizacion
 */
class Estado extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'EST_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'EST_NOMBRE';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Autorizacion' => array(
			'className' => 'Autorizacion',
			'foreignKey' => 'EST_ID',
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
