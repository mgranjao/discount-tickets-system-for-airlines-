<?php

App::uses('AppController', 'Controller');

/**
 * Catalogos Controller
 *
 * @property Catalogo $Catalogo
 */
class CatalogosController extends AppController {

    //Plantilla
    var $layout = 'aerolineas';

    public $components = array('DataTable');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'fields' => array('Catalogo.CATAG_ID', 'Catalogo.CATAG_VALOR', 'Catalogo.CATAG_TIPO', 'Catalogo.CATAG_TARIFA', 'Ciudade.CIU_NOMBRE', 'Catalogo.CATAG_ESTADO'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Aeropuertos', $this->DataTable->getResponse());
            $this->set('_serialize', 'Aeropuertos');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        $this->Catalogo->recursive = 0;
        $this->set('catalogos', $this->paginate());
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
        $this->Catalogo->id = $id;
        if (!$this->Catalogo->exists()) {
            throw new NotFoundException(__('Invalid catalogo'));
        }
        $this->set('catalogo', $this->Catalogo->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        if ($this->request->is('post')) {
            $this->Catalogo->create();
            if ($this->Catalogo->save($this->request->data)) {
                $this->Session->setFlash(__('El aeropuerto ha sido guardado.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El aeropuerto no pudo ser actualizado. Por favor inténtelo nuevamente.'));
            }
        }
        $ciudades = $this->Catalogo->Ciudade->find('list');
        $tipos['Continente'] = 'Continente';
        $tipos['Galapagos'] = 'Galapagos';
        $this->set(compact('ciudades','tipos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
        $this->Catalogo->id = $id;
        if (!$this->Catalogo->exists()) {
            throw new NotFoundException(__('Invalid catalogo'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Catalogo->save($this->request->data)) {
                $this->Session->setFlash(__('El aeropuerto ha sido actualizado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El aeropuerto no pudo ser actualizado. Por favor inténtelo nuevamente.'));
            }
        } else {
            $this->request->data = $this->Catalogo->read(null, $id);
        }
        $ciudades = $this->Catalogo->Ciudade->find('list');
        $tipos['Continente'] = 'Continente';
        $tipos['Galapagos'] = 'Galapagos';
        $this->set(compact('ciudades','tipos'));
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
        $this->Catalogo->id = $id;
        if (!$this->Catalogo->exists()) {
            throw new NotFoundException(__('Invalid catalogo'));
        }
        if ($this->Catalogo->delete()) {
            $this->Session->setFlash(__('Aeropuerto eliminado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El Aeropuerto no pudo ser eliminado'));
        $this->redirect(array('action' => 'index'));
    }

    
    
    function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Aeropuertos_'.date("Y-m-d")); //Nombre del Reporte
		$this->Catalogo->recursive = 1;
		$data = $this->Catalogo->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
}
