<?php 
if (!isset($_SESSION)) { session_start(); }

$_SESSION['IdCanalizacion'] = $_GET['idCanalizacion'];
echo "La session tiene el numero".$_SESSION['IdCanalizacion'];
echo "<SCRIPT>window.location='ModificacionCanalizacionTutor.php';</SCRIPT>";

?>