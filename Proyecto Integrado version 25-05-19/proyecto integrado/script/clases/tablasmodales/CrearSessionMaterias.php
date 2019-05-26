<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdMateria=$_GET['Valor'];
	$_SESSION['ConsultaM']=$IdMateria;
	echo $IdMateria;
 ?>