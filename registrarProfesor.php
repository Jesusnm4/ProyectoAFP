<?php

//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

include "./includes/conexion.php";

$nomina= $_POST["nomina"];
$nombre= $_POST["nombre"];
$email= $_POST["email"];
$password= $_POST["password"];
$password_confirm= $_POST["password_confirm"];
$fechaNacimiento= $_POST["fechaNacimiento"];
$Tipo= $_POST["Tipo"];

$nac  = explode('-', $fechaNacimiento);
if (checkdate($nac[1], $nac[2], $nac[0])) {
	if($password == $password_confirm){
		$insert= "INSERT INTO usuario ( Nomina, Nombre, Email, Password, FechaNacimiento, Tipo)
		VALUES
		('$nomina', '$nombre', '$email', '$password', '$fechaNacimiento', '$Tipo') ";

		mysql_real_escape_string($insert);

		if(!mysql_query($insert))
		echo "Table insertion failed";

		echo "<script language=\"javascript\">
		alert(\"Profesor Registrado con exito!\");
		window.location.href = \"pantallaAgregarProfesor.php\"
		</script>";
	} else{
		echo "<script language=\"javascript\">
		alert(\"Las contraseñas no coinciden!\");
		window.location.href = \"pantallaAgregarProfesor.php\"
		</script>";
	}
} else {
	echo "<script language=\"javascript\">
	alert(\"La fecha de Nacimiento no es valida!\");
	window.location.href = \"pantallaAgregarProfesor.php\"
	</script>";
}
?>
