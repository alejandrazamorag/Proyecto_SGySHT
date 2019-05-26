<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdMatGruDoc=$_GET['Valor'];
	$_SESSION['ConsultaMGD']=$IdMatGruDoc;
	echo $IdMatGruDoc;
 ?>