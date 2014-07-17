<?php

App::uses('AppController', 'Controller');

/**
 * Oficinas Controller
 *
 * @property Oficina $Oficina
 */
class OficinasController extends AppController {

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
                'fields' => array('Oficina.OFI_ID','Aerolinea.AERO_NOMBRE', 'Oficina.OFI_CODIGO', 'Oficina.OFI_DIRECCION', 'Ciudade.CIU_NOMBRE' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize','Oficinas');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
        
        $this->Oficina->recursive = 0;
        $this->set('oficinas', $this->paginate());
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
        $this->Oficina->id = $id;
        if (!$this->Oficina->exists()) {
            throw new NotFoundException(__('Invalid oficina'));
        }
        $this->set('oficina', $this->Oficina->read(null, $id));
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
            $this->Oficina->create();
            if ($this->Oficina->save($this->request->data)) {
                $this->Session->setFlash(__('La oficina ha sido guardada'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La oficina no pudo ser guardada. Por favor inténtelo nuevamente.'));
            }
        }
        $aerolineas = $this->Oficina->Aerolinea->find('list');
        $ciudades = $this->Oficina->Ciudade->find('list');
        $this->set(compact('aerolineas','ciudades'));
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
        $this->Oficina->id = $id;
        if (!$this->Oficina->exists()) {
            throw new NotFoundException(__('Invalid oficina'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Oficina->save($this->request->data)) {
                $this->Session->setFlash(__('La oficina ha sido actualizada'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La oficina no pudo ser actualizada. Por favor inténtelo nuevamente.'));
            }
        } else {
            $this->request->data = $this->Oficina->read(null, $id);
        }
        $aerolineas = $this->Oficina->Aerolinea->find('list');
        $ciudades = $this->Oficina->Ciudade->find('list');
        $this->set(compact('aerolineas','ciudades'));
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
        $this->Oficina->id = $id;
        if (!$this->Oficina->exists()) {
            throw new NotFoundException(__('Invalid oficina'));
        }
        if ($this->Oficina->delete()) {
            $this->Session->setFlash(__('Oficina eliminada'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('La Oficina no pudo ser eliminada'));
        $this->redirect(array('action' => 'index'));
    }

    public function oficinas_no_supervisadas_por_id_json($id = null) {
        
         $cond = array('AND' => array("SupXOfi.USU_ID = ".$id));
         $oficinas = $this->Oficina->SupXOfi->find('all', array('conditions' => $cond));
         $arr = array();
         
         foreach ($oficinas as $ofi){
          $ofi['SupXOfi']['OFI_ID'];
          array_push($arr,$ofi['SupXOfi']['OFI_ID']);
          } 
          
          $cond = array('AND' => array("Usuario.USU_ID = ".$id));
          $usuario= $this->Oficina->SupXOfi->Usuario->find('all', array('conditions' => $cond));
        if ($this->RequestHandler->responseType() == 'json') {


            if (count($arr) > 1)
                $this->paginate = array(
                    'conditions' => array('Oficina.AERO_ID =' => $usuario[0]['Usuario']['AERO_ID'],
                        'Oficina.OFI_ID !=' => $arr),
                    'fields' => array('Oficina.OFI_ID', 'Oficina.OFI_CODIGO', 'Oficina.OFI_CIUDAD'),
                );
            elseif (count($arr) == 1) {
                $this->paginate = array(
                    'conditions' => array('Oficina.AERO_ID =' => $usuario[0]['Usuario']['AERO_ID'],
                        'Oficina.OFI_ID !=' => $arr[0]),
                    'fields' => array('Oficina.OFI_ID', 'Oficina.OFI_CODIGO', 'Oficina.OFI_CIUDAD'),
                );
            } elseif (count($arr) == 0) {
                $this->paginate = array(
                    'conditions' => array('Oficina.AERO_ID =' => $usuario[0]['Usuario']['AERO_ID'],
                        'Oficina.OFI_ID !=' => 0),
                    'fields' => array('Oficina.OFI_ID', 'Oficina.OFI_CODIGO', 'Oficina.OFI_CIUDAD'),
                );
            }
            $this->DataTable->emptyElements = 1;
            $this->set('Asignaciones', $this->DataTable->getResponse());

            $this->set('_serialize', 'Asignaciones');
        }
    }
    
    
    function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Oficinas_'.date("Y-m-d")); //Nombre del Reporte
		$this->Oficina->recursive = 1;
		$data = $this->Oficina->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}

}
