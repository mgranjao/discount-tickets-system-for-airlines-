<?php
App::uses('AppController', 'Controller');
/**
 * CuposDisponibles Controller
 *
 * @property CuposDisponible $CuposDisponible
 */
class CuposDisponiblesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CuposDisponible->recursive = 0;
		$this->set('cuposDisponibles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CuposDisponible->id = $id;
		if (!$this->CuposDisponible->exists()) {
			throw new NotFoundException(__('Invalid cupos disponible'));
		}
		$this->set('cuposDisponible', $this->CuposDisponible->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CuposDisponible->create();
			if ($this->CuposDisponible->save($this->request->data)) {
				$this->Session->setFlash(__('The cupos disponible has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cupos disponible could not be saved. Please, try again.'));
			}
		}
		$cupos = $this->CuposDisponible->Cupo->find('list');
		$residentes = $this->CuposDisponible->Residente->find('list');
		$this->set(compact('cupos', 'residentes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CuposDisponible->id = $id;
		if (!$this->CuposDisponible->exists()) {
			throw new NotFoundException(__('Invalid cupos disponible'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CuposDisponible->save($this->request->data)) {
				$this->Session->setFlash(__('The cupos disponible has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cupos disponible could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CuposDisponible->read(null, $id);
		}
		$cupos = $this->CuposDisponible->Cupo->find('list');
		$residentes = $this->CuposDisponible->Residente->find('list');
		$this->set(compact('cupos', 'residentes'));
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
		$this->CuposDisponible->id = $id;
		if (!$this->CuposDisponible->exists()) {
			throw new NotFoundException(__('Invalid cupos disponible'));
		}
		if ($this->CuposDisponible->delete()) {
			$this->Session->setFlash(__('Cupos disponible deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cupos disponible was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CuposDisponible->recursive = 0;
		$this->set('cuposDisponibles', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CuposDisponible->id = $id;
		if (!$this->CuposDisponible->exists()) {
			throw new NotFoundException(__('Invalid cupos disponible'));
		}
		$this->set('cuposDisponible', $this->CuposDisponible->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CuposDisponible->create();
			if ($this->CuposDisponible->save($this->request->data)) {
				$this->Session->setFlash(__('The cupos disponible has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cupos disponible could not be saved. Please, try again.'));
			}
		}
		$cupos = $this->CuposDisponible->Cupo->find('list');
		$residentes = $this->CuposDisponible->Residente->find('list');
		$this->set(compact('cupos', 'residentes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->CuposDisponible->id = $id;
		if (!$this->CuposDisponible->exists()) {
			throw new NotFoundException(__('Invalid cupos disponible'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CuposDisponible->save($this->request->data)) {
				$this->Session->setFlash(__('The cupos disponible has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cupos disponible could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CuposDisponible->read(null, $id);
		}
		$cupos = $this->CuposDisponible->Cupo->find('list');
		$residentes = $this->CuposDisponible->Residente->find('list');
		$this->set(compact('cupos', 'residentes'));
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
		$this->CuposDisponible->id = $id;
		if (!$this->CuposDisponible->exists()) {
			throw new NotFoundException(__('Invalid cupos disponible'));
		}
		if ($this->CuposDisponible->delete()) {
			$this->Session->setFlash(__('Cupos disponible deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cupos disponible was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
