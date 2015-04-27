
<?php 
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

	require_once("includes/conexion.php"); 
	include "./includes/sesionStaff.php";


    $fecha="";
    if(isset($_GET['Fecha'])){
        $fecha=$_GET['Fecha'];
    }
    $hora="";
    if(isset($_GET['Hora'])){
        $hora=$_GET['Hora'];
    }
    $nomina="";
    if(isset($_GET['Nomina'])){
        $nomina=$_GET['Nomina'];
    }
    $matricula_profe="";
    if (isset($_SESSION['nomina'])) {
        $matricula_profe= $_SESSION['nomina'];
    }



    $fecha_aux = $fecha;
    $fecha_aux = strtotime($fecha_aux);
    $fecha_aux = date('Y-m-d', $fecha_aux);
    for($i=0; $i < 9 ; $i++){
        $sql = "INSERT INTO agenda ( Matricula_profe, Matricula_alumno, Fecha, Hora, Asistencia)
        VALUES
        ('$matricula_profe', '$nomina', '$fecha_aux', '$hora', 0) ";
        $result = mysql_query($sql);
        $fecha_aux = strtotime($fecha_aux);
        $fecha_aux = strtotime("+14 day", $fecha_aux);
        $fecha_aux = date('Y-m-d', $fecha_aux);
    }
	 $sql = "update usuario set Cita_Disponible= 0 where Nomina='$nomina'";
    $result = mysql_query($sql);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaTablaAgendarCita.php\"
				</script>";

	// A partir de aqui hay que eliminar las relaciones con las tablas de cursos
	// Y desinscribir al alumno del curso y con esto aumentar un espacio en el cupo del curso
?>