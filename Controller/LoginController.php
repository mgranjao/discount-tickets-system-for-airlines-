<?php

App::uses('AppController', 'Controller');
App::uses('Usuario', 'Model');
App::uses('OpXPer', 'Model');
App::uses('Opcione', 'Model');
App::uses('SupXOfi', 'Model');

/**
 * Asignaciones Controller
 *
 * @property Asignacione $Asignacione
 */
class LoginController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    //Plantilla
    var $layout = 'login';

    public function index($id = null) {

        $id = $this->Session->read('Usuario.USU_ID');
        if (isset($id)) {
            $this->redirect(array(
                "controller" => "asignacion",
                "action" => "paso1",
            ));
        } else {
            if ($this->request->is('post')) {

                $usuario = new Usuario();
                $email = $this->request->data['Usuario']['USU_EMAIL'];
                $password = $this->request->data['Usuario']['USU_PASSWORD'];

                $cond = array('AND' => array("Usuario.USU_EMAIL LIKE '$email'"));
                $list = $usuario->find('all', array('conditions' => $cond));


                if ($list) {
                    //echo ("'\"" . $fecha_hoy . "\"' between \"Residente.RES_FECHA_CARNE_EMIS\" AND \"Residente.RES_FECHA_EXPIRA\" ");
                    $cond = array('AND' => array("Usuario.USU_EMAIL LIKE '$email'", "Usuario.USU_PASSWORD LIKE '$password'"));
                    $list2 = $usuario->find('all', array('conditions' => $cond));
                    if ($list2) {
                        $SESSION['Usuario']['USU_ID'] = $list2[0]['Usuario']['USU_ID'];
                        $SESSION['Perfil']['PER_ID'] = $list2[0]['Usuario']['PER_ID'];
                        $SESSION['Usuario']['USU_EMAIL'] = $email;
                        $SESSION['Aerolinea']['AERO_ID'] = $list2[0]['Usuario']['AERO_ID'];
                        $this->Session->write('Usuario.USU_EMAIL', $email);
                        $this->Session->write('Usuario.USU_ID', $list2[0]['Usuario']['USU_ID']);
                        $this->Session->write('Perfil.PER_ID', $list2[0]['Usuario']['PER_ID']);
                        $this->Session->write('Aerolinea.AERO_ID', $list2[0]['Usuario']['AERO_ID']);
                        $this->Session->write('Usuario.OFI_ID', $list2[0]['Usuario']['OFI_ID']);

                        //Variables para imprimir en HTML
                        $_SESSION['html']['usuario']=$SESSION['Usuario']['USU_EMAIL'];
                        $_SESSION['html']['perfil']=$SESSION['Perfil']['PER_ID'];

                        if($list2[0]['Usuario']['PER_ID']=="1"){
                            $_SESSION['html']['aerolinea']=0;
                        }else{
                            $_SESSION['html']['aerolinea']=$list2[0]['Usuario']['AERO_ID'];
                        }

                        $cond = array('AND' => array("Configuracione.CONFIG_PARAMETRO = 'PasosAsignacion'"));
                        $pasos = $usuario->Aerolinea->ConfigXAero->Configuracione->find('all', array('conditions' => $cond));
                        foreach ($pasos as $p) {
                            $paso_config[$p['Configuracione']['CONFIG_ID']] = $p['Configuracione']['CONFIG_DESCRIPCION'];
                            $pasos_id_config_arr[$p['Configuracione']['CONFIG_ID']] = $p['Configuracione']['CONFIG_ID'];
                        }
                        $datos = $usuario->Aerolinea->read(null, $list2[0]['Usuario']['AERO_ID']);
                        foreach ($datos['ConfigXAero'] as $c) {
                            foreach ($pasos_id_config_arr as $pc) {
                                if ($c ['CONFIG_ID'] == $pc) {
                                    $pasos_selected_id = $c['CONFIG_ID'];                                    
                                    $id_config = $c['CONFIG_X_AERO_ID'];
                                }
                            }
                        }
                        $cond = array('AND' => array("Configuracione.CONFIG_ID = '$pasos_selected_id'"));
                        $config = $usuario->Aerolinea->ConfigXAero->Configuracione->find('all', array('conditions' => $cond));
                        
                        $this->Session->write('Configuracione.PasosAsignacion', $config[0]['Configuracione']['CONFIG_VALOR']);
                        
                        
                        if ($list2[0]['Usuario']['PER_ID'] == 1) {//Si es Administrador
                            $this->redirect(array(
                                "controller" => "administrador",
                                "action" => "index",
                            ));
                        }
                        if ($list2[0]['Usuario']['PER_ID'] == 2) {//Si es Counter
                            $this->redirect(array(
                                "controller" => "counter",
                                "action" => "index",
                            ));
                        }
                        if ($list2[0]['Usuario']['PER_ID'] == 3) {//Si es Supervisor
                            $sup_x_ofi = new SupXOfi();
                            $cond = array('AND' => array("SupXOfi.USU_ID = " . $list2[0]['Usuario']['USU_ID']));
                            $oficinas = $sup_x_ofi->find('all', array('conditions' => $cond));
                            $this->Session->write('SupXOfi.oficinas', $oficinas);

                            $this->redirect(array(
                                "controller" => "supervisor",
                                "action" => "index",
                            ));
                        }
                        if ($list2[0]['Usuario']['PER_ID'] == 4) {//Si es Conciliador
                            $this->redirect(array(
                                "controller" => "conciliador",
                                "action" => "index",
                            ));
                        }
                        if ($list2[0]['Usuario']['PER_ID'] == 5) {//Si es Reportes
                            $this->redirect(array(
                                "controller" => "reportes",
                                "action" => "index",
                            ));
                        }
                        if ($list2[0]['Usuario']['PER_ID'] == 6) {//Si es DGAC
                            $this->redirect(array(
                                "controller" => "dgac",
                                "action" => "index",
                            ));
                        }
                    } else {
                        $this->Session->setFlash(__('Credenciales incorrectas.'));
                    }
                } else {
                    $this->Session->setFlash(__('El correo electrónico no está registrado.'));
                }
            }
//        $residentes = $this->Asignacione->Residente->find('list');
//        $cupos = $this->Asignacione->Cupo->find('list');
//        $aerolineas = $this->Asignacione->Aerolinea->find('list');
            $this->set(compact('residentes', 'cupos', 'aerolineas'));
        }
    }

    public function logout() {

        $this->Session->delete('Usuario');
        $this->Session->delete('Perfil');
        $this->Session->delete('Aerolinea');
        $this->Session->delete('html');


        $this->redirect(array(
            "controller" => "login",
            "action" => "index",
        ));
    }

    public function islogged() {
        $perfil_id = $this->Session->read('Perfil.PER_ID');

        $pass = $this->params->params['pass'];
        $ruta = split("[/.-]", $pass[0]);


        if ($this->Session->read('Usuario.USU_ID')) {
            $opcion = new Opcione();
            $opxper = new OpXPer();


            $cond = array('AND' => array("upper(Opcione.OP_CONTROLADOR) LIKE upper('" . $ruta[count($ruta) - 2] . "')", "upper(Opcione.OP_ACCION) LIKE upper('" . $ruta[count($ruta) - 1] . "')"));
            $list = $opcion->find('all', array('conditions' => $cond));
            if (count($list) == 0) {
                $cond = array('AND' => array("upper(Opcione.OP_CONTROLADOR) LIKE upper('" . $ruta[count($ruta) - 3] . "')", "upper(Opcione.OP_ACCION) LIKE upper('" . $ruta[count($ruta) - 2] . "')"));
                $list = $opcion->find('all', array('conditions' => $cond));
                if (count($list) == 0) {
                    $cond = array('AND' => array("upper(Opcione.OP_CONTROLADOR) LIKE upper('" . $ruta[count($ruta) - 1] . "')", "upper(Opcione.OP_ACCION) LIKE upper('/')"));
                    $list = $opcion->find('all', array('conditions' => $cond));
                }
            }

            if ($list) {
                if (isset($perfil_id))
                    $cond = array('AND' => array("OpXPer.OP_ID =" . $list[0]['Opcione']['OP_ID'] . "", "OpXPer.PER_ID =" . $perfil_id . "")); //
                $list2 = $opxper->find('all', array('conditions' => $cond)); //
                if (count($list2) > 0) {
                    $logged = true;
                } else {
                    $this->Session->setFlash(__('El perfil no tiene permisos para acceder a la página seleccionada'));
                    //No tiene permiso
                    if ($perfil_id == 1)
                        $this->redirect(array(
                            "controller" => "administrador",
                            "action" => "index",
                            "?" => array(
                                "error" => 1
                                )));
                    if ($perfil_id == 2)
                        $this->redirect(array(
                            "controller" => "counter",
                            "action" => "index",
                            "?" => array(
                                "error" => 1
                                )));
                    if ($perfil_id == 3) {
                        $this->redirect(array(
                            "controller" => "supervisor",
                            "action" => "index",
                            "?" => array(
                                "error" => 1
                                )));
                    }
                    if ($perfil_id == 4) {
                        $this->redirect(array(
                            "controller" => "conciliador",
                            "action" => "index",
                            "?" => array(
                                "error" => 1
                                )));
                    }
                    if ($perfil_id == 5) {
                        $this->redirect(array(
                            "controller" => "reportes",
                            "action" => "index",
                            "?" => array(
                                "error" => 1
                                )));
                    }
                    if ($perfil_id == 6) {
                        $this->redirect(array(
                            "controller" => "dgac",
                            "action" => "index",
                            "?" => array(
                                "error" => 1
                                )));
                    }
                }
            } else {
                $this->Session->setFlash(__('Hubo un error al ingresar a la acción, comuníquese con el administrador del sistema'));
                //No existe la opcion
                if ($perfil_id == 1)
                    $this->redirect(array(
                        "controller" => "administrador",
                        "action" => "index",
                        "?" => array(
                            "error" => 2
                            )));
                if ($perfil_id == 2)
                    $this->redirect(array(
                        "controller" => "counter",
                        "action" => "index",
                        "?" => array(
                            "error" => 2
                            )));
                if ($perfil_id == 3) {
                    $this->redirect(array(
                        "controller" => "supervisor",
                        "action" => "index",
                        "?" => array(
                            "error" => 2
                            )));
                }
                if ($perfil_id == 4) {
                    $this->redirect(array(
                        "controller" => "conciliador",
                        "action" => "index",
                        "?" => array(
                            "error" => 2
                            )));
                }
                if ($perfil_id == 5) {
                    $this->redirect(array(
                        "controller" => "reportes",
                        "action" => "index",
                        "?" => array(
                            "error" => 2
                            )));
                }
                if ($perfil_id == 6) {
                    $this->redirect(array(
                        "controller" => "dgac",
                        "action" => "index",
                        "?" => array(
                            "error" => 2
                            )));
                }
            }
        }
        else
            $logged = false;

        if ($logged != true) {

            $this->redirect(array(
                "controller" => "login",
                "action" => "index",
            ));
        }
        return $logged;
    }

    public function error() {
        $error = $_GET['error'];
    }

}

