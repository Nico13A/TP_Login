<?php
$Titulo = " Rol ";
include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();

$objC = new ABMRol();
$obj = NULL;
if (isset($datos['idrol']) && $datos['idrol'] <> -1) {
    $listaTabla = $objC->buscar($datos);
    if (count($listaTabla) == 1) {
        $obj = $listaTabla[0];
    }
}

?>	
<form method="post" action="accion.php" class="mt-4">
    <input id="idrol" name ="idrol" type="hidden" value="<?php echo ($obj !=null) ? $obj->getIdRol() : "-1"?>" readonly required >
    <input id="accion" name ="accion" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>" type="hidden">
    <div class="row mb-12">
        <div class="col-sm-12 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Nombre:</label>
                <div class="input-group">
                    <input id="rodescripcion" name="rodescripcion" type="text" class="form-control" value="<?php echo ($obj !=null) ? $obj->getRoDescripcion() : ""?>" required >
                </div>
            </div>
        </div>
    </div>
	
	<input type="submit" class="btn btn-primary btn-block" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>">
</form>
<a href="index.php">Volver</a>

<?php
include_once("../estructura/pieBT.php");
?>