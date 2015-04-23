
<?php

include "./includes/conexion.php";
include "./includes/sesionStaff.php";

if(isset($_GET['Nomina'])){
  $Matricula_alumno = $_GET['Nomina'];
}

$sql="select
    Matricula as matricula,
    Nombre as nombre,
    Email as email,
    Estatura as estatura,
    Peso as peso,
    PorcentajeGrasa as porcentajeGrasa,
    IMC as imc
  from
    medicion_alumno,usuario
  where Matricula = '$Matricula_alumno' and Nomina=Matricula";


$result = mysql_query($sql);
if($result === FALSE) {
  die(mysql_error()); // TODO: better error handling
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
$(function() {
$( "#datepicker" ).datepicker();
});
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
            <div class="container ">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                    <h1>Revisar metricas</h1>
                    <table class="table table-striped table-hover  span2 well ">
                        <thead>
                          <tr>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Estatura</th>
                            <th>Peso</th>
                            <th>Porcentaje Grasa</th>
                            <th>IMC</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                        
                          while($row = mysql_fetch_array($result)){
                            $Matricula=$row['matricula'];
                            $Nombre=$row['nombre'];
                            $Email=$row['email'];
                            $Estatura=$row['estatura'];
                            $Peso=$row['peso'];
                            $PorcentajeGrasa=$row['porcentajeGrasa'];
                            $IMC=$row['imc'];


                            echo "  <tr>
                            <td>$Matricula</td>
                            <td>$Nombre</td>
                            <td>$Email</td>
                            <td>$Estatura</td>
                            <td>$Peso</td>
                            <td>$PorcentajeGrasa</td>
                            <td>$IMC</td>
                            
                            </tr>";
                          }
                          ?>

                        </tbody>
                     </table>
                     <br><br>
                     <h4>Seleccione un día para ver el registro de ese día</h4>
                     <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="get">
                        <p>Fecha: <input type="text" name="date" id="datepicker"></p><br>
                        <input type="hidden" name="Nomina" value=<?php echo "$Matricula_alumno"; ?>>
                        <input class="btn btn-success" type="submit" value="Consultar">
                    </form><br><br>
                    
                          <?php 
                            if(isset($_GET["date"])){
                                $date = $_GET["date"];
                                $arr = explode('/', $date);
                                $date = $arr[2]."-".$arr[0]."-".$arr[1];
                                echo "<table class=\"table table-striped table-hover  span2 well \">
                                      <thead>
                                        <tr>
                                          <th>Matricula</th>
                                          <th>Nombre</th>
                                          <th>Email</th>
                                          <th>Estatura</th>
                                          <th>Peso</th>
                                          <th>Porcentaje Grasa</th>
                                          <th>IMC</th>
                                        </tr>
                                      </thead>
                                      <tbody>";
                                
                                $sql="select
                                    Matricula as matricula,
                                    Nombre as nombre,
                                    Email as email,
                                    Estatura as estatura,
                                    Peso as peso,
                                    PorcentajeGrasa as porcentajeGrasa,
                                    IMC as imc
                                  from
                                    medicion_alumno,usuario
                                  where Matricula = '$Matricula_alumno' and Nomina=Matricula";


                                $result = mysql_query($sql);


                                while($row = mysql_fetch_array($result)){
                                    $Matricula=$row['matricula'];
                                    $Nombre=$row['nombre'];
                                    $Email=$row['email'];
                                    $Estatura=$row['estatura'];
                                    $Peso=$row['peso'];
                                    $PorcentajeGrasa=$row['porcentajeGrasa'];
                                    $IMC=$row['imc'];


                                    echo "  <tr>
                                    <td>$Matricula</td>
                                    <td>$Nombre</td>
                                    <td>$Email</td>
                                    <td>$Estatura</td>
                                    <td>$Peso</td>
                                    <td>$PorcentajeGrasa</td>
                                    <td>$IMC</td>
                                    
                                    </tr>";
                              }

                              echo    "</tbody>
                                    </table>";
                            }
                            ?>

                       
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  
</body>
</html>
