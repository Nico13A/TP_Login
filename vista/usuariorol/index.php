<?php
$Titulo = "Gestion de Usuarios";
include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();

$obj = new ABMUsuarioRol();
$lista = $obj->buscar(null);

$relaciones = [];
$idUsuariosAgregados = []; 

foreach ($lista as $usuarioRol) {
    $idUsuario = $usuarioRol->getObjUsuario()->getIdUsuario();
    if (!in_array($idUsuario, $idUsuariosAgregados)) {
        $relacion = [
            'idusuario' => $idUsuario,
            'usnombre' => $usuarioRol->getObjUsuario()->getUsNombre(),
        ];
        $relaciones[] = $relacion;
        $idUsuariosAgregados[] = $idUsuario; 
    }
}
?>


<h3 class="mt-4">ABM - Roles de Usuarios</h3>
<div class="row float-left">
    <div class="col-md-12 float-left">
        <?php 
        if (isset($datos) && isset($datos['msg']) && $datos['msg'] != null) {
            echo $datos['msg'];
        }
        ?>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($relaciones) > 0) {
                foreach ($relaciones as $relacion) {
                    echo '<tr>';
                    echo '<td>' . $relacion['idusuario'] . '</td>';
                    echo '<td>' . $relacion['usnombre'] . '</td>';
                    //echo '<td>' . $objTabla->getObjRol()->getRoDescripcion() . '</td>';
                    echo '<td><a class="btn btn-info" role="button" href="editar.php?accion=editar&idusuario=' . $relacion['idusuario'] . '">Roles</a></td>';
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once("../estructura/pieBT.php");
?>

