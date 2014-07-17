<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracione $Configuracione
 */
class ConfiguracionesController extends AppController {

	//Plantilla
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
                'fields' => array('Configuracione.CONFIG_ID','Configuracione.CONFIG_PARAMETRO', 'Configuracione.CONFIG_VALOR', 'Configuracione.CONFIG_DESCRIPCION'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Configuraciones', $this->DataTable->getResponse());
            $this->set('_serialize','Configuraciones');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->Configuracione->recursive = 0;
		$this->set('configuraciones', $this->paginate());
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
		$this->Configuracione->id = $id;
		if (!$this->Configuracione->exists()) {
			throw new NotFoundException(__('Invalid configuracione'));
		}
		$this->set('configuracione', $this->Configuracione->read(null, $id));
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
			$this->Configuracione->create();
			if ($this->Configuracione->save($this->request->data)) {
				$this->Session->setFlash(__('La configuración ha sido guardada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La configuración no pudo ser guardada. Por favor inténtelo nuevamente.'));
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
		$this->Configuracione->id = $id;
		if (!$this->Configuracione->exists()) {
			throw new NotFoundException(__('Invalid configuracione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Configuracione->save($this->request->data)) {
				$this->Session->setFlash(__('La configuración ha sido actualizada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La configuración no pudo ser actualizada. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Configuracione->read(null, $id);
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
		$this->Configuracione->id = $id;
		if (!$this->Configuracione->exists()) {
			throw new NotFoundException(__('Invalid configuracion'));
		}
		if ($this->Configuracione->delete()) {
			$this->Session->setFlash(__('Configuración eliminada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La configuración no pudo ser eliminada'));
		$this->redirect(array('action' => 'index'));
	}

 function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Configuraciones_'.date("Y-m-d")); //Nombre del Reporte
		$this->Configuracione->recursive = 1;
		$data = $this->Configuracione->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
        
}
