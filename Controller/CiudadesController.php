<?php
App::uses('AppController', 'Controller');
/**
 * Ciudades Controller
 *
 * @property Ciudade $Ciudade
 */
class CiudadesController extends AppController {

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
                'fields' => array('Ciudade.CIU_ID', 'Ciudade.CIU_NOMBRE', 'Ciudade.CIU_PROVINCIA'),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Ciudades', $this->DataTable->getResponse());
            $this->set('_serialize', 'Ciudades');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
		$this->Ciudade->recursive = 0;
		$this->set('ciudades', $this->paginate());
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

		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		$this->set('ciudade', $this->Ciudade->read(null, $id));
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
			$this->Ciudade->create();
			if ($this->Ciudade->save($this->request->data)) {
				$this->Session->setFlash(__('La ciudad ha sido guardada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudade could not be saved. Please, try again.'));
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
            /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ciudade->save($this->request->data)) {
				$this->Session->setFlash(__('La ciudad ha sido actualizada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudade could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ciudade->read(null, $id);
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
		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		if ($this->Ciudade->delete()) {
			$this->Session->setFlash(__('Ciudad eliminada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ciudade was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        
        function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Ciudades_'.date("Y-m-d")); //Nombre del Reporte
		$this->Ciudade->recursive = 1;
		$data = $this->Ciudade->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
        
}
