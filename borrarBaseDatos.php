

<?php
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111
include "./includes/conexion.php";
include "./includes/sesionAdmin.php";

$sql="delete from agenda";
$result = mysql_query($sql);
$sql="delete from usuario where Tipo='A'";
$result = mysql_query($sql);
$sql="delete from registro_diario";
$result = mysql_query($sql);
$sql="delete from medicion_alumno";
$result = mysql_query($sql);

echo "	<script language=\"javascript\">
                        window.location.href = \"pantallaIndexAdmin.php\"
                        </script>";
?>