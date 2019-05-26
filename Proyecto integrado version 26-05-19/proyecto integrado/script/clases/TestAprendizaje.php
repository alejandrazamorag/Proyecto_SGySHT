<?php
	class TestAprendizaje{
		private $idTestAprendizaje;
		private $Alumno_idAlumno;
		private $Respuestas;
		private $Visual;
		private $Auditivo;
		private $Kinestesico;
		private $Total;

		function __construct(){
			$this-> idTestAprendizaje=0;
			$this-> Alumno_idAlumno=0;
			$this-> Respuestas=null;
			$this-> Visual=0;
			$this-> Auditivo=0;
			$this-> Kinestesico=0;
			$this-> Total=0;
		}

		public function setidTestAprendizaje($idTestAprendizaje){
			$this -> idTestAprendizaje = $idTestAprendizaje;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}
		public function setRespuestas($Respuestas){
			$this -> Respuestas = $Respuestas;
		}
		public function setVisual($Visual){
			$this -> Visual = $Visual;
		}
		public function setAuditivo($Auditivo){
			$this -> Auditivo = $Auditivo;
		}
		public function setKinestesico($Kinestesico){
			$this -> Kinestesico = $Kinestesico;
		}
		public function setTotal($Total){
			$this -> Total = $Total;
		}

		public function getidTestAprendizaje(){
			return $this -> idTestAprendizaje;
        }
        public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
        public function getRespuestas(){
			return $this -> Respuestas;
        }
        public function getVisual(){
			return $this -> Visual;
        }
        public function getAuditivo(){
			return $this -> Auditivo;
        }
        public function getKinestesico(){
			return $this -> Kinestesico;
        }
        public function getTotal(){
			return $this -> Total;
        }
	}
?>