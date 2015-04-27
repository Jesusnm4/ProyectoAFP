<?php
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

include "./includes/conexion.php";
include "./includes/sesionEstudiante.php";

//print_r($_POST);
$matricula="";
if(isset($_SESSION['nomina'])){
    $matricula=$_SESSION['nomina'];
}

$tipo="a";
if(isset($_POST["tipo"])){
    $tipo= $_POST["tipo"];
}
//echo $tipo;
$insert="";
if($tipo=='C'){
    $date= $_POST["date"];
    
    $distancia= $_POST["distancia"];
    $tiempo= $_POST["tiempo"];
    $puls1= $_POST["puls1"];
    $puls3= $_POST["puls3"];
    $BORG= $_POST["BORG"];
    
    $insert= "INSERT INTO registro_diario ( Matricula, Fecha, Distancia, Tiempo, Pulsacion_1, Pulsacion_3, Borg, Tipo)
            VALUES
            ('$matricula', '$date', $distancia, '$tiempo', $puls1, $puls3, $BORG, '$tipo') ";
    mysql_real_escape_string($insert);

        if(!mysql_query($insert))
        echo "Table insertion failed";
    
}elseif($tipo=='M'){
    $date= $_POST["date"];
    
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
  
}elseif($tipo=='F'){
    $date= $_POST["date"];
   
    $series= $_POST["series"];
    $BORG= $_POST["BORG"];

    $insert= "INSERT INTO registro_diario ( Matricula, Fecha, Num_Series, Borg, Tipo)
            VALUES
            ('$matricula', '$date', $series, $BORG, '$tipo') ";
            mysql_real_escape_string($insert);

        if(!mysql_query($insert))
        echo "Table insertion failed";
    
}

		

		echo "<script language=\"javascript\">
		alert(\"Ejercicio registrado con exito!\");
		window.location.href = \"pantallaRegistroDiario.php\"
		</script>";
		?>
