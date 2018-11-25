<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/22/2018
 * Time: 9:37 PM
 */

class ModeloBase extends EntidadBase
{
    private $table;
    private $fluent;

    public function __construct($table) {
        $this->table=(string) $table;
        parent::__construct($table);

        $this->fluent=$this->getConetar()->conexion();
    }

    public function fluent(){
        return $this->fluent;
    }

    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                    $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }

        return $resultSet;
    }


}