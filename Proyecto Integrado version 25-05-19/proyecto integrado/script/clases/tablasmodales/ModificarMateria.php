<?php 
	$Id=$_GET['id'];
	$Carrera=$_GET['carrera'];
	$Clave=strtoupper($_GET['clave']);
	$Nombre=ucwords(strtolower($_GET['nombre']));
	$Componente=$_GET['componente'];
	$Semestre=$_GET['semestre'];
	$Estatus=$_GET['estatus'];
	
	include_once "../Materia.php";
	include_once "../SQLControlador.php";

	$Materias = new Materia();
	$Materias->setidMateria($Id);
	$Materias->setCarreras_idCarreras($Carrera);
	$Materias->setClave($Clave);
	$Materias->setNombre($Nombre);
	$Materias->setComponente($Componente);
	$Materias->setSemestre($Semestre);
	$Materias->setEstatus($Estatus);


	$SQLControlador = new SQLControlador();
	echo $SQLControlador->ModificarMateria($Materias);

 ?>