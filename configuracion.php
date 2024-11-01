<?php

header('Content-Type: text/html; charset=utf-8');
header ("Cache-Control: no-cache, must-revalidate ");

/////////////////////////////
// CONFIGURACION APP //
/////////////////////////////

date_default_timezone_set('America/Argentina/Buenos_Aires');

$PROYECTO ='TP5';

// Variable que almacena el directorio del proyecto.
$ROOT = $_SERVER['DOCUMENT_ROOT']."/".$PROYECTO."/";

include_once($ROOT . "utiles/funciones.php");

// Variable que define la pagina de autenticacion del proyecto.
$INICIO = "http://".$_SERVER['HTTP_HOST']."/$PROYECTO/vista/login/login.php";

$VISTA = "http://".$_SERVER['HTTP_HOST']."/$PROYECTO/vista/";

// Variable que define la pagina principal del proyecto (menu principal).
$PRINCIPAL = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/vista/home/index.php";


$GLOBALS['ROOT'] = $ROOT;

?>