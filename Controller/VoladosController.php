<?php
App::uses('AppController', 'Controller');
/**
 * Volados Controller
 *
 * @property Volado $Volado
 */
class VoladosController extends AppController {

    //Plantilla
    var $layout = 'aerolineas';
    

    public $components = array('DataTable');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Volado->recursive = 0;
		$this->set('volados', $this->paginate());
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

		$this->Volado->id = $id;
		if (!$this->Volado->exists()) {
			throw new NotFoundException(__('Invalid volado'));
		}
		$this->set('volado', $this->Volado->read(null, $id));
	}
        
        public function view_dgac($id = null) {
            /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        // $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

		$this->Volado->id = $id;
		if (!$this->Volado->exists()) {
			throw new NotFoundException(__('Invalid volado'));
		}
		$this->set('volado', $this->Volado->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 *
	public function add() {
		if ($this->request->is('post')) {
			$this->Volado->create();
			if ($this->Volado->save($this->request->data)) {
				$this->Session->setFlash(__('The volado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The volado could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *
	public function edit_conciliador($id = null) {
		$this->Volado->id = $id;
		if (!$this->Volado->exists()) {
			throw new NotFoundException(__('Invalid volado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Volado->save($this->request->data)) {
				$this->Session->setFlash(__('The volado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The volado could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Volado->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 *
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Volado->id = $id;
		if (!$this->Volado->exists()) {
			throw new NotFoundException(__('Invalid volado'));
		}
		if ($this->Volado->delete()) {
			$this->Session->setFlash(__('Volado deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Volado was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
 */       
        
        
    public function historial_volados() {

        $fecha_ini = "";
        $fecha_fin = "";
        if ($this->request->is('post')) {
            $fecha_ini = $this->request->data['Asignacione']['FECHA_INICIO']; //['year']."-".$this->request->data['Asignacione']['FECHA_INICIO']['month']."-".$this->request->data['Asignacione']['FECHA_INICIO']['day'];
            $fecha_fin = $this->request->data['Asignacione']['FECHA_FIN']; //['year']."-".$this->request->data['Asignacione']['FECHA_FIN']['month']."-".$this->request->data['Asignacione']['FECHA_FIN']['day'];
        }
        $this->set(compact('fecha_ini', 'fecha_fin'));

        if ($this->RequestHandler->responseType() == 'json') {

            if (isset($this->request->query['ini']) && isset($this->request->query['fin'])) { //si es que se envia los parametros de fecha de inicio y fecha fin
                $this->paginate = array(                   
                    'conditions' => array(
                        "(Volado.VOL_CONFIRMADO = true)",
                        "(Volado.VOL_FECHA_VUELO >= to_date('" . $this->request->query['ini'] . "','YYYY-MM-DD') AND Volado.VOL_FECHA_VUELO <= to_date('" . $this->request->query['fin'] . "','YYYY-MM-DD'))"
                    ),
                    'fields' => array('Volado.VOL_ID', 'Volado.VOL_COD_AERO', 'Volado.VOL_NUM_TICKET', 'Volado.VOL_CUPON', 'Volado.VOL_NUMERO_VUELO', 'Volado.VOL_FECHA_VUELO', 'Volado.VOL_CIUDAD_ORIGEN', 'Volado.VOL_CIUDAD_DESTINO', 'Volado.VOL_CODIGO_AUT', 'Volado.CONC_ID'),
                );
            } else {
                $this->paginate = array(
                    'conditions' => array(
                        "(Volado.VOL_CONFIRMADO = true)"
                    ),
                    'fields' => array('Volado.VOL_ID', 'Volado.VOL_COD_AERO', 'Volado.VOL_NUM_TICKET', 'Volado.VOL_CUPON', 'Volado.VOL_NUMERO_VUELO', 'Volado.VOL_FECHA_VUELO', 'Volado.VOL_CIUDAD_ORIGEN', 'Volado.VOL_CIUDAD_DESTINO', 'Volado.VOL_CODIGO_AUT', 'Volado.CONC_ID'),
                );
            }
            $this->DataTable->emptyElements = 3;
            $this->set('Oficinas', $this->DataTable->getResponse());
            $this->set('_serialize', 'Oficinas');
        }
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
         $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */

        $this->Volado->recursive = 0;
        $this->set('oficinas', $this->paginate());
    }

    function export_historial_volados_xls() {

        $this->Session->write('Reporte.Nombre', 'Historial_Volados_' . date("Y-m-d")); //Nombre del Reporte
        $this->Volado->recursive = 1;
        if (isset($_GET['ini']) && isset($_GET['fin']))
            if ($_GET['ini'] != "" && $_GET['fin'] != "") {
                $cond = array('AND' => array("(Volado.VOL_CONFIRMADO = true)","(Volado.VOL_FECHA_VUELO >= to_date('" . $_GET['ini'] . "','YYYY-MM-DD') AND Volado.VOL_FECHA_VUELO <= to_date('" . $_GET['fin'] . "','YYYY-MM-DD'))")); //Si es supervisor
                $data = $this->Volado->find('all', array('conditions' => $cond));
            }
            else{
                $data = $this->Volado->find('all', array('conditions' => array('AND' => array( "(Volado.VOL_CONFIRMADO = true)"))));}
        else{
            $data = $this->Volado->find('all', array('conditions' => array('AND' => array( "(Volado.VOL_CONFIRMADO = true)"))));}

        //print_r($data);
        $this->set('rows', $data);
        $this->render('export_historial_volados_xls', 'export_xls');
    }
    
    
}
