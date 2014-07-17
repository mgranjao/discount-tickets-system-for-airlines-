<?php
App::uses('AppModel', 'Model');
/**
 * CuposDisponible Model
 *
 * @property Cupo $Cupo
 * @property Residente $Residente
 */
class CuposDisponible extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'CUPO_DISP_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cupo' => array(
			'className' => 'Cupo',
			'foreignKey' => 'CUPO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Residente' => array(
			'className' => 'Residente',
			'foreignKey' => 'RES_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
