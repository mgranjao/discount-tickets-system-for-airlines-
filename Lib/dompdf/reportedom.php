<?php
	
require_once("dompdf_config.inc.php");

$codigo = '<html><table><tr><td>1</td><td>2</td></tr></table></html>';

$codigo = utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("ejemplo.pdf");

?>

