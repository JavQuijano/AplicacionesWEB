<?php
    session_start();
    require_once "../PHPLogin/loginTests.php";
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
<!-- Tony eres un genio-->
<html>
<head>
    <title>Mapa FMAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="Estilos/login.css"
          type="text/css"
    />
</head>
<body class ="align">


  <div id='stars'></div>
  <div id='stars2'></div>
  <div id='stars3'></div>

<div class="contenedor" >
    <header>
        <div class="logo">
            <a href="principal.php">
                <img src="Imagenes/logoFmat.png" class  ="logoPrincipal">
            </a>
        </div>
    </header>

        <div class="grid">

            <form action="" method="post" class="form login">

                <header class="login__header">
                    <h3 class="login__title">Login</h3>
                </header>

                <div class="login__body">

                    <div class="form__field">
                        <input type="text" name="mat" placeholder="Escriba su matricula" required>
                    </div>

                    <div class="form__field">
                        <input type="password" name="contra" placeholder="Escriba su contraseña" required>
                    </div>

                </div>

                <footer class="login__footer">
                    <input type="submit" value="Iniciar Sesiòn" name="submit">
                    <p>
                        <a href="nuevoUsuario.php">Crear nuevo Usuario</a>
                        <br>
                        <span class="icon icon--info">?</span><a href="#">Olvido su contraseña</a>
                    </p>
                </footer>

            </form>
        </div>
    <footer>
        <section class="links">
            <a href="principal.php">Inicio</a>
            <a href="Futuro.php">Proyectos</a>
            <a href="Equipo.php">Contacto</a>
        </section>

        <div class="social">
            <a href="https://www.facebook.com/matematicas.uady.mx/" ><img src="Imagenes/facebook.png" class="logos"></a>
            <a href="#"><img src= "Imagenes/twitter.png" class="logos"></a>
        </div>
    </footer>

</div>

</body>

</html>
