<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdCartaR=$_GET['Valor'];
	$_SESSION['ConsultaCRes']=$IdCartaR;
	echo $IdCartaR;
 ?>