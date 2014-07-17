<?php
App::uses('AppModel', 'Model');
/**
 * Cupo Model
 *
 * @property Usuario $Usuario
 * @property TipoColono $TipoColono
 * @property CuposDisponible $CuposDisponible
 * @property Asignacione $Asignacione
 */
class Cupo extends AppModel {

     var $validate = array(
       
        'CUPO_CANTIDAD' => array(
            'rule' => 'Numeric',
            'message' => 'Ingrese un valor',
            'allowEmpty' => false
        )
        
        
    );
    
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'CUPO_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

        
        public $displayField = 'CUPO_ID';
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'USU_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipoColono' => array(
			'className' => 'TipoColono',
			'foreignKey' => 'TIPO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CuposDisponible' => array(
			'className' => 'CuposDisponible',
			'foreignKey' => 'CUPO_ID',
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
		'Asignacione' => array(
			'className' => 'Asignacione',
			'foreignKey' => 'CUPO_ID',
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
