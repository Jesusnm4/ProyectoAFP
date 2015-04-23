<?php 
	require_once("includes/conexion.php"); 
	include "./includes/sesionStaff.php";

	$IdAgenda="";
	if(isset($_GET['IdAgenda'])){
		$IdAgenda=$_GET['IdAgenda'];
	}
	
	$sql = "DELETE FROM agenda WHERE IdAgenda = '$IdAgenda'";
	$result = mysql_query($sql);

	$sql3= "update usuario set Cita_Disponible= 1 where Nomina='$nomina'"; 
	$result = mysql_query($sql3);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaCalendarioCitas.php\"
				</script>";

	// A partir de aqui hay que eliminar las relaciones con las tablas de cursos
	// Y desinscribir al alumno del curso y con esto aumentar un espacio en el cupo del curso
?>