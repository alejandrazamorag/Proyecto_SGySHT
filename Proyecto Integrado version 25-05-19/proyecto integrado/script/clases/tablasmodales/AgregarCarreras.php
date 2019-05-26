<?php 


	$Clave=$_GET['clave'];
	$Nombre=ucwords(strtolower($_GET['nombre']));
	$Area=ucwords(strtolower($_GET['area']));
	$Estatus=1;
	
	include_once "../Carreras.php";
	include_once "../SQLControlador.php";

	$Carreras = new Carreras();
	$Carreras->setClave($Clave);
	$Carreras->setNombre($Nombre);
	$Carreras->setAreaEspecialidad($Area);
	$Carreras->setEstatus($Estatus);


	$SQLControlador = new SQLControlador();
	echo $SQLControlador->AgregarCarrera($Carreras);
	
	//$Consulta = "INSERT INTO carreras (idCarreras, Clave, Nombre, AreaEspecialidad) VALUES (null,'$c','$n','$a');";
	//echo $Resultado = $Mysql->Consulta($Consulta);

 ?>