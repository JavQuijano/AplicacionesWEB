<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/24/18
 * Time: 12:11
 */
require_once "../modelo/Usuario.php";
require_once "../modelo/Modulo.php";
class ControladorFavoritos
{
    private $usuario;
    private $modulo;
    public function __construct($idUsuario)
    {
        $this->modulo = new Modulo('Favoritos');
        $this->usuario = new Usuario();
        $datosUsuario = $this->usuario->getBy('ClvUsuarios',$idUsuario);
        $this->usuario->asignarDatos($datosUsuario);
        $this->usuario->iniciarFavoritos();
    }

    public function actualizarFavoritos(){
        $arregloFav = $_POST['checkFav'];
        $this->usuario->actualizarFavoritos($arregloFav);
        $this->modulo->insertarEnBitacora('actualizo', 'actualizo favoritos', $this->usuario->getClvUsuarios());
    }

    public function getNombreFavoritos(){
        $salones = $this->usuario->getNombreFavoritos();
        return $salones;
    }
}