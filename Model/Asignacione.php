<?php
App::uses('AppModel', 'Model');
/**
 * Asignacione Model
 *
 */
class Asignacione extends AppModel {
    
    public $actsAs = array('Search.Searchable');
    
     public $filterArgs = array(
        'title' => array('type' => 'like'),
         );


    /*var $validate = array(
        'CUPO_ID' => array(
            'rule' => 'notEmpty',//'date',
            'message' => 'Seleccione un cupo',
            'allowEmpty' => false
        ),
        'ASIG_FECHA_CREACION' => array(
            'rule' => 'date',//'date',
            'message' => 'Ingrese una fecha valida',
            'allowEmpty' => false
        ),
        
        'ASIG_DET_CODIGO_AUTORIZACION' => array(
               'unique' => array(
               'rule' => 'isUnique',
               'required' => 'create',
               'message' => 'Codigo de reserva ya ingresado'
              ),
              'alphanumeric' => array(
                 'rule' => 'alphanumeric',
                 'message' => 'Sólo letras y números'
             )),
         'AERO_PARTIDA_ID' => array(
            'rule' => 'alphaNumeric',
            'message' => 'Ingrese una partida',
            'allowEmpty' => false
        ),
        'AERO_DESTINO_ID' => array(
            'rule' => 'alphaNumeric',
            'message' => 'Ingrese un destino',
            'allowEmpty' => false
        ),
        'ASIG_DET_VALOR' => array(
            'rule' => 'Numeric',
            'message' => 'Ingrese un valor',
            'allowEmpty' => true
        )       
        
    );
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ASIG_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ASIG_DET_CODIGO_AUTORIZACION';

        
        	//The Associations below have been created with all possible keys, those that are not needed can be removed
        
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Residente' => array(
			'className' => 'Residente',
			'foreignKey' => 'RES_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
               'Conciliado' => array(
			'className' => 'Conciliado',
			'foreignKey' => 'CONC_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cupo' => array(
			'className' => 'Cupo',
			'foreignKey' => 'CUPO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Aerolinea' => array(
			'className' => 'Aerolinea',
			'foreignKey' => 'AERO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Catalogo' => array(
			'className' => 'Catalogo',
			'foreignKey' => 'AERO_PARTIDA_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CatalogoDestino' => array(
			'className' => 'Catalogo',
			'foreignKey' => 'AERO_DESTINO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'USU_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Autorizacion' => array(
			'className' => 'Autorizacion',
			'foreignKey' => 'AUT_ID',
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
		'Autorizacion' => array(
			'className' => 'Autorizacion',
			'foreignKey' => 'ASIG_ID',
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
            'Conciliado' => array(
			'className' => 'Conciliado',
			'foreignKey' => 'ASIG_ID',
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
