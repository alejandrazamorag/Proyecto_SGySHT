<?php 
	$Id=$_GET['id'];
	$Docente=$_GET['docente'];

	
	include_once "../MateriaGruposDocentes.php";
	include_once "../SQLControlador.php";

	$MateriaGruposDocentes = new MateriaGruposDocentes();
	$MateriaGruposDocentes->setidMateriaGruposDocentes($Id);
	$MateriaGruposDocentes->setPersonal_idPersonal($Docente);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->ModificarMateriaGrupoDocente($MateriaGruposDocentes);

 ?>