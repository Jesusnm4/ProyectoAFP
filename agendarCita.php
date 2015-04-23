<?php 
	require_once("includes/conexion.php"); 
	include "./includes/sesionEstudiante.php";


    $fecha="";
    if(isset($_GET['Fecha'])){
        $fecha=$_GET['Fecha'];
    }
    $hora="";
    if(isset($_GET['Hora'])){
        $hora=$_GET['Hora'];
    }
    $nomina="";
    if (isset($_SESSION['nomina'])) {
        $nomina= $_SESSION['nomina'];
    }
    $sql2="select
                                                        Profesor
                                                      from
                                                        usuario
                                                      where Nomina = '$nomina'";


    $result2 = mysql_query($sql2);
    $row = mysql_fetch_array($result2);
    $matricula_profe= $row['Profesor'];
	$sql = "INSERT INTO agenda ( Matricula_profe, Matricula_alumno, Fecha, Hora, Asistencia)
	VALUES
	('$matricula_profe', '$nomina', '$fecha', '$hora', 0) ";
	$result = mysql_query($sql);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaAgendarCita.php\"
				</script>";

	// A partir de aqui hay que eliminar las relaciones con las tablas de cursos
	// Y desinscribir al alumno del curso y con esto aumentar un espacio en el cupo del curso
?>