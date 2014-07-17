<?php
App::uses('AppController', 'Controller');
//App::uses('lib/excel', 'Spreadsheet_Excel_Reader');
App::import('Vendor', 'Spreadsheet_Excel_Reader', array('file' => 'excel'.DS.'reader.php'));
/**
 * Residentes Controller
 *
 * @property Residente $Residente
 */
class ResidentesController extends AppController {

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
                /*'conditions' => array('Asignacione.AERO_ID =' => $this->Session->read('Aerolinea.AERO_ID'),
                                        'Autorizacion.EST_ID =' => '1',
                                       'Asignacione.USU_ID =' => $this->Session->read('Usuario.USU_ID')),*/
                'fields' => array('Residente.RES_ID','TipoColono.TIPO_NOMBRE', 'Residente.RES_NUMERO_CERTIFICADO', 'Residente.RES_CEDULA', 'Residente.RES_NOMBRES', 'Residente.RES_APELLIDOS' ),
            );
            $this->DataTable->emptyElements = 3;
            $this->set('Residentes', $this->DataTable->getResponse());
           
            $this->set('_serialize','Residentes');
            
        }
        
        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
            
		$this->Residente->recursive = 0;
		$this->set('residentes', $this->paginate());
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
		$this->Residente->id = $id;
		if (!$this->Residente->exists()) {
			throw new NotFoundException(__('Invalid residente'));
		}
		$this->set('residente', $this->Residente->read(null, $id));
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
			$this->Residente->create();
			if ($this->Residente->save($this->request->data)) {
				$this->Session->setFlash(__('El residente ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El residente no pudo ser guardado. Por favor inténtelo nuevamente.'));
			}
		}
		$tipoColonos = $this->Residente->TipoColono->find('list');
		$this->set(compact('tipoColonos'));
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
		$this->Residente->id = $id;
		if (!$this->Residente->exists()) {
			throw new NotFoundException(__('Invalid residente'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Residente->save($this->request->data)) {
				$this->Session->setFlash(__('El residente ha sido actualizado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El residente no pudo ser actualizado. Por favor inténtelo nuevamente.'));
			}
		} else {
			$this->request->data = $this->Residente->read(null, $id);
		}
		$tipoColonos = $this->Residente->TipoColono->find('list');
                
                $cond = array('OR' => array("Residente.RES_ID = ".$id));
                $residente = $this->Residente->find('all', array('conditions' => $cond));
                $residente_cupos = $residente[0]['Residente']['RES_CUPO_DISPONIBLE'];
                
		$this->set(compact('tipoColonos','residente_cupos'));
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
		$this->Residente->id = $id;
		if (!$this->Residente->exists()) {
			throw new NotFoundException(__('Invalid residente'));
		}
		if ($this->Residente->delete()) {
			$this->Session->setFlash(__('Residente eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El residente no pudo ser eliminado'));
		$this->redirect(array('action' => 'index'));
	}
        
        
        function export_xls() {
            $this->Session->write('Reporte.Nombre', 'Residentes_'.date("Y-m-d")); //Nombre del Reporte
		$this->Residente->recursive = 1;
		$data = $this->Residente->find('all');
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
        

        
        function cargar_xls() {
            //$this->autoRender = false;
            ini_set('max_execution_time', 300);
            
            if ($this->request->is('post') || $this->request->is('put')) {
                
            $data = new Spreadsheet_Excel_Reader();
            error_reporting(E_ALL ^ E_NOTICE);
		$data->setOutputEncoding("UTF-8");
                //$data->setOutputEncoding('UTF-16LE');

                $subirfinal=$this->request->data['Residente']['RES_ARCHIVO']['tmp_name'];
		$data->read($subirfinal);
		
                
                $no_actualizados = array();
                $no_insertados = array();
		for ($i = 2; $i <=$data->sheets[0]['numRows']; $i++) {
			
			$datos["nro_certificado"]=$data->sheets[0]['cells'][$i][1];
			$datos["cedula"]=$data->sheets[0]['cells'][$i][2];
			$datos["nombres"]=$data->sheets[0]['cells'][$i][3];
                        
                        /*
                        $nombrescompletos = explode(" ", trim($datos["nombres"]));
                        
                        
                        if($nombrescompletos[1]!="" || $nombrescompletos[1]!=" ")
                        {    
                        $apellidos = $nombrescompletos[0]." ".$nombrescompletos[1];
                        $nombres = $nombrescompletos[2]." ".$nombrescompletos[3]." ".$nombrescompletos[4]." ".$nombrescompletos[5]." ".$nombrescompletos[6]." ".$nombrescompletos[7];
                        }
                        else
                        {
                        $apellidos = $nombrescompletos[0]." ".$nombrescompletos[2];
                        $nombres = $nombrescompletos[3]." ".$nombrescompletos[4]." ".$nombrescompletos[5]." ".$nombrescompletos[66]." ".$nombrescompletos[7]." ".$nombrescompletos[8];   
                        }*/
                        $nombres =$datos["nombres"];
                        $apellidos="";
                        
                        $datos["fecha_nacimiento"]=$data->sheets[0]['cells'][$i][4];
                        if(trim($datos["fecha_nacimiento"])!=""){
			
                        $anio_nac = substr(trim($datos["fecha_nacimiento"]), 0, 4);
                        $mes_nac = substr(trim($datos["fecha_nacimiento"]), 4, 2);
                        $dia_nac = substr(trim($datos["fecha_nacimiento"]), 6, 2);
                        
                        if($mes_nac<=12)
                        $fecha_nac = "'".$anio_nac."-".$mes_nac."-".$dia_nac."'";
                        else
                        $fecha_nac = "'".$anio_nac."-".$dia_nac."-".$mes_nac."'";   
                        }
                        else
                        $fecha_nac="NULL";    
                        
                        
                        
			$datos["cupo_anual"]=$data->sheets[0]['cells'][$i][5];
			$datos["sexo"]=$data->sheets[0]['cells'][$i][6];
			
                        if($datos["sexo"]=="M")
                        $sexo=0;
                        elseif($datos["sexo"]=="F")
                        $sexo=1;
                        else
                        $sexo="";    
                        
                        
                        $datos["tipo_colono"]=$data->sheets[0]['cells'][$i][7];
                        if($datos["tipo_colono"]=="P")
                        $tipo_colono=1;
                        elseif($datos["tipo_colono"]=="T")
                        $tipo_colono=2;
                        
                        
                        
			$datos["fecha_emision_carne"]=$data->sheets[0]['cells'][$i][8];
                        
                        if(trim($datos["fecha_emision_carne"])!="")
                        {
                        $anio_emis = substr(trim($datos["fecha_emision_carne"]), 0, 4);
                        $mes_emis = substr(trim($datos["fecha_emision_carne"]), 4, 2);
                        $dia_emis = substr(trim($datos["fecha_emision_carne"]), 6, 2);
                        
                        if($mes_nac<=12)
                        $fecha_emis = "'".$anio_emis."-".$mes_emis."-".$dia_emis."'";
                        else
                        $fecha_emis = "'".$anio_emis."-".$dia_emis."-".$mes_emis."'";
                        }
                        else
                        $fecha_emis="NULL"; 
                        
			$datos["fecha_expira"]=$data->sheets[0]['cells'][$i][9];
			
                        if(trim($datos["fecha_expira"])!=""){
                        $anio_exp = substr(trim($datos["fecha_expira"]), 0, 4);
                        $mes_exp = substr(trim($datos["fecha_expira"]), 4, 2);
                        $dia_exp = substr(trim($datos["fecha_expira"]), 6, 2);
                        
                        if($mes_nac<=12)
                        $fecha_exp = "'".$anio_exp."-".$mes_exp."-".$dia_exp."'";
                        else
                        $fecha_exp = "'".$anio_exp."-".$dia_exp."-".$mes_exp."'";
                        }
                        else
                        $fecha_exp="NULL"; 
                        
                        
				
                                $insert=" INSERT INTO residentes (\"TIPO_ID\", \"RES_NUMERO_CERTIFICADO\", \"RES_CEDULA\", \"RES_NOMBRES\", \"RES_APELLIDOS\", \"RES_SEXO\", \"RES_FECHA_NACIMIENTO\", \"RES_FECHA_CARNE_EMIS\", \"RES_FECHA_EXPIRA\", \"RES_CUPO_DISPONIBLE\", \"RES_OBSERVACION\") VALUES
                                (".$tipo_colono.",".$datos["nro_certificado"].", '".$datos["cedula"]."', '".$nombres."', '".$apellidos."', '".$sexo."', ".$fecha_nac.", ".$fecha_emis.", ".$fecha_exp.", 0, '');";
                                
                                $residente['Residente']['TIPO_ID']=$tipo_colono;
                                $residente['Residente']['RES_NUMERO_CERTIFICADO']=$datos["nro_certificado"];
                                $residente['Residente']['RES_CEDULA']=$datos["cedula"];
                                $residente['Residente']['RES_NOMBRES']=$nombres;
                                $residente['Residente']['RES_APELLIDOS']=$apellidos;
                                $residente['Residente']['RES_SEXO']=$sexo;
                                $residente['Residente']['RES_FECHA_NACIMIENTO']=$fecha_nac;
                                $residente['Residente']['RES_FECHA_CARNE_EMIS']=$fecha_emis;
                                $residente['Residente']['RES_FECHA_EXPIRA']=$fecha_exp;
                                $residente['Residente']['RES_CUPO_DISPONIBLE']=0;
                                $residente['Residente']['RES_OBSERVACION']='';
                                
                                
                        $result = $this->Residente->crear_residente($insert,$residente);         
                        
                            if(strcmp ( (string)$result ,"Error-insert" ) == 0 )
                               array_push($no_insertados,$residente);
                            
                            if(strcmp ( (string)$result , "Error-update" ) == 0 )
                                array_push($no_actualizados,$residente);
                        
                }


                $this->Session->setFlash(__("No insertados:".count($no_insertados)."<br/>"."No actualizados:".count($no_actualizados)));
                $this->set(compact('no_insertados','no_actualizados'));
        	}


        /************************************************************************************** */
        //Verifica que el usuario haya iniciado sesion y el perfil al que pertenece tenga acceso a esta pagina
        $this->requestAction(array('controller' => 'login', 'action' => 'islogged'), array('pass' => array(Router::url("", true), 'vacio')));
        /************************************************************************************* */
            
        }
}
