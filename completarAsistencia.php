<?php 
	require_once("includes/conexion.php"); 
	include "./includes/sesionStaff.php";

	$nomina="";
	if(isset($_GET['idAgenda'])){
		$idAgenda=$_GET['idAgenda'];
	}

	$sql = "UPDATE agenda SET Asistencia=1 WHERE IdAgenda = '$idAgenda'";
	$result = mysql_query($sql);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaConfirmarAsistencia.php\"
				</script>";

?>