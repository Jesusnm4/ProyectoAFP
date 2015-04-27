
<?php
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

include "./includes/conexion.php";
include "./includes/sesionStaff.php";

$nomina_profe="";
if (isset($_SESSION['nomina'])) {
    $nomina_profe = $_SESSION['nomina'];
}

  $sql="select
      Nomina,
      Nombre,
      Email,
      FechaNacimiento
    from
      usuario
    where Tipo = 'E' and Profesor = '$nomina_profe' and Puede_Cita=1 and Cita_Disponible=1";

  $result = mysql_query($sql);

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
                    <a href="pantallaTablaAgendarCita.php">Agendar Citas</a>
                </li>
                <li>
                    <a href="pantallaCalendarioCitas.php">Calendario Citas</a>
                </li>
                <li>
                    <a href="pantallaConfirmarAsistencia.php">Confirmar Asistencia</a>
                </li>
                <li>
                    <a href="reporteAsistencias.php">Generar Reporte de Asistencias</a>
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
                <h1 align="center">Agendar Cita</h1>
                <table class="table table-striped table-hover ">
                  <thead>
                    <tr>
                      <th>Nomina</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Fecha de Nacimiento</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                   
                    while($row = mysql_fetch_array($result)){
                      $Nomina=$row['Nomina'];
                      $Nombre=$row['Nombre'];
                      $Email=$row['Email'];
                      $FechaNacimiento=$row['FechaNacimiento'];



                      echo "  <tr id=\"". $Nomina ."\">
                      <td>$Nomina</td>
                      <td>$Nombre</td>
                      <td>$Email</td>
                      <td>$FechaNacimiento</td>
                      <td><a href='pantallaAgendarCitas.php?Nomina=$Nomina' class='btn btn-success btn-xs'>Agendar Cita</a></td>
                      </tr>";
                    }
                    ?>

                  </tbody>
                </table>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  
</body>
</html>
