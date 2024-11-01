<?php
$Titulo = " Login ";
include_once("../estructura/cabeceraBTNoSegura.php");
$datos = data_submitted();
$resp = false;
//Array ( [accion] => login [usnombre] => malapi [uspass] => d41d8cd98f00b204e9800998ecf8427e )
print_r($datos);

if (isset($datos['accion'])) {

    if ($datos['accion'] == "login") {
        $objSession = new Session();
        $resp = $objSession->iniciar($datos['usnombre'], $datos['uspass']);
        //$resp = $objSession->validar();
        if($resp) {
            //print_r($objSession);
            echo("<script>location.href = '../home/index.php';</script>");
        } else {
            $mensaje = "Error, vuelva a intentarlo";
            echo("<script>location.href = './index.php?msg=".$mensaje."';</script>");
        }

    }

    
    if ($datos['accion'] == "cerrar"){
        $objSession = new Session();
        $resp = $objSession->cerrar();
        if($resp) {
            $mensaje ="Vuelva... lo estaremos esperando...";
            echo("<script>location.href = './index.php?msg=".$mensaje."';</script>");
        }
    }
}
    

?>