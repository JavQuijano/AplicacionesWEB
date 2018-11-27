<?php
    require_once "../controlador/ControladorRecuperarContra.php";
    $controlador = new ControladorRecuperarContra($_REQUEST['idUsuario']);
    if(isset($_POST["submit"])){
        $controlador->verificarDatos();
    }
?>
<!-- No puse el php de esta seccion porque no se como van a conectar la base de datos-->
<html>
<head>
    <title>Mapa FMAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
          href="Estilos/login.css"
          type="text/css"
    />
    <script>
        function store(){
            var inputRespuesta = document.getElementById("respuesta");
            localStorage.setItem("respuesta", inputRespuesta);

        }

        function setStoredValues(){
            if(localStorage.length > 0) {
                var inputRespuesta = document.getElementById("respuesta");
                inputRespuesta.appendChild(JSON.parse(localStorage.getItem('respuesta')));

            }
        }
    </script>
</head>
<body class ="align">
<script type="text/javascript">
    $(document).ready( function(){
        setStoredValues();
    });
</script>
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
                    <h3 class="login__title">Recuperar contraseña</h3>
                </header>

                <div class="login__body">

                    <div class="form__field">
                        <label><?php echo $controlador->getPregunta()->getPregunta()?></label>
                        <br><br/>
                        <input type="text" id ="respuesta" name="respuesta" placeholder="Respuesta Secreta ;)" required>

                        <input type="password" name="contra" placeholder="Contraseña nueva" required>
                        <input type="password" name="confcontra" placeholder="Repetir contraseña" required>
                    </div>

                </div>

                <footer class="login__footer">
                    <input type="submit" value="Cambiar contraseña" name="submit">

                </footer>
              </form>

        </div>
    <footer>
        <section class="links">
            <a href="principal.php">Inicio</a>
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
