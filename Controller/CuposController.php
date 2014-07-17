<?php
App::uses('AppController', 'Controller');
/**
 * Cupos Controller
 *
 * @property Cupo $Cupo
 */
class CuposController extends AppController {

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
                'fields' => array('Cupo.CUPO_ID','TipoColono.TIPO_NOMBRE', 'Usuario.USU_EMAIL', 'Cupo.CUPO_CANTIDAD' ,'Cupo.CUPO_FECHA_DESDE','Cupo.CUPO_FECHA_HASTA' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Aeropuertos', $this->DataTable->getResponse());
            $this->set('_serialize','Aeropuertos');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->Cupo->recursive = 0;
		$this->set('cupos', $this->paginate());
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
		$this->Cupo->id = $id;
		if (!$this->Cupo->exists()) {
			throw new NotFoundException(__('Invalid cupo'));
		}
		$this->set('cupo', $this->Cupo->read(null, $id));
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
                    
                   // $tiposColonos = $this->Cupo->TipoColono->find('all');
                   // foreach($tiposColonos as $tc)
                   // { 
                        $fechaDesde = $this->request->data['Cupo']['CUPO_FECHA_DESDE'];
                        $fechaHasta = $this->request->data['Cupo']['CUPO_FECHA_HASTA'];
                        $cond = array('OR' => array("'\"".$fechaDesde['month']."-".$fechaDesde['day']."-".$fechaDesde['year']."\"' between \"Cupo.CUPO_FECHA_DESDE\" AND \"Cupo.CUPO_FECHA_HASTA\" ","'\"" . $fechaHasta['month']."-".$fechaHasta['day']."-".$fechaHasta['year']. "\"' between \"Cupo.CUPO_FECHA_DESDE\" AND \"Cupo.CUPO_FECHA_HASTA\" " ,             " \"Cupo.CUPO_FECHA_DESDE\" >= '\"" . $fechaDesde['month']."-".$fechaDesde['day']."-".$fechaDesde['year']. "\"' AND \"Cupo.CUPO_FECHA_HASTA\" <= '\"" . $fechaHasta['month']."-".$fechaHasta['day']."-".$fechaHasta['year']. "\"'"));
                        $cupos = $this->Cupo->find('all', array('conditions' => $cond));
                        $band=0;
                        foreach($cupos as $c){
                            if($c['Cupo']['TIPO_ID'] == $this->request->data['Cupo']['TIPO_ID'])
                                $band = 1;
                        }
                        
                    // }
                    
                       if($band == 0)  {   
			$this->Cupo->create();
                        $this->request->data['Cupo']['USU_ID'] = $this->Session->read('Usuario.USU_ID');
			if ($this->Cupo->save($this->request->data)) {
				$this->Session->setFlash(__('El cupo ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El cupo no pudo ser guardado. Por favor inténtelo nuevamente.'));
			}
                       }
                       else
                       {
                           $this->Session->setFlash(__('El Cupo ingresado ya existe para el tipo de colono entre el periodo de fechas seleccionado'));
                       }
		}
		$usuarios = $this->Cupo->Usuario->find('list');
		$tipoColonos = $this->Cupo->TipoColono->find('list');
		$this->set(compact('usuarios', 'tipoColonos'));
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
		$this->Cupo->id = $id;
		if (!$this->Cupo->exists()) {
			throw new NotFoundException(__('Invalid cupo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cupo->save($this->request->data)) {
				$this->Session->setFlash(__('El cupo ha sido actualizado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El cupo no pudo ser actualizado. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Cupo->read(null, $id);
		}
		$usuarios = $this->Cupo->Usuario->find('list');
		$tipoColonos = $this->Cupo->TipoColono->find('list');
		$this->set(compact('usuarios', 'tipoColonos'));
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
		$this->Cupo->id = $id;
		if (!$this->Cupo->exists()) {
			throw new NotFoundException(__('Invalid cupo'));
		}
		if ($this->Cupo->delete()) {
			$this->Session->setFlash(__('Cupo eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El cupo no pudo ser eliminado'));
		$this->redirect(array('action' => 'index'));
	}


        function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Cupos_'.date("Y-m-d")); //Nombre del Reporte
		$this->Cupo->recursive = 1;
		$data = $this->Cupo->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
}
