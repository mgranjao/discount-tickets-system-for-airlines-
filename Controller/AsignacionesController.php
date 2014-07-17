<?php

App::uses('AppController', 'Controller');
App::uses('Configuracione', 'Model');
App::uses('Catalogo', 'Model');
App::uses('Autorizacion', 'Model');

/**
 * Asignaciones Controller
 *
 * @property Asignacione $Asignacione
 */
class AsignacionesController extends AppController {

    var $layout = 'aerolineas';
    public $components = array('DataTable');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Asignacione->recursive = 0;

        $aero_id = $this->Session->read('Aerolinea.AERO_ID');
        $cond = array('AND' => array(" Asignacione.AERO_ID = " . $aero_id));
        $asignacioness = $this->Asignacione->find('all', array('conditions' => $cond));

        $this->set('asignacioness', $this->paginate());
        //$this->set(compact('asignaciones'));
    }

    public function find() {

        $this->Asignacione->recursive = 0;

        $aero_id = $this->Session->read('Aerolinea.AERO_ID');
        $cond = array('AND' => array(" Asignacione.AERO_ID = " . $aero_id));
        $asignacioness = $this->Asignacione->find('all', array('conditions' => $cond));

        $this->set('asignacioness', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacione'));
        }
        $this->set('asignacione', $this->Asignacione->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Asignacione->create();
            if ($this->Asignacione->save($this->request->data)) {
                $this->Session->setFlash(__('The asignacione has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asignacione could not be saved. Please, try again.'));
            }
        }
        $residentes = $this->Asignacione->Residente->find('list');
        $cupos = $this->Asignacione->Cupo->find('list');
        $aerolineas = $this->Asignacione->Aerolinea->find('list');
        $this->set(compact('residentes', 'cupos', 'aerolineas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacione'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Asignacione->save($this->request->data)) {
                $this->Session->setFlash(__('The asignacione has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asignacione could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Asignacione->read(null, $id);
        }
        $residentes = $this->Asignacione->Residente->find('list');
        $cupos = $this->Asignacione->Cupo->find('list');
        $aerolineas = $this->Asignacione->Aerolinea->find('list');
        $this->set(compact('residentes', 'cupos', 'aerolineas'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacione'));
        }
        if ($this->Asignacione->delete()) {
            $this->Session->setFlash(__('Asignacione deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Asignacione was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function residente($id = null) {

        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        if ($this->request->is('post')) {
            $cedula = trim($this->request->data['Asignacione']['RES_CEDULA']);
            $fecha_hoy = date("Y-m-d");
            $cond = array('AND' => array("Residente.RES_CEDULA LIKE '$cedula'"));
            $list = $this->Asignacione->Residente->find('all', array('conditions' => $cond));

            if ($list) {
                $cond = array('AND' => array("'\"" . $fecha_hoy . "\"' between \"Cupo.CUPO_FECHA_DESDE\" AND \"Cupo.CUPO_FECHA_HASTA\" ", "Cupo.TIPO_ID = " . $list[0]['Residente']['TIPO_ID'] . ""));
                $cupos = $this->Asignacione->Cupo->find('all', array('conditions' => $cond));
                $cuposUsados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = " . $cupos[0]['Cupo']['CUPO_ID'], "CuposDisponible.RES_ID = " . $list[0]['Residente']['RES_ID']))));
                if (count($cuposUsados) < $cupos[0]['Cupo']['CUPO_CANTIDAD']) {
                    $cond = array('AND' => array("'\"" . $fecha_hoy . "\"' between \"Residente.RES_FECHA_CARNE_EMIS\" AND \"Residente.RES_FECHA_EXPIRA\" "));
                    $list2 = $this->Asignacione->Residente->find('all', array('conditions' => $cond));
                    if ($list2) {
                        $this->redirect(array(
                            "controller" => "asignacion",
                            "action" => "paso2",
                            "?" => array(
                                "cedula" => $cedula
                                )));
                    } else {
                        $this->Session->setFlash(__('El carné del residente ha caducado.'));
                    }
                } else {
                    $this->Session->setFlash(__('El residente no tiene cupos disponibles'));
                }
            } else {
                $this->Session->setFlash(__('El residente no existe en la base de datos.'));
            }
        }
        $residentes = $this->Asignacione->Residente->find('list');
        $cupos = $this->Asignacione->Cupo->find('list');
        $aerolineas = $this->Asignacione->Aerolinea->find('list');
        $this->set(compact('residentes', 'cupos', 'aerolineas'));
    }

    public function asignacion() {
        $ejecucion = 0;
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************ */

        $pasos = $this->Asignacione->Aerolinea->ConfigXAero->find('all', array('conditions' => array('AND' => array("ConfigXAero.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID'), "ConfigXAero.CONFIG_ID = 1 OR ConfigXAero.CONFIG_ID = 2"))));
        $pasos = $pasos[0]['Configuracione']['CONFIG_VALOR'];

        $cedula = $_GET['cedula'];
        $cond = array('OR' => array("Residente.RES_CEDULA LIKE '$cedula'"));
        $residente = $this->Asignacione->Residente->find('all', array('conditions' => $cond));
        $residente_id = $residente[0]['Residente']['RES_ID'];

        $asignacion_id = -1;

        $cond = array('AND' => array("Tasa.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID')));
        $tasa = $this->Asignacione->Aerolinea->Tasa->find('all', array('conditions' => $cond));

        if ($this->request->is('post')) {
            $this->Asignacione->create();

            $this->request->data['Asignacione']['ASIG_TASAS'] = $tasa[0]['Tasa']['TASA_TASAS'];
            $this->request->data['Asignacione']['ASIG_IMPUESTOS'] = $tasa[0]['Tasa']['TASA_IMPUESTOS'];
            $this->request->data['Asignacione']['ASIG_FEE'] = $tasa[0]['Tasa']['TASA_FEE'];
            //$this->request->data['Asignacione']['ASIG_TARIFA'] = $this->request->data['Asignacione']['tarifa'];
            //$this->request->data['Asignacione']['ASIG_DET_VALOR'] = $tasa[0]['Tasa']['TASA_TASAS'] + $tasa[0]['Tasa']['TASA_IMPUESTOS'] + $tasa[0]['Tasa']['TASA_FEE'] + $this->request->data['Asignacione']['ASIG_TARIFA'];
            /* Convertri el formato de la fecha 03/29/2013 a Array ( [month] => 03 [day] => 29 [year] => 2013 ) */
            /* Las siguientes lineas agregan la fecha de hoy dia al campo ASIG_FECHA_CREACION */
            $this->request->data['Asignacione']['ASIG_FECHA_CREACION']['month'] = (string) date('m');
            $this->request->data['Asignacione']['ASIG_FECHA_CREACION']['day'] = (string) date('d');
            $this->request->data['Asignacione']['ASIG_FECHA_CREACION']['year'] = (string) date('Y');
            $aero_id = $this->Session->read('Aerolinea.AERO_ID');
            $this->request->data['Asignacione']['AERO_ID'] = $aero_id;
            $this->request->data['Asignacione']['USU_ID'] = $this->Session->read('Usuario.USU_ID');

            $aut_id = $this->request->data['Asignacione']['AUT_ID'];

            $aut = new Autorizacion();
            $aut->id = $aut_id;
            $cod_aut = $aut->read();
            $codigo_aut = $cod_aut['Autorizacion']['AUT_CODIGO_AUTORIZACION'];
            $this->request->data['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION'] = $codigo_aut;
            $autorizacion['Autorizacion']['AUT_ID'] = $aut_id;
            $autorizacion['Autorizacion']['EST_ID'] = '2'; //Estado Pendiente


            if ($this->Asignacione->save($this->request->data)) {

                $this->Session->setFlash(__('La asignaci&oacute;n se ha guardado exitosamente'));
                $asignacion_id = $this->Asignacione->getID();
                $autorizacion['Autorizacion']['ASIG_ID'] = $asignacion_id;
                $ejecucion = 1;
                if ($pasos == 2) { //Asignacion en 2 pasos
                    $aut->save($autorizacion);
                } elseif ($pasos == 1) { //Asignacion en 1 paso
                    $cupoSeleccionado = $this->Asignacione->Cupo->find('all', array("Cupo.CUPO_ID = " . $this->request->data['Asignacione']['CUPO_ID']));
                    $cupoSeleccionado = $cupoSeleccionado[0];
                    $cuposUsados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = " . $this->request->data['Asignacione']['CUPO_ID'], "CuposDisponible.RES_ID = " . $residente_id))));
                    $this->Session->setFlash(__('La asignaci&oacute;n se ha guardado exitosamente'));

                    if (count($cuposUsados) < $cupoSeleccionado['Cupo']['CUPO_CANTIDAD']) {
                        $cupoDisponible['CuposDisponible']['RES_ID'] = $residente_id;
                        $cupoDisponible['CuposDisponible']['CUPO_ID'] = $this->request->data['Asignacione']['CUPO_ID'];
                        $cupoDisponible['CuposDisponible']['RES_DISP_DISPONIBLES'] = count($cuposUsados) + 1;
                        $this->Asignacione->Residente->CuposDisponible->save($cupoDisponible);
                        $aut->id = $aut_id;
                        $autorizacion['Autorizacion']['EST_ID'] = "1";
                        //$autorizacion['Autorizacion']['AUT_TICKET'] = $this->request->data['Autorizacion']['AUT_TICKET'];
                        if ($aut->save($autorizacion)) {
                            $this->Session->setFlash(__('Se ha realizado la Autorizaci&oacute;n'));
                            $this->redirect(array(
                                "controller" => "counter",
                                "action" => "index"));
                            $this->set(compact('asig_id', 'codigo_aut', 'valor_aut', 'list', 'nombres_residente', 'apellidos_residente', 'cedula_residente', 'codigo_reserva', 'cupoSeleccionado', 'cuposUsados', 'tipo_colono'));
                        } else {
                            $this->Session->setFlash(__('La Autorizaci&oacute;n no se efectu&oacute; correctamente, porfavor intentelo nuevamente.')); //__('La Autorizaci&oacute;n no se efectu&oacute; correctamente, porfavor intentelo nuevamente.')
                        }
                    } else {
                        $this->set(compact('asig_id', 'codigo_aut', 'valor_aut', 'list'));
                        $this->Session->setFlash(__('El Residente no tiene cupos disponibles, La Autorizaci&oacute;n no se efectu&oacute;.')); //__('La Autorizaci&oacute;n no se efectu&oacute; correctamente, porfavor intentelo nuevamente.')
                    }
                    $this->redirect(array('controller' => 'counter', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The asignacione could not be saved. Please, try again.'));
            }
        }

        $residentes = $this->Asignacione->Residente->find('list');
        $fecha_hoy = date("Y-m-d");
        $cond = array('AND' => array("'\"" . $fecha_hoy . "\"' between \"Cupo.CUPO_FECHA_DESDE\" AND \"Cupo.CUPO_FECHA_HASTA\" ", "Cupo.TIPO_ID = " . $residente[0]['Residente']['TIPO_ID'] . ""));
        $cupos = $this->Asignacione->Cupo->find('all', array('conditions' => $cond)); //list
        $cupos_usados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = " . $cupos[0]['Cupo']['CUPO_ID'], "CuposDisponible.RES_ID = " . $residente[0]['Residente']['RES_ID']))));

        $aerolineas = $this->Asignacione->Aerolinea->find('list');

        //$tipo_vuelo['UNA VIA'] = 'UNA VIA'; /*Solo se aplica para vuelos ROUNDTRIP*/
        $tipo_vuelo[0] = 'RoundTrip';

        $cond = array('AND' => array("Tasa.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID')));
        $tasa = $this->Asignacione->Aerolinea->Tasa->find('all', array('conditions' => $cond));

        //$cuposUsados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = ".$asignacion['CUPO_ID'],"CuposDisponible.RES_ID = ".$residente_id))));

        $configuracion = new Configuracione();
        $condUIO = array('OR' => array("Configuracione.CONFIG_PARAMETRO = 'TarifaUIO'"));
        $condGYE = array('OR' => array("Configuracione.CONFIG_PARAMETRO = 'TarifaGYE'"));
        $tarifa_UIO = $configuracion->find('all', array('conditions' => $condUIO));
        $tarifa_GYE = $configuracion->find('all', array('conditions' => $condGYE));

        $catalogo = new Catalogo();
        //$destinos = $catalogo->find('list', array('conditions' => array('OR' => array("Catalogo.CATAG_TIPO LIKE 'Continente'","Catalogo.CATAG_TIPO LIKE 'Galapagos'"))));
        $continente = $catalogo->find('list', array('conditions' => array('OR' => array("Catalogo.CATAG_TIPO LIKE 'Continente' AND Catalogo.CATAG_ESTADO = true"))));
        $galapagos = $catalogo->find('list', array('conditions' => array('OR' => array("Catalogo.CATAG_TIPO LIKE 'Galapagos' AND Catalogo.CATAG_ESTADO = true"))));
        //$fecha_hoy = date("m-d-Y");

        if ($ejecucion == 0) {
            $autorizacion['Autorizacion']['EST_ID'] = 2; //Estado Pendiente
            $this->Asignacione->Aerolinea->id = $this->Session->read('Aerolinea.AERO_ID');
            $aerolinea = $this->Asignacione->Aerolinea->read(null, $this->Session->read('Aerolinea.AERO_ID'));
            $codigo_aut = $aerolinea['Aerolinea']['AERO_PREFIJO'] . "" . substr(md5(uniqid(rand())), 0, 6); //Prefijo de Aerolinea concatenadocon randomico de numeros y letras
            $autorizacion['Autorizacion']['AUT_CODIGO_AUTORIZACION'] = $codigo_aut;
            $autorizacion['Autorizacion']['RES_ID'] = $residente_id;
            $aut = new Autorizacion();

            if ($aut->save($autorizacion)) {
                $aut_id = $aut->getID();
            }
        }

        $this->set(compact('residente', 'residentes', 'cupos', 'aerolineas', 'residente_id', 'asignacion_id', 'tipo_vuelo', 'destinos', 'tasa', 'tarifa_UIO', 'tarifa_GYE', 'continente', 'galapagos', 'cupos_usados', 'pasos', 'codigo_aut', 'aut_id'));
    }

    public function autorizacion() {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************ */

        $codasignacion = $_POST['asignacion_id'];
        $codigo_aut = $_POST['codigo_aut'];
        $aut_id = $_POST['aut_id'];

        $cond = array('OR' => array("Asignacione.ASIG_ID = $codasignacion"));
        $list = $this->Asignacione->find('all', array('conditions' => $cond));
        $asignacion = $list[0]['Asignacione'];

        $cond = array('OR' => array("Residente.RES_ID = '" . $asignacion['RES_ID'] . "'"));
        $residente = $this->Asignacione->Residente->find('all', array('conditions' => $cond));
        $nombres_residente = $residente[0]['Residente']['RES_NOMBRES'];
        $apellidos_residente = $residente[0]['Residente']['RES_APELLIDOS'];
        $cedula_residente = $residente[0]['Residente']['RES_CEDULA'];
        $codigo_reserva = $asignacion['ASIG_DET_CODIGO_AUTORIZACION'];
        $tipo_colono = $this->Asignacione->Residente->TipoColono->find('all', array('conditions' => array('OR' => array("TipoColono.TIPO_ID = '" . $residente[0]['Residente']['TIPO_ID'] . "'"))));

        $autorizacion['Autorizacion']['ASIG_ID'] = $codasignacion;
        $aut = new Autorizacion();
        $aut->id = $aut_id;
        $aut_arr = $aut->read();

        $autorizacion['Autorizacion']['AUT_CODIGO_AUTORIZACION'] = $aut_arr['Autorizacion']['AUT_CODIGO_AUTORIZACION'];
        $asig_id = $autorizacion['Autorizacion']['ASIG_ID'];
        $codigo_aut = $autorizacion['Autorizacion']['AUT_CODIGO_AUTORIZACION'];
        //$valor_aut = $autorizacion['Autorizacion']['AUT_VALOR_PAGADO'];

        $configuracion = new Configuracione();
        $cond2 = array('OR' => array("Configuracione.CONFIG_PARAMETRO LIKE 'Descuento'"));
        $configs = $configuracion->find('all', array('conditions' => $cond2));
        $autorizacion['Autorizacion']['AUT_VALOR_PAGADO'] = number_format($asignacion['ASIG_DET_VALOR'], 2, '.', ''); //$configs[0]['Configuracione']['CONFIG_VALOR'] * //number_format($configs[0]['Configuracione']['CONFIG_VALOR'] * $asignacion['ASIG_DET_VALOR'],2,',','.');

        $cupoSeleccionado = $this->Asignacione->Cupo->find('all', array("Cupo.CUPO_ID = " . $asignacion['CUPO_ID']));
        $cupoSeleccionado = $cupoSeleccionado[0];
        $cuposUsados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = " . $asignacion['CUPO_ID'], "CuposDisponible.RES_ID = " . $asignacion['RES_ID']))));

        if (isset($this->request->data['Autorizacion']['AUT_TICKET']) && $this->request->data['Autorizacion']['AUT_TICKET'] != "") {
            if (count($cuposUsados) < $cupoSeleccionado['Cupo']['CUPO_CANTIDAD']) {
                $cupoDisponible['CuposDisponible']['RES_ID'] = $asignacion['RES_ID'];
                $cupoDisponible['CuposDisponible']['CUPO_ID'] = $asignacion['CUPO_ID'];
                $cupoDisponible['CuposDisponible']['RES_DISP_DISPONIBLES'] = count($cuposUsados) + 1;
                $this->Asignacione->Residente->CuposDisponible->save($cupoDisponible);
                $autorizacion['Autorizacion']['EST_ID'] = "1";
                $autorizacion['Autorizacion']['AUT_TICKET'] = $this->request->data['Autorizacion']['AUT_TICKET'];
                if ($aut->save($autorizacion)) {
                    $this->Session->setFlash(__('Se ha realizado la Autorizaci&oacute;n'));
                    $this->redirect(array(
                        "controller" => "counter",
                        "action" => "index"));
                    $this->set(compact('asig_id', 'codigo_aut', 'valor_aut', 'list', 'nombres_residente', 'apellidos_residente', 'cedula_residente', 'codigo_reserva', 'cupoSeleccionado', 'cuposUsados', 'tipo_colono'));
                } else {
                    $this->Session->setFlash(__('La Autorizaci&oacute;n no se efectu&oacute; correctamente, porfavor intentelo nuevamente.')); //__('La Autorizaci&oacute;n no se efectu&oacute; correctamente, porfavor intentelo nuevamente.')
                }
            } else {
                $this->set(compact('asig_id', 'codigo_aut', 'valor_aut', 'list'));
                $this->Session->setFlash(__('El Residente no tiene cupos disponibles, La Autorizaci&oacute;n no se efectu&oacute;.')); //__('La Autorizaci&oacute;n no se efectu&oacute; correctamente, porfavor intentelo nuevamente.')
            }
        }
        $this->set(compact('asig_id', 'codigo_aut', 'valor_aut', 'list', 'nombres_residente', 'apellidos_residente', 'cedula_residente', 'codigo_reserva', 'cupoSeleccionado', 'cuposUsados', 'tipo_colono', 'aut_id'));
    }

    function obtener_subcategorias() {//index.php/

        /* $configuracion = new Configuracione();
          $condUIO = array('OR' => array("Configuracione.CONFIG_PARAMETRO = 'TarifaUIO'"));
          $condGYE = array('OR' => array("Configuracione.CONFIG_PARAMETRO = 'TarifaGYE'"));
          $tarifa_UIO = $configuracion->find('all', array('conditions' => $condUIO));
          $tarifa_GYE = $configuracion->find('all', array('conditions' => $condGYE));
         */
        $id = $_POST["id"];
        echo($id);
        $catalogo = new Catalogo();
        // $destinos = $catalogo->find('list', array('conditions' => array('OR' => array("Catalogo.CATAG_TIPO LIKE 'Continente'","Catalogo.CATAG_TIPO LIKE 'Galapagos'"))));
        $aeropuerto = $catalogo->find('all', array('conditions' => array('OR' => array("Catalogo.CATAG_ID = " . $id))));

        $this->set(compact('aeropuerto'));
    }

    /* function redondear_dos_decimal($valor) { 
      $float_redondeado=round($valor * 100) / 100;
      return $float_redondeado;
      } */

    public function consulta_residente($id = null) {

        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************ */
        if ($this->request->is('post')) {
            $cedula = $this->request->data['Asignacione']['RES_CEDULA'];
            $fecha_hoy = date("Y-m-d");
            $cond = array('AND' => array("Residente.RES_CEDULA LIKE '$cedula'"));
            $list = $this->Asignacione->Residente->find('all', array('conditions' => $cond));

            if ($list) {
                $cond = array('AND' => array("'\"" . $fecha_hoy . "\"' between \"Residente.RES_FECHA_CARNE_EMIS\" AND \"Residente.RES_FECHA_EXPIRA\" "));
                $list2 = $this->Asignacione->Residente->find('all', array('conditions' => $cond));
                if ($list2) {
                    $this->redirect(array(
                        "controller" => "asignaciones",
                        "action" => "consulta_asignacion",
                        "?" => array(
                            "cedula" => $cedula
                            )));
                } else {
                    $this->Session->setFlash(__('El carné del residente ha caducado.'));
                }
            } else {
                $this->Session->setFlash(__('El residente no existe en la base de datos.'));
            }
        }
        $residentes = $this->Asignacione->Residente->find('list');
        $cupos = $this->Asignacione->Cupo->find('list');
        $aerolineas = $this->Asignacione->Aerolinea->find('list');
        $this->set(compact('residentes', 'cupos', 'aerolineas'));
    }

    public function consulta_asignacion() {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        $cedula = $_GET['cedula'];
        $cond = array('OR' => array("Residente.RES_CEDULA LIKE '$cedula'"));
        $residente = $this->Asignacione->Residente->find('all', array('conditions' => $cond));
        $residente_id = $residente[0]['Residente']['RES_ID'];

        $asignacion_id = -1;

        $cond = array('AND' => array("Tasa.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID')));
        $tasa = $this->Asignacione->Aerolinea->Tasa->find('all', array('conditions' => $cond));


        $residentes = $this->Asignacione->Residente->find('list');
        //$cupos = $this->Asignacione->Cupo->find('list');
        $fecha_hoy = date("Y-m-d");
        $cond = array('AND' => array("'\"" . $fecha_hoy . "\"' between \"Cupo.CUPO_FECHA_DESDE\" AND \"Cupo.CUPO_FECHA_HASTA\" ", "Cupo.TIPO_ID = " . $residente[0]['Residente']['TIPO_ID'] . ""));
        $cupos = $this->Asignacione->Cupo->find('all', array('conditions' => $cond)); //list
        $cupos_usados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = " . $cupos[0]['Cupo']['CUPO_ID'], "CuposDisponible.RES_ID = " . $residente[0]['Residente']['RES_ID']))));

        $aerolineas = $this->Asignacione->Aerolinea->find('list');

        //$tipo_vuelo['UNA VIA'] = 'UNA VIA'; /*Solo se aplica para vuelos ROUNDTRIP*/
        $tipo_vuelo['IDA Y VUELTA'] = 'IDA Y VUELTA';

        $cond = array('AND' => array("Tasa.AERO_ID = " . $this->Session->read('Aerolinea.AERO_ID')));
        $tasa = $this->Asignacione->Aerolinea->Tasa->find('all', array('conditions' => $cond));

        //$cuposUsados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = ".$asignacion['CUPO_ID'],"CuposDisponible.RES_ID = ".$residente_id))));

        $configuracion = new Configuracione();
        $condUIO = array('OR' => array("Configuracione.CONFIG_PARAMETRO = 'TarifaUIO'"));
        $condGYE = array('OR' => array("Configuracione.CONFIG_PARAMETRO = 'TarifaGYE'"));
        $tarifa_UIO = $configuracion->find('all', array('conditions' => $condUIO));
        $tarifa_GYE = $configuracion->find('all', array('conditions' => $condGYE));


        $catalogo = new Catalogo();
        // $destinos = $catalogo->find('list', array('conditions' => array('OR' => array("Catalogo.CATAG_TIPO LIKE 'Continente'","Catalogo.CATAG_TIPO LIKE 'Galapagos'"))));
        $continente = $catalogo->find('list', array('conditions' => array('OR' => array("Catalogo.CATAG_TIPO LIKE 'Continente' AND Catalogo.CATAG_ESTADO = true"))));
        $galapagos = $catalogo->find('list', array('conditions' => array('OR' => array("Catalogo.CATAG_TIPO LIKE 'Galapagos' AND Catalogo.CATAG_ESTADO = true"))));
        //$fecha_hoy = date("m-d-Y");
        $this->set(compact('residente', 'residentes', 'cupos', 'aerolineas', 'residente_id', 'asignacion_id', 'tipo_vuelo', 'destinos', 'tasa', 'tarifa_UIO', 'tarifa_GYE', 'continente', 'galapagos', 'cupos_usados'));
    }

    public function historial_counter() {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        $fecha_ini = "";
        $fecha_fin = "";
        if ($this->request->is('post')) {
            $fecha_ini = $this->request->data['Asignacione']['FECHA_INICIO']; //['year']."-".$this->request->data['Asignacione']['FECHA_INICIO']['month']."-".$this->request->data['Asignacione']['FECHA_INICIO']['day'];
            $fecha_fin = $this->request->data['Asignacione']['FECHA_FIN']; //['year']."-".$this->request->data['Asignacione']['FECHA_FIN']['month']."-".$this->request->data['Asignacione']['FECHA_FIN']['day'];
        }
        $this->set(compact('fecha_ini', 'fecha_fin'));

        if ($this->Session->read('Configuracione.PasosAsignacion') == 1) //Realiza la asignacion en 1 paso
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) //si es que se envia los parametros de fecha de inicio y fecha fin
                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1',
                            "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                            'Asignacione.USU_ID =' => $this->Session->read('Usuario.USU_ID')),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION'),
                    );
                else
                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1',
                            'Asignacione.USU_ID =' => $this->Session->read('Usuario.USU_ID')),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION'),
                    );
                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }

        if ($this->Session->read('Configuracione.PasosAsignacion') == 2) //Realiza la asignacion en 2 pasos
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin']))  //si es que se envia los parametros de fecha de inicio y fecha fin
                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1',
                            "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                            'Asignacione.USU_ID =' => $this->Session->read('Usuario.USU_ID')),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET'),
                    );
                else
                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1',
                            'Asignacione.USU_ID =' => $this->Session->read('Usuario.USU_ID')),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET'),
                    );
                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }
    }

    public function view_counter($id = null) {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */


        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacion'));
        }
        $this->set('asignacione', $this->Asignacione->read(null, $id));
    }

    public function historial_supervisor() {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        $fecha_ini = "";
        $fecha_fin = "";
        if ($this->request->is('post')) {
            $fecha_ini = $this->request->data['Asignacione']['FECHA_INICIO']; //['year']."-".$this->request->data['Asignacione']['FECHA_INICIO']['month']."-".$this->request->data['Asignacione']['FECHA_INICIO']['day'];
            $fecha_fin = $this->request->data['Asignacione']['FECHA_FIN']; //['year']."-".$this->request->data['Asignacione']['FECHA_FIN']['month']."-".$this->request->data['Asignacione']['FECHA_FIN']['day'];
        }
        $this->set(compact('fecha_ini', 'fecha_fin'));
    }

    public function historial_supervisor_json() {
        $oficinas = $this->Session->read('SupXOfi.oficinas');
        $arr = array();
        $str = "";
        foreach ($oficinas as $ofi) {
            $ofi['SupXOfi']['OFI_ID'];
            array_push($arr, $ofi['SupXOfi']['OFI_ID']);
            $str.=$ofi['SupXOfi']['OFI_ID'];
        }

        if ($this->Session->read('Configuracione.PasosAsignacion') == 1)
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                } else {
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                }

                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }

        if ($this->Session->read('Configuracione.PasosAsignacion') == 2)
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                } else {
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '1',
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                }
                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }
    }

    public function view_supervisor($id = null) {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */
        if (isset($_GET['reversado']))
            $reversado = $_GET['reversado'];
        else
            $reversado = 0;

        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacion'));
        }
        $this->set('asignacione', $this->Asignacione->read(null, $id));
        $this->set(compact('reversado'));
    }
    
     public function view_conciliador($id = null) {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */
        if (isset($_GET['reversado']))
            $reversado = $_GET['reversado'];
        else
            $reversado = 0;

        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacion'));
        }
        $this->set('asignacione', $this->Asignacione->read(null, $id));
        $this->set(compact('reversado'));
    }

    public function reversar($id = null) {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */
        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacion'));
        }
        $asignacion = $this->Asignacione->read(null, $id);
        // print_r($asignacion);

        $volados = $this->Asignacione->Conciliado->Volado->find('all', array('conditions' => array('OR' => array("Volado.VOL_NUM_TICKET = '" . $asignacion['Autorizacion']['AUT_TICKET'] . "'", "Volado.VOL_CODIGO_AUT = '" . $asignacion['Asignacione']['ASIG_DET_CODIGO_AUTORIZACION'] . "'"))));

        if (count($volados) == 0) { //Si no hay volados ingresados relacionados a la asignacion procedes con el reverso
            $this->Asignacione->Autorizacion->id = $asignacion['Autorizacion']['AUT_ID'];
            $autorizacion['Autorizacion']['EST_ID'] = 3;

            $cuposUsados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = " . $asignacion['Asignacione']['CUPO_ID'], "CuposDisponible.RES_ID = " . $asignacion['Asignacione']['RES_ID']))));

            $cuposUsados = $this->Asignacione->Residente->CuposDisponible->id = $cuposUsados[0]['CuposDisponible']['CUPO_DISP_ID'];

            if (count($cuposUsados))
                if ($this->Asignacione->Residente->CuposDisponible->delete() && $this->Asignacione->Autorizacion->save($autorizacion))
                    $this->Session->setFlash(__('Se ha reversado la asignación'));
                else
                    $this->Session->setFlash(__('No se pudo reversar la asignación'));
        }
        else {
            $this->Session->setFlash(__('La asignación ya tiene volados ingresados, no puede reversarse'));
        }

        $this->redirect(array(
            "controller" => "asignaciones",
            "action" => "historial_supervisor"));
    }

    public function rescatar($id = null) {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */
        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacion'));
        }
        $asignacion = $this->Asignacione->read(null, $id);


        $this->Asignacione->Autorizacion->id = $asignacion['Autorizacion']['AUT_ID'];
        $autorizacion['Autorizacion']['EST_ID'] = 1;

        $cupo['CuposDisponible']['RES_ID'] = $asignacion['Asignacione']['RES_ID'];
        $cupo['CuposDisponible']['CUPO_ID'] = $asignacion['Asignacione']['CUPO_ID'];

        $cupoSeleccionado = $this->Asignacione->Cupo->find('all', array("Cupo.CUPO_ID = " . $asignacion['Asignacione']['CUPO_ID']));
        $cupoSeleccionado = $cupoSeleccionado[0];

        $cuposUsados = $this->Asignacione->Residente->CuposDisponible->find('all', array('conditions' => array('AND' => array("CuposDisponible.CUPO_ID = " . $asignacion['Asignacione']['CUPO_ID'], "CuposDisponible.RES_ID = " . $asignacion['Asignacione']['RES_ID']))));
        //$cuposUsados = $this->Asignacione->Residente->CuposDisponible->id = $cuposUsados[0]['CuposDisponible']['CUPO_DISP_ID'];

        if (count($cuposUsados) < $cupoSeleccionado['Cupo']['CUPO_CANTIDAD']) {
            $this->Asignacione->Residente->CuposDisponible->create();
            if ($this->Asignacione->Residente->CuposDisponible->save($cupo) && $this->Asignacione->Autorizacion->save($autorizacion))
                $this->Session->setFlash(__('Se ha rescatado la asignación'));
            else
                $this->Session->setFlash(__('No se pudo rescatar la asignación'));

            $this->redirect(array(
                "controller" => "asignaciones",
                "action" => "historial_supervisor_reversadas"));
        }else {
            $this->Session->setFlash(__('El residente no tiene cupos disponibles para Rescatar la asignación'));

            $this->redirect(array(
                "controller" => "asignaciones",
                "action" => "historial_supervisor_reversadas"));
        }
    }

    public function historial_supervisor_reversadas() {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        $fecha_ini = "";
        $fecha_fin = "";
        if ($this->request->is('post')) {
            $fecha_ini = $this->request->data['Asignacione']['FECHA_INICIO']; //['year']."-".$this->request->data['Asignacione']['FECHA_INICIO']['month']."-".$this->request->data['Asignacione']['FECHA_INICIO']['day'];
            $fecha_fin = $this->request->data['Asignacione']['FECHA_FIN']; //['year']."-".$this->request->data['Asignacione']['FECHA_FIN']['month']."-".$this->request->data['Asignacione']['FECHA_FIN']['day'];
        }
        $this->set(compact('fecha_ini', 'fecha_fin'));
    }

    public function historial_supervisor_reversadas_json() {
        $oficinas = $this->Session->read('SupXOfi.oficinas');
        $arr = array();
        $str = "";
        foreach ($oficinas as $ofi) {
            $ofi['SupXOfi']['OFI_ID'];
            array_push($arr, $ofi['SupXOfi']['OFI_ID']);
            $str.=$ofi['SupXOfi']['OFI_ID'];
        }

        if ($this->Session->read('Configuracione.PasosAsignacion') == 1)
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                } else {
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                }
                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }

        if ($this->Session->read('Configuracione.PasosAsignacion') == 2)
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))",
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                } else {
                    if (count($arr) > 1)
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                'Usuario.OFI_ID =' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    else {
                        $this->paginate = array(
                            'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                'Autorizacion.EST_ID =' => '3',
                                'Usuario.OFI_ID ' => $arr),
                            'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                        );
                    }
                }
                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }
    }

    public function historial_conciliador() {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        $fecha_ini = "";
        $fecha_fin = "";
        if ($this->request->is('post')) {
            $fecha_ini = $this->request->data['Asignacione']['FECHA_INICIO']; //['year']."-".$this->request->data['Asignacione']['FECHA_INICIO']['month']."-".$this->request->data['Asignacione']['FECHA_INICIO']['day'];
            $fecha_fin = $this->request->data['Asignacione']['FECHA_FIN']; //['year']."-".$this->request->data['Asignacione']['FECHA_FIN']['month']."-".$this->request->data['Asignacione']['FECHA_FIN']['day'];
        }
        $this->set(compact('fecha_ini', 'fecha_fin'));
    }

    public function historial_conciliador_json() {

        if ($this->Session->read('Configuracione.PasosAsignacion') == 1)
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1',
                            "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))"
                        ),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                    );
                } else {
                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1'
                        ),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Usuario.USU_NOMBRE_COMPLETO'),
                    );
                }
                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }

        if ($this->Session->read('Configuracione.PasosAsignacion') == 2)
            if ($this->RequestHandler->responseType() == 'json') {
                if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1',
                            "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))"
                        ),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                    );
                } else {

                    $this->paginate = array(
                        'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                            'Autorizacion.EST_ID =' => '1'
                        ),
                        'fields' => array('Asignacione.ASIG_ID', 'Residente.RES_CEDULA', 'Catalogo.CATAG_VALOR', 'CatalogoDestino.CATAG_VALOR', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Asignacione.ASIG_FECHA_CREACION', 'Autorizacion.AUT_TICKET', 'Usuario.USU_NOMBRE_COMPLETO'),
                    );
                }
                $this->DataTable->emptyElements = 1;
                $this->set('Asignaciones', $this->DataTable->getResponse());

                $this->set('_serialize', 'Asignaciones');
            }
    }

    function export_historial_supervisor_xls() {
        $oficinas = $this->Session->read('SupXOfi.oficinas');
        $arr = array();
        $str = "";
        foreach ($oficinas as $ofi) {
            $ofi['SupXOfi']['OFI_ID'];
            array_push($arr, $ofi['SupXOfi']['OFI_ID']);
            $str.=$ofi['SupXOfi']['OFI_ID'] . ",";
        }
        $str = substr($str, 0, -1);
        $this->Session->write('Reporte.Nombre', 'Historial_Asigaciones_' . date("Y-m-d")); //Nombre del Reporte
        $this->Asignacione->recursive = 1;
        if (isset($_GET['ini']) && isset($_GET['fin']))
            if ($_GET['ini'] != "" && $_GET['fin'] != "")
                $cond = array('AND' => array("Usuario.OFI_ID IN (" . $str . ")",
                            'Autorizacion.EST_ID =' => '1', "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $_GET['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $_GET['fin'] . "','YYYY-MM-DD'))")); //Si es supervisor
            else
                $cond = array('AND' => array("Usuario.OFI_ID IN (" . $str . ")" ,
                            'Autorizacion.EST_ID =' => '1')); //Si es supervisor
                else
            $cond = array('AND' => array("Usuario.OFI_ID IN (" . $str . ")" ,
                            'Autorizacion.EST_ID =' => '1')); //Si es supervisor

        $data = $this->Asignacione->find('all', array('conditions' => $cond));

        $this->set('rows', $data);
        $this->render('export_historial_supervisor_xls', 'export_xls');
    }

    function export_historial_reversadas_supervisor_xls() {
        $oficinas = $this->Session->read('SupXOfi.oficinas');
        $arr = array();
        $str = "";
        foreach ($oficinas as $ofi) {
            $ofi['SupXOfi']['OFI_ID'];
            array_push($arr, $ofi['SupXOfi']['OFI_ID']);
            $str.=$ofi['SupXOfi']['OFI_ID'] . ",";
        }
        $str = substr($str, 0, -1);
        $this->Session->write('Reporte.Nombre', 'Historial_Asigaciones_Reversadas_' . date("Y-m-d")); //Nombre del Reporte
        $this->Asignacione->recursive = 1;
        if (isset($_GET['ini']) && isset($_GET['fin'])) //Si se escoje entre fechas
            if ($_GET['ini'] != "" && $_GET['fin'] != "")
                $cond = array('AND' => array("Usuario.OFI_ID IN (" . $str . ")", "Autorizacion.EST_ID = 3", "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $_GET['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $_GET['fin'] . "','YYYY-MM-DD'))")); //Si es supervisor y si las asgnaciones estan reversadas
            else
                $cond = array('AND' => array("Usuario.OFI_ID IN (" . $str . ")", "Autorizacion.EST_ID = 3")); //Si es supervisor y si las asgnaciones estan reversadas    
                else
            $cond = array('AND' => array("Usuario.OFI_ID IN (" . $str . ")", "Autorizacion.EST_ID = 3")); //Si es supervisor y si las asgnaciones estan reversadas    

        $data = $this->Asignacione->find('all', array('conditions' => $cond));

        $this->set('rows', $data);
        $this->render('export_historial_supervisor_xls', 'export_xls');
    }

    function export_historial_counter_xls() {
        $this->Session->write('Reporte.Nombre', 'Historial_Asigaciones_' . date("Y-m-d")); //Nombre del Reporte
        $this->Asignacione->recursive = 1;
        if (isset($_GET['ini']) && isset($_GET['fin'])) //Si se escoje entre fechas
            if ($_GET['ini'] != "" && $_GET['fin'] != "")
                $cond = array('AND' => array("Asignacione.USU_ID = " . $this->Session->read('Usuario.USU_ID'), "Autorizacion.EST_ID = 1",  "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $_GET['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $_GET['fin'] . "','YYYY-MM-DD'))")); //Asignacion creada por el counter
            else
                $cond = array('AND' => array("Asignacione.USU_ID = " . $this->Session->read('Usuario.USU_ID')), "Autorizacion.EST_ID = 1" ); //Asignacion creada por el counter        
                else
            $cond = array('AND' => array("Asignacione.USU_ID = " . $this->Session->read('Usuario.USU_ID')) , "Autorizacion.EST_ID = 1"); //Asignacion creada por el counter    


        $data = $this->Asignacione->find('all', array('conditions' => $cond));

        $this->set('rows', $data);
        $this->render('export_historial_counter_xls', 'export_xls');
    }

    function export_historial_conciliador_xls() {
        $this->Session->write('Reporte.Nombre', 'Historial_Asigaciones_' . date("Y-m-d")); //Nombre del Reporte
        $this->Asignacione->recursive = 1;
        if (isset($_GET['ini']) && isset($_GET['fin'])) //Si se escoje entre fechas
            if ($_GET['ini'] != "" && $_GET['fin'] != "")
                $cond = array('AND' => array('Autorizacion.EST_ID =' => '1', "(Asignacione.ASIG_FECHA_CREACION >= to_date('" . $_GET['ini'] . "','YYYY-MM-DD') AND Asignacione.ASIG_FECHA_CREACION <= to_date('" . $_GET['fin'] . "','YYYY-MM-DD'))")); //Asignacion creada por el counter
            else
                $cond = array('AND' => array('Autorizacion.EST_ID =' => '1')); //Asignacion creada por el counter        
                else
            $cond = array('AND' => array('Autorizacion.EST_ID =' => '1')); //Asignacion creada por el counter    


        $data = $this->Asignacione->find('all', array('conditions' => $cond));

        //print_r($data);
        $this->set('rows', $data);
        $this->render('export_historial_conciliador_xls', 'export_xls');
    }

}