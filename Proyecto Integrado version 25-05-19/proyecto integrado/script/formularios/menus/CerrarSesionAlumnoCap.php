<?php

if (!isset($_SESSION)) { session_start(); }
unset($_SESSION['IdAlumnoCapturista']);

echo "<script language='javascript'>window.location='../capturista/InicioAlumnoTodos.php'</script>";

?>