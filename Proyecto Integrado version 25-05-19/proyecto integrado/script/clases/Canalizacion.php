<?php

 	class Canalizacion{
 		private $idCanalizacion;
 		private $idProblematicasCanalizacion;
 		private $idFamiliar;
 		private $Alumno_idAlumno;
 		private $idGrupo;
 		private $Lugar;
 		private $Fecha;
 		private $Descripcion;
 		private $Instancia;
 		private $Estatus;

 		function __construct(){
 			$this->idCanalizacion = 0;
 			$this->idProblematicasCanalizacion = 0;
 			$this->idFamiliar = 0;
			$this->Alumno_idAlumno = 0;
 			$this->idGrupo = 0;
 			$this->Lugar = null;
 			$this->Fecha = null;
 			$this->Descripcion = null;
 			$this->Instancia = null;
 			$this->Estatus = 0;
 		}


 		public function setidCanalizacion($idCanalizacion){
 			$this->idCanalizacion=$idCanalizacion;
 		}

 		public function getidCanalizacion(){
 			return $this->idCanalizacion;
 		}

 		public function setidProblematicasCanalizacion($idProblematicasCanalizacion){
 			$this->idProblematicasCanalizacion=$idProblematicasCanalizacion;
 		}

 		public function getidProblematicasCanalizacion(){
 			return $this->idProblematicasCanalizacion;
 		}

 		public function setidFamiliar($idFamiliar){
 			$this->idFamiliar=$idFamiliar;
 		}

 		public function getidFamiliar(){
 			return $this->idFamiliar;
 		}

 		public function setAlumno_idAlumno($Alumno_idAlumno){
 			$this->Alumno_idAlumno=$Alumno_idAlumno;
 		}

 		public function getAlumno_idAlumno(){
 			return $this->Alumno_idAlumno;
 		}

 		public function setidGrupo($idGrupo){
 			$this->idGrupo=$idGrupo;
 		}

 		public function getidGrupo(){
 			return $this->idGrupo;
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

 		public function setDescripcion($Descripcion){
 			$this->Descripcion=$Descripcion;
 		}

 		public function getDescripcion(){
 			return $this->Descripcion;
 		}

 		public function setInstancia($Instancia){
 			$this->Instancia=$Instancia;
 		}

 		public function getInstancia(){
 			return $this->Instancia;
 		}

 		public function setEstatus($Estatus){
 			$this->Estatus=$Estatus;
 		}

 		public function getEstatus(){
 			return $this->Estatus;
 		}
 	}

 ?>