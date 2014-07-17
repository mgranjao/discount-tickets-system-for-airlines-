<?php

App::uses('AppModel', 'Model');

/**
 * Aerolinea Model
 *
 * @property Asignacione $Asignacione
 * @property Usuario $Usuario
 */
class Aerolinea extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'AERO_ID';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    public $displayField = 'AERO_NOMBRE';
    var $validate = array(
        'AERO_NOMBRE' => array(
            'rule' => 'alphaNumeric', //'date',
            'message' => 'Seleccione un cupo',
            'allowEmpty' => false
        ),
        'AERO_PREFIJO' => array(
            'rule' => 'alphaNumeric',
            'message' => 'Ingrese un valor',
            'allowEmpty' => false
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Asignacione' => array(
            'className' => 'Asignacione',
            'foreignKey' => 'AERO_ID',
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
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'AERO_ID',
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
        'Tasa' => array(
            'className' => 'Tasa',
            'foreignKey' => 'AERO_ID',
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
        'ConfigXAero' => array(
            'className' => 'ConfigXAero',
            'foreignKey' => 'AERO_ID',
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
