<?php

App::uses('AppModel', 'Model');

/**
 * Residente Model
 *
 * @property TipoColono $TipoColono
 * @property CupoDisponible $CupoDisponible
 * @property CuposDisponible $CuposDisponible
 * @property Asignacione $Asignacione
 */
class Residente extends AppModel {

    var $validate = array(
        /* 'ASIG_DET_CODIGO_RESERVA' => array(
          'rule' => 'alphaNumeric',
          'required' => true,
          'message' => 'SÃ³lo letras y nÃºmeros'
          ), */
        'RES_NUMERO_CERTIFICADO' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'Código de reserva ya ingresado'
            ),
            'alphanumeric' => array(
                'rule' => 'Numeric',
                'message' => 'Sólo números'
        )),
        'RES_CEDULA' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'Cédula ya ingresada'
            ),
            'alphanumeric' => array(
                'rule' => 'alphanumeric',
                'message' => 'Sólo letras y números'
        )),
        'RES_NOMBRES' => array(
            'rule' => '/^[^%#\/*@!0123456789]+$/',
            'message' => 'Ingrese solo letras',
            'allowEmpty' => false
        ),
        'RES_APELLIDOS' => array(
            'rule' => '/^[^%#\/*@!0123456789]+$/',
            'message' => 'Ingrese solo letras'/* ,
          'allowEmpty' => false */ //Deshabilitado temporalmente hasta que envien excel con los datos correctos
        ),
        'RES_FECHA_NACIMIENTO' => array(
            'rule' => 'date',
            'message' => 'Ingrese una fecha válida',
            'allowEmpty' => false
        ),
        'RES_FECHA_CARNE_EMIS' => array(
            'rule' => 'date',
            'message' => 'Ingrese una fecha válida',
            'allowEmpty' => false
        ),
        'RES_FECHA_EXPIRA' => array(
            'rule' => 'date', //'date',
            'message' => 'Ingrese una fecha válida',
            'allowEmpty' => false
        ),
        'RES_OBSERVACION' => array(
            'rule' => 'alphanumeric', //'date',
            'message' => 'Ingrese solo letras y numeros',
            'allowEmpty' => true
        )
    );

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'RES_ID';
    //The Associations below have been created with all possible keys, those that are not needed can be removed


    public $displayField = 'RES_CEDULA';

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'TipoColono' => array(
            'className' => 'TipoColono',
            'foreignKey' => 'TIPO_ID',
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
        'CuposDisponible' => array(
            'className' => 'CuposDisponible',
            'foreignKey' => 'RES_ID',
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
        'Asignacione' => array(
            'className' => 'Asignacione',
            'foreignKey' => 'RES_ID',
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

    public function crear_residente($sql_insert, $residente) {
        
        
        $sql = "SELECT * FROM residentes WHERE Residentes.\"RES_CEDULA\" = '" . $residente['Residente']['RES_CEDULA'] . "'";

        $existe = $this->query($sql);

        if (count($existe) == 0) {            
            $sql = $sql_insert;            
            try {
                $this->query($sql);
            } catch (Exception $e) {
                //echo $sql;
                return "Error-insert";
            }

            return true;
        } else {
            $sql = "UPDATE residentes SET \"RES_FECHA_CARNE_EMIS\"=" . $residente['Residente']['RES_FECHA_CARNE_EMIS'] . " ,\"RES_FECHA_EXPIRA\"=" . $residente['Residente']['RES_FECHA_EXPIRA'] . " WHERE \"RES_CEDULA\"= '" . $residente['Residente']['RES_CEDULA'] . "';";
           try {
                $this->query($sql);
            } catch (Exception $e) {
                //echo $sql;
                return "Error-update";
            }
        }
        //return $this->query($sql);
    }

}
