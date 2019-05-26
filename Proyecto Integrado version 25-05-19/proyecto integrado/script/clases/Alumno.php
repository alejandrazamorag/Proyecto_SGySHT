<?php

class Alumno{
	private $idAlumno;
	private $Grupos_idGrupos;
	private $Carreras_idCarreras;
	private $LugarNacimiento_idLugarNacimiento;
	private $Domicilio_idDomicilio;
	private $Nombre;
	private $ApellidoP;
	private $ApellidoM;
	private $Fotografia;
	private $SS;
	private $CURP;
	private $NC;
	private $FechaNac;
	private $Correo;
	private $Sexo;
	private $Estatus;
	private $Telefono;
	private $TelefonoEmergencia;


	function __construct(){
		$this->idAlumno = 0;
		$this->Grupos_idGrupos = 0;
		$this->Carreras_idCarreras = 0;
		$this->LugarNacimiento_idLugarNacimiento = 0;
		$this->Domicilio_idDomicilio = 0;
		$this->Nombre = null;
		$this->ApellidoP = null;
		$this->ApellidoM = null;
		$this->Fotografia = null;
		$this->SS =  null;
		$this->CURP =  null;
		$this->NC  = null;
		$this->FechaNac = null;
		$this->Correo = null;
		$this->Sexo = null;
		$this->Estatus = 0;
		$this->Telefono = null;
		$this->TelefonoEmergencia = null;

	}


	public function setidAlumno($idAlumno){
		$this->idAlumno=$idAlumno;
	}

	public function getidAlumno(){
		return $this->idAlumno;
	}

	public function setGrupos_idGrupos($Grupos_idGrupos){
		$this->Grupos_idGrupos=$Grupos_idGrupos;
	}

	public function getGrupos_idGrupos(){
		return $this->Grupos_idGrupos;
	}

	public function setCarreras_idCarreras($Carreras_idCarreras){
		$this->Carreras_idCarreras=$Carreras_idCarreras;
	}

	public function getCarreras_idCarreras(){
		return $this->Carreras_idCarreras;
	}

	public function setLugarNacimiento_idLugarNacimiento($LugarNacimiento_idLugarNacimiento){
		$this->LugarNacimiento_idLugarNacimiento=$LugarNacimiento_idLugarNacimiento;
	}

	public function getLugarNacimiento_idLugarNacimiento(){
		return $this->LugarNacimiento_idLugarNacimiento;
	}

	public function setDomicilio_idDomicilio($Domicilio_idDomicilio){
		$this->Domicilio_idDomicilio=$Domicilio_idDomicilio;
	}

	public function getDomicilio_idDomicilio(){
		return $this->Domicilio_idDomicilio;
	}

	public function setNombre($Nombre){
		$this->Nombre=$Nombre;
	}

	public function getNombre(){
		return $this->Nombre;
	}

	public function setApellidoP($ApellidoP){
		$this->ApellidoP=$ApellidoP;
	}

	public function getApellidoP(){
		return $this->ApellidoP;
	}

	public function setApellidoM($ApellidoM){
		$this->ApellidoM=$ApellidoM;
	}

	public function getApellidoM(){
		return $this->ApellidoM;
	}

	public function setFotografia($Fotografia){
		$this->Fotografia=$Fotografia;
	}

	public function getFotografia(){
		return $this->Fotografia;
	}

	public function setSS($SS){
		$this->SS=$SS;
	}

	public function getSS(){
		return $this->SS;
	}

	public function setCURP($CURP){
		$this->CURP=$CURP;
	}

	public function getCURP(){
		return $this->CURP;
	}

	public function setNC($NC){
		$this->NC=$NC;
	}

	public function getNC(){
		return $this->NC;
	}

	public function setFechaNac($FechaNac){
		$this->FechaNac=$FechaNac;
	}

	public function getFechaNac(){
		return $this->FechaNac;
	}

	public function setCorreo($Correo){
		$this->Correo=$Correo;
	}

	public function getCorreo(){
		return $this->Correo;
	}
	public function setSexo($Sexo){
		$this->Sexo=$Sexo;
	}

	public function getSexo(){
		return $this->Sexo;
	}

	public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}

	public function getEstatus(){
		return $this->Estatus;
	}

	public function setTelefono($Telefono){
		$this->Telefono=$Telefono;
	}

	public function getTelefono(){
		return $this->Telefono;
	}

	public function setTelefonoEmergencia($TelefonoEmergencia){
		$this->TelefonoEmergencia=$TelefonoEmergencia;
	}

	public function getTelefonoEmergencia(){
		return $this->TelefonoEmergencia;
	}
}

?>