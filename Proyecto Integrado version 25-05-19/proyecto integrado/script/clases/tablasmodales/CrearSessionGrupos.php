<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdGrupos=$_GET['Valor'];
	$_SESSION['ConsultaG']=$IdGrupos;
	echo $IdGrupos;
 ?>