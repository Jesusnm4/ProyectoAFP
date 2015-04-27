
<?php 
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

	require_once("includes/conexion.php"); 
	include "./includes/sesionStaff.php";

	$nomina="";
	if(isset($_GET['nomina'])){
		$nomina=$_GET['nomina'];
	}
	
	$sql = "UPDATE usuario SET Puede_Cita=0 WHERE Nomina = '$nomina'";
	$result = mysql_query($sql);

	echo "<script language=\"javascript\">
					window.location.href = \"pantallaCompletarInduccion.php\"
				</script>";

?>