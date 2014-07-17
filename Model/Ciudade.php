<?php
App::uses('AppModel', 'Model');
/**
 * Ciudade Model
 *
 */
class Ciudade extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
    	public $primaryKey = 'CIU_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

        
        public $displayField = 'CIU_NOMBRE';
        
	public $validate = array(
		'CIU_ID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CIU_NOMBRE' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        
        
        public $hasMany = array(
		'Catalogo' => array(
			'className' => 'Catalogo',
			'foreignKey' => 'CIU_ID',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Oficina' => array(
			'className' => 'Oficina',
			'foreignKey' => 'CIU_ID',
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
