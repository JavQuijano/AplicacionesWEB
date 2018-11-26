<?php
@session_start();
require "../modelo/Usuario.php";
require "../modelo/Modulo.php";
class ControladorRoles
{
    private $usuarios;
    private $modulo;
    private $modeloUsuarios;
    /**
     * ControladorRoles constructor.
     */
    public function __construct()
    {
        $this->modulo = new Modulo('Roles');
        $this->modeloUsuarios = new Usuario();
        $this->usuarios = $this->modeloUsuarios->tablaUsuarios();
    }


    public function pintarLineas()
    {
        foreach($this->usuarios as $usuarioTemporal)
        {
            echo "<tr>
                        <td>".$usuarioTemporal['nombreUsuario']."</td>
                        <td>
                          <input type=\"checkbox\" id='admin' name=\"".$usuarioTemporal['nombreUsuario']."admin\" value=\"Permiso1\" ".$this->esAdmin($usuarioTemporal['ClvUsuarios'])."/>
                        </td>
                        <td>
                          <input type=\"checkbox\" id=\"user\" name=\"".$usuarioTemporal['nombreUsuario']."user\" value=\"Permiso2\" ".$this->esUser($usuarioTemporal['ClvUsuarios'])."/>
                        </td>
                      </tr>";
        }
    }
    public function editarRol()
    {
        $usuarioAux = new Usuario();

        $tabla = $usuarioAux->tablaUsuarios();
        $tamañoTabla = sizeof($tabla);
        for($i=0;$i<$tamañoTabla;$i++)
        {
            $nombreUsuario = $tabla[$i]["nombreUsuario"];
            $claveUsuario = $tabla[$i]["ClvUsuarios"];

                if(!$usuarioAux->esAdmin($claveUsuario))
                {

                    if(isset($_POST[$nombreUsuario.'admin']))
                    {
                        $usuarioAux->hacerAdmin($claveUsuario);
                        $this->modulo->insertarEnBitacora('rol añadido', 'usuario '.$claveUsuario.' es admin', $_SESSION['idUsuario']);
                    }


                }
                else
                    {
                        if(!isset($_POST[$nombreUsuario.'admin']))
                        {
                            $usuarioAux->quitarAdmin($claveUsuario);
                            $this->modulo->insertarEnBitacora('rol eliminado', 'usuario '.$claveUsuario.' no es admin', $_SESSION['idUsuario']);
                        }
                    }


                if(!$usuarioAux->esUser($claveUsuario))
                {
                    if(isset($_POST[$nombreUsuario.'user']))
                    {
                        $usuarioAux->hacerUser($claveUsuario);
                        $this->modulo->insertarEnBitacora('rol añadido', 'usuario '.$claveUsuario.' es usuario', $_SESSION['idUsuario']);
                    }


                }
                else
                {

                    if(!isset($_POST[$nombreUsuario.'user']))
                    {
                        $usuarioAux->quitarUser($claveUsuario);
                        $this->modulo->insertarEnBitacora('rol eliminado', 'usuario '.$claveUsuario.' no es usuario', $_SESSION['idUsuario']);
                    }
                }
            }



    }
    public function esAdmin($clvUsuario)
    {
        $texto= "";
        if($this->modeloUsuarios->esAdmin($clvUsuario))
        {
            $texto="checked";
        }
        return $texto;
    }
    public function esUser($clvUsuario)
    {
        $texto= "";
        if($this->modeloUsuarios->esUser($clvUsuario))
        {
            $texto="checked";
        }
        return $texto;
    }
}