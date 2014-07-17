<?php
App::uses('AppModel', 'Model');
/**
 * TipoColono Model
 *
 * @property Residente $Residente
 * @property Cupo $Cupo
 */
class TipoColono extends AppModel {

    
     var $validate = array(
        'TIPO_NOMBRE' => array(
            'unique' => array(
               'rule' => 'isUnique',
               'required' => 'create',
               'message' => 'Tipo Colono ya Ingresado'
              ),
              'notEmpty' => array(
                 'rule' => 'alphanumeric',
                 'allowEmpty' => false,
                 'message' => 'Sólo letras y números'
             ))
    );
     
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'TIPO_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed
        
        public $displayField = 'TIPO_NOMBRE';
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Residente' => array(
			'className' => 'Residente',
			'foreignKey' => 'TIPO_ID',
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
		'Cupo' => array(
			'className' => 'Cupo',
			'foreignKey' => 'TIPO_ID',
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
