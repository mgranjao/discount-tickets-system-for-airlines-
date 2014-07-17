<?php

App::uses('AppController', 'Controller');
App::uses('Residente', 'Model');

/**
 * Conciliados Controller
 *
 * @property Conciliado $Conciliado
 */
class ConciliadosController extends AppController {

    public $components = array('DataTable');

    //Plantilla
    var $layout = 'aerolineas';

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Conciliado->recursive = 0;
        $this->set('conciliados', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
         $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Conciliado->id = $id;
        if (!$this->Conciliado->exists()) {
            throw new NotFoundException(__('Invalid conciliado'));
        }
        $this->set('conciliado', $this->Conciliado->read(null, $id));
    }
    
    public function view_dgac($id = null) {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        // $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Conciliado->id = $id;
        if (!$this->Conciliado->exists()) {
            throw new NotFoundException(__('Invalid conciliado'));
        }
        $this->set('conciliado', $this->Conciliado->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     *
    public function add() {
        if ($this->request->is('post')) {
            $this->Conciliado->create();
            if ($this->Conciliado->save($this->request->data)) {
                $this->Session->setFlash(__('The conciliado has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The conciliado could not be saved. Please, try again.'));
            }
        }
        $volados = $this->Conciliado->Volado->find('list');
        $asignaciones = $this->Conciliado->Asignacione->find('list');
        $this->set(compact('volados', 'asignaciones'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     *
    public function edit($id = null) {
        $this->Conciliado->id = $id;
        if (!$this->Conciliado->exists()) {
            throw new NotFoundException(__('Invalid conciliado'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Conciliado->save($this->request->data)) {
                $this->Session->setFlash(__('The conciliado has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The conciliado could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Conciliado->read(null, $id);
        }
        $volados = $this->Conciliado->Volado->find('list');
        $asignaciones = $this->Conciliado->Asignacione->find('list');
        $this->set(compact('volados', 'asignaciones'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     *
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Conciliado->id = $id;
        if (!$this->Conciliado->exists()) {
            throw new NotFoundException(__('Invalid conciliado'));
        }
        if ($this->Conciliado->delete()) {
            $this->Session->setFlash(__('Conciliado deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Conciliado was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
*/
    
    public function historial_conciliados() {

        $fecha_ini = "";
        $fecha_fin = "";
        if ($this->request->is('post')) {
            $fecha_ini = $this->request->data['Asignacione']['FECHA_INICIO']; //['year']."-".$this->request->data['Asignacione']['FECHA_INICIO']['month']."-".$this->request->data['Asignacione']['FECHA_INICIO']['day'];
            $fecha_fin = $this->request->data['Asignacione']['FECHA_FIN']; //['year']."-".$this->request->data['Asignacione']['FECHA_FIN']['month']."-".$this->request->data['Asignacione']['FECHA_FIN']['day'];
        }
        $this->set(compact('fecha_ini', 'fecha_fin'));

        if ($this->RequestHandler->responseType() == 'json') {

            if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                $this->paginate = array(
                    'joins' => array(
                        array(
                            'alias' => 'Asignacion',
                            'table' => 'asignaciones',
                            'type' => 'INNER',
                            'conditions' => 'Asignacion.ASIG_ID = Conciliado.ASIG_ID'
                        ),
                        array(
                            'alias' => 'Residente',
                            'table' => 'residentes',
                            'type' => 'INNER',
                            'conditions' => 'Residente.RES_ID = Asignacion.RES_ID'
                        )
                    ),
                    'conditions' => array(
                        "(Conciliado.CONC_FECHA >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Conciliado.CONC_FECHA <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))"
                    ),
                    'fields' => array('Conciliado.CONC_ID', 'Volado.VOL_NUM_TICKET', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Residente.RES_CEDULA', 'Volado.VOL_CIUDAD_ORIGEN', 'Volado.VOL_CIUDAD_DESTINO', 'Conciliado.CONC_FECHA'),
                );
            } else {
                $this->paginate = array(
                    'joins' => array(
                        array(
                            'alias' => 'Asignacion',
                            'table' => 'asignaciones',
                            'type' => 'INNER',
                            'conditions' => 'Asignacion.ASIG_ID = Conciliado.ASIG_ID'
                        ),
                        array(
                            'alias' => 'Residente',
                            'table' => 'residentes',
                            'type' => 'INNER',
                            'conditions' => 'Residente.RES_ID = Asignacion.RES_ID'
                        )
                    ),
                    'fields' => array('Conciliado.CONC_ID', 'Volado.VOL_NUM_TICKET', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Residente.RES_CEDULA', 'Volado.VOL_CIUDAD_ORIGEN', 'Volado.VOL_CIUDAD_DESTINO', 'Conciliado.CONC_FECHA'),
                );
            }
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
         $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Conciliado->recursive = 0;
        $this->set('oficinas', $this->paginate());
    }

    function export_historial_conciliados_xls() {

        $this->Session->write('Reporte.Nombre', 'Historial_Conciliados_' . date("Y-m-d")); //Nombre del Reporte
        $this->Conciliado->recursive = 1;
        if (isset($_GET['ini']) && isset($_GET['fin']))
            if ($_GET['ini'] != "" && $_GET['fin'] != "") {
                $cond = array('AND' => array("(Conciliado.CONC_FECHA >= to_date('" . $_GET['ini'] . "','YYYY-MM-DD') AND Conciliado.CONC_FECHA <= to_date('" . $_GET['fin'] . "','YYYY-MM-DD'))")); //Si es supervisor
                $data = $this->Conciliado->find('all', array('conditions' => $cond));
            }
            else
                $data = $this->Conciliado->find('all');
        else
            $data = $this->Conciliado->find('all');

        //print_r($data);
        $this->set('rows', $data);
        $this->render('export_historial_conciliados_xls', 'export_xls');
    }

    
    
    
    function conciliados_por_periodo(){
        if (isset($this->request->query['peri_id'])) {
         if ($this->RequestHandler->responseType() == 'json') {
                $this->paginate= array(
                    'joins' => array(
                        array(
                            'alias' => 'Asignacion',
                            'table' => 'asignaciones',
                            'type' => 'INNER',
                            'conditions' => 'Asignacion.ASIG_ID = Conciliado.ASIG_ID'
                        ),
                        array(
                            'alias' => 'Residente',
                            'table' => 'residentes',
                            'type' => 'INNER',
                            'conditions' => 'Residente.RES_ID = Asignacion.RES_ID'
                        )
                    ),
                    'conditions' => array(
                        "Conciliado.PERI_ID = " . $this->request->query['peri_id'] 
                    ),
                    'fields' => array('Conciliado.CONC_ID', 'Volado.VOL_NUM_TICKET', 'Asignacione.ASIG_DET_CODIGO_AUTORIZACION', 'Residente.RES_CEDULA', 'Volado.VOL_CIUDAD_ORIGEN', 'Volado.VOL_CIUDAD_DESTINO', 'Conciliado.CONC_FECHA'),
                );
                        
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
            }
        }
    }
}
