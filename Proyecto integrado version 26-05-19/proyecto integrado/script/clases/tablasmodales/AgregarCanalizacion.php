<?php 
session_start();
include_once "../SQLControlador.php";
include_once "../Canalizacion.php";

$Alumno_idAlumno= $_GET['idAlumno'];
$idFamiliar=$_GET['idFamiliar'];
$idProblematicasCanalizacion=$_GET['idProblematica'];
$Descripcion = $_GET['Descripcion'];
$Fecha = $_GET['Fecha'];
$Instancia = $_GET['Instancia'];

$Canalizacion = new Canalizacion();
$Canalizacion->setidProblematicasCanalizacion($idProblematicasCanalizacion);
$Canalizacion-> setidFamiliar($idFamiliar);
$Canalizacion->setAlumno_idAlumno($Alumno_idAlumno);
$Canalizacion->setFecha($Fecha);
$Canalizacion->setDescripcion($Descripcion);
$Canalizacion->setInstancia($Instancia);

$SQLControlador = new SQLControlador();
echo $SQLControlador-> AgregarCanalizacion($Canalizacion);

?>