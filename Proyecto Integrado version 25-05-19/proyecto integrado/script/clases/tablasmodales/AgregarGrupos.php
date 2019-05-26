<?php 

$Asesor=$_GET['asesor'];
$Carrera=$_GET['carrera'];
$Grado=$_GET['grado'];
$Grupo=strtoupper($_GET['grupo']);
$Ciclo =ucwords(strtolower($_GET['ciclo']),'-');
$Estatus=1;

include_once "../Grupos.php";
include_once "../SQLControlador.php";

$Grupos = new Grupos();
$Grupos->setidAsesor($Asesor);
$Grupos->setCarreras_idCarreras($Carrera);
$Grupos->setGrado($Grado);
$Grupos->setGrupo($Grupo);
$Grupos->setCicloEscolar($Ciclo);
$Grupos->setEstatus($Estatus);


$SQLControlador = new SQLControlador();
echo $SQLControlador->AgregarGrupo($Grupos);

	//$Consulta = "INSERT INTO carreras (idCarreras, Clave, Nombre, AreaEspecialidad) VALUES (null,'$c','$n','$a');";
	//echo $Resultado = $Mysql->Consulta($Consulta);

?>