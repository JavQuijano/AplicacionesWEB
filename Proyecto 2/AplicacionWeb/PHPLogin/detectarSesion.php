<?php
session_start();
if(empty($_SESSION['mat'])){
    echo "<script type='text/javascript'>alert('favor de iniciar sesion')</script>";
    header('Location: index.php');
}else{
    generarBoton();
}
if(isset($_POST['cerrarSesion'])){
    cerrarSesion();
}

function cerrarSesion(){
    foreach ($_SESSION as $valor){
        $valor = null;
    }
    session_destroy();
    session_abort();
    header("Location: index.php");
}
function generarBoton(){
    $tipo = $_SESSION['tipo'];
    echo "<script type='text/javascript'>window.onload = function(){generarBtn('$tipo')}</script>";
}
