<?php

 	class SolicitudBaja{
 		private $idSolicitudBaja;
 		private $idFamiliares;
 		private $idDocenteTutor;
 		private $idCorAcademico;
 		private $idCorAdministrativo;
 		private $idDirector;
 		private $idGrupo;
 		private $Alumno_idAlumno;
 		private $Motivo;
 		private $ObservacionesTutor;
 		private $ObservacioesHistorialPagos;


 		function __construct(){
 			$this->idSolicitudBaja= 0;
 			$this->idFamiliares = 0;
 			$this->idDocenteTutor = 0;
 			$this->idCorAcademico =0;
 			$this->idCorAdministrativo = 0;
 			$this->idDirector = 0;
 			$this->idGrupo = 0;
			$this->Alumno_idAlumno = 0;
 			$this->Motivo = null;
 			$this->ObservacionesTutor = null;
 			$this->ObservacioesHistorialPagos = null;
 		}


 		public function setidSolicitudBaja($idSolicitudBaja){
 			$this->idSolicitudBaja=$idSolicitudBaja;
 		}

 		public function getidSolicitudBaja(){
 			return $this->idSolicitudBaja;
 		}

 		public function setidFamiliares($idFamiliares){
 			$this->idFamiliares=$idFamiliares;
 		}

 		public function getidFamiliares(){
 			return $this->idFamiliares;
 		}

 		public function setidDocenteTutor($idDocenteTutor){
 			$this->idDocenteTutor=$idDocenteTutor;
 		}

 		public function getidDocenteTutor(){
 			return $this->idDocenteTutor;
 		}

 		public function setidCorAcademico($idCorAcademico){
 			$this->idCorAcademico=$idCorAcademico;
 		}

 		public function getidCorAcademico(){
 			return $this->idCorAcademico;
 		}

 		public function setidCorAdministrativo($idCorAdministrativo){
 			$this->idCorAdministrativo=$idCorAdministrativo;
 		}

 		public function getidCorAdministrativo(){
 			return $this->idCorAdministrativo;
 		}

 		public function setidDirector($idDirector){
 			$this->idDirector=$idDirector;
 		}

 		public function getidDirector(){
 			return $this->idDirector;
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

 		public function setMotivo($Motivo){
 			$this->Motivo=$Motivo;
 		}

 		public function getMotivo(){
 			return $this->Motivo;
 		}

 		public function setObservacionesTutor($ObservacionesTutor){
 			$this->ObservacionesTutor=$ObservacionesTutor;
 		}

 		public function getObservacionesTutor(){
 			return $this->ObservacionesTutor;
 		}
		
		public function setObservacionesHistorialPagos($ObservacionesHistorialPagos){
 			$this->ObservacionesHistorialPagos=$ObservacionesHistorialPagos;
 		}

 		public function getObservacionesHistorialPagos(){
 			return $this->ObservacionesHistorialPagos;
 		}
 	}

 ?>