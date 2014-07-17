<?php
App::uses('AppController', 'Controller');
/**
 * Estados Controller
 *
 * @property Estado $Estado
 */
class EstadosController extends AppController {

	var $layout = 'aerolineas';
    public $components = array('DataTable');
/**
 * index method
 *
 * @return void
 */
	public function index() {
            if($this->RequestHandler->responseType() == 'json') {
           
            $this->paginate = array(
                'fields' => array('Estado.EST_ID','Estado.EST_NOMBRE' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Estados', $this->DataTable->getResponse());
            $this->set('_serialize','Estados');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->Estado->recursive = 0;
		$this->set('estados', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('Invalid estado'));
		}
		$this->set('estado', $this->Estado->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		if ($this->request->is('post')) {
			$this->Estado->create();
			if ($this->Estado->save($this->request->data)) {
				$this->Session->setFlash(__('El Estado ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El EStado no pudo ser guardado. Por favor inténtelo nuevamente.'));
			}
		}
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
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('Invalid estado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estado->save($this->request->data)) {
				$this->Session->setFlash(__('El Estado ha sido actualizado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estado no pudo ser actualizado. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Estado->read(null, $id);
		}
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
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('Invalid estado'));
		}
		if ($this->Estado->delete()) {
			$this->Session->setFlash(__('Estado eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El estado no pudo ser eliminado'));
		$this->redirect(array('action' => 'index'));
	}
        
        
        function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Estados_'.date("Y-m-d")); //Nombre del Reporte
		$this->Estado->recursive = 1;
		$data = $this->Estado->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
}
