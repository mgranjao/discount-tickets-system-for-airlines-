<?php

App::uses('AppController', 'Controller');
App::uses('Asignacione', 'Model');
App::uses('Cupo', 'Model');
App::uses('Residente', 'Model');
App::uses('Usuario', 'Model');
App::uses('Conciliado', 'Model');
App::uses('Volado', 'Model');
App::uses('VoladosAct', 'Model');
App::uses('Tasa', 'Model');
App::uses('Aerolinea', 'Model');
App::uses('Catalogo', 'Model');
App::uses('Periodo', 'Model');
App::import('Vendor', 'dompdf_config.inc', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
//App::import('Vendor', 'Spreadsheet_Excel_Reader', array('file' => 'excel' . DS . 'reader.php'));
//require_once "helpers/dompdf/dompdf_config.inc.php";

/**
 * Aerolineas Controller
 *
 * @property Aerolinea $Aerolinea
 */
class DGACController extends AppController {

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
    }

    public function reportes() {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        $aerolineaModel = new Aerolinea();
        $aerolineas = $aerolineaModel->find('list');

        $periodoModel = new Periodo();
        $periodos = $periodoModel->find('list', array('order' => 'Periodo.PERI_FECHA_FIN DESC', 'conditions' => array('OR' => array("Periodo.PERI_CONFIRMADO_CONCILIADOR = true"))));

        $reportes[0] = 'Reporte Mensual';

        $this->set(compact('aerolineas', 'reportes', 'periodos'));

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data))
                $reporte = $this->request->data['DGAC']['REP_ID'];
            switch ($reporte) {
                case 0: $this->redirect(array('action' => 'reporte_volados_por_periodo.pdf', "?" => array(
                            "per_id" => $this->request->data['DGAC']['PERI_ID']
                            )));
                    break;
                case 1: break;

                default: break;
            }
        }
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

    public function reporte_volados_por_periodo($id = null) {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        ini_set('max_execution_time', 300);
        $params = array(
            'download' => false,
            'name' => 'reporte_volados_por_periodo.pdf',
            //'paperOrientation' => 'portrait',
            'paperOrientation' => 'landscape',
            //'paperSize' => 'legal'
            'paperSize' => 'a4'
        );
        $this->set($params);


        $per_id = $_GET['per_id'];
        $periodoModel = new Periodo();
        $periodoModel->id = $per_id;
        $periodo = $periodoModel->read(null, $per_id);


        $vuelos = array();
        $total = 0;
        $i = 0;
        foreach ($periodo['Conciliado'] as $conciliado) {
            $voladoModel = new Volado();
            $voladoModel->id = $conciliado['VOL_ID'];
            $volado = $voladoModel->read(null, $conciliado['VOL_ID']);
            array_push($vuelos, $volado);
            $periodo['Conciliado'][$i]['Volado_ida'] = $volado;

            $catalogoModel = new Catalogo();
            $catalogoDetino = $catalogoModel->find('all', array('conditions' => array('AND' => array("Catalogo.CATAG_VALOR like '%" . trim($periodo['Conciliado'][$i]['Volado_ida']['Volado']['VOL_CIUDAD_DESTINO']) . "%'"))));
            $periodo['Conciliado'][$i]['Volado_ida']['Volado']['CatalogoDestino'] = $catalogoDetino;

            $voladoModel = new Volado();
            $voladoModel->id = $conciliado['VOL_VOL_ID'];
            $volado = $voladoModel->read(null, $conciliado['VOL_VOL_ID']);
            array_push($vuelos, $volado);
            $periodo['Conciliado'][$i]['Volado_retorno'] = $volado;

            $asignacionModel = new Asignacione();
            $asignacionModel->id = $conciliado['ASIG_ID'];
            $asignacion = $asignacionModel->read(null, $conciliado['ASIG_ID']);
            $periodo['Conciliado'][$i]['Asignacione'] = $asignacion;

            $total+=$periodo['Conciliado'][$i]['Volado_ida']['Volado']['CatalogoDestino'][0]['Catalogo']['CATAG_TARIFA'];

            $i++;
        }

        $this->set(compact('periodo', 'vuelos', 'total'));
    }

    function residente() {
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */


        if ($this->request->is('post') || $this->request->is('put')) {
            
            $residenteModel = new Residente();
            $cond = array('AND' => array("Residente.RES_CEDULA LIKE '".$this->request->data['DGAC']['RES_CEDULA']."'"));
            $list = $residenteModel->find('all', array('conditions' => $cond));

            if ($list) {
                
                   
                        $this->redirect(array('action' => 'vuelos_residente.pdf', "?" => array(
                                "res_cedula" => $this->request->data['DGAC']['RES_CEDULA']/* ,
                              "cupo" => $this->request->data['DGAC']['CUPO_ID'] */
                                )));
                    
            } else {
                $this->Session->setFlash(__('El residente no existe en la base de datos.'));
            }
        }
        $this->set(compact('cupos'));
    }

    function vuelos_residente() {
         /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        $params = array(
            'download' => false,
            'name' => 'vuelos_residente.pdf',
            //'paperOrientation' => 'portrait',
            'paperOrientation' => 'landscape',
            //'paperSize' => 'legal'
            'paperSize' => 'a4'
        );
        $this->set($params);
        $voladoModel = new Volado();
        $data = $voladoModel->vuelos_residente($_GET['res_cedula']);
        $this->set(compact('data'));
    }

    function periodos_por_aerolinea() {//index.php/
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */

        //$this->autoRender = false; //Descactiva Layout y Vista
        //$this->render(false); //Desactiva solo la vista y no el layout    
        $this->layout = false; // Desactiva solo el layout
        if (isset($_POST["usu"]))
            $this->request->data = $this->Usuario->read(null, $_POST["usu"]);

        $id = $_POST["id"];
        $periodoModel = new Periodo();
        $periodos = $periodoModel->find('list', array('conditions' => array('OR' => array("Periodo.AERO_ID = " . $id))));

        $this->set(compact('periodos'));
    }
    
    
    
    public function periodos() {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        $aerolineaModel = new Aerolinea();
        $aerolineas = $aerolineaModel->find('list');

        $periodoModel = new Periodo();
        $periodos = $periodoModel->find('list', array('order' => 'Periodo.PERI_FECHA_FIN DESC', 'conditions' => array('OR' => array("Periodo.PERI_CONFIRMADO_CONCILIADOR = true"))));

        $reportes[0] = 'Reporte Mensual';

        $this->set(compact('aerolineas', 'reportes', 'periodos'));

        /*if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data))
                //$reporte = $this->request->data['DGAC']['REP_ID'];
            switch ($reporte) {
                case 0: $this->redirect(array('action' => 'reporte_volados_por_periodo.pdf', "?" => array(
                            //"per_id" => $this->request->data['DGAC']['PERI_ID']
                            )));
                    break;
                case 1: break;

                default: break;
            }
        }*/
    }

}
