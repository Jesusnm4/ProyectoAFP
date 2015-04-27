<?php
//Andrés Gutiérrez Castaño A01191581
//Jesús Navarro Marín A00813111

Session_start();

if(isset($_SESSION['nomina'])){
	if($_SESSION['tipo'] =! 'A'){
		echo "<script language=\"javascript\">
		alert(\"No tiene permisos!\");
		window.location.href = \"index.html\"
		</script>";
	}
}else{
	echo "<script language=\"javascript\">
	alert(\"Inicie sesion primero\");
	window.location.href = \"index.html\"
	</script>";
}

?>
