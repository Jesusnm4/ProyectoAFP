
<?php 
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

	require_once("includes/conexion.php"); 
	include "./includes/sesionStaff.php";

	$nomina="";
	if(isset($_GET['nomina'])){
		$nomina=$_GET['nomina'];
	}
	
	$sql = "DELETE FROM usuario WHERE Nomina = '$nomina'";
	$result = mysql_query($sql);


    $sql = "DELETE FROM agenda WHERE Matricula_alumno = '$nomina'";
    $result = mysql_query($sql);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaEliminarAlumno.php\"
				</script>";

	// A partir de aqui hay que eliminar las relaciones con las tablas de cursos
	// Y desinscribir al alumno del curso y con esto aumentar un espacio en el cupo del curso
?>