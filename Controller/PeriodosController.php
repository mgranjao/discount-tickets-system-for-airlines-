<?php

App::uses('AppController', 'Controller');
App::uses('Conciliado', 'Model');

/**
 * Periodos Controller
 *
 * @property Periodo $Periodo
 */
class PeriodosController extends AppController {

    public $components = array('DataTable');

    var $layout = 'aerolineas';

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->Periodo->recursive = 0;
        //$this->set('periodos', $this->paginate());
        if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'fields' => array('Periodo.PERI_ID', 'Aerolinea.AERO_NOMBRE', 'Periodo.PERI_FECHA_INICIO', 'Periodo.PERI_FECHA_FIN', 'Periodo.PERI_CONFIRMADO_CONCILIADOR', 'Periodo.PERI_CONFIRMADO_DGAC', 'Periodo.PERI_CONFIRMADO_PAGO'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Periodo->recursive = 0;
        $this->set('oficinas', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Periodo->id = $id;
        if (!$this->Periodo->exists()) {
            throw new NotFoundException(__('Invalid periodo'));
        }
        $this->set('periodo', $this->Periodo->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        /* $fechaDesde = $this->request->data['Cupo']['CUPO_FECHA_DESDE'];
          $fechaHasta = $this->request->data['Cupo']['CUPO_FECHA_HASTA'];
          $cond = array('OR' => array("'\"".$fechaDesde['month']."-".$fechaDesde['day']."-".$fechaDesde['year']."\"' between \"Cupo.CUPO_FECHA_DESDE\" AND \"Cupo.CUPO_FECHA_HASTA\" ","'\"" . $fechaHasta['month']."-".$fechaHasta['day']."-".$fechaHasta['year']. "\"' between \"Cupo.CUPO_FECHA_DESDE\" AND \"Cupo.CUPO_FECHA_HASTA\" " ,             " \"Cupo.CUPO_FECHA_DESDE\" >= '\"" . $fechaDesde['month']."-".$fechaDesde['day']."-".$fechaDesde['year']. "\"' AND \"Cupo.CUPO_FECHA_HASTA\" <= '\"" . $fechaHasta['month']."-".$fechaHasta['day']."-".$fechaHasta['year']. "\"'"));
          $cupos = $this->Cupo->find('all', array('conditions' => $cond));
         */
        if ($this->request->is('post')) {
            $this->Periodo->create();
            if ($this->Periodo->save($this->request->data)) {
                $this->Session->setFlash(__('El período ha sido guardado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El período no pudo ser guardado. Por favor inténtelo nuevamente.'));
            }
        }
        //$aerolineaModel = new Aerolinea();
        $aerolineas = $this->Periodo->Aerolinea->find('list');
        $this->set(compact('aerolineas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Periodo->id = $id;
        if (!$this->Periodo->exists()) {
            throw new NotFoundException(__('Invalid periodo'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->Periodo->save($this->request->data)) {
                $this->Session->setFlash(__('El período ha sido actualizado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El período no pudo ser actualizado. Por favor inténtelo nuevamente.'));
            }
        } else {
            $this->request->data = $this->Periodo->read(null, $id);
        }
        
        $aerolineas = $this->Periodo->Aerolinea->find('list');
        $this->set(compact('aerolineas'));
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
        $this->Periodo->id = $id;
        if (!$this->Periodo->exists()) {
            throw new NotFoundException(__('Invalid periodo'));
        }
        if ($this->Periodo->delete()) {
            $this->Session->setFlash(__('Período eliminado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El Período no pudo ser eliminado'));
        $this->redirect(array('action' => 'index'));
    }

    public function historial_periodos() {
        //$this->Periodo->recursive = 0;
        //$this->set('periodos', $this->paginate());
        if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'fields' => array('Periodo.PERI_ID', 'Periodo.PERI_FECHA_INICIO', 'Periodo.PERI_FECHA_FIN', 'Periodo.PERI_CONFIRMADO_CONCILIADOR', 'Periodo.PERI_CONFIRMADO_DGAC', 'Periodo.PERI_CONFIRMADO_PAGO'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Periodo->recursive = 0;
        $this->set('oficinas', $this->paginate());
    }

    public function edit_conciliador($id = null) {
        $this->Periodo->id = $id;
        if (!$this->Periodo->exists()) {
            throw new NotFoundException(__('Invalid periodo'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $periodo = $this->Periodo->read(null, $id);
            if ($periodo['Periodo']['PERI_CONFIRMADO_DGAC'] != "1") {
                if ($this->Periodo->save($this->request->data)) {
                    $this->Session->setFlash(__('El período ha sido actualizado'));
                    $this->redirect(array('action' => 'historial_periodos'));
                } else {
                    $this->Session->setFlash(__('El período no pudo ser actualizado. Por favor inténtelo nuevamente.'));
                }
            } else {
                $this->Session->setFlash(__('El período no pudo ser actualizado, ya fué confirmado por la DGAC.'));
            }
        } else {
            $this->request->data = $this->Periodo->read(null, $id);
        }
    }

    
    
      public function historial_periodos_conciliador() {
        //$this->Periodo->recursive = 0;
        //$this->set('periodos', $this->paginate());
        if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'conditions' => array('Periodo.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID')),
                'fields' => array('Periodo.PERI_ID', 'Periodo.PERI_FECHA_INICIO', 'Periodo.PERI_FECHA_FIN', 'Periodo.PERI_CONFIRMADO_CONCILIADOR', 'Periodo.PERI_CONFIRMADO_DGAC', 'Periodo.PERI_CONFIRMADO_PAGO'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Periodo->recursive = 0;
        $this->set('oficinas', $this->paginate());
    }
    
    
    
      public function historial_periodos_dgac() {
          $this->layout = false;
          
        if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'conditions' => array('Periodo.AERO_ID =' => $_GET["aero_id"],
                                       'Periodo.PERI_CONFIRMADO_CONCILIADOR =' => 'true'  ),
                'fields' => array('Periodo.PERI_ID', 'Periodo.PERI_FECHA_INICIO', 'Periodo.PERI_FECHA_FIN', 'Periodo.PERI_CONFIRMADO_CONCILIADOR', 'Periodo.PERI_CONFIRMADO_DGAC', 'Periodo.PERI_CONFIRMADO_PAGO'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Periodo->recursive = 0;
        $this->set('oficinas', $this->paginate());
          
    }
    
    
     public function historial_periodos_reportes() {
          $this->layout = false;
          $aero_id  = $this->Session->read('Aerolinea.AERO_ID');
          
        if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'conditions' => array('Periodo.AERO_ID =' => $aero_id,
                                       'Periodo.PERI_CONFIRMADO_CONCILIADOR =' => 'true'  ),
                'fields' => array('Periodo.PERI_ID', 'Periodo.PERI_FECHA_INICIO', 'Periodo.PERI_FECHA_FIN', 'Periodo.PERI_CONFIRMADO_CONCILIADOR', 'Periodo.PERI_CONFIRMADO_DGAC', 'Periodo.PERI_CONFIRMADO_PAGO'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Periodo->recursive = 0;
        $this->set('oficinas', $this->paginate());
          
    }
    
    
     public function edit_dgac($id = null) {
        $this->Periodo->id = $id;
        if (!$this->Periodo->exists()) {
            throw new NotFoundException(__('Invalid periodo'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $periodo = $this->Periodo->read(null, $id);
            if ($periodo['Periodo']['PERI_CONFIRMADO_PAGO'] != "1") {
                if ($this->Periodo->save($this->request->data)) {
                    $this->Session->setFlash(__('El período ha sido actualizado'));
                    $this->redirect(array('controller'=>'DGAC', 'action' => 'periodos'));
                } else {
                    $this->Session->setFlash(__('El período no pudo ser actualizado. Por favor inténtelo nuevamente.'));
                }
            } else {
                $this->Session->setFlash(__('El período no pudo ser actualizado, ya fué confirmado el pago por la Aerolínea.'));
            }
        } else {
            $this->request->data = $this->Periodo->read(null, $id);
        }
    }
    
    
    
    public function periodo_abierto(){
        $this->autoRender = false;
        $aero_id = $this->Session->read('Aerolinea.AERO_ID');
        $fecha = date('Y-m-d');
        $cond = array('OR' =>array("Periodo.PERI_CONFIRMADO_CONCILIADOR is null","Periodo.PERI_CONFIRMADO_CONCILIADOR != true"),'AND' => array("Periodo.PERI_FECHA_INICIO <= to_date('" . $fecha . "','YYYY-MM-DD')", "Periodo.PERI_FECHA_FIN >=to_date('" . $fecha . "','YYYY-MM-DD')", "Periodo.AERO_ID = ".$aero_id));
        $periodos = $this->Periodo->find('all',array('conditions' => $cond));
        
        if(count($periodos)>0)
          echo "1";   
        else
          echo "0";
        
    }
    
    
    public function view_reportes($id = null) {
        $this->Periodo->id = $id;
        if (!$this->Periodo->exists()) {
            throw new NotFoundException(__('Invalid periodo'));
        }
        $this->request->data = $this->Periodo->read(null, $id);
        $this->set('periodo', $this->Periodo->read(null, $id));
    }
    
}
