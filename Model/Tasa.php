<?php
App::uses('AppModel', 'Model');
/**
 * Tasa Model
 *
 * @property Aerolinea $Aerolineas
 */
class Tasa extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'TASA_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'AERO_ID';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'TASA_ID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'AERO_ID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TASA_TASAS' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TASA_IMPUESTOS' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TASA_FEE' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Aerolinea' => array(
			'className' => 'Aerolinea',
			'foreignKey' => 'AERO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            'Catalogo' => array(
			'className' => 'Catalogo',
			'foreignKey' => 'CATAG_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
