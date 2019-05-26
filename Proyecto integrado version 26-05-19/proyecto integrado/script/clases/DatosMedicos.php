<?php

 	class DatosMedicos{
 		private $idDatosMedicos;
 		private $Alumno_idAlumno;
 		private $Enfermedad;
 		private $Tratamiento;
 		private $Tabaquismo;
 		private $Drogadiccion;
 		private $Alcoholismo;


 		function __construct(){
 			$this->idDatosMedicos = 0;
 			$this->Alumno_idAlumno = 0;
 			$this->Enfermedad = null;
			$this->Tratamiento = null;
 			$this->Tabaquismo = 0;
 			$this->Drogadiccion = 0;
 			$this->Alcoholismo = 0;
 		}


 		public function setidDatosMedicos($idDatosMedicos){
 			$this->idDatosMedicos=$idDatosMedicos;
 		}

 		public function getidDatosMedicos(){
 			return $this->idDatosMedicos;
 		}

 		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this->Alumno_idAlumno=$Alumno_idAlumno;
		}

		public function getAlumno_idAlumno(){
			return $this->Alumno_idAlumno;
        }

 		public function setEnfermedad($Enfermedad){
 			$this->Enfermedad=$Enfermedad;
 		}

 		public function getEnfermedad(){
 			return $this->Enfermedad;
 		}

 		public function setTratamiento($Tratamiento){
 			$this->Tratamiento=$Tratamiento;
 		}

 		public function getTratamiento(){
 			return $this->Tratamiento;
 		}

 		public function setTabaquismo($Tabaquismo){
 			$this->Tabaquismo=$Tabaquismo;
 		}

 		public function getTabaquismo(){
 			return $this->Tabaquismo;
 		}


 		public function setDrogadiccion($Drogadiccion){
 			$this->Drogadiccion=$Drogadiccion;
 		}

 		public function getDrogadiccion(){
 			return $this->Drogadiccion;
 		}


 		public function setAlcoholismo($Alcoholismo){
 			$this->Alcoholismo=$Alcoholismo;
 		}

 		public function getAlcoholismo(){
 			return $this->Alcoholismo;
 		}
 	}

 ?>