<?php

App::uses('AppController', 'Controller');
App::uses('Asignacione', 'Model');
App::uses('Usuario', 'Model');

/**
 * Aerolineas Controller
 *
 * @property Aerolinea $Aerolinea
 */
class SupervisoresController extends AppController {

    var $layout = 'aerolineas';
    var $uses = array();

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
        
        
    }

   
    

    public function mi_cuenta($id = null) {
        /******************************************************************************************* */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /**************************************************************************************** */
        $usuario = new Usuario();
        $id = $this->Session->read('Usuario.USU_ID');
        $usuario->id = $id;
        if (!$usuario->exists()) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($usuario->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido actualizado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El usuario no pudo ser actualizado, inténtelo nuevamente.'));
            }
        } else {
            $this->request->data = $usuario->read(null, $id);
               }
       
        $user = $usuario->find('all',array('conditions' => array('OR' => array("Usuario.USU_ID = ".$id))));    
        $perfil = $usuario->Perfile->find('all',array('conditions' => array('OR' => array("Perfile.PER_ID = ".$user[0]['Usuario']['PER_ID']))));
        $aerolinea = $usuario->Aerolinea->find('all',array('conditions' => array('OR' => array("Aerolinea.AERO_ID = ".$user[0]['Usuario']['AERO_ID']))));
        
        
        $cond = array('OR' => array("Usuario.USU_ID = '$id'"));
        $password = $usuario->find('all', array('conditions' => $cond));
        $password = $password[0]['Usuario']['USU_PASSWORD'];

        $this->set(compact('perfil', 'aerolinea', 'password','user'));
    }

   
    function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Supervisores_'.date("Y-m-d")); //Nombre del Reporte
                $usuario = new Usuario();
		$usuario->recursive = 1;
                $cond = array('AND' => array("Usuario.PER_ID = 3")); //Si es supervisor
		$data = $usuario->find('all', array('conditions' => $cond));
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
    
}
