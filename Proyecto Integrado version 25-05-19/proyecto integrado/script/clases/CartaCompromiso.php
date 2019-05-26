<?php

 	class CartaCompromiso{
 		private $idCartaCompromiso;
 		private $idFamiliares;
 		private $idPersonal;
 		private $idGrupo;
 		private $Alumno_idAlumno;
 		private $Lugar;
 		private $Fecha;
 		private $AcuerdosRealizados;
 		private $Motivo;



 		function __construct(){
 			$this->idCartaCompromiso = 0;
 			$this->idFamiliares = 0;
 			$this->idPersonal = 0;
 			$this->idGrupo = 0;
			$this->Alumno_idAlumno = 0;
 			$this->Lugar = null;
 			$this->Fecha = null;
 			$this->AcuerdosRealizados = null;
 			$this->Motivo = null;
 		}


 		public function setidCartaCompromiso($idCartaCompromiso){
 			$this->idCartaCompromiso=$idCartaCompromiso;
 		}

 		public function getidCartaCompromiso(){
 			return $this->idCartaCompromiso;
 		}

 		public function setidFamiliares($idFamiliares){
 			$this->idFamiliares=$idFamiliares;
 		}

 		public function getidFamiliares(){
 			return $this->idFamiliares;
 		}

 		public function setidPersonal($idPersonal){
 			$this->idPersonal=$idPersonal;
 		}

 		public function getidPersonal(){
 			return $this->idPersonal;
 		}

 		public function setidGrupo($idGrupo){
 			$this->idGrupo=$idGrupo;
 		}

 		public function getidGrupo(){
 			return $this->idGrupo;
 		}

 		public function setAlumno_idAlumno($Alumno_idAlumno){
 			$this->Alumno_idAlumno=$Alumno_idAlumno;
 		}

 		public function getAlumno_idAlumno(){
 			return $this->Alumno_idAlumno;
 		}

 		public function setLugar($Lugar){
 			$this->Lugar=$Lugar;
 		}

 		public function getLugar(){
 			return $this->Lugar;
 		}

 		public function setFecha($Fecha){
 			$this->Fecha=$Fecha;
 		}

 		public function getFecha(){
 			return $this->Fecha;
 		}

 		public function setAcuerdosRealizados($AcuerdosRealizados){
 			$this->AcuerdosRealizados=$AcuerdosRealizados;
 		}

 		public function getAcuerdosRealizados(){
 			return $this->AcuerdosRealizados;
 		}

 		public function setMotivo($Motivo){
 			$this->Motivo=$Motivo;
 		}

 		public function getMotivo(){
 			return $this->Motivo;
 		}
 	}

 ?>