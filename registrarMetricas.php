<?php

include "./includes/conexion.php";

$date= $_POST["date"];
$matricula= $_POST["matricula"];
$estatura= $_POST["estatura"];
$pgrasa= $_POST["pgrasa"];
$peso= $_POST["peso"];
$imc= $_POST["imc"];

$insert= "INSERT INTO medicion_alumno ( Matricula, Fecha, Estatura, Peso, PorcentajeGrasa, IMC)
	VALUES
	('$matricula', '$date', $estatura, $peso, $pgrasa, $imc) ";

		mysql_real_escape_string($insert);

		if(!mysql_query($insert))
		echo "Table insertion failed";

		echo "<script language=\"javascript\">
		alert(\"Metricas Registradas con exito!\");
		window.location.href = \"pantallaTablaRegistrarMetricas.php\"
		</script>";
		?>
