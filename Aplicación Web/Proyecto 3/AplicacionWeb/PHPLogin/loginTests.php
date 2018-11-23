<?php
@session_start();
/**
 * funcion validar login valida en el archivo de texto si el usuario existe o no dentro de nuestra base de datos.
 * @return boolean
 */
function validarLogin(){
    $return = false;
    $usuario = $_SESSION['mat'];
    $contra = encriptarContra($_SESSION['contra']);
    $listaUsuario = file("../txtDatos/Usuarios");
    $listaSal = file("../txtDatos/Sales");
    foreach ($listaSal as $sal) {
        $variableSal = trim($sal);
        $sales=explode("\n", $variableSal);
        foreach ($listaUsuario as $user) {
            $variableUsuario = trim($user);
            $detallesUsuario = explode('|', $variableUsuario);
            if ($detallesUsuario[0] == $usuario && $detallesUsuario[1] == $contra.$sales[0]) {
                $return = true;
                $tipo = $detallesUsuario[2];
                echo"<script type='text/javascript'>alert('$tipo')</script>";
                validarTipo($tipo);
                break;
            }
        }

    }
    return $return;
}

/**
 * Funcion para validar el tipo de usuario que desea entrar al sistema:
 * Admin o Usuario general, devuelve String como identificador de este usuario.
 */
function validarTipo($tipo){
    $variable = trim($tipo);
    $_SESSION['tipo']=null;
    if(strcmp($variable, 'a') == 0){
        $_SESSION['tipo']="admin";
        echo $_SESSION['tipo'];
    }else if (strcmp($variable, 'u')== 0){
        $_SESSION['tipo']="usuario";
    }
}

/**
 * la funcion determina la pagina a la que el usuario será enviado dependiendo de su estado.
 * @return null|string
 */
function obtenerVista(){
    $header = null;
    if($_SESSION['tipo'] == 'admin'){
        $header = "Location: principal.php";
        return $header;
    }else if($_SESSION['tipo'] == 'usuario'){
        $_SESSION['salones'] = "../usuarios/".$_SESSION['mat'] . ".txt";
        $header = "Location: principal.php";
        return $header;
    }else{
        echo"<script type='text/javascript'>alert('Error de Vista/Tipo de Usuario no registrado')</script>";
        return null;
    }
}

/**
 * @param $contra
 * pos la encripta para la compracion en .
 * @return string
 */
function encriptarContra($contra){
    $return = hash('sha256', $contra);
    return $return;
}