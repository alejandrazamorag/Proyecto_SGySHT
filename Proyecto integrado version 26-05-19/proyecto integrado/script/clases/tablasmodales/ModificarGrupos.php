<?php 
	$Id=$_GET['id'];
	$Asesor=$_GET['asesor'];
	$Carrera=$_GET['carrera'];
	$Grado=$_GET['grado'];
	$Grupo=strtoupper($_GET['grupo']);
	$Ciclo =ucwords(strtolower($_GET['ciclo']),'-');
	$Estatus=$_GET['estatus'];

	
	include_once "../Grupos.php";
	include_once "../SQLControlador.php";

	$Grupos = new Grupos();
	$Grupos->setidGrupos($Id);
	$Grupos->setidAsesor($Asesor);
	$Grupos->setCarreras_idCarreras($Carrera);
	$Grupos->setGrado($Grado);
	$Grupos->setGrupo($Grupo);
	$Grupos->setCicloEscolar($Ciclo);
	$Grupos->setEstatus($Estatus);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->ModificarGrupo($Grupos);

 ?>