
<?php
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

include "./includes/conexion.php";
include "./includes/sesionEstudiante.php";



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
                  <a href="pantallaIndexEstudiante.php">
                      AFP
                  </a>
              </li>
              <li>
                  <a href="pantallaAgendarCita.php">Agendar Cita</a>
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

    <div class="container span2 well">
      <div class="row">
         <form class="form-horizontal" action="registroDiario.php"  method="post">
            <fieldset>
              <legend> <center> Registrar Ejercicio del Dia</center></legend>

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

              <!-- Tipo de ejercicio -->
                <div class="control-group" align="center">
                    <label for="Tipo" class="control-label">Tipo de Ejercicio</label>
                    <br>
                    <select name="Tipo">
                        <option value="C">Cardio</option>
                        <option value="M">Mixto</option>
                        <option value="F">Fuerza</option>
                    </select>
                </div>


              <!-- # de series -->
              <div class="control-group" align="center">
                <label for="series" class="control-label">Numero de Series</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="series" name="series" placeholder="# de Series" value="">
                </div>
              </div>

              <!-- Distancia -->
                <div class="control-group" align="center">
                    <label for="distancia" class="control-label">Distancia</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="distancia" name="distancia" placeholder="Distancia" value="">
                    </div>
                </div>

                <!-- Tiempo -->
                <div class="control-group" align="center">
                    <label for="tiempo" class="control-label">Tiempo</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="tiempo" name="tiempo" placeholder="Tiempo" value="">
                    </div>
                </div>

                <!-- Pulsacion 1-->
                <div class="control-group" align="center">
                    <label for="puls1" class="control-label">Pulsacion 1</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="puls1" name="puls1" placeholder="Pulsacion 1" value="">
                    </div>

                    <!-- Pulsacion 3-->
                    <div class="control-group" align="center">
                        <label for="puls3" class="control-label">Pulsacion 3</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="puls3" name="puls3" placeholder="Pulsacion 3" value="">
                        </div>
                    </div>

                    <!-- BORG -->
                    <div class="control-group" align="center">
                        <label for="BORG" class="control-label">BORG</label>
                        <br>
                        <select name="BORG">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                        </select>
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
