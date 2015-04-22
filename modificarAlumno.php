<?php


include "./includes/conexion.php";

$matriculaVieja= $_POST["matriculaVieja"];
$matricula= $_POST["matricula"];
$nombre= $_POST["nombre"];
$email= $_POST["email"];
$fechaNacimiento= $_POST["fechaNacimiento"];
$password= $_POST["password"];
$password2= $_POST["password2"];

if($password != $password2){
    echo "<script language=\"javascript\">
    alert(\"Las contraseñas no coinciden!\");
    window.location.href = \"pantallaModificarAlumno.php?Nomina=$matriculaVieja\"
</script>";
}else{
    $sql= "update usuario
    set
    Nomina='$matricula',
    Nombre='$nombre',
    Email='$email',
    FechaNacimiento='$fechaNacimiento'
    where
    Nomina='$matriculaVieja'";

        if($password !=""){
            $sql2= "update usuario
                set
                Password='$password'
                where
                Nomina='$matricula'";
            mysql_real_escape_string($sql2);
            if(!mysql_query($sql2))
                echo "Error";
        }

        mysql_real_escape_string($sql);

        if(!mysql_query($sql))
            echo "Error";

        echo "<script language=\"javascript\">
    alert(\"Alumno Actualizado con exito!\");
    window.location.href = \"pantallaTablaModificarAlumnos.php\"
    </script>";
}
?>
