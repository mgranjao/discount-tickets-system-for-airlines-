<?php

App::uses('AppController', 'Controller');

/**
 * Aerolineas Controller
 *
 * @property Aerolinea $Aerolinea
 */
class AerolineasController extends AppController {

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
                'fields' => array('Aerolinea.AERO_ID','Aerolinea.AERO_NOMBRE', 'Aerolinea.AERO_PREFIJO', 'Aerolinea.AERO_USAR_TASAS' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Aerolineas', $this->DataTable->getResponse());
            $this->set('_serialize','Aerolineas');
        }
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
        $this->Aerolinea->recursive = 0;
        $this->set('aerolineas', $this->paginate());
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
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
        $cond = array('AND' => array("Configuracione.CONFIG_PARAMETRO = 'PasosAsignacion'"));
        $pasos = $this->Aerolinea->ConfigXAero->Configuracione->find('all', array('conditions' => $cond));
        foreach ($pasos as $p) {
            $paso_config[$p['Configuracione']['CONFIG_ID']] = $p['Configuracione']['CONFIG_DESCRIPCION'];
            $pasos_id_config_arr[$p['Configuracione']['CONFIG_ID']] = $p['Configuracione']['CONFIG_ID'];
        }
        if ($this->request->is('post')) {
            $this->Aerolinea->create();
            if ($this->Aerolinea->save($this->request->data)) {
                $arr['ConfigXAero']['AERO_ID'] = $this->Aerolinea->getID();
                $arr['ConfigXAero']['CONFIG_ID'] = $this->request->data['Aerolinea']['ASIGNACION_PASOS'];
                $this->Aerolinea->ConfigXAero->save($arr);
                $this->Session->setFlash(__('La aerolínea ha sido guardada'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La aerolínea no pudo ser guardada. Por favor inténtelo nuevamente.'));
            }
        }
        $this->set(compact('paso_config'));
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
        $this->Aerolinea->id = $id;
        $cond = array('AND' => array("Configuracione.CONFIG_PARAMETRO = 'PasosAsignacion'"));
        $pasos = $this->Aerolinea->ConfigXAero->Configuracione->find('all', array('conditions' => $cond));
        foreach ($pasos as $p) {
            $paso_config[$p['Configuracione']['CONFIG_ID']] = $p['Configuracione']['CONFIG_DESCRIPCION'];
            $pasos_id_config_arr[$p['Configuracione']['CONFIG_ID']] = $p['Configuracione']['CONFIG_ID'];
        }
        
        if (!$this->Aerolinea->exists()) {
            throw new NotFoundException(__('Invalid aerolinea'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Aerolinea->save($this->request->data)) {
                $this->Aerolinea->ConfigXAero->id = $this->request->data['Aerolinea']['CONFIG_X_AERO_ID'];
                $arr['ConfigXAero']['CONFIG_ID'] = $this->request->data['Aerolinea']['ASIGNACION_PASOS'];
                $this->Aerolinea->ConfigXAero->save($arr);
                $this->Session->setFlash(__('La Aerolínea se ha Actualizado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La aerolínea no pudo ser actualizada. Por favor inténtelo nuevamente..'));
            }
        } else {
            $this->request->data = $this->Aerolinea->read(null, $id);
        }

        $datos = $this->Aerolinea->read(null, $id);
        foreach ($datos['ConfigXAero'] as $c) {
            foreach ($pasos_id_config_arr as $pc) {
                if ($c ['CONFIG_ID'] == $pc) {
                    $pasos_selected = $c['CONFIG_ID'];
                    $id_config = $c['CONFIG_X_AERO_ID'];
                }
            }
        }
        $this->set(compact('paso_config', 'pasos_selected','id_config'));
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
       /* $this->Aerolinea->id = $id;
        if (!$this->Aerolinea->exists()) {
            throw new NotFoundException(__('Invalid aerolinea'));
        }
        $cond = array('AND' => array("ConfigXAero.AERO_ID = ".$id));
        $configs = $this->Aerolinea->ConfigXAero->find('all', array('conditions' => $cond));
        foreach ($configs as $c) {
            print_r($c);
            $this->Aerolinea->ConfigXAero->id = $c['ConfigXAero']['CONFIG_X_AERO_ID'];
            $this->Aerolinea->ConfigXAero->delete();
        }
        
        if ($this->Aerolinea->delete()) {
            $this->Session->setFlash(__('Aerolinea deleted'));
            $this->redirect(array('action' => 'index'));
        }*/
        $this->Session->setFlash(__('Las Aerolineas no pueden ser eliminadas'));
        $this->redirect(array('action' => 'index'));
    }

    
        
    function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Aerolíneas_'.date("Y-m-d")); //Nombre del Reporte
		$this->Aerolinea->recursive = 1;
		$data = $this->Aerolinea->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}

}
