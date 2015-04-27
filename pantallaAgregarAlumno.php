
<?php

include "./includes/conexion.php";
include "./includes/sesionStaff.php";

$nomina_profe="";
if (isset($_SESSION['nomina'])) {
    $nomina_profe = $_SESSION['nomina'];
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
            <div class="container span2 well">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                    <h1>Agregar alumno</h1>
                    <form class="form-horizontal" action='registrarAlumno.php' method="POST">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Favor de llenar los datos</legend>
                        </div>
                        <div class="control-group">
                          <!-- Username -->
                          <label class="control-label"  for="nomina">Nomina</label>
                          <div class="controls">
                            <input type="text" id="nomina" name="nomina" placeholder="" class="input-xlarge">
                          </div>
                        </div>
                     
                        <div class="control-group">
                          <!-- E-mail -->
                          <label class="control-label" for="nombre">Nombre</label>
                          <div class="controls">
                            <input type="text" id="nombre" name="nombre" placeholder="" class="input-xlarge">
                            <p class="help-block">Ingresar nombre completo.</p>
                          </div>
                        </div>
                     
                        <div class="control-group">
                          <!-- Password-->
                          <label class="control-label" for="email">Email</label>
                          <div class="controls">
                            <input type="email" id="email" name="email" placeholder="" class="input-xlarge">
                          </div>
                        </div>
                     
                        <div class="control-group">
                          <!-- Password -->
                          <label class="control-label"  for="password">Contraseña</label>
                          <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                          </div>
                        </div>

                        <div class="control-group">
                          <!-- Password -->
                          <label class="control-label"  for="password_confirm">Contraseña (Confirmación)</label>
                          <div class="controls">
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                          </div>
                        </div>
                        
                        <div class="control-group">
                          <!-- Password -->
                          <label class="control-label"  for="fechaNacimiento">FechaNacimiento</label>
                          <div class="controls">
                            <input type="text" id="fechaNacimiento" name="fechaNacimiento" placeholder="aaaa-mm-dd" class="input-xlarge">
                       </div>

                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" id="Tipo" name="Tipo" value='E'>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="hidden" id="Puede_Cita" name="Puede_Cita" value=0>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="hidden" id="profesor" name="profesor" value=<?=$nomina_profe ?>>
                                        </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="hidden" id="Cita_Disponible" name="Cita_Disponible" value=1>
                                        </div>


                        <br>
              
                            <button class="btn btn-success">Register</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  
</body>
</html>
