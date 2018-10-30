<?php
session_start();
date_default_timezone_set('America/Mexico_City');

function bitacora($mensaje, $tipo){
    $fechahora = date("Y-m-d H:i:s");
    $data = array(
        'usuario'=> $_SESSION['mat'],
        'mensaje'=>$mensaje,
        'hora'=> $fechahora,
        'tipo'=>$tipo
    );
    if(!empty($data)){
        $gestor = fopen("./txtDatos/bitacora.txt", "a+");
        fwrite($gestor, implode("|", $data));
    }
    fwrite($gestor, PHP_EOL);
    fclose($gestor);
}