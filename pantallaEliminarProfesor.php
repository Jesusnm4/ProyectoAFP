  
<?php
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

include "./includes/conexion.php";
include "./includes/sesionAdmin.php";
  
  $sql="select
        Nomina,
        Nombre
      from
        usuario
      where Tipo = 'P'";

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
  <script>
    function valida(Nomina){
      if (confirm("¿Esta seguro?") == true) {
        window.location.href = "eliminarProfesor.php?nomina="+Nomina;
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
                    <a href="pantallaIndexAdmin.php">
                       AFP
                    </a>
                </li>
                <li>
                    <a href="pantallaAgregarProfesor.php">Agregar Profesor</a>
                </li>
                <li>
                    <a href="pantallaEliminarProfesor.php">Eliminar Profesor</a>
                </li>
                <li>
                    <a href="confirmacionBorrarBD.php">Limpiar Base de Datos</a>
                </li>
                <li>
                    <a href="pantallaContacto.php">Contact</a>
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
                           
                            <h1 align="center">Eliminar Profesores</h1>
                            
                            <div class="panel panel-default">
                            <table class="table table-striped table-hover ">
                              <thead>
                                <tr>
                                  <th>Nomina</th>
                                  <th>Nombre</th>
                                  <th>Eliminar</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php

                            while($row = mysql_fetch_array($result)){
                              $Nomina = $row['Nomina'];
                              $Nombre = $row['Nombre'];
                              echo "  <tr>
                                    <td>$Nomina</td>
                                    <td>$Nombre</td>
                                    <td><a onclick=\"valida('$Nomina')\" class='btn btn-danger btn-xs'>Baja</a></td>
                                  </tr>";
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


  