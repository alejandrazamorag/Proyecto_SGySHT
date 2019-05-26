<?php
	if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
}
	
	 $_SESSION['IdAlumnoCapturista'] = $_GET['idalumno'];
	// echo "La sesion tiene el numero ".$_SESSION['IdAlumnoCapturista'];
	 echo "<script language='javascript'>window.location = 'InicioAlumnoIndividual.php'</script>";
	 //mandar link a la pagina
?>