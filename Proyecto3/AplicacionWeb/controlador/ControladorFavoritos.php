<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/24/18
 * Time: 12:11
 */
require_once "../modelo/Usuario.php";
class ControladorFavoritos
{
    private $usuario;
    public function __construct($idUsuario)
    {
        $this->usuario = new Usuario();
        $datosUsuario = $this->usuario->getBy('ClvUsuarios',$idUsuario);
        $this->usuario->asignarDatos($datosUsuario);
        $this->usuario->iniciarFavoritos();
    }

    public function actualizarFavoritos(){
        $arregloFav = $_POST['checkFav'];
        $this->usuario->actualizarFavoritos($arregloFav);
    }

    public function getNombreFavoritos(){
        $salones = $this->usuario->getNombreFavoritos();
        return $salones;
    }
}