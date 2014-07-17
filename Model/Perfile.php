<?php
App::uses('AppModel', 'Model');
/**
 * Perfile Model
 *
 * @property Usuario $Usuario
 */
class Perfile extends AppModel {

    
     var $validate = array(
        'PER_NOMBRE' => array(
            'rule' => 'notEmpty',//'date',
            'message' => 'Ingrese un nombre',
            'allowEmpty' => false
        ));
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'PER_ID';

/**
 * Display field
 *
 * @var string
 **/
	public $displayField = 'PER_NOMBRE';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'PER_ID',
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
