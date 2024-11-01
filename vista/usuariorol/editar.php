<?php
$Titulo = "Usuario Rol";
include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();

$objUsuarioRol = new ABMUsuarioRol();
//$listaUsuarioRol = $objUsuarioRol->buscar(null);

$listaTabla = [];
if (isset($datos['idusuario']) && $datos['idusuario'] <> -1) {
    $listaTabla = $objUsuarioRol->buscar($datos);
    if (count($listaTabla) == 1) {
        $obj = $listaTabla[0];
    }
}

$objRol = new ABMRol();
$listaRol = $objRol->buscar(null);

?>	

<div class="row float-left">
    <div class="col-md-12 float-left">
        <?php 
        if (isset($datos['msg']) && $datos['msg'] != null) {
            echo $datos['msg'];
        }
        ?>
    </div>
</div>

<h3 class="mt-4">ABM - Agregar Roles</h3>

<div class="row float-right">
    <div class="col-md-12 float-right">
        <?php 
        if (count($listaRol) > 0) {
            foreach ($listaRol as $rol) {
                echo '<a class="btn btn-success" role="button" href="accion.php?accion=nuevo_rol&idrol=' . $rol->getidrol() . '&idusuario=' . $datos['idusuario'] . '">Agregar Rol ' . $rol->getrodescripcion() . '</a>';
            }
        }
        ?>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Roles</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (count($listaTabla) > 0) {
            foreach ($listaTabla as $usuarioRol) {
                echo '<tr><td>' . $usuarioRol->getobjrol()->getidrol() . '</td>';
                echo '<td>' . $usuarioRol->getobjrol()->getrodescripcion() . '</td>';
                echo '<td><a class="btn btn-info" role="button" href="accion.php?accion=borrar_rol&idusuario=' . $usuarioRol->getobjusuario()->getidusuario() . '&idrol=' . $usuarioRol->getobjrol()->getidrol() . '">borrar</a></td></tr>';
            }
        }
        ?>
        </tbody>
    </table>
</div>

<a href="index.php">Volver</a>

<?php
include_once("../estructura/pieBT.php");
?>
