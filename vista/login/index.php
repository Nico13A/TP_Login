<?php
$Titulo = " Login ";
include_once("../estructura/cabeceraBTNoSegura.php");
$datos = data_submitted();
?>	

<link rel="stylesheet" href="../css/delahome.css">

<div class="row float-left">
    <div class="col-md-12 float-left mt-4">
      <?php 
      if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        echo "<h4 class='text-danger'>" . $datos['msg'] . "</h4>";
      }
     ?>
    </div>
</div> 

<br>
<br>
<br>

<div class="row float-right">

    <div class="col-md-12 float-right">
        
    </div>
</div>


<form method="post" action="verificarLogin.php" name="formulario" id="formulario">
    <input id="accion" name="accion" value="login" type="hidden">
    <div class="row mb-2">
        <div class="col-sm-6 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Usuario:</label>
                <div class="input-group">
                <input id="usnombre" name="usnombre" type="text" class="form-control" required >
                </div>
            </div>
        </div>
    </div>

   
    <div class="row mb-2">
        <div class="col-sm-6 ">
            <div class="form-group has-feedback">
                <label for="uspass" class="control-label">Contraseña:</label>
                <div class="input-group">
                <input id="uspass" name="uspass" type="password" class="form-control" required >
             </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6">
            <input type="button" class="btn btn-primary btn-block" value="Validar" onclick="formSubmit()">
        </div>
    </div>
	
</form>


<script>
    function formSubmit()
    {
        var password =  document.getElementById("uspass").value;
        //alert(password);
        var passhash = CryptoJS.MD5(password).toString();
        //alert(passhash);
        document.getElementById("uspass").value = passhash;

        setTimeout(function() { 
            document.getElementById("formulario").submit();

        }, 500);
    }
</script>
<?php
include_once("../estructura/pieBT.php");
?>