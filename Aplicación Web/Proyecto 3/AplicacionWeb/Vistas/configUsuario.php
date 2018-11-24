<?php
require "../PHPConfig/configUsuarioPHP.php";
require "../PHPLogin/detectarSesion.php";
?>
<html>
<head>
    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src = "JS/generarBoton.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/grid.css" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css.css">

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
            <a href="Futuro.php">Proyectos</a>
            <a href="Equipo.php">Contacto</a>
            <a href="configUsuario.php" id="btnConfig">Texto</a>
            <form method="post" action="">
                <input type="submit" name="cerrarSesion" value="CerrarSesion" id="botonLogin">
            </form>
        </nav>
    </header>
    <div class = "contenedor-centro" id = centro>
        <div class="container">
            <aside id = "sidebar">
              <table id="tabla" class="display">
              <thead>
                  <tr>
                      <th>Salones</th>
                      <th>Maestros</th>
                      <th>Favoritos</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>C1</td>
                      <td>Maestro</td>
                      <td>
                        <input type="radio" id='regular' name="optradio">
                      </td>
                  </tr>
                  <tr>
                    <td>C2</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C3</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C4</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C4</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C5</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C6</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C7</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C8</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>C9</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>D1</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>D2</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>D3</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>D4</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>F2</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>F3</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H1</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H2</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H3</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H4</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H5</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H6</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H7</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>H8</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC1</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC2</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC3</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC4</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC5</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC6</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC7</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC8</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
                  <tr>
                    <td>CC9</td>
                    <td>Maestro</td>
                    <td>
                      <input type="radio" id='regular' name="optradio">
                    </td>
                  </tr>
              </tbody>
          </table>
          <form method="post">
              <input type="submit" name="cambiarHorario"  value="Cambiar Horario">
          </form>
            </aside>
        </form>
        </section>
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

</body>
</html>
