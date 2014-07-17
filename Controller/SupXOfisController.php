<?php

App::uses('AppController', 'Controller');

/**
 * SupXOfis Controller
 *
 * @property SupXOfi $SupXOfi
 */
class SupXOfisController extends AppController {

    public $components = array('DataTable');

    public function sup_x_ofi_json($id = null) {
        if ($this->RequestHandler->responseType() == 'json') {

            $this->paginate = array(
                'conditions' => array( 'SupXOfi.USU_ID =' => $id),
                'fields' => array('SupXOfi.OFI_ID', 'Oficina.OFI_CODIGO', 'Oficina.OFI_CIUDAD'),
            );

            $this->DataTable->emptyElements = 1;
            $this->set('Asignaciones', $this->DataTable->getResponse());

            $this->set('_serialize', 'Asignaciones');

        }
    }
    
    
    
    
    public function delete() {
        
        $usu_id = $_GET['usu_id'];
        $ofi_id = $_GET['ofi_id'];
        
        echo($usu_id." ".$ofi_id);
		/*if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}*/
        
                $cond = array('AND' => array("SupXOfi.USU_ID = ".$usu_id,"SupXOfi.OFI_ID = ".$ofi_id));
                $oficina = $this->SupXOfi->find('all', array('conditions' => $cond));
		
		if (count($oficina)<1) {
			throw new NotFoundException(__('Oficina no supervisada por el usuario'));
		}
                
                $this->SupXOfi->id = $oficina[0]['SupXOfi']['SUP_X_OFI_ID'];
		if ($this->SupXOfi->delete()) {
			$this->Session->setFlash(__('Supervisor desvinculado'));
			$this->redirect(array('controller' => 'usuarios','action' => 'edit_supervisor/'.$usu_id));
		}
		$this->Session->setFlash(__('El Supervisor no pudo ser desvinculado'));
		$this->redirect(array('controller' => 'usuarios','action' => 'edit_supervisor/'.$usu_id));
	}
        
        
        
        public function add() {
        $usu_id = $_GET['usu_id'];
        $ofi_id = $_GET['ofi_id'];
		if (isset($usu_id)&&isset($ofi_id)) {
			$this->SupXOfi->create();
                        $sup_x_ofi['SupXOfi']['USU_ID']=$usu_id;
                        $sup_x_ofi['SupXOfi']['OFI_ID']=$ofi_id;
			if ($this->SupXOfi->save($sup_x_ofi)) {
				$this->Session->setFlash(__('El Supervisor ha sido vinculado a la oficina'));
				$this->redirect(array('controller' => 'usuarios','action' => 'edit_supervisor/'.$usu_id));
			} else {
				$this->Session->setFlash(__('El Supervisor no pudo ser vinculado, inténtelo nuevamente'));
                                $this->redirect(array('controller' => 'usuarios','action' => 'edit_supervisor/'.$usu_id));
			}
		}
                $this->Session->setFlash(__('Hubo Errores al vincular el supervisor, inténtelo nuevamente'));
                $this->redirect(array('controller' => 'usuarios','action' => 'edit_supervisor/'.$usu_id));
	}
    
    

}
