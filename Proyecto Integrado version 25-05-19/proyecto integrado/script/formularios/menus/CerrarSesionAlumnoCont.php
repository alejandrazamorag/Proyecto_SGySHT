<?php

if (!isset($_SESSION)) { session_start(); }
//unset ($_SESSION['Usuario']);
session_destroy();

echo "<script language='javascript'>window.location='../alumno/LoginAlumno.php'</script>";

?>