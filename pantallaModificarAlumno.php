
<?php

include "./includes/conexion.php";
include "./includes/sesionStaff.php";

$nomina_profe="";
if (isset($_SESSION['nomina'])) {
    $nomina_profe = $_SESSION['nomina'];
}
$Nomina="";
if(isset($_GET['Nomina'])){
  $Nomina=$_GET['Nomina'];
}

$sql="select
Nomina,
Nombre,
Email,
Password,
FechaNacimiento
from
usuario
where Nomina = '$Nomina' and Profesor = '$nomina_profe'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result)){
  $Nomina = $row['Nomina'];
  $Nombre = $row['Nombre'];
  $FechaNacimiento=$row['FechaNacimiento'];
  $Password=$row['Password'];
  $Email = $row['Email'];
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
         <form class="form-horizontal" action="modificarAlumno.php"  method="post">
            <fieldset>
              <legend> <center> Modificar Datos del alumno</center></legend>

               <!-- matricula vieja del alumno -->
              <div class="control-group" align="center">
                
                  <div class="controls">
                    <input type="hidden" class="input-xlarge"  name="matriculaVieja" placeholder="Nombre" value="<?=$Nomina ?>" >
                  </div>
              </div>

                <!-- password vieja del alumno -->
                <div class="control-group" align="center">

                    <div class="controls">
                        <input type="hidden" class="input-xlarge"  name="passwordVieja" placeholder="Nombre" value="<?=$Password ?>" >
                    </div>
                </div>


              <!-- matricula del alumno -->
              <div class="control-group" align="center">
                <label for="matricula" class="control-label">Matricula</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" id="matricula" name="matricula" placeholder="Nombre" value="<?=$Nomina ?>" >
                  </div>
              </div>

              <!-- Nombre completo del alumno -->
              <div class="control-group" align="center">
                <label for="nombre" class="control-label">Nombre completo</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" id="nombre" name="nombre" placeholder="Nombre" value="<?=$Nombre ?>" >
                  </div>
              </div>

              <!-- contraseña del alumno -->
              <div class="control-group" align="center">
                <label for="password" class="ontrol-label">Contraseña</label>
                  <div class="controls">
                    <input type="password" class="input-xlarge" id="password" name="password" placeholder="Contraseña" value="">
                  </div>
              </div>
              <!--repetir contraseña del alumno -->
              <div class="control-group" align="center">
                <label for="password2" class="control-label">Repetir Contraseña</label>
                  <div class="controls">
                   <input type="password" class="input-xlarge" id="password2" name="password2" placeholder="Repetir Contraseña" value="">
                  </div>
              </div>

              <!-- email del alumno -->
              <div class="control-group" align="center">
                <label for="email" class="control-label">Email</label>
                <div class="controls">
                  <input type="email" class="input-xlarge" id="email" name="email" placeholder="example@mail.com" value="<?=$Email ?>">
                </div>
              </div>

              <!-- Fecha de nacimiento del alumno -->
              <div class="control-group" align="center">
                <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="fechaNacimiento" name="fechaNacimiento" placeholder="aaaa-mm-dd" value="<?=$FechaNacimiento ?>">
                </div>
              </div>
                <br>
                <small><center>*Si se dejan en blanco los campos de contraseña se queda la anterior.</center></small>
              <!-- Botones de submit -->
              <div class="control-group" align="center">
                <br>
                <button type="submit" class="btn btn-success">Actualizar</button>
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
