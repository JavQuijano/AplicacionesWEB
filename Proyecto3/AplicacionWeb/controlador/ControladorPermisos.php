<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/25/18
 * Time: 23:50
 */
require_once "../modelo/Permisos.php";
require_once "../modelo/Roles.php";
require_once "../modelo/Modulo.php";
class ControladorPermisos
{
    private $permisos;
    private $roles;
    private $modeloRoles;
    private $modulo;

    public function __construct()
    {
        $this->modulo = new Modulo('Permisos');
        $this->permisos = new Permisos();
        $this->modeloRoles = new Roles();
        $this->roles = $this->modeloRoles->tablaRoles();
    }

    public function pintarLineas()
    {
        foreach($this->roles as $rolTemporal)
        {
            echo "<tr>
                        <td>".$rolTemporal['nomRol']."</td>
                        <td>
                          <input type=\"checkbox\" id='agregar' name=\"".$rolTemporal['nomRol']."agregar\" value=\"Permiso1\" ".$this->esAgregar($rolTemporal['idRol'])."/>
                        </td>
                        <td>
                          <input type=\"checkbox\" id=\"eliminar\" name=\"".$rolTemporal['nomRol']."eliminar\" value=\"Permiso2\" ".$this->esEliminar($rolTemporal['idRol'])."/>
                        </td>
                        <td>
                          <input type=\"checkbox\" id=\"editar\" name=\"".$rolTemporal['nomRol']."editar\" value=\"Permiso3\" ".$this->esEditar($rolTemporal['idRol'])."/>
                        </td>
                      </tr>";
        }
    }
    public function editarPermisos()
    {
        $rolAux = new Roles();

        $tabla = $rolAux->tablaRoles();
        $tamanoTabla = sizeof($tabla);
        for($i=0;$i<$tamanoTabla;$i++)
        {
            $nomRol = $tabla[$i]["nomRol"];
            $idRol = $tabla[$i]["idRol"];

            if(!$rolAux->esAgregar($idRol))
            {

                if(isset($_POST[$nomRol.'agregar']))
                {
                    $rolAux->hacerAgregar($idRol);
                    $this->modulo->insertarEnBitacora('permiso agregado', 'rol '.$idRol.' es Agregar', $_SESSION['idUsuario']);
                }


            }
            else
            {
                if(!isset($_POST[$nomRol.'agregar']))
                {
                    $rolAux->quitarAgregar($idRol);
                    $this->modulo->insertarEnBitacora('permiso eliminado', 'rol '.$idRol.' no es Agregar', $_SESSION['idUsuario']);
                }
            }


            if(!$rolAux->esEliminar($idRol))
            {
                if(isset($_POST[$nomRol.'eliminar']))
                {
                    $rolAux->hacerEliminar($idRol);
                    $this->modulo->insertarEnBitacora('permiso agregado', 'rol '.$idRol.' es Eliminar', $_SESSION['idUsuario']);
                }


            }
            else
            {

                if(!isset($_POST[$nomRol.'eliminar']))
                {
                    $rolAux->quitarEliminar($idRol);
                    $this->modulo->insertarEnBitacora('permiso eliminado', 'rol '.$idRol.' no es Eliminar', $_SESSION['idUsuario']);
                }
            }

            if(!$rolAux->esEditar($idRol))
            {
                if(isset($_POST[$nomRol.'editar']))
                {
                    $rolAux->hacerEditar($idRol);
                    $this->modulo->insertarEnBitacora('permiso agregado', 'rol '.$idRol.' es Editar', $_SESSION['idUsuario']);
                }


            }
            else
            {

                if(!isset($_POST[$nomRol.'editar']))
                {
                    $rolAux->quitarEditar($idRol);
                    $this->modulo->insertarEnBitacora('permiso Eliminado', 'rol '.$idRol.' no es Editar', $_SESSION['idUsuario']);
                }
            }
        }
    }
    public function esAgregar($idRol)
    {
        $texto= "";
        if($this->modeloRoles->esAgregar($idRol))
        {
            $texto="checked";
        }
        return $texto;
    }
    public function esEliminar($idRol)
    {
        $texto= "";
        if($this->modeloRoles->esEliminar($idRol))
        {
            $texto="checked";
        }
        return $texto;
    }
    public function esEditar($idRol)
    {
        $texto= "";
        if($this->modeloRoles->esEditar($idRol))
        {
            $texto="checked";
        }
        return $texto;
    }
}