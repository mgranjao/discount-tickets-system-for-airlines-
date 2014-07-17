<?php
App::uses('AppModel', 'Model');
/**
 * Oficina Model
 *
 */
class Oficina extends AppModel {
    
    /**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'oficinas';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'OFI_ID';


         public $displayField = 'OFI_CODIGO';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'OFI_ID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'OFI_CODIGO' => array(
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



        
        public $belongsTo = array(
		'Aerolinea' => array(
			'className' => 'Aerolinea',
			'foreignKey' => 'AERO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            'Ciudade' => array(
			'className' => 'Ciudade',
			'foreignKey' => 'CIU_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

public $hasMany = array(
		'SupXOfi' => array(
			'className' => 'SupXOfi',
			'foreignKey' => 'OFI_ID',
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