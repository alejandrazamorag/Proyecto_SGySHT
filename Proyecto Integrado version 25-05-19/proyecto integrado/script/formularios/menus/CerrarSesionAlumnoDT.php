<?php

	if (!isset($_SESSION)) { session_start(); }
	if(file_exists('../docentetutor/graficastest/grafica'.$_SESSION['IdAlumnoDocenteTutor'].'.png')){
		unlink('../docentetutor/graficastest/grafica'.$_SESSION['IdAlumnoDocenteTutor'].'.png');
	} else {

	}	
	
	unset($_SESSION['IdAlumnoDocenteTutor']);

	echo "<script language='javascript'>window.location='../docentetutor/BusquedaTodosAlumnos.php'</script>";
?>