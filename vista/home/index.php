<?php
//include_once("../../control/Session.php");
$Titulo = "Inicio";

// Inicia la sesión y verifica si el usuario está logueado
/*
$objSession = new Session();
if ($objSession->validar()) {
    include_once("../estructura/cabeceraBT.php");
} else {
    include_once("../estructura/cabeceraBTNoSegura.php");
}
*/
include_once("../estructura/cabeceraBT.php");

?>

<link rel="stylesheet" href="../css/delahome.css">

<h1 class="text-success mt-3">TP Login</h1>
<p>La autenticación de un usuario, consiste en verificar su identidad. En las aplicaciones web
comúnmente se utiliza un login con algún dato que identifique a la persona como: nombre de usuario/
dni/dirección de mail... y una clave.</p>

<?php
include_once("../estructura/pieBT.php");
?>