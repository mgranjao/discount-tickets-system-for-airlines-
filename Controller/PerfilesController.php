<?php
App::uses('AppController', 'Controller');
/**
 * Perfiles Controller
 *
 * @property Perfile $Perfile
 * @property aclComponent $acl
 */
class PerfilesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('Ajax');

/**
 * Components
 *
 * @var array
 */
	public $components = array('DataTable');
	var $layout = 'aerolineas';

/**
 * index method
 *
 * @return void
 */
	public function index() {
            if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'fields' => array('Perfile.PER_ID', 'Perfile.PER_NOMBRE'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Perfiles', $this->DataTable->getResponse());
            $this->set('_serialize', 'Perfiles');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->Perfile->recursive = 0;
		$this->set('perfiles', $this->paginate());
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
		$this->Perfile->id = $id;
		if (!$this->Perfile->exists()) {
			throw new NotFoundException(__('Invalid perfile'));
		}
		$this->set('perfile', $this->Perfile->read(null, $id));
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
			$this->Perfile->create();
			if ($this->Perfile->save($this->request->data)) {
				$this->Session->setFlash(__('El perfil ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El perfil no pudo ser guardado. Por favor inténtelo nuevamente.'));
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
		$this->Perfile->id = $id;
		if (!$this->Perfile->exists()) {
			throw new NotFoundException(__('Invalid perfile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Perfile->save($this->request->data)) {
				$this->Session->setFlash(__('El perfil ha sido actualizado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El perfil no pudo ser actualizado. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Perfile->read(null, $id);
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
		$this->Perfile->id = $id;
		if (!$this->Perfile->exists()) {
			throw new NotFoundException(__('Invalid perfile'));
		}
		if ($this->Perfile->delete()) {
			$this->Session->setFlash(__('Perfil eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El perfil no pudo ser eliminado'));
		$this->redirect(array('action' => 'index'));
	}


         function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Perfiles_'.date("Y-m-d")); //Nombre del Reporte
		$this->Perfile->recursive = 1;
		$data = $this->Perfile->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
}
