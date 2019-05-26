<?php

 	class TutoriaIndividual{
 		private $idTutoriaIndividual;
 		private $Alumno_idAlumno;
 		private $Grupos_idGrupos;
 		private $idTutor;
 		private $NoTutoria;
 		private $FechaTutoria;
 		private $Horario;
 		private $ActividadesTareas;
 		private $Asistencia;




 		function __construct(){
 			$this->idTutoriaIndividual = 0;
			$this->Alumno_idAlumno = 0;
			$this->Grupos_idGrupos = 0;
			$this->idTutor;
 			$this->NoTutoria = null;
 			$this->FechaTutoria = null;
 			$this->Horario = null;
 			$this->ActividadesTareas = null;
 			$this->Asistencia = 0;
 		}


 		public function setidTutoriaIndividual($idTutoriaIndividual){
 			$this->idTutoriaIndividual=$idTutoriaIndividual;
 		}

 		public function getidTutoriaIndividual(){
 			return $this->idTutoriaIndividual;
 		}

 		public function setAlumno_idAlumno($Alumno_idAlumno){
 			$this->Alumno_idAlumno=$Alumno_idAlumno;
 		}

 		public function getAlumno_idAlumno(){
 			return $this->Alumno_idAlumno;
 		}

 		public function setidGrupo($idGrupos){
 			$this->idGrupos=$idGrupos;
 		}

 		public function getidGrupo(){
 			return $this->idGrupos;
 		}

 		public function setidTutor($idTutor){
 			$this->idTutor=$idTutor;
 		}

 		public function getidTutor(){
 			return $this->idTutor;
 		}

 		public function setNoTutoria($NoTutoria){
 			$this->NoTutoria=$NoTutoria;
 		}

 		public function getNoTutoria(){
 			return $this->NoTutoria;
 		}

 		public function setFechaTutoria($FechaTutoria){
 			$this->FechaTutoria=$FechaTutoria;
 		}

 		public function getFechaTutoria(){
 			return $this->FechaTutoria;
 		}

 		public function setHorario($Horario){
 			$this->Horario=$Horario;
 		}

 		public function getHorario(){
 			return $this->Horario;
 		}

 		public function setActividadesTareas($ActividadesTareas){
 			$this->ActividadesTareas=$ActividadesTareas;
 		}

 		public function getActividadesTareas(){
 			return $this->ActividadesTareas;
 		}

 		public function setAsistencia($Asistencia){
 			$this->Asistencia=$Asistencia;
 		}

 		public function getAsistencia(){
 			return $this->Asistencia;
 		}

 	}

 ?>