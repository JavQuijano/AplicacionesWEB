<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/26/18
 * Time: 20:00
 */
require_once "../controlador/ControladorHeader.php";
@session_start();
$idUsuario = $_SESSION['idUsuario'];
$controladorHeader = new ControladorHeader($idUsuario);
$controladorHeader->escribirBoton();
if(isset($_POST['cerrarSesion']))
{
    $controladorHeader->cerrarSesion();
}
if(isset($_POST['submit'])){
    $control = new ControladorAdminHorarios();
    $control->agregarHorario();
}
?>
<html>
<head>
    <script type="text/javascript">
        function store(){
            var inputNombreSalon = document.getElementById("nombreSalon");
            localStorage.setItem("nombreSalon", inputNombreSalon);
            var inputMateria = document.getElementById("materia");
            localStorage.setItem("materia",inputMateria);
            var inputHoraInicio = document.getElementById("horaInicio");
            localStorage.setItem("horaInicio",inputHoraInicio);
            var inputHoraFin = document.getElementById("horaFin");
            localStorage.setItem("horaFin",inputHoraFin);
        }

        function setStoredValues(){
            if(localStorage.length > 0) {
                var inputNombreSalon = document.getElementById("nombreSalon");
                inputNombreSalon.appendChild(localStorage.getItem('nombreSalon'));
                var inputMateria = document.getElementById("materia");
                inputMateria.appendChild(localStorage.getItem('materia'))
                var inputHoraInicio = document.getElementById("horaInicio");
                inputHoraInicio.appendChild(localStorage.getItem('horaInicio'))
                var inputHoraFin = document.getElementById("horaFin");
                inputHoraFin.appendChild(localStorage.getItem('horaFin'));
            }
        }
    </script>
    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/jquery.json.js"></script>
    <script type="text/javascript" src = "JS/generarBoton.js"></script>
    <script type="text/javascript" src = "JS/desplegarUsuarios.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/grid.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>
<body>
<script type="text/javascript">
    $(document).ready( function () {
        $('#tabla').DataTable();
    } );
</script>
<div class="contenedor">
    <header>
        <div class="logo">
            <a href="principal.php">
                <img src="Imagenes/logoFmat.png" class  ="logoPrincipal">
            </a>
        </div>

        <nav id = "">
            <a href="principal.php">Inicio</a>
            <a href="Equipo.php">Contacto</a>
            <a id='btnConfig' href=<?php echo $controladorHeader->obtenerDireccion()?>><?php echo $controladorHeader->obtenerTextoBoton()?></a>
            <form method="post" action="">
                <input type="submit" name="cerrarSesion" value="CerrarSesion" id="botonLogin">
            </form>
        </nav>
    </header>
    <div class = "contenedor-centro" id = centro>
        <div class="container">
            <aside id = "sidebar">
                <table id ="tabla" class="display">
                    <thead>
                    <tr>
                        <th style="width:20%; text-align:left;">Id</th>
                        <th style="width:20%; text-align:left;">Nombre</th>
                        <th style="width:10%; text-align:left;">Pregunta Seguridad</th>
                        <th style="width:30%; text-align:left;">Respuesta</th>
                        <th style="width:30%; text-align:left;">Estado</th>
                        <th style="width:15%; padding:0;">Save</th>
                    </tr>
                    </thead>
                    <tbody id="bodyTablaUser">
                    <!--codigo generado por desplegausuarios.js y despliegueusuarios.php-->
                    </tbody>
                </table>
            </aside>
        </div>
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

</div>
</body>
</html>
<link rel="stylesheet" type="text/css" href="Estilos/TablasAdmin.css">