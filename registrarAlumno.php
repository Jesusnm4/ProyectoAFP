<?php

/**
* Este archivo es la pantalla de inscripcion de alumno y tiene parte de php para insertar el alumno en la base de datos.
*
* @category   Proyecto
* @package    Sistema de Inscripciones de Natacion
* @author     Azael Alberto Alanis Garza <azaelalanis.g@gmail.com>
* @author     Andres Gerardo Cavazos Hernandez <andrscvz@gmail.com>
* @author			Eugenio Jose Martinez Ramos <eugeniomartinez92@gmail.com>
* @author			Roberto Carlos Rivera Martinez <robert_rivmtz@hotmail.com>
* @author			Hector Palomares Gonzalez <hpalomares@itesm.mx>
* @copyright  2014
* @license    The MIT License
* @version    1.0
* @link       https://github.com/azaelalanis/Sistema-de-Inscripciones-de-Natacion.git
*/

include "./includes/conexion.php";

$nomina= $_POST["nomina"];
$nombre= $_POST["nombre"];
$email= $_POST["email"];
$password= $_POST["password"];
$fechaNacimiento= $_POST["fechaNacimiento"];
$Tipo= $_POST["Tipo"];

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
		?>
