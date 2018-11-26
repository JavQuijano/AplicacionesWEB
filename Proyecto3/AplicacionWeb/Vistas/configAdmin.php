<?php
require_once "../controlador/ControladorAdminHorarios.php";
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
    <script type="text/javascript" src = "JS/desplegartabla.js"></script>
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
            <a href="Roles.php">Roles</a>
            <a href="agregarPermisos.php">Permisos</a>
            <a href="Bitacora.php">Bitacora</a>
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
                  <th style="width:20%; text-align:left;">Salon</th>
                  <th style="width:10%; text-align:left;">Materia</th>
                  <th style="width:30%; text-align:left;">Horario Inicial</th>
                  <th style="width:30%; text-align:left;">Horario Final</th>
                  <th style="width:15%; padding:0;">Save</th>
                  <th style="width:15%; padding:0;">Delete</th>
                </tr>
              </thead>
              <tbody id="bodyTabla">
              <!--codigo generado por desplegatabla.js y despliegueAdmin.php-->
              </tbody>
            </table>
            <form method="post" action="">
                <label>Salon:</label>
                <input type="text" maxlength="3" id= "nombreSalon"placeholder="CC3" name="nombreSalon" required>
                <label>Materia:</label>
                <input type="text" maxlength="30" id="materia" placeholder="Matematicas" name="materia" required>
                <label>Hora Inicio:</label>
                <input type="text" maxlength="5" id="horaIncio"placeholder="00:00" name="horaInicio" required>
                <label>Hora Fin:</label>
                <input type="text" maxlength="5" id="horaFin"placeholder="00:00" name="horaFin" required>
                <br>
                <br>
                <input type="submit" value="Agregar Clase" name="submit" onclick="store()">
            </form>
        </aside>
        </div>
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

</div>
</body>
</html>
<link rel="stylesheet" type="text/css" href="Estilos/TablasAdmin.css">
