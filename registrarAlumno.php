<?php

include "./includes/conexion.php";

$nomina= $_POST["nomina"];
$nombre= $_POST["nombre"];
$email= $_POST["email"];
$password= $_POST["password"];
$fechaNacimiento= $_POST["fechaNacimiento"];
$Tipo= $_POST["Tipo"];
$Puede_Cita= $_POST["Puede_Cita"];
$profesor= $_POST["profesor"];

$insert= "INSERT INTO usuario ( Nomina, Nombre, Email, Password, FechaNacimiento, Tipo, Puede_Cita, Profesor)
	VALUES
	('$nomina', '$nombre', '$email', '$password', '$fechaNacimiento', '$Tipo', $Puede_Cita, '$profesor') ";

		mysql_real_escape_string($insert);

		if(!mysql_query($insert))
		echo "Table insertion failed";

		echo "<script language=\"javascript\">
		alert(\"Alumno Registrado con exito!\");
		window.location.href = \"pantallaAgregarAlumno.php\"
		</script>";
		?>
