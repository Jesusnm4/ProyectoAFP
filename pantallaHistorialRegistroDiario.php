
<?php
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

include "./includes/conexion.php";
include "./includes/sesionEstudiante.php";

if(isset($_SESSION['nomina'])){
  $Matricula_alumno = $_SESSION['nomina'];
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
                    <a href="pantallaIndexAdmin.php">
                       AFP
                    </a>
                </li>
                <li>
                    <a href="pantallaConsultarCitas.php">Mis Citas</a>
                </li>
                <li>
                    <a href="pantallaRegistroDiario.php">Registrar Ejercicio</a>
                </li>
                <li>
                    <a href="pantallaHistorialRegistroDiario.php">Historial Registro Diario</a>
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
                    <h1>Historial de Registro Diario</h1>
                    
                    
                      <?php 
                        
                            
                            echo "<table class=\"table table-striped table-hover  span2 well \">
                                  <thead>
                                    <tr>
                                      <th>Matricula</th>
                                      <th>Nombre</th>
                                      <th>Fecha</th>
                                      <th>Numero de Series</th>
                                      <th>Distancia</th>
                                      <th>Tiempo</th>
                                      <th>Pulsacion1</th>
                                      <th>Pulsacion3</th>
                                      <th>Borg</th>
                                      <th>Tipo</th>
                                    </tr>
                                  </thead>
                                  <tbody>";
                            
                            $sql="select
                                Matricula as matricula,
                                Nombre as nombre,
                                Num_Series as numseries,
                                Distancia as distancia,
                                Tiempo as tiempo,
                                Pulsacion_1 as pulsacion1,
                                Pulsacion_3 as pulsacion3,
                                Borg as borg,
                                registro_diario.Tipo as tipo
                              from
                                registro_diario,usuario
                              where Matricula = '$Matricula_alumno' and Nomina=Matricula";


                            $result = mysql_query($sql);
                            if($result === FALSE) {
                                die(mysql_error()); 
                            }

                            while($row = mysql_fetch_array($result)){
                                $Matricula=$row['matricula'];
                                $Nombre=$row['nombre'];
                                $Fecha=$date;
                                $NumSeries=$row['numseries'];
                                $Distancia=$row['distancia'];
                                $Tiempo=$row['tiempo'];
                                $Pulsacion1=$row['pulsacion1'];
                                $Pulsacion3=$row['pulsacion3'];
                                $borg=$row['borg'];
                                $tipo=$row['tipo'];

                                switch ($tipo) {
                                  case 'C':
                                      $tipo="Cardio";
                                      break;
                                  case 'F':
                                      $tipo = "Fuerza";
                                      break;
                                  case 'M':
                                      $tipo = "Mixto";
                                      break;
                              }

                                echo "  <tr>
                                <td>$Matricula</td>
                                <td>$Nombre</td>
                                <td>$Fecha</td>
                                <td>$NumSeries</td>
                                <td>$Distancia</td>
                                <td>$Tiempo</td>
                                <td>$Pulsacion1</td>
                                <td>$Pulsacion3</td>
                                <td>$borg</td>
                                <td>$tipo</td>
                                </tr>";
                          }

                          echo    "</tbody>
                                </table>";
                        

                    
                        
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
