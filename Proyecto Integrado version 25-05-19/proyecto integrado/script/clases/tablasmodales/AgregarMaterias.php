<?php 

	$IdCarreras=$_GET['carreras'];
	$Clave=strtoupper($_GET['clave']);
	$Nombre=ucwords(strtolower($_GET['nombre']));
	$Componente=$_GET['componente'];
	$Semestre=$_GET['semestre'];
	$Estatus=1;
	
	include_once "../Materia.php";
	include_once "../SQLControlador.php";

	$Materias = new Materia();
	$Materias->setCarreras_idCarreras($IdCarreras);
	$Materias->setClave($Clave);
	$Materias->setNombre($Nombre);
	$Materias->setComponente($Componente);
	$Materias->setSemestre($Semestre);
	$Materias->setEstatus($Estatus);


	$SQLControlador = new SQLControlador();
	echo $SQLControlador->AgregarMateria($Materias);
	
	//$Consulta = "INSERT INTO carreras (idCarreras, Clave, Nombre, AreaEspecialidad) VALUES (null,'$c','$n','$a');";
	//echo $Resultado = $Mysql->Consulta($Consulta);

 ?>