<?php 
	require_once("includes/conexion.php"); 
	$nomina="";
	if(isset($_GET['nomina'])){
		$nomina=$_GET['nomina'];
	}
	
	$sql = "DELETE FROM usuario WHERE Nomina = '$nomina'";
	$result = mysql_query($sql);


    $sql = "DELETE FROM agenda WHERE Matricula_profe = '$nomina'";
    $result = mysql_query($sql);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaEliminarProfesor.php\"
				</script>";

	// A partir de aqui hay que eliminar las relaciones con las tablas de cursos
	// Y desinscribir al alumno del curso y con esto aumentar un espacio en el cupo del curso
?>