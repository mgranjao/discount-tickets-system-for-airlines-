<?php
App::uses('AppController', 'Controller');
App::uses('Asignacione', 'Model');
App::uses('Usuario', 'Model');
/**
 * Aerolineas Controller
 *
 * @property Aerolinea $Aerolinea
 */
class AdministradorController extends AppController {
 
 //Plantilla
 var $layout = 'aerolineas';

 var $uses = array(); 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Aerolinea->recursive = 0;
		//$this->set('aerolineas', $this->paginate());
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
        $this->redirect("/aerolineas");

	}
        
        
        public function historial(){
        $asignacion = new Asignacione();
        //$asignacion->recursive = 0;
        
            $aero_id = $this->Session->read('Aerolinea.AERO_ID');
            $cond = array('AND' => array(" Asignacione.AERO_ID = ".$aero_id));
            $asignaciones = $asignacion->find('all', array('conditions' => $cond));
           
        $this->set(compact('asignaciones'));
        //$this->set('asignacioness', $this->paginate());
            
        }
        
        
        public function mi_cuenta($id = null) {
            $usuario = new Usuario();
            $id=$this->Session->read('Usuario.USU_ID');
		$usuario->id = $id;
		if (!$usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($usuario->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido actualizado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no pudo ser actualziado. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $usuario->read(null, $id);
		}
		$perfiles = $usuario->Perfile->find('list');
		$aerolineas = $usuario->Aerolinea->find('list');
                
                $cond = array('OR' => array("Usuario.USU_ID = '$id'"));
                $password = $usuario->find('all', array('conditions' => $cond));
                $password =$password[0]['Usuario']['USU_PASSWORD'];
		
                $this->set(compact('perfiles', 'aerolineas','password'));
	}


      
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Aerolinea->id = $id;
		if (!$this->Aerolinea->exists()) {
			throw new NotFoundException(__('Invalid aerolinea'));
		}
		$this->set('aerolinea', $this->Aerolinea->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aerolinea->create();
			if ($this->Aerolinea->save($this->request->data)) {
				$this->Session->setFlash(__('The aerolinea has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aerolinea could not be saved. Please, try again.'));
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
		$this->Aerolinea->id = $id;
		if (!$this->Aerolinea->exists()) {
			throw new NotFoundException(__('Invalid aerolinea'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aerolinea->save($this->request->data)) {
				$this->Session->setFlash(__('The aerolinea has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aerolinea could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Aerolinea->read(null, $id);
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
		$this->Aerolinea->id = $id;
		if (!$this->Aerolinea->exists()) {
			throw new NotFoundException(__('Invalid aerolinea'));
		}
		if ($this->Aerolinea->delete()) {
			$this->Session->setFlash(__('Aerolinea deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aerolinea was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Aerolinea->recursive = 0;
		$this->set('aerolineas', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Aerolinea->id = $id;
		if (!$this->Aerolinea->exists()) {
			throw new NotFoundException(__('Invalid aerolinea'));
		}
		$this->set('aerolinea', $this->Aerolinea->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Aerolinea->create();
			if ($this->Aerolinea->save($this->request->data)) {
				$this->Session->setFlash(__('The aerolinea has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aerolinea could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Aerolinea->id = $id;
		if (!$this->Aerolinea->exists()) {
			throw new NotFoundException(__('Invalid aerolinea'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aerolinea->save($this->request->data)) {
				$this->Session->setFlash(__('The aerolinea has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aerolinea could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Aerolinea->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Aerolinea->id = $id;
		if (!$this->Aerolinea->exists()) {
			throw new NotFoundException(__('Invalid aerolinea'));
		}
		if ($this->Aerolinea->delete()) {
			$this->Session->setFlash(__('Aerolinea deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aerolinea was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
