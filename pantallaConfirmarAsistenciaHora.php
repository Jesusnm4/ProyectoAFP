  
<?php

include "./includes/conexion.php";
include "./includes/sesionStaff.php";

$nomina_profe="";
if (isset($_SESSION['nomina'])) {
    $nomina_profe = $_SESSION['nomina'];
}
$fecha="";
if(isset($_GET['Fecha'])){
    $fecha=$_GET['Fecha'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Administración</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="css/sidebar.css" media="screen">
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/bootswatch.js"></script>
  <script type="text/javascript" src="js/sidebar.js"></script>
  <script>
    function valida(idAgenda){
      if (confirm("¿Esta seguro?") == true) {
        window.location.href = "completarAsistencia.php?idAgenda="+idAgenda;
      }
    }
  </script>
  <script>
        function valida2(idAgenda){
            if (confirm("¿Esta seguro?") == true) {
                window.location.href = "eliminarAsistencia.php?idAgenda="+idAgenda;
            }
        }
  </script>

</head>
<body>
  <!-- Este div container es para la navigation bar de arriba -->


  <div class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">AFP</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav">
      </ul>
      
    </div>
  </div>



  <!-- Este div container es para el jumbotron de bienvenida -->
      <div id="wrapper">
        <div class="overlay"></div>

          <!-- Sidebar -->
          <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
              <ul class="nav sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="pantallaIndexProfesor.php">
                          AFP
                      </a>
                  </li>
                  <li>
                      <a href="pantallaAgregarAlumno.php">Agregar Alumno</a>
                  </li>
                  <li>
                      <a href="pantallaEliminarAlumno.php">Eliminar Alumno</a>
                  </li>
                  <li>
                      <a href="pantallaTablaModificarAlumnos.php">Modificar Alumno</a>
                  </li>
                  <li>
                      <a href="pantallaCompletarInduccion.php">Completar Inducción de Alumnos</a>
                  </li>
                  <li>
                      <a href="pantallaTablaRegistrarMetricas.php">Registrar Métricas</a>
                  </li>
                  <li>
                    <a href="pantallaTablaRevisarMetricas.php">Revisar Métricas</a>
                  </li>
                  <li>
                      <a href="pantallaCalendarioCitas.php">Calendario Citas</a>
                  </li>
                  <li>
                      <a href="pantallaConfirmarAsistencia.php">Confirmar Asistencia</a>
                  </li>

                  <li>
                      <a href="cerrarSesion.php">Cerrar sesión</a>
                  </li>
              </ul>
          </nav>
          <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8  ">
                        <div class="container ">
                           
                            <h1 align="center">Confirmar Asistencia</h1>
                            <h3 align="center">Marque la cita en la que quiere confirmar la asistencia del alumno.</h3>
                            <div class="panel panel-default">
                            <table class="table table-striped table-hover ">
                              <thead>
                                <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Matricula</th>
                                  <th>Nombre</th>
                                  <th>Confirmar Asistencia</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php
                            $sql="select
                                                    IdAgenda as idagenda,
                                                    Matricula_alumno as matricula,
                                                    Nombre as nombre,
                                                    Fecha as fecha,
                                                    Hora as hora,
                                                    Asistencia as asistencia
                                                  from
                                                    agenda,usuario
                                                  where Matricula_profe = '$nomina_profe' and Fecha = '$fecha' and Nomina=Matricula_Alumno";
                            $result = mysql_query($sql);
                            if($result === FALSE) {
                                die(mysql_error());
                            }
                            while($row = mysql_fetch_array($result)){
                              $hora = $row['hora'];
                              $matricula = $row['matricula'];
                              $nombre = $row['nombre'];
                              $asistencia = $row['asistencia'];
                              $idAgenda= $row['idagenda'];
                              echo "  <tr>
                                    <td>$fecha</td>
                                    <td>$hora</td>
                                    <td>$matricula</td>
                                    <td>$nombre</td>";
                                    if($asistencia==1){
                                    echo "<td><a onclick=\"valida2('$idAgenda')\" class='btn btn-danger btn-xs'>Eliminar Asistencia</a></td>";
                                    }else{
                                    echo "<td><a onclick=\"valida('$idAgenda')\" class='btn btn-success btn-xs'>Registrar Asistencia</a></td></tr>";
                                    }
                            }
                          ?>
                              </tbody>
                            </table>

                          </div>
            
                        </div>
                    </div>
                </div>
          </div>
          <!-- /#page-content-wrapper -->

      </div>
      <!-- /#wrapper -->
  
</body>
</html>


  