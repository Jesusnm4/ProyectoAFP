<?php


include "./includes/conexion.php";

$matricula= $_POST["matricula"];
$nombre= $_POST["nombre"];
$email= $_POST["email"];
$fechaNacimiento= $_POST["fechaNacimiento"];
$password= $_POST["password"];
$password2= $_POST["password2"];

$sql= "update usuario
set
Nomina='$matricula',
Nombre='$nombre',
Email='$email',
FechaNacimiento='$fechaNacimiento',
Password='$password'
where
Nomina='$Nomina'";

mysql_real_escape_string($sql);

if(!mysql_query($sql))
echo "Error";

echo "<script language=\"javascript\">
alert(\"Alumno Actualizado con exito!\");
window.location.href = \"pantallaIndexStaff.php\"
</script>";
?>
