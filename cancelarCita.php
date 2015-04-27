
<?php 
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

	require_once("includes/conexion.php"); 
	include "./includes/sesionStaff.php";

	$Nomina="";
	if(isset($_GET['Nomina'])){
		$Nomina=$_GET['Nomina'];
	}
	
	$sql = "DELETE FROM agenda WHERE Matricula_Alumno = '$Nomina'";
	$result = mysql_query($sql);

	$sql3= "update usuario set Cita_Disponible= 1 where Nomina='$Nomina'"; 
	$result = mysql_query($sql3);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaTablaAgendarCita.php\"
				</script>";

	// A partir de aqui hay que eliminar las relaciones con las tablas de cursos
	// Y desinscribir al alumno del curso y con esto aumentar un espacio en el cupo del curso
?>