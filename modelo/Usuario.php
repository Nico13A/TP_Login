<?php

class Usuario extends BaseDatos {

    //ATRIBUTOS
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDeshabilitado;
    private $mensajeOperacion;

    public function __construct() {
        parent::__construct();
        $this->idUsuario = "";
        $this->usNombre = "";
        $this->usPass = "";
        $this->usMail = "";
        $this->usDeshabilitado = null;
        $this->mensajeOperacion = "";
    }

    public function setear($idusuario, $usnombre, $uspass, $usmail, $usdeshabilitado) {
        $this->setIdUsuario($idusuario);
        $this->setUsNombre($usnombre);
        $this->setUsPass($uspass);
        $this->setUsMail($usmail);
        $this->setUsDeshabilitado($usdeshabilitado);
    }

    //SETTERS
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setUsNombre($usNombre)
    {
        $this->usNombre = $usNombre;
    }

    public function setUsPass($usPass)
    {
        $this->usPass = $usPass;
    }

    public function setUsMail($usMail)
    {
        $this->usMail = $usMail;
    }

    public function setUsDeshabilitado($usDeshabilitado)
    {
        $this->usDeshabilitado = $usDeshabilitado;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    // GETTERS
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getUsNombre()
    {
        return $this->usNombre;
    }

    public function getUsPass()
    {
        return $this->usPass;
    }

    public function getUsMail()
    {
        return $this->usMail;
    }

    public function getUsDeshabilitado()
    {
        return $this->usDeshabilitado;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function __toString() {
        return ("El id del usuario es: " . $this->getIdUsuario() . "\nEl nombre del usuario es: " . $this->getUsNombre() . "\nEl email del usuario es: " . $this->getUsMail() . "\nEl estado del usuario es: " . $this->getUsDeshabilitado() . "\n");
    }

    public function cargar() {
        $resp = false;
        $sql = "SELECT * FROM usuario WHERE idusuario = " . $this->getidusuario();
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if ($res >- 1) {
                if ($res > 0) {
                    $row = $this->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("Usuario->cargar: " . $this->getError());
        }
        return $resp;
    }

    public function insertar() {
        $resp = false;
        $sql = "INSERT INTO usuario(usnombre, uspass, usmail, usdeshabilitado)  VALUES ('" . $this->getusnombre() . "','" . $this->getuspass() . "','".$this->getusmail() . "',".$this->getusdeshabilitado() . ");";
        if ($this->Iniciar()) {
            if ($elid = $this->Ejecutar($sql)) {
                $this->setidusuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->insertar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->insertar: " . $this->getError());
        }
        return $resp;
    }

    public function modificar() {
        $resp = false;
        $sql = "UPDATE usuario SET usnombre='" . $this->getusnombre() . "' ,uspass='" . $this->getuspass() . "',usmail='".$this->getusmail() . "' ,usdeshabilitado='" . $this->getusdeshabilitado() . "'  " . " WHERE idusuario=" . $this->getidusuario();
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->modificar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->modificar: " . $this->getError());
        }
        return $resp;
    }

    public function eliminar() {
        $resp = false;
        $sql = "DELETE FROM usuario WHERE idusuario=" . $this->getidusuario();
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->eliminar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->eliminar: " . $this->getError());
        }
        return $resp;
    }

    public function listar($parametro = "") {
        $arreglo = array();
        $sql = "SELECT * FROM usuario ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if($res > -1) {
                if($res > 0) {
                    while ($row = $this->Registro()) {
                        $obj = new Usuario();
                        $obj->setIdUsuario($row['idusuario']);
                        $obj->cargar();
                        array_push($arreglo, $obj);
                    }
                }
            }
            else {
                $this->setmensajeoperacion("Usuario->listar: ".$this->getError());
            }
        }
        return $arreglo;
    }

}

?>