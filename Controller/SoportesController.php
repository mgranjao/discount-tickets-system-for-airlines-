<?php

App::uses('AppController', 'Controller');
App::import('Vendor', 'Swift', array('file' => 'swift'.DS.'swift_required.php'));
/**
 * Soportes Controller
 *
 * @property Soporte $Soporte
 */
class SoportesController extends AppController {


	  //public $components = array('DataTable');
     var $layout = 'aerolineas';
     public $uses = null;
     var $mailer, $message;

  /**
 * index method
 *
 * @return void
 */

	public function send() {

	
		
    

		if ($this->request->is('post')) {
					
					$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587)
  					->setUsername('bedomax@gmail.com')
  					->setPassword('T_Db1ppttMMp5jEuAM-cdg');

  					$this->mailer = Swift_Mailer::newInstance($transport);

  					$html="
  					<p>Hola Equipo Bedomax.com</p>
  					<p>
  					Adjunto mail de soporte del Sistema de Seguimiento de Colonos y Residentes Gal&aacute;pagos , el usuario
  					ingreso la siguiente informaci&oacute;
  					</p>
  					<p>
  					<b>Nombre del Usuario:</b> ".$this->request->data['Soporte']["nombre_usuario"]."<br>
  					<b>Email:</b> ".$this->request->data['Soporte']["email"]."<br>
  					<b>Teléfono:</b> ".$this->request->data['Soporte']["telefono"]."<br>
  					<b>Mensaje:</b> ".$this->request->data['Soporte']["mensaje"]."<br>
  					</p>

  					";

            $info_tecnica=str_replace("\n", "<br>", print_r($_SESSION, TRUE));
  					$html.="***********************<p>Información T&eacute;cnica: <br> ".$info_tecnica."</p>*************************";

    
            
    
             $html.="<p>Revisar si hay archivos adjuntos.</p>";
                
                $this->message = Swift_Message::newInstance("Sistema Aerolineas: Ticket Soporte Tecnico")
                ->setFrom(array("app@app.bedomax.com"=> "APP Bedomax"))
                ->setReplyTo(array("comercial@bedomax.com" => "APP Bedomax"))
                ->setTo(array("support@bedomax.com" => "Bedomax APP"))
                ->setBody($html, 'text/html', 'iso-8859-2');
          
              $this->upload_file();

    				$html.="<p>Resolver este bug directamente con el usuario.</p>";
    				
    				 if($this->mailer->send($this->message)){
    				 	 $this->Session->setFlash(__('Se envío el mensaje de correo a Soporte Técnico de Bedomax'));
    				 }else{
    				 	 $this->Session->setFlash(__('Error al enviar el correo'));
    				 }
           
            
    				
		}else{
			$this->Session->setFlash(__('Error al enviar el correo'));
		}



		$this->redirect('/');
	}
  

  private function upload_file(){

    
      //Subir Archivos

      try {
      // Undefined | Multiple Files | $_FILES Corruption Attack
      // If this request falls under any of them, treat it invalid.
      if (
          !isset($this->request->data['Soporte']['archivo']['error']) ||
           is_array($this->request->data['Soporte']['archivo']['error'])
      ) {
          throw new RuntimeException('Invalid parameters.');
      }

    // Check $_FILES['upfile']['error'] value.
    switch ($this->request->data['Soporte']['archivo']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here.
    if ($this->request->data['Soporte']['archivo']['size'] > 10000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($this->request->data['Soporte']['archivo']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf',
            'doc' => 'application/doc'
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.

    $nombre_archivo_subido='../tmp/logs/'.sha1_file($this->request->data['Soporte']['archivo']['tmp_name']).'.'.$ext;

    if (!move_uploaded_file(
        $this->request->data['Soporte']['archivo']['tmp_name'],$nombre_archivo_subido)) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    //echo 'File is uploaded successfully.';


      $this->message->attach(Swift_Attachment::fromPath($nombre_archivo_subido));

    } catch (RuntimeException $e) {

    //echo $e->getMessage();

    }



            //Fin de Subida



  }

}
