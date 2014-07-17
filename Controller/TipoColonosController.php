<?php
App::uses('AppController', 'Controller');
/**
 * TipoColonos Controller
 *
 * @property TipoColono $TipoColono
 */
class TipoColonosController extends AppController {

    
    public $components = array('DataTable');
    var $layout = 'aerolineas';
/**
 * index method
 *
 * @return void
 */
	public function index() {
            if($this->RequestHandler->responseType() == 'json') {
           
            $this->paginate = array(
                'fields' => array('TipoColono.TIPO_ID','TipoColono.TIPO_NOMBRE' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('TipoColonos', $this->DataTable->getResponse());
            $this->set('_serialize','TipoColonos');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->TipoColono->recursive = 0;
		$this->set('tipoColonos', $this->paginate());
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
		$this->TipoColono->id = $id;
		if (!$this->TipoColono->exists()) {
			throw new NotFoundException(__('Invalid tipo colono'));
		}
		$this->set('tipoColono', $this->TipoColono->read(null, $id));
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
			$this->TipoColono->create();
			if ($this->TipoColono->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo de colono ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo de colono no pudo ser guardado. Por favor inténtelo nuevamente.'));
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
		$this->TipoColono->id = $id;
		if (!$this->TipoColono->exists()) {
			throw new NotFoundException(__('Invalid tipo colono'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TipoColono->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo de colono ha sido actualizado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo de colono no pudo ser actualizado. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->TipoColono->read(null, $id);
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
		$this->TipoColono->id = $id;
		if (!$this->TipoColono->exists()) {
			throw new NotFoundException(__('Invalid tipo colono'));
		}
		if ($this->TipoColono->delete()) {
			$this->Session->setFlash(__('Tipo de colono eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El tipo de colono no pudo ser eliminado'));
		$this->redirect(array('action' => 'index'));
	}


        function export_xls() {
            $this->Session->write('Reporte.Nombre', 'TipoColonos_'.date("Y-m-d")); //Nombre del Reporte
		$this->TipoColono->recursive = 1;
		$data = $this->TipoColono->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
}
