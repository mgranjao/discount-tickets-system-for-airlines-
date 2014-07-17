<?php
App::uses('AppModel', 'Model');
/**
 * Conciliado Model
 *
 * @property Volado $Volado
 * @property Volado $Volado
 * @property Asignacione $Asignacione
 */
class Conciliado extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'CONC_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'CONC_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Volado' => array(
			'className' => 'Volado',
			'foreignKey' => 'VOL_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'VoladoDestino' => array(
			'className' => 'Volado',
			'foreignKey' => 'VOL_VOL_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Asignacione' => array(
			'className' => 'Asignacione',
			'foreignKey' => 'ASIG_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Periodo' => array(
			'className' => 'Periodo',
			'foreignKey' => 'PERI_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
