<?php 
	$Id=$_GET['id'];
	$Clave=strtoupper($_GET['clave']);
	$Nombre=ucwords(strtolower($_GET['nombre']));
	$Area=ucwords(strtolower($_GET['area']));
	$Estatus=$_GET['estatus'];
	
	include_once "../Carreras.php";
	include_once "../SQLControlador.php";

	$Carreras = new Carreras();
	$Carreras->setidCarreras($Id);
	$Carreras->setClave($Clave);
	$Carreras->setNombre($Nombre);
	$Carreras->setAreaEspecialidad($Area);
	$Carreras->setEstatus($Estatus);


	$SQLControlador = new SQLControlador();
	echo $SQLControlador->ModificarCarrera($Carreras);

 ?>