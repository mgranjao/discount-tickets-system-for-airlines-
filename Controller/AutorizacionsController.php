<?php
App::uses('AppController', 'Controller');
/**
 * Autorizacions Controller
 *
 * @property Autorizacion $Autorizacion
 */
class AutorizacionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Autorizacion->recursive = 0;
		$this->set('autorizacions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Autorizacion->id = $id;
		if (!$this->Autorizacion->exists()) {
			throw new NotFoundException(__('Invalid autorizacion'));
		}
		$this->set('autorizacion', $this->Autorizacion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Autorizacion->create();
			if ($this->Autorizacion->save($this->request->data)) {
				$this->Session->setFlash(__('The autorizacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The autorizacion could not be saved. Please, try again.'));
			}
		}
		$asignaciones = $this->Autorizacion->Asignacione->find('list');
		$this->set(compact('asignaciones'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Autorizacion->id = $id;
		if (!$this->Autorizacion->exists()) {
			throw new NotFoundException(__('Invalid autorizacion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Autorizacion->save($this->request->data)) {
				$this->Session->setFlash(__('The autorizacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The autorizacion could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Autorizacion->read(null, $id);
		}
		$asignaciones = $this->Autorizacion->Asignacione->find('list');
		$this->set(compact('asignaciones'));
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
		$this->Autorizacion->id = $id;
		if (!$this->Autorizacion->exists()) {
			throw new NotFoundException(__('Invalid autorizacion'));
		}
		if ($this->Autorizacion->delete()) {
			$this->Session->setFlash(__('Autorizacion deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Autorizacion was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


}
