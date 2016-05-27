<?php 
session_start();
require '../../vendor/autoload.php';

// disable DOMPDF's internal autoloader if you are using Composer
define('DOMPDF_ENABLE_AUTOLOAD', false);

// include DOMPDF's default configuration
require_once '../../vendor/dompdf/dompdf/dompdf_config.inc.php';

ob_start();
include_once('../../administrador/reporte.php');
$html = ob_get_clean();


$dompdf=new DOMPDF();
$dompdf -> load_html($html);
$dompdf -> render();
$dompdf -> stream("venta.pdf"); 

unset($_SESSION['carroD']);
unset($_SESSION['carroS']);
unset($_SESSION['carroS2']);
unset($_SESSION['carroS3']);

