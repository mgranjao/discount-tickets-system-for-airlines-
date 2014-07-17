<?php
App::uses('AppModel', 'Model');
/**
 * ConfigXAero Model
 *
 * @property Aerolinea $Aerolinea
 * @property Configuracione $Configuracione
 */
class ConfigXAero extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'config_x_aero';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'CONFIG_X_AERO_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Aerolinea' => array(
			'className' => 'Aerolinea',
			'foreignKey' => 'AERO_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Configuracione' => array(
			'className' => 'Configuracione',
			'foreignKey' => 'CONFIG_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
