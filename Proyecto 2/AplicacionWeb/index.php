<?php
    session_start();
    require_once "./PHPLogin/loginTests.php";
    $correcto=false;
    $vista="";
    $_SESSION['mat'] = '';
    $_SESSION['contra'] = '';
    if(isset($_POST['submit'])) {
        $_SESSION['mat'] = $_POST['mat'];
        $_SESSION['contra'] = $_POST['contra'];
        $correcto = validarLogin();
        if ($correcto == true) {
            $vista = obtenerVista();
            header($vista);
        }else{
            echo "<script type = text/javascript>alert('Usuario no existe.')</script>";
            session_destroy();
        }
    }
?>

<html>
<body>
<form method="post" action ="">
    <label>Matricula:</label>
    <input type="text" name="mat" placeholder="Escriba su matricula" required>
    <br>
    <label>Contraseña:</label>
    <input type="password" name="contra" placeholder="Escriba su contraseña" required>
    <br>
    <input type="submit" value="Iniciar Sesión" name="submit">
    <br>
    <a href="nuevoUsuario.php">Crear nuevo Usuario?</a>
</form>
</body>
</html>
