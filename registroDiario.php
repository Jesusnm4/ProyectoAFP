<?php

include "./includes/conexion.php";
include "./includes/sesionEstudiante.php";


$date= $_POST["date"];
$matricula= $_POST["matricula"];
$tipo= $_POST["Tipo"];
$series= $_POST["series"];
$distancia= $_POST["distancia"];
$tiempo= $_POST["tiempo"];
$puls1= $_POST["puls1"];
$puls3= $_POST["puls3"];
$BORG= $_POST["BORG"];


        $insert= "INSERT INTO registro_diario ( Matricula, Fecha, Num_Series, Distancia, Tiempo, Pulsacion_1, Pulsacion_3, Borg, Tipo)
            VALUES
            ('$matricula', '$date', $series, $distancia, '$tiempo', $puls1, $puls3, $BORG, '$tipo') ";

		mysql_real_escape_string($insert);

		if(!mysql_query($insert))
		echo "Table insertion failed";

		echo "<script language=\"javascript\">
		alert(\"Ejercicio registrado con exito!\");
		window.location.href = \"pantallaRegistroDiario.php\"
		</script>";
		?>
