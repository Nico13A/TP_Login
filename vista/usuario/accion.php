<?php

include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();
$resp = false;
$objTrans = new ABMUsuario();
if (isset($datos['accion'])) {
    if (isset($datos['accion'])) {
        $resp = $objTrans->abm($datos);
        if ($resp) {
            $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
        } else {
            $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
        }
        echo("<script>location.href = './index.php?msg=$mensaje';</script>");
    }
}

?>