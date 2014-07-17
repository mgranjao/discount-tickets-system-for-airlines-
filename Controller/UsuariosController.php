<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {

     public $components = array('DataTable');
     var $layout = 'aerolineas';
/**
 * index method
 *
 * @return void
 */
	public function index() {
            if($this->RequestHandler->responseType() == 'json') {
           
            $this->paginate = array(
                'fields' => array('Usuario.USU_ID', 'Perfile.PER_NOMBRE', 'Aerolinea.AERO_NOMBRE' , 'Usuario.USU_NOMBRE_COMPLETO' , 'Usuario.USU_EMAIL' ,  'Usuario.USU_TELEFONO' ,  'Usuario.USU_DIRECCION' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Usuarios', $this->DataTable->getResponse());
            $this->set('_serialize','Usuarios');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->paginate());
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
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
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no pudo ser guardado. Por favor inténtelo nuevamente.'));
			}
		}
		$perfiles = $this->Usuario->Perfile->find('list');
		$aerolineas = $this->Usuario->Aerolinea->find('list');
		$this->set(compact('perfiles', 'aerolineas'));
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido actualizado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no pudo ser actualizado. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
		}
		$perfiles = $this->Usuario->Perfile->find('list');
		$aerolineas = $this->Usuario->Aerolinea->find('list');
                 $cond = array('OR' => array("Oficina.AERO_ID = ".$this->request->data['Usuario']['AERO_ID']));
                $oficinas = $this->Usuario->Oficina->find('list', array('conditions' => $cond));
                
                $cond = array('OR' => array("Usuario.USU_ID = '$id'"));
                $password = $this->Usuario->find('all', array('conditions' => $cond));
                $password =$password[0]['Usuario']['USU_PASSWORD'];
		
                $this->set(compact('perfiles', 'aerolineas','password', 'oficinas'));
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El usuario no pudo ser eliminado'));
		$this->redirect(array('action' => 'index'));
	}


         public function agentes_supervisor() {
        /******************************************************************************************* */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
         $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /**************************************************************************************** */
     
    }
    
    
    public function agentes_supervisor_json(){
      $oficinas = $this->Session->read('SupXOfi.oficinas');
      $arr = array();
      $str="";
      foreach ($oficinas as $ofi){
          $ofi['SupXOfi']['OFI_ID'];
          array_push($arr,$ofi['SupXOfi']['OFI_ID']);
          $str.=$ofi['SupXOfi']['OFI_ID'];
      }
        if($this->RequestHandler->responseType() == 'json') {
           
            if(count($arr)>1)
            $this->paginate = array(
                'conditions' => array('Usuario.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                       'Perfile.PER_ID =' => '2',
                                       'Usuario.OFI_ID =' => $arr),
                'fields' => array('Usuario.USU_ID', 'Usuario.USU_NOMBRE_COMPLETO', 'Usuario.USU_EMAIL' , 'Perfile.PER_NOMBRE', 'Oficina.OFI_CODIGO' ),
            );
        else {
            $this->paginate = array(
                'conditions' => array('Usuario.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                      'Perfile.PER_ID =' => '2',
                                       'Usuario.OFI_ID ' => $arr),
                'fields' => array('Usuario.USU_ID', 'Usuario.USU_NOMBRE_COMPLETO', 'Usuario.USU_EMAIL', 'Perfile.PER_NOMBRE', 'Oficina.OFI_CODIGO' ),
            );
            
        }
            $this->DataTable->emptyElements = 1;
            $this->set('Asignaciones', $this->DataTable->getResponse());
           
            $this->set('_serialize','Asignaciones');
            
            //$this->set(compact('residente');
        }
    }
    
    
    
    
    public function edit_agente($id = null) {
        /******************************************************************************************* */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /**************************************************************************************** */
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se ha actualizado'));
				$this->redirect(array('controller' => 'usuarios','action' => 'agentes_supervisor'));
			} else {
				$this->Session->setFlash(__('El usuario no pudo ser actualizado, inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
		}
		$perfiles = $this->Usuario->Perfile->find('list');
		$aerolineas = $this->Usuario->Aerolinea->find('list');
                 $cond = array('OR' => array("Oficina.AERO_ID = ".$this->request->data['Usuario']['AERO_ID']));
                $oficinas = $this->Usuario->Oficina->find('list', array('conditions' => $cond));
                
                $cond = array('OR' => array("Usuario.USU_ID = '$id'"));
                $password = $this->Usuario->find('all', array('conditions' => $cond));
                $password =$password[0]['Usuario']['USU_PASSWORD'];
		
                $this->set(compact('perfiles', 'aerolineas','password', 'oficinas'));
	}
    
    
        public function supervisores_json(){
      
        if($this->RequestHandler->responseType() == 'json') {
           
            $this->paginate = array(
                'conditions' => array(/*'Usuario.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),*/
                                      'Perfile.PER_ID =' => '3'),
                'fields' => array('Usuario.USU_ID','Aerolinea.AERO_NOMBRE','Usuario.USU_EMAIL', 'Perfile.PER_NOMBRE', 'Oficina.OFI_CODIGO' ),
            );
            
        
            $this->DataTable->emptyElements = 1;
            $this->set('Asignaciones', $this->DataTable->getResponse());
           
            $this->set('_serialize','Asignaciones');
            
        }
    }
    
    
    public function edit_supervisor($id = null) {
        /******************************************************************************************* */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /**************************************************************************************** */
		$this->Usuario->id = $id;
                
                
                $usuario_id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		
                $this->request->data = $this->Usuario->read(null, $id);
		
              if ($this->request->data['Usuario']['PER_ID']!= 3)//Si es que el perfil no es un supervisor
              {
                $this->Session->setFlash(__('El usuario seleccionado no pertenece al perfil "Supervisor"'));
		$this->redirect(array('controller' => 'supervisores','action' => 'index'));  
              }  
                
		
		
                $this->set(compact('usuario_id','oficinas'));
	}
        
        function oficinas_por_aerolinea() {//index.php/

        //$this->autoRender = false; //Descactiva Layout y Vista
        //$this->render(false); //Desactiva solo la vista y no el layout    
        $this->layout = false; // Desactiva solo el layout
        if(isset($_POST["usu"]))
        $this->request->data = $this->Usuario->read(null, $_POST["usu"]);    
            
        $id = $_POST["id"];
        $oficinas = $this->Usuario->Oficina->find('list', array('conditions' => array('OR' => array("Oficina.AERO_ID = ".$id))));

        $this->set(compact('oficinas'));
    }
    
    function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Usuarios_'.date("Y-m-d")); //Nombre del Reporte
		$this->Usuario->recursive = 1;
		$data = $this->Usuario->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
        
        
    function export_agentes_supervisor_xls() {
        $oficinas = $this->Session->read('SupXOfi.oficinas');
        $arr = array();
        $str = "";
        foreach ($oficinas as $ofi) {
            $ofi['SupXOfi']['OFI_ID'];
            array_push($arr, $ofi['SupXOfi']['OFI_ID']);
            $str.=$ofi['SupXOfi']['OFI_ID'].",";
        }
        $str = substr($str, 0, -1);
        $this->Session->write('Reporte.Nombre', 'Agentes_'.date("Y-m-d")); //Nombre del Reporte
		$this->Usuario->recursive = 1;
                $cond = array('AND' => array("Usuario.OFI_ID IN (".$str.")","Usuario.PER_ID = 2")); //Agentes de las Oficinas del Supervisor y perfil counter
		$data = $this->Usuario->find('all', array('conditions' => $cond));
		
		$this->set('rows',$data);
		$this->render('export_agentes_supervisor_xls','export_xls');

	}     
        
}
