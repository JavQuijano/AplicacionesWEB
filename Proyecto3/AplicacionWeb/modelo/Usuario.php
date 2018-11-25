<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 3:53 PM
 */
require_once "../modelo/EntidadBase.php";
require_once "../modelo/Salon.php";
class Usuario extends EntidadBase
{
        private $ClvUsuarios;
        private $nombreUsuario;
        private $contrasenaUsuario;
        private $sal;

        private $estado;
        private $idTipo;

        private $favoritos;
        private $nombreFavoritos;

        private $idPregunta;

        private $respuesta;

        public function __construct()
        {
            $this->nombreFavoritos = array();
            $this->favoritos = array();
            $this ->sal = null;
            $table ="Usuarios";
            parent::__construct($table);

        }

    /**
     * @return array
     */
    public function getNombreFavoritos(): array
    {
        return $this->nombreFavoritos;
    }

    /**
     * @param array $nombreFavoritos
     */
    public function setNombreFavoritos(array $nombreFavoritos)
    {
        $this->nombreFavoritos = $nombreFavoritos;
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param mixed $nombreUsuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * @param mixed $idTipo
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;
    }


    public function getClvUsuarios()
    {
        return $this->ClvUsuarios;
    }


    public function setClvUsuarios($ClvUsuarios)
    {
        $this->ClvUsuarios = $ClvUsuarios;
    }
    public function asignarDatos($arregloDatos)
    {
        $this->setClvUsuarios($arregloDatos['ClvUsuarios']);
        $this->setNombreUsuario($arregloDatos['nombreUsuario']);
        $this->setContrasenaUsuario($arregloDatos['contrasenaUsuario']);
        $this->setSal($arregloDatos['sal']);
        $this->setEstado($arregloDatos['estado']);
    }
    public function getContrasenaUsuario()
    {
        return $this->contrasenaUsuario;
    }


    public function setContrasenaUsuario($contrasenaUsuario)
    {
        $this->contrasenaUsuario = $contrasenaUsuario;
    }


    public function getSal()
    {
        return $this->sal;
    }


    public function setSal($sal)
    {
        $this->sal = $sal;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    public function setEstado($estado)
    {
        $this->estado = $estado;
    }



    public function getFavoritos()
    {
        return $this->favoritos;
    }

    public function setFavoritos($favoritos)
    {
        $this->favoritos = $favoritos;
    }


    public function getIdPregunta()
    {
        return $this->idPregunta;
    }


    public function setIdPregunta($idPregunta)
    {
        $this->idPregunta = $idPregunta;
    }



    public function getRespuesta()
    {
        return $this->respuesta;
    }

    private function generarSal()
    {
            $this->sal = rand(1,100000000);
            $this->concatenarSalContraseña();

    }

    private function concatenarSalContraseña()
    {
        $this->contrasenaUsuario= $this->contrasenaUsuario.$this->sal;
    }

    public function encriptarContra($contra){
        $this->contrasenaUsuario = hash('sha256', $contra);
    }

    public function save()
    {
        if($this->sal === null) {
            $this->generarSal();
        }
        $query = "INSERT INTO usuarios VALUES
          (
            NULL,
            '$this->nombreUsuario',
            '$this->contrasenaUsuario',
            '$this->sal',
            '$this->estado');";
        $save = $this->runQuery($query);
        return $save;
    }

    public function cambiarContra($nuevaContra){
        $this->encriptarContra($nuevaContra);
        $this->generarSal();
        $updateContra = "UPDATE Usuarios SET contrasenaUsuario = '$this->contrasenaUsuario' WHERE nombreUsuario = '$this->nombreUsuario'";
        $this->runQuery($updateContra);
        $updateSal = "UPDATE Usuarios SET sal = '$this->sal' WHERE nombreUsuario = '$this->nombreUsuario'";
        $this->runQuery($updateSal);
    }

    public function actualizarFavoritos($arregloFav){
        $idSalones = array();
        foreach ($arregloFav as $salon){
            $nuevoSalon = $this->crearSalon('nombreSalon', $salon);
            $idSalon = $nuevoSalon->getClvSalon();
            array_push($idSalones, $idSalon);
        }
        try {
            $noFav = $this->getSalonesNoFavoritos($idSalones);
            foreach ($noFav as $no) {
                $this->eliminarFavorito($no);
            }
            foreach ($idSalones as $fav) {
                $this->agregarFavorito($fav);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function iniciarFavoritos(){
        $query = "SELECT Salon_idSalon FROM Favoritos WHERE Usuarios_idUsuarios = '$this->ClvUsuarios'";
        $resultSet = $this->runQuery($query);
        $idFavoritos = $resultSet->fetchAll();
        $idSalones = array();
        foreach ($idFavoritos as $id){
            if($id != null) {
                array_push($idSalones, $id['Salon_idSalon']);
            }
        }
        foreach ($idSalones as $ids){
            $salon = $this->crearSalon('ClvSalon', $ids);
            array_push($this->favoritos, $salon);
        }
        foreach($this->favoritos as $salones){
            array_push($this->nombreFavoritos, $salones->getNombreSalon());
        }
    }

    public function getSalonesNoFavoritos($arregloFav){
        try {
            $noFav = join(",", $arregloFav);
            $idSalones = null;
            $query = "SELECT * FROM Favoritos WHERE Usuarios_idUsuarios = '$this->ClvUsuarios' 
                  AND Salon_idSalon NOT IN ( " . implode(',', $arregloFav) . " );";
            $resultSet = $this->runQuery($query);
            $idSalones = $resultSet->fetchAll(PDO::FETCH_COLUMN, 1);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $idSalones;
    }

    private function crearSalon($columna, $salon){
        $nuevoSalon = new Salon();
        $datosSalon = $nuevoSalon->getBy($columna, $salon);
        $nuevoSalon->asignarDatos($datosSalon);
        return $nuevoSalon;
    }

    public function agregarFavorito($favorito){
        $salon = $this->crearSalon('ClvSalon',$favorito);
        $idSalon = $salon->getClvSalon();
        $query = "INSERT INTO favoritos VALUES
          ('$this->ClvUsuarios','$idSalon');";
        $this->runQuery($query);
    }

    public function eliminarFavorito($favorito){
        echo $favorito;
        $nuevoSalon =$this->crearSalon('ClvSalon', $favorito);
        $idSalon = $nuevoSalon->getClvSalon($favorito);
        $query = "DELETE FROM favoritos WHERE Usuarios_idUsuarios ='$this->ClvUsuarios'and Salon_idSalon ='$idSalon';";
        $this->runQuery($query);
        unset($this->favoritos[$favorito-1]);
        unset($this->nombreFavoritos[$favorito-1]);
    }

    public function encontrarRol()
    {
        $query ="SELECT * FROM usuarios_has_roles"." WHERE Usuarios_IdUsuarios = ".$this->getClvUsuarios();
        $PDO =$this->runQuery($query);
        $tablaRelacionRol = $PDO->fetchAll();
        $rol="";
        foreach($tablaRelacionRol as $relacionRol)
        {
            $queryRol= "SELECT * FROM roles WHERE idRol = ". $relacionRol['Roles_idRol'];
            $tabla = $this->runQuery($queryRol);
            $tablaRol = $tabla->fetch();
            if(strcmp($tablaRol['nomRol'],"usuario")==0 &&strcmp($rol,"admin")!=0)
            {
                $rol = "user";
            }
            if (strcmp($tablaRol['nomRol'],"admin")==0)
            {
                $rol ="admin";
            }

        }

        return $rol;
    }
    public function asignarRol($rol)
    {
        $query ="INSERT INTO usuarios_has_roles VALUES(".$this->getClvUsuarios().",".$rol.")";
        $this->runQuery($query);

    }

}