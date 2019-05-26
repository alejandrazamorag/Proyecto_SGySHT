<?php

 	class HistorialAlumno{
 		private $idHistorialAlumno;
 		private $Grupos_idGrupos;
 		private $Alumno_idAlumno;
 		private $Fecha;

 		function __construct(){
 			$this->idHistorialAlumno = 0;
 			$this->Grupos_idGrupos = 0;
			$this->Alumno_idAlumno = 0;
 			$this->Fecha = null;
 		}


 		public function setidHistorialAlumno($idHistorialAlumno){
 			$this->idHistorialAlumno=$idHistorialAlumno;
 		}

 		public function getidHistorialAlumno(){
 			return $this->idHistorialAlumno;
 		}

 		public function setGrupos_idGrupos($Grupos_idGrupos){
 			$this->Grupos_idGrupos=$Grupos_idGrupos;
 		}

 		public function getGrupos_idGrupos(){
 			return $this->Grupos_idGrupos;
 		}

 		public function setAlumno_idAlumno($Alumno_idAlumno){
 			$this->Alumno_idAlumno=$Alumno_idAlumno;
 		}

 		public function getAlumno_idAlumno(){
 			return $this->Alumno_idAlumno;
 		}

 		public function setFecha($Fecha){
 			$this->Fecha=$Fecha;
 		}

 		public function getFecha(){
 			return $this->Fecha;
 		}
 	}

 ?>