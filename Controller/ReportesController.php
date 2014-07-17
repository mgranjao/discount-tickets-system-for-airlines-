<?php

App::uses('AppController', 'Controller');
App::uses('Asignacione', 'Model');
App::uses('Cupo', 'Model');
App::uses('Residente', 'Model');
App::uses('Usuario', 'Model');
App::uses('Conciliado', 'Model');
App::uses('Volado', 'Model');
App::uses('VoladosAct', 'Model');
App::uses('Tasa', 'Model');
App::uses('Aerolinea', 'Model');
App::uses('Catalogo', 'Model');
App::uses('Periodo', 'Model');
App::import('Vendor', 'dompdf_config.inc', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
//App::import('Vendor', 'Spreadsheet_Excel_Reader', array('file' => 'excel' . DS . 'reader.php'));
//require_once "helpers/dompdf/dompdf_config.inc.php";

/**
 * Aerolineas Controller
 *
 * @property Aerolinea $Aerolinea
 */
class ReportesController extends AppController {

    var $uses = array();

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        //Plantilla
        $this->layout =  'aerolineas';
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
    }

    public function reportes() {
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        $aerolineaModel = new Aerolinea();
        $aerolineas = $aerolineaModel->find('list');

        $periodoModel = new Periodo();
        $periodos = $periodoModel->find('list', array('order' => 'Periodo.PERI_FECHA_FIN DESC', 'conditions' => array('OR' => array("Periodo.PERI_CONFIRMADO_CONCILIADOR = true"))));

        $reportes[0] = 'Reporte Mensual';

        $this->set(compact('aerolineas', 'reportes', 'periodos'));

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data))
                $reporte = $this->request->data['DGAC']['REP_ID'];
            switch ($reporte) {
                case 0: $this->redirect(array('action' => 'reporte_volados_por_periodo.pdf', "?" => array(
                            "per_id" => $this->request->data['DGAC']['PERI_ID']
                            )));
                    break;
                case 1: break;

                default: break;
            }
        }
    }

    public function mi_cuenta($id = null) {
        $this->layout =  'aerolineas';
        /*         * ***************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * ************************************************************************************** */
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

        $user = $usuario->find('all', array('conditions' => array('OR' => array("Usuario.USU_ID = " . $id))));
        $perfil = $usuario->Perfile->find('all', array('conditions' => array('OR' => array("Perfile.PER_ID = " . $user[0]['Usuario']['PER_ID']))));
        $aerolinea = $usuario->Aerolinea->find('all', array('conditions' => array('OR' => array("Aerolinea.AERO_ID = " . $user[0]['Usuario']['AERO_ID']))));


        $cond = array('OR' => array("Usuario.USU_ID = '$id'"));
        $password = $usuario->find('all', array('conditions' => $cond));
        $password = $password[0]['Usuario']['USU_PASSWORD'];

        $this->set(compact('perfil', 'aerolinea', 'password', 'user'));
    }

    public function reporte_volados_por_periodo($id = null) {
        ini_set('max_execution_time', 300);
        $params = array(
            'download' => false,
            'name' => 'example.pdf',
            //'paperOrientation' => 'portrait',
            'paperOrientation' => 'landscape',
            //'paperSize' => 'legal'
            'paperSize' => 'a4'
        );
        $this->set($params);


        $per_id = $_GET['per_id'];
        $periodoModel = new Periodo();
        $periodoModel->id = $per_id;
        $periodo = $periodoModel->read(null, $per_id);

        
        if($periodo['Periodo']['AERO_ID'] != $this->Session->read('Aerolinea.AERO_ID'))
        {
             $this->Session->setFlash(__('EL período solicitado no corresponde a la aerolínea'));
             $this->redirect(array('action' => 'periodos'));
        }
            

        $vuelos = array();
        $total = 0;
        $i = 0;
        foreach ($periodo['Conciliado'] as $conciliado) {
            $voladoModel = new Volado();
            $voladoModel->id = $conciliado['VOL_ID'];
            $volado = $voladoModel->read(null, $conciliado['VOL_ID']);
            array_push($vuelos, $volado);
            $periodo['Conciliado'][$i]['Volado_ida'] = $volado;

            $catalogoModel = new Catalogo();
            $catalogoDetino = $catalogoModel->find('all', array('conditions' => array('AND' => array("Catalogo.CATAG_VALOR like '%" . trim($periodo['Conciliado'][$i]['Volado_ida']['Volado']['VOL_CIUDAD_DESTINO']) . "%'"))));
            $periodo['Conciliado'][$i]['Volado_ida']['Volado']['CatalogoDestino'] = $catalogoDetino;

            $voladoModel = new Volado();
            $voladoModel->id = $conciliado['VOL_VOL_ID'];
            $volado = $voladoModel->read(null, $conciliado['VOL_VOL_ID']);
            array_push($vuelos, $volado);
            $periodo['Conciliado'][$i]['Volado_retorno'] = $volado;

            $asignacionModel = new Asignacione();
            $asignacionModel->id = $conciliado['ASIG_ID'];
            $asignacion = $asignacionModel->read(null, $conciliado['ASIG_ID']);
            $periodo['Conciliado'][$i]['Asignacione'] = $asignacion;

            $total+=$periodo['Conciliado'][$i]['Volado_ida']['Volado']['CatalogoDestino'][0]['Catalogo']['CATAG_TARIFA'];

            $i++;
        }

        $this->set(compact('periodo', 'vuelos', 'total'));
    }

    
    function residente() {

        /*$cupoModel = new Cupo();
        $cuposTodo = $cupoModel->find('all');
        $cupos = array();
        foreach ($cuposTodo as $ct) {
            $cupos[$ct['Cupo']['CUPO_ID']] = $ct['Cupo']['CUPO_FECHA_DESDE'] . " / " . $ct['Cupo']['CUPO_FECHA_HASTA'];
        }*/

        if ($this->request->is('post') || $this->request->is('put')) {
            
            $residenteModel = new Residente();
            $cond = array('AND' => array("Residente.RES_CEDULA LIKE '".$this->request->data['DGAC']['RES_CEDULA']."'"));
            $list = $residenteModel->find('all', array('conditions' => $cond));

            if ($list) {
                
                   
                        $this->redirect(array('action' => 'vuelos_residente.pdf', "?" => array(
                                "res_cedula" => $this->request->data['DGAC']['RES_CEDULA']/* ,
                              "cupo" => $this->request->data['DGAC']['CUPO_ID'] */
                                )));
                    
            } else {
                $this->Session->setFlash(__('El residente no existe en la base de datos.'));
            }
        }
        $this->layout =  'aerolineas';
        $this->set(compact('cupos'));
    }

    
    function reporte_desglosado() {
        

        if ($this->request->is('post') || $this->request->is('put')) {
                                                                             
                        $this->redirect(array('action' => 'reporte_desglosado_periodos.pdf', "?" => array(
                                "anio_inicio" => $this->request->data['REPORTES']['FECHA_INI']['year'],
                                "anio_fin" => $this->request->data['REPORTES']['FECHA_FIN']['year']
                                )));
                    
            
        }
        
    }
    
    
    function reporte_desglosado_periodos() {
         ini_set('max_execution_time', 300);
        $params = array(
            'download' => false,
            'name' => 'reporte_desglosado_periodos.pdf',
            //'paperOrientation' => 'portrait',
            'paperOrientation' => 'landscape',
            //'paperSize' => 'legal'
            'paperSize' => 'a4'
        );
        $this->set($params);
        
       
          $anio_ini = $_GET['anio_inicio'];//$this->request->data['anio_inicio'];
          $anio_fin = $_GET['anio_fin'];//$this->request->data['anio_fin'];
          $aero_id = $this->Session->read('Aerolinea.AERO_ID');  
          
          $data = array();
          
          
          $volado = new Volado();
          
          $contador=0;
          for($i=$anio_ini; $i<=$anio_fin; $i++){
              
              //echo($i.'<br/>');
              $volado = new Volado();
              $t_anio = $volado->tarifa_total_por_anio($i, $aero_id);
              $data[$contador]['ANIO']['TOT'] = $t_anio[0][0];
              $data[$contador]['ANIO']['NUM'] = $i;
              for($mes=1; $mes<=12 ; $mes++){
                $t_meses = $volado->tarifa_total_mes_anio($i,$mes,$aero_id);
                if(isset($t_meses[0])){
                 $data[$contador]['ANIO']['MES'][$mes] = $t_meses[0][0];
                $data[$contador]['ANIO']['MES'][$mes]['NUM'] = $mes;
              }
              }
              
              
              $contador++;
          }
          
           
        $this->set(compact('data'));
    }
    
    
    function vuelos_residente() {
        $params = array(
            'download' => false,
            'name' => 'example.pdf',
            //'paperOrientation' => 'portrait',
            'paperOrientation' => 'landscape',
            //'paperSize' => 'legal'
            'paperSize' => 'a4'
        );
        $this->set($params);
        $voladoModel = new Volado();
        $data = $voladoModel->vuelos_residente($_GET['res_cedula']);
        $this->set(compact('data'));
    }

    
    function periodos_por_aerolinea() {//index.php/
        //$this->autoRender = false; //Descactiva Layout y Vista
        //$this->render(false); //Desactiva solo la vista y no el layout    
        $this->layout = false; // Desactiva solo el layout
        if (isset($_POST["usu"]))
            $this->request->data = $this->Usuario->read(null, $_POST["usu"]);

        $id = $this->Session->read('Aerolinea.AERO_ID');
        $periodoModel = new Periodo();
        $periodos = $periodoModel->find('list', array('conditions' => array('OR' => array("Periodo.AERO_ID = " . $id))));

        $this->set(compact('periodos'));
    }
    
    
    
    public function periodos() {
        $this->layout =  'aerolineas';
        /*         * ************************************************************************************ */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        //$this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /*         * *********************************************************************************** */
        $aerolineaModel = new Aerolinea();
        $aerolineas = $aerolineaModel->find('list');

        $periodoModel = new Periodo();
        $periodos = $periodoModel->find('list', array('order' => 'Periodo.PERI_FECHA_FIN DESC', 'conditions' => array('OR' => array("Periodo.PERI_CONFIRMADO_CONCILIADOR = true"))));

        $reportes[0] = 'Reporte Mensual';

        $aero_id  = $this->Session->read('Aerolinea.AERO_ID');
        $this->set(compact('aerolineas', 'reportes', 'periodos', 'aero_id'));

        /*if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data))
                //$reporte = $this->request->data['DGAC']['REP_ID'];
            switch ($reporte) {
                case 0: $this->redirect(array('action' => 'reporte_volados_por_periodo.pdf', "?" => array(
                            //"per_id" => $this->request->data['DGAC']['PERI_ID']
                            )));
                    break;
                case 1: break;

                default: break;
            }
        }*/
    }

}
