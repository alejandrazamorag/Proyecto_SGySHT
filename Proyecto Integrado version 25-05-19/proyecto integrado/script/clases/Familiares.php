<?php

 	class Familiares{
 		private $idFamiliares;
 		private $Domicilio_idDomicilio;
 		private $Alumno_idAlumno;
 		private $Nombre;
 		private $ApellidoP;
 		private $ApellidoM;
 		private $FechaNacimiento;
 		private $Profesion;
 		private $LugarTrabajo;
 		private $Parentesco;
 		private $Telefono;
 		private $Tutor;
 		private $Estatus;
 		private $Justificantes;
 		private $Validado;
 		private $Correo;

 		function __construct(){
 			$this->idFamiliares = 0;
 			$this->Domicilio_idDomicilio = 0;
			$this->Alumno_idAlumno = 0;
 			$this->Nombre = null;
 			$this->ApellidoP = null;
 			$this->ApellidoM = null;
 			$this->FechaNacimiento = null;
 			$this->Profesion =  null;
 			$this->LugarTrabajo =  null;
 			$this->Parentesco  = null;
 			$this->Telefono = null;
 			$this->Tutor = 0;
 			$this->Estatus= 0;
 			$this->Justificantes = 0;
 			$this->Validado = 0;
 			$this->Correo = null;
 		}


 		public function setidFamiliares($idFamiliares){
 			$this->idFamiliares=$idFamiliares;
 		}

 		public function getidFamiliares(){
 			return $this->idFamiliares;
 		}

 		public function setDomicilio_idDomicilio($Domicilio_idDomicilio){
 			$this->Domicilio_idDomicilio=$Domicilio_idDomicilio;
 		}

 		public function getDomicilio_idDomicilio(){
 			return $this->Domicilio_idDomicilio;
 		}

 		public function setAlumno_idAlumno($Domicilio_idDomicilio){
 			$this->Domicilio_idDomicilio=$Domicilio_idDomicilio;
 		}

 		public function getAlumno_idAlumno(){
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

 		public function setFechaNacimiento($FechaNacimiento){
 			$this->FechaNacimiento=$FechaNacimiento;
 		}

 		public function getFechaNacimiento(){
 			return $this->FechaNacimiento;
 		}

 		public function setProfesion($Profesion){
 			$this->Profesion=$Profesion;
 		}

 		public function getProfesion(){
 			return $this->Profesion;
 		}

 		public function setLugarTrabajo($LugarTrabajo){
 			$this->LugarTrabajo=$LugarTrabajo;
 		}

 		public function getLugarTrabajo(){
 			return $this->LugarTrabajo;
 		}

 		public function setParentesco($Parentesco){
 			$this->Parentesco=$Parentesco;
 		}

 		public function getParentesco(){
 			return $this->Parentesco;
 		}

 		public function setTelefono($Telefono){
 			$this->Telefono=$Telefono;
 		}

 		public function getTelefono(){
 			return $this->Telefono;
 		}

 		public function setTutor($Tutor){
 			$this->Tutor=$Tutor;
 		}

 		public function getTutor(){
 			return $this->Tutor;
 		}

 		public function setEstatus($Estatus){
 			$this->Estatus=$Estatus;
 		}

 		public function getEstatus(){
 			return $this->Estatus;
 		}

 		public function setJustificantes($Justificantes){
 			$this->Justificantes=$Justificantes;
 		}

 		public function getJustificantes(){
 			return $this->Justificantes;
 		}

 		public function setValidado($Validado){
 			$this->Validado=$Validado;
 		}

 		public function getValidado(){
 			return $this->Validado;
 		}

 		public function setCorreo($Correo){
 			$this->Correo=$Correo;
 		}

 		public function getCorreo(){
 			return $this->Correo;
 		}
 	}

 ?>