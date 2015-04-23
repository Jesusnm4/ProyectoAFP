
<?php

include "./includes/conexion.php";
include "./includes/sesionStaff.php";


$Nomina="";
if(isset($_GET['Nomina'])){
  $Nomina=$_GET['Nomina'];
}

$date = date('Y-m-d');
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

    <div class="container span2 well">
      <div class="row">
         <form class="form-horizontal" action="registrarMetricas.php"  method="post">
            <fieldset>
              <legend> <center> Registrar Metricas del Alumno</center></legend>

               <!-- Fecha actual -->
              <div class="control-group" align="center">
                
                  <div class="controls">
                    <input type="hidden" class="input-xlarge"  name="date" placeholder="Date" value="<?=$date ?>" >
                  </div>
              </div>


              <!-- matricula del alumno -->
              <div class="control-group" align="center">
                  <div class="controls">
                    <input type="hidden" class="input-xlarge" id="matricula" name="matricula" placeholder="Matricula" value="<?=$Nomina ?>" >
                  </div>
              </div>

              <!-- Estatura del alumno -->
              <div class="control-group" align="center">
                <label for="estatura" class="control-label">Estatura</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" id="estatura" name="estatura" placeholder="Estatura" value="" >
                  </div>
              </div>


              <!-- Peso del alumno -->
              <div class="control-group" align="center">
                <label for="peso" class="control-label">Peso</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="peso" name="peso" placeholder="Peso" value="">
                </div>
              </div>

              <!-- % de grasa -->
                <div class="control-group" align="center">
                    <label for="pgrasa" class="control-label">% de Grasa</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="pgrasa" name="pgrasa" placeholder="% de Grasa" value="">
                    </div>
                </div>

                <!-- IMC -->
                <div class="control-group" align="center">
                    <label for="imc" class="control-label">I.M.C</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="imc" name="imc" placeholder="I.M.C" value="">
                    </div>
                </div>
              </div>
                <br>
              <!-- Botones de submit -->
              <div class="control-group" align="center">
                <br>
                <button type="submit" class="btn btn-success">Registrar</button>
                <a class="btn btn-default" href="pantallaIndexStaff.php" role="button">Cancelar</a>
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
