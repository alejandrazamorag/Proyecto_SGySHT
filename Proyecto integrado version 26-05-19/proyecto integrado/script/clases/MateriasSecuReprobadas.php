<?php
	class MateriasSecuReprobadas{

		
		private $idMateriasSecuReprobadas;
		private $Alumno_idAlumno;
		private $Materias;
		private $Motivo;

		function __construct(){
			$this->idMateriasSecuReprobadas = 0;
			$this->Alumno_idAlumno = 0;
			$this->Materias = null;
			$this->Motivo = null;
		}


		public function setidMateriasSecuReprobadas($idMateriasSecuReprobadas){
			$this -> idMateriasSecuReprobadas = $idMateriasSecuReprobadas;
		}

		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}
		public function setMaterias($Materias){
			$this -> Materias = $Materias;
		}

		public function setMotivo($Motivo){
			$this -> Motivo = $Motivo;
		}

		public function getidMateriasSecuReprobadas(){
			return $this -> idMateriasSecuReprobadas;
        }
        public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
        public function getMaterias(){
			return $this -> Materias;
        }
        public function getMotivo(){
			return $this -> Motivo;
        }
	}

?>