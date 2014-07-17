<?php

//$wsdl2=URL_WEBSERVICE."sise-servicio-1.0/CertificadoIndividualWsImpl?wsdl";
//$info_wsdl_poliza = new SoapClient($wsdl2);
//
//
//
//$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],
//	"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
//	"nro_pol"=>$_SESSION["poliza"]["nro_pol"],
//	"nro_aseg"=>"",
//	"nro_doc"=>$_POST["seleccionado"],
//	"campoin1"=>"",
//	"campoin2"=>"",
//	"campoin3"=>"",
//	"campoin4"=>"",
//	"campoin5"=>"");
//
//
//$coberturas=$info_wsdl_poliza->__soapCall('ws_sise_certificado_individual', $args);
//
//
//$this->tpl->coberturas=$coberturas->item;
//
//
//if(count($this->tpl->coberturas)!=0){
//	$ban=0;
//	foreach($this->tpl->coberturas as $key=>$value){
//		if((!(is_int($key)))&&($ban==0)){
//			$this->tpl->coberturas=array($this->tpl->coberturas);
//			$ban=1;
//		}
//	}	 
//}
//
//$seleccionado["nombre"]=texto($this->tpl->coberturas[0]->nombre);
//$seleccionado["apellido"]=texto($this->tpl->coberturas[0]->apellido1);
//$seleccionado["apellido2"]=texto($this->tpl->coberturas[0]->apellido2);
//$seleccionado["documento"]=$this->tpl->coberturas[0]->nroDocumento;
//
//
//
//
$codigo = '<html>Prueba</html>';


  
 

   if (!isset($GLOBALS["carateres_latinos"])){
      $todas = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES);
      $etiquetas = get_html_translation_table(HTML_SPECIALCHARS, ENT_NOQUOTES);
      $GLOBALS["carateres_latinos"] = array_diff($todas, $etiquetas);
   }
   $codigo = strtr($codigo, $GLOBALS["carateres_latinos"]);
   

$codigo = utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","64M");
$dompdf->render();
$dompdf->stream("certificado-individual_".$seleccionado["nombre"]."".$seleccionado["apellido"]."".$seleccionado["apellido2"].".pdf");
?>