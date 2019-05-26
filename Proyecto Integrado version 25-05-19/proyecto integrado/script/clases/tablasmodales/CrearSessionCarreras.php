<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdCarrera=$_GET['Valor'];
	$_SESSION['ConsultaC']=$IdCarrera;
	echo $IdCarrera;
 ?>