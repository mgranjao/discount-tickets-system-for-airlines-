<?php
App::uses('AppController', 'Controller');
/**
 * Logs Controller
 *
 * @property Log $Log
 */
class LogsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Log->recursive = 0;
		$this->set('logs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		$this->set('log', $this->Log->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Log->create();
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('The log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
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
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('The log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Log->read(null, $id);
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
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->Log->delete()) {
			$this->Session->setFlash(__('Log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Log->recursive = 0;
		$this->set('logs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		$this->set('log', $this->Log->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Log->create();
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('The log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
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
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('The log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Log->read(null, $id);
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
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->Log->delete()) {
			$this->Session->setFlash(__('Log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
