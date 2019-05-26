<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdEncuestaRep=$_GET['Valor'];
	$_SESSION['ConsultaEncR']=$IdEncuestaRep;
	echo $IdEncuestaRep;
 ?>