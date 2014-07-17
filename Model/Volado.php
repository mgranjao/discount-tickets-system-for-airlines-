<?php

App::uses('AppModel', 'Model');
App::uses('Conciliado', 'Model');
App::uses('Asignacione', 'Model');
App::uses('VoladosAct', 'Model');

/**
 * Volado Model
 *
 */
class Volado extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'VOL_ID';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'VOL_ID';
    public $hasMany = array(
        'Conciliado' => array(
            'className' => 'Conciliado',
            'foreignKey' => 'VOL_ID',
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
        'ConciliadoRetorno' => array(
            'className' => 'Conciliado',
            'foreignKey' => 'VOL_VOL_ID',
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

    public function crear_volado($volado) {
        $asignacion = new Asignacione();
        if (isset($volado['Volado']['VOL_CODIGO_AUT'])) {
            $cond = array('OR' => array("Volado.VOL_NUM_TICKET = '" . trim($volado['Volado']['VOL_NUM_TICKET']) . "'"), 'AND' => array("Volado.VOL_CODIGO_AUT = '" . trim($volado['Volado']['VOL_CODIGO_AUT']) . "'", "Volado.VOL_CONFIRMADO = TRUE"));
            //$cond = array('AND' => array("Volado.VOL_CODIGO_AUT = '" . $volado['Volado']['VOL_CODIGO_AUT'] . "'"));
            $condAsig = array('AND' => array("Asignacione.ASIG_DET_CODIGO_AUTORIZACION = '" . trim($volado['Volado']['VOL_CODIGO_AUT']) . "'", "Autorizacion.EST_ID = 1"));
        } else {
            $cond = array('AND' => array("Volado.VOL_NUM_TICKET = '" . trim($volado['Volado']['VOL_NUM_TICKET']) . "'", "Volado.VOL_CONFIRMADO = TRUE"));
            //$cond = array('AND' => array("Volado.VOL_NUM_TICKET = '" . $volado['Volado']['VOL_NUM_TICKET'] . "'"));
            $condAsig = array('AND' => array("Autorizacion.AUT_TICKET = '" . trim($volado['Volado']['VOL_NUM_TICKET']) . "'", "Autorizacion.EST_ID = 1"));
        }

        $existe = $this->find('all', array('conditions' => $cond));
        $asig = $asignacion->find('all', array('conditions' => $condAsig));
        
        //echo "count:".count($existe);
        if (count($asig) > 0) { //Si existe asignacion 
            if (count($existe) == 0) { //Si no existe el volado ya ingresado
                try {
                    if ($this->save($volado)) {
                        $mensaje[0] = "Volado-insertado";
                        $mensaje[1] = $this->getID();
                        return $mensaje;
                    } else {
                        $mensaje[0] = "Error-insert";
                        return $mensaje;
                    }
                } catch (Exception $e) {
                    $mensaje[0] = "Error-insert";
                    return $mensaje;
                }
            } else {
                //echo($existe[0]['Volado']['VOL_CUPON'] . " != " . $volado['Volado']['VOL_CUPON'] . " - " . count($existe) . " |");
                if (($existe[0]['Volado']['VOL_CUPON'] != $volado['Volado']['VOL_CUPON'])) {
                    //echo("YEAH");
                    if (count($existe) == 1) {
                        $this->save($volado);
                        $vol_id = $this->getID();

                        if (isset($volado['Volado']['VOL_CODIGO_AUT']))
                            $sql = "SELECT * FROM asignaciones WHERE asignaciones.\"ASIG_DET_CODIGO_AUTORIZACION\" = '" . $volado['Volado']['VOL_CODIGO_AUT'] . "'";
                        else
                            $sql = "SELECT * FROM asignaciones,autorizacion WHERE autorizacion.\"AUT_TICKET\" = '" . $volado['Volado']['VOL_NUM_TICKET'] . "' AND autorizacion.\"ASIG_ID\" = asignaciones.\"ASIG_ID\"";

                        $asignacion = $this->query($sql);

                        $mensaje[0] = "conciliado";
                        $mensaje[1] = $vol_id;
                        return $mensaje;
                    }
                    else {
                        if (count($existe) == 2) { //Actualizar los dos registros
                            if (isset($existe[0]['Volado']['CONC_ID']))
                                if ($existe[0]['Volado']['CONC_ID'] != "") { //Si ya conciliado:
                                    $conciliadoModel = new Conciliado();
                                    $conciliadoModel->id = $existe[0]['Volado']['CONC_ID'];
                                    $conciliado = $conciliadoModel->read(null, $existe[0]['Volado']['CONC_ID']);

                                    if ($conciliado['Periodo']['PERI_CONFIRMADO_CONCILIADOR'] != true) {
                                        $voladoModel = new VoladosAct();
                                        if (isset($volado['Volado']['VOL_COD_AERO']))
                                            $data['VoladosAct']['VOL_ACT_COD_AERO'] = $volado['Volado']['VOL_COD_AERO'];
                                        if (isset($volado['Volado']['VOL_NUM_TICKET']))
                                            $data['VoladosAct']['VOL_ACT_NUM_TICKET'] = $volado['Volado']['VOL_NUM_TICKET'];
                                        if (isset($volado['Volado']['VOL_CUPON']))
                                            $data['VoladosAct']['VOL_ACT_CUPON'] = $volado['Volado']['VOL_CUPON'];
                                        if (isset($volado['Volado']['VOL_NUMERO_VUELO']))
                                            $data['VoladosAct']['VOL_ACT_NUMERO_VUELO'] = $volado['Volado']['VOL_NUMERO_VUELO'];
                                        if (isset($volado['Volado']['VOL_FECHA_VUELO']))
                                            $data['VoladosAct']['VOL_ACT_FECHA_VUELO'] = $volado['Volado']['VOL_FECHA_VUELO'];
                                        if (isset($volado['Volado']['VOL_CIUDAD_ORIGEN']))
                                            $data['VoladosAct']['VOL_ACT_CIUDAD_ORIGEN'] = $volado['Volado']['VOL_CIUDAD_ORIGEN'];
                                        if (isset($volado['Volado']['VOL_CIUDAD_DESTINO']))
                                            $data['VoladosAct']['VOL_ACT_CIUDAD_DESTINO'] = $volado['Volado']['VOL_CIUDAD_DESTINO'];
                                        if (isset($volado['Volado']['VOL_TARIFA']))
                                            $data['VoladosAct']['VOL_ACT_TARIFA'] = $volado['Volado']['VOL_TARIFA'];
                                        if (isset($volado['Volado']['VOL_CODIGO_AUT']))
                                            $data['VoladosAct']['VOL_ACT_CODIGO_AUT'] = $volado['Volado']['VOL_CODIGO_AUT'];
                                        if (isset($volado['Volado']['VOL_TASA']))
                                            $data['VoladosAct']['VOL_ACT_TASA'] = $volado['Volado']['VOL_TASA'];
                                        if (isset($volado['Volado']['VOL_IMPUESTOS']))
                                            $data['VoladosAct']['VOL_ACT_IMPUESTOS'] = $volado['Volado']['VOL_IMPUESTOS'];
                                        if (isset($volado['Volado']['VOL_VALOR_TOTAL']))
                                            $data['VoladosAct']['VOL_ACT_VALOR_TOTAL'] = $volado['Volado']['VOL_VALOR_TOTAL'];
                                        
                                        $voladoExistente = new Volado();
                                        $cond = array('AND' => array("Volado.VOL_NUM_TICKET = '" . trim($volado['Volado']['VOL_NUM_TICKET']) . "'", "Volado.VOL_CUPON = '" . trim($volado['Volado']['VOL_CUPON']) . "'", "Volado.VOL_CONFIRMADO = TRUE"));
                                        $voladoExiste = $voladoExistente->find('all', array('conditions' => $cond));
                                        
                                        if ($voladoModel->save($data)) {
                                            $mensaje[0] = "Volado-actualizado";
                                            $mensaje[1] = $voladoModel->getID(); //Id del volado de la tabla actualizao
                                            if(count($voladoExiste)>0)
                                            $mensaje[2] = $voladoExiste[0]['Volado']['VOL_ID']; //Id del Volado
                                                else
                                            $mensaje[2] = $existe[0]['Volado']['VOL_ID']; //Id del Volado
                                            return $mensaje;
                                        } else {
                                            $mensaje[0] = "Error-actualizado";
                                            return $mensaje;
                                        }
                                    } else {
                                        $mensaje[0] = "Error-Periodo-Cerrado";
                                        return $mensaje;
                                    }
                                } else {
                                    $voladoModel = new Volado();
                                    $voladoModel->id = $existe[0]['Volado']['VOL_ID'];
                                    if ($voladoModel->save($volado)) {
                                        $mensaje[0] = "Volado-actualizado";
                                        $mensaje[1] = $voladoModel->getID();
                                        return $mensaje;
                                    } else {
                                        $mensaje[0] = "Error-actualizado";
                                        return $mensaje;
                                    }
                                }
                        } else {
                            $mensaje[0] = "Error-cantidad";
                            return $mensaje;
                        }
                    }
                } else {
                    //echo("aeaea");
                    if (isset($existe[0]['Volado']['CONC_ID']))
                        if ($existe[0]['Volado']['CONC_ID'] != "") { //Si ya conciliado:
                            $conciliadoModel = new Conciliado();
                            $conciliadoModel->id = $existe[0]['Volado']['CONC_ID'];
                            $conciliado = $conciliadoModel->read(null, $existe[0]['Volado']['CONC_ID']);
                            //$conciliado['Periodo']['PERI_FECHA_INICIO'];
                            //$conciliado['Periodo']['PERI_FECHA_FIN'];
                            //2013-10-16 
                            //echo(strtotime($conciliado['Periodo']['PERI_FECHA_INICIO']));
                            //echo(strtotime(date('Y-m-d')));
                            //print_r($conciliado['Periodo']['PERI_FECHA_INICIO']);

                            if ($conciliado['Periodo']['PERI_CONFIRMADO_CONCILIADOR'] != true) {

                                /* $voladoModel = new Volado();
                                  $voladoModel->id = $existe[0]['Volado']['VOL_ID'];
                                  if ($voladoModel->save($volado)) {
                                  $mensaje[0] = "Volado-actualizado";
                                  $mensaje[1] = $voladoModel->getID(); //Id del volado de la tabla actualizao
                                  $mensaje[2] = $existe[0]['Volado']['VOL_ID']; //Id del Volado
                                  return $mensaje; */
                                $voladoModel = new VoladosAct();
                                if (isset($volado['Volado']['VOL_COD_AERO']))
                                    $data['VoladosAct']['VOL_ACT_COD_AERO'] = $volado['Volado']['VOL_COD_AERO'];
                                if (isset($volado['Volado']['VOL_NUM_TICKET']))
                                    $data['VoladosAct']['VOL_ACT_NUM_TICKET'] = $volado['Volado']['VOL_NUM_TICKET'];
                                if (isset($volado['Volado']['VOL_CUPON']))
                                    $data['VoladosAct']['VOL_ACT_CUPON'] = $volado['Volado']['VOL_CUPON'];
                                if (isset($volado['Volado']['VOL_NUMERO_VUELO']))
                                    $data['VoladosAct']['VOL_ACT_NUMERO_VUELO'] = $volado['Volado']['VOL_NUMERO_VUELO'];
                                if (isset($volado['Volado']['VOL_FECHA_VUELO']))
                                    $data['VoladosAct']['VOL_ACT_FECHA_VUELO'] = $volado['Volado']['VOL_FECHA_VUELO'];
                                if (isset($volado['Volado']['VOL_CIUDAD_ORIGEN']))
                                    $data['VoladosAct']['VOL_ACT_CIUDAD_ORIGEN'] = $volado['Volado']['VOL_CIUDAD_ORIGEN'];
                                if (isset($volado['Volado']['VOL_CIUDAD_DESTINO']))
                                    $data['VoladosAct']['VOL_ACT_CIUDAD_DESTINO'] = $volado['Volado']['VOL_CIUDAD_DESTINO'];
                                if (isset($volado['Volado']['VOL_TARIFA']))
                                    $data['VoladosAct']['VOL_ACT_TARIFA'] = $volado['Volado']['VOL_TARIFA'];
                                if (isset($volado['Volado']['VOL_CODIGO_AUT']))
                                    $data['VoladosAct']['VOL_ACT_CODIGO_AUT'] = $volado['Volado']['VOL_CODIGO_AUT'];
                                if (isset($volado['Volado']['VOL_TASA']))
                                    $data['VoladosAct']['VOL_ACT_TASA'] = $volado['Volado']['VOL_TASA'];
                                if (isset($volado['Volado']['VOL_IMPUESTOS']))
                                    $data['VoladosAct']['VOL_ACT_IMPUESTOS'] = $volado['Volado']['VOL_IMPUESTOS'];
                                if (isset($volado['Volado']['VOL_VALOR_TOTAL']))
                                    $data['VoladosAct']['VOL_ACT_VALOR_TOTAL'] = $volado['Volado']['VOL_VALOR_TOTAL'];
                                if ($voladoModel->save($data)) {
                                    $mensaje[0] = "Volado-actualizado";
                                    $mensaje[1] = $voladoModel->getID(); //Id del volado de la tabla actualizao
                                    $mensaje[2] = $existe[0]['Volado']['VOL_ID']; //Id del Volado
                                    return $mensaje;
                                } else {
                                    $mensaje[0] = "Error-actualizado";
                                    return $mensaje;
                                }
                            } else {
                                $mensaje[0] = "Error-Periodo-Cerrado";
                                return $mensaje;
                            }
                        } else {
                            $voladoModel = new Volado();
                            $voladoModel->id = $existe[0]['Volado']['VOL_ID'];
                            if ($voladoModel->save($volado)) {
                                $mensaje[0] = "Volado-actualizado";
                                $mensaje[1] = $voladoModel->getID();
                                return $mensaje;
                            } else {
                                $mensaje[0] = "Error-actualizado";
                                return $mensaje;
                            }
                        }

                    //$mensaje[0] = "Error";
                    //return $mensaje;
                }
            }
        } else {
            $mensaje[0] = "Error-No-ASignacion";
            return $mensaje;
        }
    }
    
     public function vuelos_residente($cedula) {
    $sql = '
        select  

res."RES_CEDULA",
res."RES_NOMBRES",
res."RES_APELLIDOS",
res."RES_FECHA_NACIMIENTO",
res."RES_SEXO",
tipo."TIPO_NOMBRE",
asig."ASIG_FECHA_CREACION",
aut."AUT_TICKET",
aero."AERO_NOMBRE",
(select cat."CATAG_VALOR" from catalogos cat where cat."CATAG_ID" = asig."AERO_PARTIDA_ID") as "AERO_PARTIDA",
(select cat."CATAG_VALOR" from catalogos cat where cat."CATAG_ID" = asig."AERO_DESTINO_ID") as "AERO_DESTINO",
vol_ida."VOL_FECHA_VUELO" as "VOL_IDA_FECHA_VUELO",
vol_ida."VOL_NUMERO_VUELO" as "VOL_IDA_NUMERO_VUELO",
vol_retorno."VOL_FECHA_VUELO" as "VOL_RETORNO_FECHA_VUELO",
vol_retorno."VOL_NUMERO_VUELO" as "VOL_RETORNO_NUMERO_VUELO",
(vol_ida."VOL_TARIFA" + vol_ida."VOL_TARIFA") as "VOL_TARIFA"

from residentes res 

INNER JOIN tipo_colonos tipo ON res."TIPO_ID" = tipo."TIPO_ID"
INNER JOIN asignaciones asig ON asig."RES_ID" = res."RES_ID"
INNER JOIN aerolineas aero ON aero."AERO_ID" = asig."AERO_ID"
INNER JOIN autorizacion aut ON aut."ASIG_ID" = asig."ASIG_ID"
LEFT JOIN conciliados conc ON conc."ASIG_ID" = asig."ASIG_ID"
LEFT JOIN volados vol_ida ON vol_ida."VOL_ID" = conc."VOL_ID"
LEFT JOIN volados vol_retorno ON vol_retorno."VOL_ID" = conc."VOL_VOL_ID"

WHERE res."RES_CEDULA" = \''.trim($cedula).'\'
         ';
         
         $data = $this->query($sql);
         return $data;
     }
     
      public function vuelos_residente_por_aerolinea($cedula,$aero_id) {
    $sql = '
        select  

res."RES_CEDULA",
res."RES_NOMBRES",
res."RES_APELLIDOS",
res."RES_FECHA_NACIMIENTO",
res."RES_SEXO",
tipo."TIPO_NOMBRE",
asig."ASIG_FECHA_CREACION",
aut."AUT_TICKET",
aero."AERO_NOMBRE",
(select cat."CATAG_VALOR" from catalogos cat where cat."CATAG_ID" = asig."AERO_PARTIDA_ID") as "AERO_PARTIDA",
(select cat."CATAG_VALOR" from catalogos cat where cat."CATAG_ID" = asig."AERO_DESTINO_ID") as "AERO_DESTINO",
vol_ida."VOL_FECHA_VUELO" as "VOL_IDA_FECHA_VUELO",
vol_ida."VOL_NUMERO_VUELO" as "VOL_IDA_NUMERO_VUELO",
vol_retorno."VOL_FECHA_VUELO" as "VOL_RETORNO_FECHA_VUELO",
vol_retorno."VOL_NUMERO_VUELO" as "VOL_RETORNO_NUMERO_VUELO",
(vol_ida."VOL_TARIFA" + vol_ida."VOL_TARIFA") as "VOL_TARIFA"

from residentes res 

INNER JOIN tipo_colonos tipo ON res."TIPO_ID" = tipo."TIPO_ID"
INNER JOIN asignaciones asig ON asig."RES_ID" = res."RES_ID"
INNER JOIN aerolineas aero ON aero."AERO_ID" = asig."AERO_ID"
INNER JOIN autorizacion aut ON aut."ASIG_ID" = asig."ASIG_ID"
LEFT JOIN conciliados conc ON conc."ASIG_ID" = asig."ASIG_ID"
LEFT JOIN volados vol_ida ON vol_ida."VOL_ID" = conc."VOL_ID"
LEFT JOIN volados vol_retorno ON vol_retorno."VOL_ID" = conc."VOL_VOL_ID"

WHERE res."RES_CEDULA" = \''.trim($cedula).'\'
    AND asig."AERO_ID" =  \''.trim($aero_id).'\'
         ';
         
         $data = $this->query($sql);
         return $data;
     }
     
     
 public function tarifa_total_por_anio($anio,$aero_id) {
    $sql = '
   select SUM(v."VOL_TARIFA") as "TARIFA_TOTAL_ANIO", COUNT(*) as "VOLADOS" from volados v
where 
"VOL_ID" in (select "VOL_ID" from conciliados c join periodo p on c."PERI_ID" = p."PERI_ID" where date_part(\'year\', p."PERI_FECHA_FIN") = '.$anio.' AND p."AERO_ID" = '.$aero_id.' )
OR
"VOL_ID" in (select "VOL_VOL_ID" from conciliados c join periodo p on c."PERI_ID" = p."PERI_ID" where date_part(\'year\', p."PERI_FECHA_FIN") = '.$anio.' AND p."AERO_ID" = '.$aero_id.' )
         ';
         
         $data = $this->query($sql);
         return $data;
     }
     
 public function tarifa_total_mes_anio($anio,$mes,$aero_id) {
    $sql = '
select SUM("VOL_TARIFA") as "VALOR_TOTAL_MES",COUNT(*) as "VOLADOS"  from volados v join conciliados c on c."CONC_ID" = v."CONC_ID" join periodo p on p."PERI_ID" = c."PERI_ID"
WHERE
date_part(\'year\', p."PERI_FECHA_FIN") = '.$anio.'
AND
date_part(\'month\', p."PERI_FECHA_FIN") = '.$mes.'
AND
p."AERO_ID" = '.$aero_id.'
group by v."CONC_ID"
';
         
         $data = $this->query($sql);
         return $data;
     }    
}
