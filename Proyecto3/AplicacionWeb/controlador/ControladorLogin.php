<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/22/2018
 * Time: 11:27 PM
 */
require "../modelo/Usuario.php";
require "../modelo/Acceso.php";

session_start();
class ControladorLogin
{
    private $usuario;
    private $acceso;
    private $contrasena;

    /**
     * ControladorLogin constructor.
     */
    public function __construct()
    {
        $this->acceso = new Acceso();
        $this->usuario = new Usuario();
    }
    public function verificarUsuario()
    {
        $_SESSION['idUsuario'] = null;
        $correcta = false;
        $idUsuario = null;
        $nombre = $_POST['usuario'];
        $datosUsuario= $this->usuario->getBy("nombreUsuario",$nombre);
        if($datosUsuario!=null){
            $this->usuario->asignarDatos($datosUsuario);
            if(strcmp($this->usuario->getEstado(), '1') == 0) {
                $this->acceso->asignarIntentos($this->usuario->getClvUsuarios());
                if ($this->acceso->getIntentos() < 3) {
                    $this->contrasena = $_POST['contrasena'];
                    if (strcasecmp($this->usuario->getNombreUsuario(), $nombre) == 0) {
                        $correcta = $this->compararContra();
                        if ($correcta) {
                            echo "SI";
                            $idUsuario = $this->usuario->getClvUsuarios();
                            $_SESSION['idUsuario'] = $idUsuario;
                            $this->acceso->reiniciarIntentos();
                            header("Location: principal.php");
                        } else {
                            $idUsuario = $this->usuario->getClvUsuarios();
                            $this->acceso->intentoFallido();
                            echo "<script type = text/javascript>alert('Contraseña Incorrecta')</script>";
                        }
                    }
                } else {
                    $this->usuario->setEstado('0');
                    echo "<script type = text/javascript>alert('Usuario Bloqueado por Multiples intentos fallidos')</script>";
                }
            }
        }else{
            echo "<script type = text/javascript>alert('El usuario ingresado no existe')</script>";
        }
    }
    private function compararContra(){
        $return = false;
        $contrabd = $this->usuario->getContrasenaUsuario();
        $this->contrasena = hash('sha256', $this->contrasena);
        $contra = $this->contrasena.$this->usuario->getSal();
        if(strcmp($contra, $contrabd)==0){
            $return = true;
        }
        return $return;
    }
}