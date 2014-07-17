<?php

App::uses('AppModel', 'Model');

/**
 * Catalogo Model
 *
 */
class Catalogo extends AppModel {

    var $validate = array(
        'CATAG_VALOR' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'Catálogo ya ingresado'
            ),
            'alphanumeric' => array(
                'rule' => 'alphanumeric',
                'message' => 'Sólo letras y números'
        )),
        'CATAG_TIPO' => array(
            'rule' => 'alphanumeric', //'date',
            'message' => 'Ingrese un tipo, solo caracteres alfanuméricos',
            'allowEmpty' => false
        ),
        'CATAG_DESCRIPCION' => array(
            'rule' => 'notEmpty', //'date',
            'message' => 'Ingrese una descripción',
            'allowEmpty' => false
        ),
    );

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'CATAG_ID'; //CATAG_ID

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'CATAG_VALOR'; //CATAG_VALOR
    
    
     public $belongsTo = array(
            'Ciudade' => array(
			'className' => 'Ciudade',
			'foreignKey' => 'CIU_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
