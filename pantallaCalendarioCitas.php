
<?php

include "./includes/conexion.php";
include "./includes/sesionAdmin.php";

if (isset($_SESSION['nomina'])) {
    $nomina_profe = $_SESSION['nomina'];
}

$count = 0;

//for para llenar los 10 dias habiles de los profesores, se excluyen sabdado y domingo en el if.
for( $i=0;$i<15;$i++){
  if(date("w", time() + (86400 * $i)) != 6 and  date("w", time() + (86400 * $i)) != 0){
    $arrFechas[$count] = date("Y-l-F-d-m", time() + (86400 * $i));
    $count++;
  }
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
    function valida(idagenda){
      if (confirm("¿Esta seguro?") == true) {
        window.location.href = "cancelarCita.php?IdAgenda="+idagenda;
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
                    <a href="pantallaRegistrarMetricas.php">Registrar Métricas</a>
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
              <h2>Calendario de citas</h2>             

                  <div class="agenda">
                      <div class="table-responsive">
                          <table class="table table-condensed table-bordered">
                              <thead>
                                  <tr>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Event</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <!-- Single event in a single day -->
                                  
                                  <!-- Dia 0 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[0]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[0]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[0]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              <?php 
                                                $sql="select
                                                    IdAgenda as idagenda,
                                                    Matricula_alumno as matricula,
                                                    Nombre as nombre,
                                                    Fecha as fecha,
                                                    Hora as hora
                                                  from
                                                    agenda,usuario
                                                  where Matricula_profe = '$nomina_profe' and Fecha = '$actual[0]-$actual[4]-$actual[3]'
                                                  and Hora = '10:00 AM' and Matricula_alumno = Nomina ";


                                                $result = mysql_query($sql);
                                              if($result === FALSE) {
                                                  die(mysql_error()); // TODO: better error handling
                                              }
                                                $row = mysql_fetch_array($result);
                                                $idagenda =  $row['idagenda'];
                                                echo "<I>".$row['matricula']." ".$row['nombre'] ."</I>";
                                                echo "<a onclick=\"valida('$idagenda')\" class='btn btn-danger btn-xs'>Cancelar</a>";


                                               ?>

                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 1 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[1]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[1]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[1]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 2 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[2]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[2]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[2]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 3 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[3]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[3]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[3]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 4 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[4]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[4]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[4]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 5 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[5]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[5]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[5]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 6 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[6]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[6]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[6]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 7 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[7]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[7]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[7]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 8 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[8]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[8]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[8]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 9 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[9]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[9]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[9]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  <!-- Dia 10 -->
                                  <tr>
                                      <td class="agenda-date" class="active" rowspan="1">
                                          <div class="dayofmonth"><?php $actual=explode('-',$arrFechas[10]); echo $actual[3];?></div>
                                          <div class="dayofweek"><?php $actual=explode('-',$arrFechas[10]); echo $actual[1];?></div>
                                          <div class="shortdate text-muted"><?php $actual=explode('-',$arrFechas[10]); echo $actual[2].", ".$actual[0];?></div>
                                      </td>
                                      <td class="agenda-time">
                                          10:00 AM
                                          <hr>
                                          10:30 AM
                                          <hr>
                                          11:00 AM
                                          <hr>
                                          11:30 AM
                                          <hr>
                                          12:00 PM
                                          <hr>
                                          12:30 PM
                                          <hr>
                                          1:00 PM
                                      </td>
                                      <td class="agenda-events">
                                          <div class="agenda-event">
                                              <i class="text-muted" title="Repeating event"></i> 
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                              <hr>
                                              A
                                          </div>
                                      </td>
                                  </tr>
                                  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  
</body>
</html>
