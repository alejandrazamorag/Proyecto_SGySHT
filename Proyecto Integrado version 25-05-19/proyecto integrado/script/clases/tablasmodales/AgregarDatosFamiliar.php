<?php 
session_start();
include_once "../SQLControlador.php";
include_once "../Familiares.php";
include_once "../Domicilio.php";
include_once "../MySQLConector.php";


$IdDom1 = 0;
$IdDom2 = 0;

$Nombre= $_POST['Nombre'];
$Nombre = ucwords(strtolower($Nombre));
$ApellidoP=$_POST['ApellidoP'];
$ApellidoP = ucwords(strtolower($ApellidoP));
$ApellidoM=$_POST['ApellidoM'];
$ApellidoM = ucwords(strtolower($ApellidoM));
$FechaNacimiento=$_POST['FechaNacimiento'];
$Profesion=$_POST['Profesion'];
$Profesion = ucwords(strtolower($Profesion));
$LugarTrabajo=$_POST['LugarTrabajo'];
$LugarTrabajo = ucwords(strtolower($LugarTrabajo));
$Parentesco=$_POST['Parentesco'];
$Telefono=$_POST['Telefono'];
$Tutor=$_POST['Tutor'];
 
$Justificantes=$_POST['Justificantes'];
$Correo=$_POST['Correo'];
$CP=$_POST['CP'];
$Calle=$_POST['Calle'];
$Calle = ucwords(strtolower($Calle));
$Numero=$_POST['Numero'];
$Colonia=$_POST['Colonia'];
$Colonia = ucwords(strtolower($Colonia));
$Municipio=$_POST['Municipio'];
$Municipio = ucwords(strtolower($Municipio));
$Localidad=$_POST['Localidad'];
$Localidad = ucwords(strtolower($Localidad));
$Estado=$_POST['Estado'];
$Estado = ucwords(strtolower($Estado));
$TelefonoCasa=$_POST['TelefonoCasa'];

$Familiares = new familiares();
$Familiares->setAlumno_idAlumno($_SESSION['IdAlumnoCapturista']);
$Familiares->setNombre($Nombre);
$Familiares->setApellidoP($ApellidoP);
$Familiares->setApellidoM($ApellidoM);
$Familiares->setFechaNacimiento($FechaNacimiento);
$Familiares->setProfesion($Profesion);
$Familiares->setLugarTrabajo($LugarTrabajo);
$Familiares->setParentesco($Parentesco);
$Familiares->setTelefono($Telefono);
$Familiares->setTutor($Tutor);
$Familiares->setJustificantes($Justificantes);
$Familiares->setCorreo($Correo);

$Domicilio =  new domicilio();
$Domicilio->setCP($CP);
$Domicilio->setCalle($Calle);
$Domicilio->setNumero($Numero);
$Domicilio->setColonia($Colonia);
$Domicilio->setMunicipio($Municipio);
$Domicilio->setLocalidad($Localidad);
$Domicilio->setEstado($Estado);
$Domicilio->setTelefonoCasa($TelefonoCasa);

$SQLControlador = new SQLControlador();
echo $SQLControlador->AgregarDatosPersonales($Domicilio,$Familiares);

?>