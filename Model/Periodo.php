<?php
App::uses('AppModel', 'Model');
/**
 * Periodo Model
 *
 * @property Conciliado $Conciliado
 */
class Periodo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'periodo';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'PERI_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'PERI_FECHA_FIN';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

        
        public $belongsTo = array(
        'Aerolinea' => array(
            'className' => 'Aerolinea',
            'foreignKey' => 'AERO_ID',
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
		'Conciliado' => array(
			'className' => 'Conciliado',
			'foreignKey' => 'PERI_ID',
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
