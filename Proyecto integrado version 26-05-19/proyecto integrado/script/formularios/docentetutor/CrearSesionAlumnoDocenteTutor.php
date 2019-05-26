<?php
	if (!isset($_SESSION)) { session_start(); }
	
	$_SESSION['IdAlumnoDocenteTutor'] = $_GET['idalumno'];
	// echo "La sesion tiene el numero ".$_SESSION['IdAlumnoDocenteTutor'];
	echo "<script language='javascript'>window.location = 'InicioAlumnoIndividualDC.php'</script>";
?>