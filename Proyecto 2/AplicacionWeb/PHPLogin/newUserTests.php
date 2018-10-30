<?php
define('FILE_USUARIOS', "./txtDatos/Usuarios");
define('FILE_SALES', "./txtDatos/Sales");
define('RUTA_TXT', './usuarios/');

function verificarInfo(){
    $contra = $_SESSION['contra'];
    $confContra = $_SESSION['confcontra'];
    $matricula = $_SESSION['mat'];
    if($contra != $confContra) {
        echo "<script type = text/javascript>alert('Contraseña no coincide.')</script>";
    }else {
        $verificacion = verificarRepeticion($matricula);
        if (!$verificacion) {
            $contraFinal = encriptarContrasena($contra);
            $data = generarData($matricula, $contraFinal);
            agregarAUsuarios($data);
            fopen(RUTA_TXT . $matricula . '.txt', 'w');
            echo "<script type='text/javascript'>alert('Usuario Agregado Correctamente.')</script>";
            header('Location: index.php');
        }else{
            echo "<script type='text/javascript'>alert('El usuario ya existe en el sistema')</script>";
        }
    }
}

function verificarRepeticion($matricula){
    $repeticion = false;
    $listaUsuario = file("./txtDatos/Usuarios");
    foreach ($listaUsuario as $user) {
        $variableUsuario = trim($user);
        $detallesUsuario = explode('|', $variableUsuario);
        if (strcmp($detallesUsuario[0], $matricula)==0) {
            $repeticion = true;
            break;
        }else{
            $repeticion = false;
        }
    }
    return $repeticion;
}

function encriptarContrasena($contra){
    $contraEncrip = hash('sha256', $contra);
    $sal = generarSal();
    $contraFinal = $contraEncrip.$sal;
    return $contraFinal;
}

function generarSal(){
    $sal = null;
    for($i = 0; $i < 56; $i++){
        $sal = mt_rand(0, 25625659);
    }
    agregarASales($sal);
    return $sal;
}

function agregarASales($sal){
    if($sal != null){
        $gestor = fopen(FILE_SALES, "a+");
        fwrite($gestor, $sal);
    }
    fwrite($gestor, PHP_EOL);
    fclose($gestor);
}

function generarData($matricula, $contraFinal){
    $data = null;
    $data = array(
        'matricula'=> $matricula,
        'contraFinal' => $contraFinal,
        'tipoUsuario' => 'u'
    );
    return $data;
}

function agregarAUsuarios($data){
    if(!empty($data)){
        $gestor = fopen(FILE_USUARIOS, "a+");
        fwrite($gestor, implode("|", $data));
    }
    fwrite($gestor, PHP_EOL);
    fclose($gestor);
}
