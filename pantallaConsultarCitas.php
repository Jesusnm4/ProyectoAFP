
<?php

include "./includes/conexion.php";
include "./includes/sesionEstudiante.php";

if(isset($_SESSION['nomina'])){
  $Matricula_alumno = $_SESSION['nomina'];
}


$sql="select
      Fecha as fecha,
      Hora as hora
    from
      agenda
    where Matricula_alumno = '$Matricula_alumno' ";
    $result = mysql_query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Estudiante</title>
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
                    <a href="pantallaIndexAdmin.php">
                       AFP
                    </a>
                </li>
                <li>
                    <a href="pantallaAgendarCita.php">Agendar Cita</a>
                </li>
                <li>
                    <a href="pantallaConsultarCitas.php">Mis Citas</a>
                </li>
                <li>
                    <a href="pantallaRegistroDiario.php">Registrar Ejercicio</a>
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
                    <h1 align="center">Mis Citas</h1>
                <table class="table table-striped table-hover ">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Hora</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while($row = mysql_fetch_array($result)){
                      $Fecha=$row['fecha'];
                      $Hora=$row['hora'];


                      echo "  <tr id=\"". $Nomina ."\">
                      <td>$Fecha</td>
                      <td>$Hora</td>
                      <td>$Email</td>
                      </tr>";
                    }
                    ?>

                  </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  
</body>
</html>
