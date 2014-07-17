<?php

App::uses('AppController', 'Controller');
App::uses('Asignacione', 'Model');
App::uses('Usuario', 'Model');
App::uses('Conciliado', 'Model');
App::uses('Volado', 'Model');
App::uses('VoladosAct', 'Model');
App::uses('Tasa', 'Model');
App::uses('Aerolinea', 'Model');
App::uses('Catalogo', 'Model');
App::uses('Periodo', 'Model');
App::import('Vendor', 'Spreadsheet_Excel_Reader', array('file' => 'excel' . DS . 'reader.php'));

/**
 * Aerolineas Controller
 *
 * @property Aerolinea $Aerolinea
 */
class ConciliadorController extends AppController {

    //Plantilla
    var $layout = 'aerolineas';
    
    var $uses = array();

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        
        $this->redirect('/conciliador/carga_archivos/');

    }

    public function mi_cuenta($id = null) {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */
        $usuario = new Usuario();
        $id = $this->Session->read('Usuario.USU_ID');
        $usuario->id = $id;
        if (!$usuario->exists()) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($usuario->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido actualizado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El usuario no pudo ser actualizado, inténtelo nuevamente.'));
            }
        } else {
            $this->request->data = $usuario->read(null, $id);
        }

        $user = $usuario->find('all', array('conditions' => array('OR' => array("Usuario.USU_ID = " . $id))));
        $perfil = $usuario->Perfile->find('all', array('conditions' => array('OR' => array("Perfile.PER_ID = " . $user[0]['Usuario']['PER_ID']))));
        $aerolinea = $usuario->Aerolinea->find('all', array('conditions' => array('OR' => array("Aerolinea.AERO_ID = " . $user[0]['Usuario']['AERO_ID']))));


        $cond = array('OR' => array("Usuario.USU_ID = '$id'"));
        $password = $usuario->find('all', array('conditions' => $cond));
        $password = $password[0]['Usuario']['USU_PASSWORD'];

        $this->set(compact('perfil', 'aerolinea', 'password', 'user'));
    }

    public function carga_archivos() {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        //$this->autoRender = false;
        ini_set('max_execution_time', 300);
        $aerolineaModel = new Aerolinea();
        $cond = array('AND' => array("Aerolinea.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID')));
        $aerolinea = $aerolineaModel->find('all', array('conditions' => $cond));

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['confirmar'])) { //Confirma los vuelos ingresados
                
                if (isset($this->request->data['volados']))
                $volados = $this->request->data['volados'];
                
                if (isset($this->request->data['voladosAct_act'])){
                $actualizados_act = $this->request->data['voladosAct_act'];
                $actualizados_vol = $this->request->data['volados_act'];}
                
                $conciliados = array();
                if(isset($volados))
                foreach ($volados as $volado) {
                    $voladoModel = new Volado();
                    $asignacion = new Asignacione();
                    $voladoModel->id = $volado;
                    $data = $voladoModel->read(null, $volado);

                    if (isset($volado['Volado']['VOL_CODIGO_AUT'])) {
                        $cond = array('AND' => array("Volado.VOL_CODIGO_AUT = '" . $data['Volado']['VOL_CODIGO_AUT'] . "'", "Volado.VOL_CONFIRMADO = TRUE"));
                        $condAsig = array('OR' => array("Asignacione.ASIG_DET_CODIGO_AUTORIZACION = '" . $data['Volado']['VOL_CODIGO_AUT'] . "'"));
                    } else {
                        $cond = array('AND' => array("Volado.VOL_NUM_TICKET = '" . $data['Volado']['VOL_NUM_TICKET'] . "'", "Volado.VOL_CONFIRMADO = TRUE"));
                        $condAsig = array('OR' => array("Autorizacion.AUT_TICKET = '" . $data['Volado']['VOL_NUM_TICKET'] . "'"));
                    }
                    $existe = $voladoModel->find('all', array('conditions' => $cond));
                    $asig = $asignacion->find('all', array('conditions' => $condAsig));

                    $data['Volado']['VOL_CONFIRMADO'] = 1;
                    $data['Volado']['VOL_CODIGO_AUT'] = $asig[0]['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION'];
                    $voladoModel->save($data);

                    if (count($existe) > 0) {
                        $periodoModel = new Periodo();
                        $cond = array('AND' => array("Periodo.AERO_ID = ". $this->Session->read('Aerolinea.AERO_ID'),"(Periodo.PERI_FECHA_INICIO <= to_date('" . date("Y-m-d") . "','YYYY-MM-DD') AND Periodo.PERI_FECHA_FIN >= to_date('" . date("Y-m-d") . "','YYYY-MM-DD'))"));
                        $periodo = $periodoModel->find('all', array('conditions' => $cond));

                        if (count($periodo) > 0) {
                            $conciliado['Conciliado']['PERI_ID'] = $periodo[0]['Periodo']['PERI_ID'];
                        } else {
                            //$this->Session->setFlash(__('No hay período para vincular'));    
                        }
                        $conciliado['Conciliado']['ASIG_ID'] = $asig[0]['Asignacione']['ASIG_ID'];
                        $conciliado['Conciliado']['VOL_ID'] = $existe[0]['Volado']['VOL_ID'];
                        $conciliado['Conciliado']['VOL_VOL_ID'] = $volado;
                        $conciliado['Conciliado']['CONC_FECHA']['month'] = (string) date('m');
                        $conciliado['Conciliado']['CONC_FECHA']['day'] = (string) date('d');
                        $conciliado['Conciliado']['CONC_FECHA']['year'] = (string) date('Y');
                        $conciliado['Conciliado']['CONC_CONFIRMADO'] = 1;
                        $conciliadoModelo = new Conciliado();
                        $conciliadoModelo->save($conciliado);
                        array_push($conciliados, $existe[0]['Volado']['VOL_NUM_TICKET']);

                        $asig_conciliada = $asignacion->read(null, $conciliado['Conciliado']['ASIG_ID']);
                        $conc_id = $conciliadoModelo->getID();
                        $asig_conciliada['Asignacione']['CONC_ID'] = $conc_id;
                        $asignacion->id = $conciliado['Conciliado']['ASIG_ID'];
                        $asignacion->save($asig_conciliada);

                        //Guardar el id del conciliado en los Volados
                        $c_id['Volado']['CONC_ID'] = $conc_id;
                        $voladoModel = new Volado();
                        $voladoModel->id = $conciliado['Conciliado']['VOL_VOL_ID'];
                        $voladoModel->save($c_id);

                        $c_id['Volado']['CONC_ID'] = $conc_id;
                        $voladoModel = new Volado();
                        $voladoModel->id = $conciliado['Conciliado']['VOL_ID'];
                        $voladoModel->save($c_id);
                    }
                }
                
                if(isset($actualizados_act))
                for($i=0; $i<count($actualizados_act); $i++){
               // foreach ($volados as $volado) {
                    $voladoActModel = new VoladosAct();
                    $voladoActModel->id = $actualizados_act[$i];
                    $dataNueva = $voladoActModel->read(null, $actualizados_act[$i]);
                    //print_r($dataNueva);
                    
                    $voladoModel = new Volado();
                    $asignacion = new Asignacione();
                    $voladoModel->id = $actualizados_vol[$i];
                    $data = $voladoModel->read(null, $actualizados_vol[$i]);

                    if (isset($volado['Volado']['VOL_CODIGO_AUT'])) {
                       // $cond = array('AND' => array("Volado.VOL_CODIGO_AUT = '" . $data['Volado']['VOL_CODIGO_AUT'] . "'", "Volado.VOL_CONFIRMADO = TRUE"));
                        $condAsig = array('OR' => array("Asignacione.ASIG_DET_CODIGO_AUTORIZACION = '" . $data['Volado']['VOL_CODIGO_AUT'] . "'"));
                    } else {
                      //  $cond = array('AND' => array("Volado.VOL_NUM_TICKET = '" . $data['Volado']['VOL_NUM_TICKET'] . "'", "Volado.VOL_CONFIRMADO = TRUE"));
                        $condAsig = array('OR' => array("Autorizacion.AUT_TICKET = '" . $data['Volado']['VOL_NUM_TICKET'] . "'"));
                    }
                    //$existe = $voladoModel->find('all', array('conditions' => $cond));
                    $asig = $asignacion->find('all', array('conditions' => $condAsig));

                    $data['Volado']['VOL_CONFIRMADO'] = 1;
                    $data['Volado']['VOL_CODIGO_AUT'] = $asig[0]['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION'];
                    $data['Volado']['VOL_COD_AERO'] = $dataNueva['VoladosAct']['VOL_ACT_COD_AERO'];
                    $data['Volado']['VOL_NUM_TICKET'] = $dataNueva['VoladosAct']['VOL_ACT_NUM_TICKET'];
                    $data['Volado']['VOL_CUPON'] = $dataNueva['VoladosAct']['VOL_ACT_CUPON'];
                    $data['Volado']['VOL_NUMERO_VUELO'] = $dataNueva['VoladosAct']['VOL_ACT_NUMERO_VUELO'];
                    $data['Volado']['VOL_FECHA_VUELO'] = $dataNueva['VoladosAct']['VOL_ACT_FECHA_VUELO'];

                    if ($dataNueva['VoladosAct']['VOL_ACT_CIUDAD_ORIGEN']!="") {
                        $volado['Volado']["VOL_CIUDAD_ORIGEN"] = $dataNueva['VoladosAct']['VOL_ACT_CIUDAD_ORIGEN'];
                        $tasaModel = new Tasa();
                        $cond = array('AND' => array("Catalogo.CATAG_VALOR = '" . trim($volado['Volado']["VOL_CIUDAD_ORIGEN"]) . "'", "Tasa.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID')));
                        $tasa = $tasaModel->find('all', array('conditions' => $cond));
                    }
                        $data['Volado']["VOL_CIUDAD_DESTINO"] = $dataNueva['VoladosAct']['VOL_ACT_CIUDAD_DESTINO'];
                        $data['Volado']["VOL_TARIFA"] = number_format((double) $dataNueva['VoladosAct']['VOL_ACT_TARIFA'], 2, '.', ',');
                        $data['Volado']["VOL_CODIGO_AUT"] = $dataNueva['VoladosAct']['VOL_ACT_CODIGO_AUT'];
                        $data['Volado']["VOL_TASA"] = number_format((double) $dataNueva['VoladosAct']['VOL_ACT_TASA'], 2, '.', ',');
                        $data['Volado']["VOL_IMPUESTOS"] = number_format((double) $dataNueva['VoladosAct']['VOL_ACT_IMPUESTOS'], 2, '.', ',');
                        $data['Volado']["VOL_VALOR_TOTAL"] = number_format((double) $dataNueva['VoladosAct']['VOL_ACT_VALOR_TOTAL'], 2, '.', ',');

                        if ($dataNueva['VoladosAct']['VOL_ACT_TASA']!="" && isset($tasa) && isset($aerolinea[0]))
                        if ($aerolinea[0]['Aerolinea']['AERO_USAR_TASAS'] == 'true' && count($tasa) > 0) {
                            $data['Volado']["VOL_TASA"] = number_format((double) $tasa[0]['Tasa']['TASA_TASAS'], 2, '.', ',');
                        }

                    if (!isset($data->sheets[0]['cells'][$i][11]) && isset($tasa) && isset($aerolinea[0]))
                        if ($aerolinea[0]['Aerolinea']['AERO_USAR_TASAS'] == 'true' && count($tasa) > 0) {
                            $data['Volado']["VOL_IMPUESTOS"] = number_format((double) $tasa[0]['Tasa']['TASA_IMPUESTOS'], 2, '.', ',');
                        }

                    if (!isset($volado['Volado']["VOL_VALOR_TOTAL"]) && isset($volado['Volado']["VOL_TASA"]) && isset($volado['Volado']["VOL_IMPUESTOS"]) && isset($volado['Volado']["VOL_TARIFA"])) {
                        $data['Volado']["VOL_VALOR_TOTAL"] = (double) $volado['Volado']["VOL_TASA"] + (double) $volado['Volado']["VOL_IMPUESTOS"] + (double) $volado['Volado']["VOL_TARIFA"];
                    }
                        
                        $voladoModel->save($data);

                }
                
                /* if (isset($this->request->data['conciliados'])) {
                  $conciliados = $this->request->data['conciliados'];
                  foreach ($conciliados as $conciliado) {
                  $conciliadoModelo = new Conciliado();
                  $conciliadoModelo->id = $conciliado;
                  $data['Conciliado']['CONC_CONFIRMADO'] = 1;
                  $conciliadoModelo->save($data);
                  }
                  } */
                $this->Session->setFlash(__('Los volados han sido confirmados y conciliados'));
                $this->set(compact('conciliados'));
            } else { //Ingresa los vuelos desde el archivo Excel
                $data = new Spreadsheet_Excel_Reader();
                error_reporting(E_ALL ^ E_NOTICE);
                $data->setOutputEncoding("UTF-8");

                $subirfinal = $this->request->data['Volado']['VOL_ARCHIVO']['tmp_name'];
                $data->read($subirfinal);

                $volados = array();
                $volados_id = array();

                $conciliados_id = array();
                //$no_actualizados = array();
                $no_insertados = array();
                $no_actualizados = array();
                $sin_asignacion = array();
                $repetidos = array();
                $actualizar_act_id = array();
                $actualizar_id = array();
                $ticket_cupon_vuelo_act = array();
                $ticket_cupon_vuelo_nuevo = array();
                $error = array();
                $error_periodo_cerrado = array();
                
                for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
                    $volado = array();
                    if (isset($data->sheets[0]['cells'][$i][1]))
                        $volado['Volado']['VOL_COD_AERO'] = $data->sheets[0]['cells'][$i][1];
                    if (isset($data->sheets[0]['cells'][$i][2]))
                        $volado['Volado']['VOL_NUM_TICKET'] = $data->sheets[0]['cells'][$i][2];
                    if (isset($data->sheets[0]['cells'][$i][3]))
                        $volado['Volado']['VOL_CUPON'] = $data->sheets[0]['cells'][$i][3];
                    if (isset($data->sheets[0]['cells'][$i][4]))
                        $volado['Volado']['VOL_NUMERO_VUELO'] = $data->sheets[0]['cells'][$i][4];
                    if (isset($data->sheets[0]['cells'][$i][5])) {
                        $fecha = $data->sheets[0]['cells'][$i][5];
                        $anio_emis = substr(trim($fecha), 0, 4);
                        $mes_emis = substr(trim($fecha), 4, 2);
                        $dia_emis = substr(trim($fecha), 6, 2);
                        $fecha_emis = "'" . $anio_emis . "-" . $mes_emis . "-" . $dia_emis . "'";
                        $volado['Volado']['VOL_FECHA_VUELO'] = $fecha_emis;
                    }

                    /* $this->request->data['Asignacione']['ASIG_FECHA_CREACION']['month'] = (string) date('m');
                      $this->request->data['Asignacione']['ASIG_FECHA_CREACION']['day'] = (string) date('d');
                      $this->request->data['Asignacione']['ASIG_FECHA_CREACION']['year'] = (string) date('Y'); */
                    if (isset($data->sheets[0]['cells'][$i][6])) {
                        $volado['Volado']["VOL_CIUDAD_ORIGEN"] = $data->sheets[0]['cells'][$i][6];
                        $tasaModel = new Tasa();
                        $cond = array('AND' => array("Catalogo.CATAG_VALOR = '" . trim($volado['Volado']["VOL_CIUDAD_ORIGEN"]) . "'", "Tasa.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID')));
                        $tasa = $tasaModel->find('all', array('conditions' => $cond));
                    }
                    if (isset($data->sheets[0]['cells'][$i][7])) {
                        $volado['Volado']["VOL_CIUDAD_DESTINO"] = $data->sheets[0]['cells'][$i][7];
                    }
                    if (isset($data->sheets[0]['cells'][$i][8]))
                        $volado['Volado']["VOL_TARIFA"] = number_format((double) $data->sheets[0]['cells'][$i][8], 2, '.', ',');
                    if (isset($data->sheets[0]['cells'][$i][9]))
                        $volado['Volado']["VOL_CODIGO_AUT"] = $data->sheets[0]['cells'][$i][9];
                    if (isset($data->sheets[0]['cells'][$i][10]))
                        $volado['Volado']["VOL_TASA"] = number_format((double) $data->sheets[0]['cells'][$i][10], 2, '.', ',');
                    if (isset($data->sheets[0]['cells'][$i][11]))
                        $volado['Volado']["VOL_IMPUESTOS"] = number_format((double) $data->sheets[0]['cells'][$i][11], 2, '.', ',');
                    if (isset($data->sheets[0]['cells'][$i][12]))
                        $volado['Volado']["VOL_VALOR_TOTAL"] = number_format((double) $data->sheets[0]['cells'][$i][12], 2, '.', ',');


                    if (!isset($data->sheets[0]['cells'][$i][10]) && isset($tasa) && isset($aerolinea[0]))
                        if ($aerolinea[0]['Aerolinea']['AERO_USAR_TASAS'] == 'true' && count($tasa) > 0) {
                            $volado['Volado']["VOL_TASA"] = number_format((double) $tasa[0]['Tasa']['TASA_TASAS'], 2, '.', ',');
                        }

                    if (!isset($data->sheets[0]['cells'][$i][11]) && isset($tasa) && isset($aerolinea[0]))
                        if ($aerolinea[0]['Aerolinea']['AERO_USAR_TASAS'] == 'true' && count($tasa) > 0) {
                            $volado['Volado']["VOL_IMPUESTOS"] = number_format((double) $tasa[0]['Tasa']['TASA_IMPUESTOS'], 2, '.', ',');
                        }

                    if (!isset($volado['Volado']["VOL_VALOR_TOTAL"]) && isset($volado['Volado']["VOL_TASA"]) && isset($volado['Volado']["VOL_IMPUESTOS"]) && isset($volado['Volado']["VOL_TARIFA"])) {
                        $volado['Volado']["VOL_VALOR_TOTAL"] = (double) $volado['Volado']["VOL_TASA"] + (double) $volado['Volado']["VOL_IMPUESTOS"] + (double) $volado['Volado']["VOL_TARIFA"];
                    }


                    $volado['Volado']["VOL_CONFIRMADO"] = 0;

                    $voladoModel = new Volado();
                    
                    $respuesta = $voladoModel->crear_volado($volado);

                    switch ($respuesta[0]) {
                        case "Volado-insertado":
                            array_push($volados, $volado);
                            array_push($volados_id, $respuesta[1]);
                            array_push($ticket_cupon_vuelo_nuevo, $volado['Volado']["VOL_NUM_TICKET"]."-".$volado['Volado']["VOL_CUPON"]);
                            break;
                        case "Error-insert":
                            array_push($no_insertados, $volado);
                            break;
                        case "conciliado":
                            array_push($volados, $volado);
                            array_push($volados_id, $respuesta[1]);
                            //Podria ya conciliarse si se confirma
                            break;
                        case "Error-No-ASignacion":
                            array_push($sin_asignacion, $volado);
                            break;
                        case "Error-actualizado":
                            array_push($no_actualizados, $volado);
                            break;
                        case "Volado-actualizado":
                            array_push($repetidos, $volado);
                            array_push($actualizar_act_id, $respuesta[1]);
                            array_push($actualizar_id, $respuesta[2]);
                            array_push($ticket_cupon_vuelo_nuevo, $volado['Volado']["VOL_NUM_TICKET"]."-".$volado['Volado']["VOL_CUPON"]);
                            break;
                        case "Error-cantidad":
                            array_push($no_insertados, $volado);
                            break;
                        case "Error-Periodo-Cerrado":
                            array_push($error_periodo_cerrado, $volado);
                            break;
                        default:
                            array_push($error, $volado);
                            break;
                    }
                }
                $confirmado = 1;
                
                $result = array_count_values($ticket_cupon_vuelo_nuevo);
                $mensaje = "Confirmar";
                foreach ($result as $r)
                {
                    if ($r > 1)
                        $mensaje = "No se puede confirmar el archivo, existen 2 o mas registros con el mismo nro de ticket y cupon";
                        
                }
                
                $this->set(compact('volados', 'no_insertados', 'repetidos', 'error', 'confirmado', 'volados_id', 'sin_asignacion', 'no_actualizados', 'actualizar_act_id', 'actualizar_id','mensaje', 'error_periodo_cerrado'));
            }
        }
    }

    public function valida_carga() {
        //$this->Aerolinea->recursive = 0;
        //$this->set('aerolineas', $this->paginate());
    }

    function arrayDuplicate($array) {
        return array_unique(array_diff_assoc($array1, array_unique($array1)));
    }

}
