<?php
App::uses('AppModel', 'Model');
/**
 * Autorizacion Model
 *
 * @property Asignacione $Asignacione
 */
class Autorizacion extends AppModel {

    
        public $validate = array(
        'ASIG_ID' => array(
            'rule'    => 'isUnique',
            'message' => 'La asignaci&oacute;n ya tiene una Autorizaci&oacute;n'
        )
    );
        
        
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'autorizacion';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'AUT_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Asignacione' => array(
			'className' => 'Asignacione',
			'foreignKey' => 'ASIG_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
