<?php
App::uses('AppModel', 'Model');
/**
 * SupXOfi Model
 *
 * @property Oficina $Oficina
 * @property Usuario $Usuario
 */
class SupXOfi extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'sup_x_ofi';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'SUP_X_OFI_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Oficina' => array(
			'className' => 'Oficina',
			'foreignKey' => 'OFI_ID',
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
		)
	);
}
