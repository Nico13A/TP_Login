<?php
$Titulo = " Gestion de Usuarios ";
include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();

$obj = new ABMUsuario();
$lista = $obj->buscar(null);

?>

<link rel="stylesheet" href="../css/delahome.css">

<h3 class="mt-4">ABM - Usuarios</h3>
<div class="row float-left">
    <div class="col-md-12 float-left">
    <?php 
    if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        echo $datos['msg'];
    }
    ?>
    </div>
</div>


<!-- <div class="row float-right">
    <div class="col-md-12 float-right">
        <a class="btn btn-success" role="button" href="editar.php?accion=nuevo&id=-1">Nuevo</a>
    </div>
</div> -->


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Desabilitado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
  
<?php
 if( count($lista)>0){
    foreach ($lista as $objTabla) {
        echo '<tr><td>'.$objTabla->getIdUsuario().'</td>';
        echo '<td>'.$objTabla->getUsNombre().'</td>';
        echo '<td>'.$objTabla->getUsMail().'</td>';
        $usDeshabilitado = $objTabla->getUsDeshabilitado();
        echo '<td>' . (($usDeshabilitado == null || $usDeshabilitado == '0000-00-00 00:00:00') ? "Habilitado" : $usDeshabilitado) . '</td>';
        echo '<td><a class="btn btn-info" role="button" href="editar.php?accion=editar&idusuario='.$objTabla->getIdUsuario().'">editar</a>';
        echo '<a class="btn btn-success" role="button" href="editar.php?accion=habilitar&idusuario='.$objTabla->getIdUsuario().'">habilitar</a>';
        echo '<a class="btn btn-primary" role="button" href="editar.php?accion=borrar&idusuario='.$objTabla->getIdUsuario().'">deshabilitar</a></td></tr>';
	}
}

?>
        </tbody>
    </table>
</div>


<?php

include_once("../estructura/pieBT.php");
?>