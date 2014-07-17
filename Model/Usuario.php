<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 * @property Perfile $Perfile
 * @property Aerolinea $Aerolinea
 * @property Cupo $Cupo
 */
class Usuario extends AppModel {

    
        var $validate = array(
        'USU_NOMBRE_COMPLETO' => array(
            'rule' => 'notEmpty',//'date',
            'message' => 'Ingrese un Nombre',
            //'allowEmpty' => false
        ),    
        'USU_EMAIL' => array(
            'rule' => 'email',//'date',
            'message' => 'Ingrese un correo electr�nico',
            'allowEmpty' => false
        ),
        'USU_PASSWORD' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Largo m�nimo de 8 caracteres'
        ),
        'USU_PASSWORD_CONFIRM' => array(
            'validate' => array(
        'rule' => array('validateIdentical', 'USU_PASSWORD'),
        'message' => 'Password no coincide',
         )
        )       
        );
    
    
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'USU_ID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

        public $displayField = 'USU_EMAIL';
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Perfile' => array(
			'className' => 'Perfile',
			'foreignKey' => 'PER_ID',
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
		'Oficina' => array(
			'className' => 'Oficina',
			'foreignKey' => 'OFI_ID',
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
		'Cupo' => array(
			'className' => 'Cupo',
			'foreignKey' => 'USU_ID',
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

        
        
     public function validateIdentical($data = array(), $compareWith = null, $options = array()) {
		if (is_array($data)) {
			$value = array_shift($data);
		} else {
			$value = $data;
		}
		$compareValue = $this->data[$this->alias][$compareWith];

		$matching = array('string' => 'string', 'int' => 'integer', 'float' => 'float', 'bool' => 'boolean');
		if (!empty($options['cast']) && array_key_exists($options['cast'], $matching)) {
			# cast values to string/int/float/bool if desired
			settype($compareValue, $matching[$options['cast']]);
			settype($value, $matching[$options['cast']]);
		}
		return ($compareValue === $value);
	}
}
