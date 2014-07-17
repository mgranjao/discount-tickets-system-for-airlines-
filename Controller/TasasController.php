<?php
App::uses('AppController', 'Controller');

/**
 * Tasas Controller
 *
 * @property Tasa $Tasa
 */
class TasasController extends AppController {

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
                'fields' => array('Tasa.TASA_ID','Aerolinea.AERO_NOMBRE','Catalogo.CATAG_VALOR', 'Tasa.TASA_TASAS', 'Tasa.TASA_IMPUESTOS' ,'Tasa.TASA_FEE' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Tasas', $this->DataTable->getResponse());
            $this->set('_serialize','Tasas');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->Tasa->recursive = 0;
		$this->set('tasas', $this->paginate());
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
		$this->Tasa->id = $id;
		if (!$this->Tasa->exists()) {
			throw new NotFoundException(__('Invalid tasa'));
		}
		$this->set('tasa', $this->Tasa->read(null, $id));
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
			$this->Tasa->create();
			if ($this->Tasa->save($this->request->data)) {
				$this->Session->setFlash(__('La Tasa ha sido guardada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La tasa no pudo ser guardada. Por favor inténtelo nuevamente.'));
			}
		}
		$aerolineas = $this->Tasa->Aerolinea->find('list');
                $aeropuertos = $this->Tasa->Catalogo->find('list');
		$this->set(compact('aerolineas','aeropuertos'));
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
		$this->Tasa->id = $id;
		if (!$this->Tasa->exists()) {
			throw new NotFoundException(__('Invalid tasa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tasa->save($this->request->data)) {
				$this->Session->setFlash(__('La tasa ha sido actualizada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La tasa no pudo ser actualizada. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Tasa->read(null, $id);
		}
		$aerolineas = $this->Tasa->Aerolinea->find('list');
                $aeropuertos = $this->Tasa->Catalogo->find('list');
		$this->set(compact('aerolineas','aeropuertos'));
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
		$this->Tasa->id = $id;
		if (!$this->Tasa->exists()) {
			throw new NotFoundException(__('Invalid tasa'));
		}
		if ($this->Tasa->delete()) {
			$this->Session->setFlash(__('Tasa eliminada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La tasa no pudo ser eliminada'));
		$this->redirect(array('action' => 'index'));
	}
        
        
        function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Tasas_'.date("Y-m-d")); //Nombre del Reporte
		$this->Tasa->recursive = 1;
		$data = $this->Tasa->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
        
}
