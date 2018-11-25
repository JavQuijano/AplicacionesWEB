<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/23/18
 * Time: 19:03
 */

require_once "../modelo/Usuario.php";
class ControladorRecuperarMat
{
    private $modeloUsuario;

    /**
     *
     */
    public function verificarUsuario(){
        $this->modeloUsuario = new Usuario();
        $nombre = $_POST['mat'];
        $datosUsuario = null;
        try {
            $datosUsuario = $this->modeloUsuario->getBy("nombreUsuario", $nombre);
        }catch(Exception $e){
            $datosUsuario = null;
        }
        if($datosUsuario != null){
            $idUsuario = $datosUsuario['ClvUsuarios'];
            header("Location: recuperarContraseña.php?idUsuario=".$idUsuario);
        }else{
            echo "<script type = text/javascript>alert('El usuario ingresado no existe')</script>";
        }
    }
}