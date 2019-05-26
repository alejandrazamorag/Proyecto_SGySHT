<?php
	class ExpectativaNuevaForm{
		private $idExpectativaNuevaForm;
		private $Alumno_idAlumno;
		private $Atraccion;
		private $Preocupacion;
		private $EstudiosEs;
		private $ProblemaCausa;
		private $Preparado;
		private $ValorarProfesor;

		function __construct(){

			$this-> idExpectativaNuevaForm=0;
			$this-> Alumno_idAlumno=0;
			$this-> Atraccion=null;
			$this-> Preocupacion=null;
			$this-> EstudiosEs=null;
			$this-> ProblemaCausa=null;
			$this-> Preparado=null;
			$this-> ValorarProfesor=null;
		}


		public function setidExpectativaNuevaForm($idExpectativaNuevaForm){
			$this -> idExpectativaNuevaForm = $idExpectativaNuevaForm;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}
		public function setAtraccion($Atraccion){
			$this -> Atraccion = $Atraccion;
		}
		public function setPreocupacion($Preocupacion){
			$this -> Preocupacion = $Preocupacion;
		}
		public function setEstudiosEs($EstudiosEs){
			$this -> EstudiosEs = $EstudiosEs;
		}
		public function setProblemaCausa($ProblemaCausa){
			$this -> ProblemaCausa = $ProblemaCausa;
		}
		public function setPreparado($Preparado){
			$this -> Preparado = $Preparado;
		}
		public function setValorarProfesor($ValorarProfesor){
			$this -> ValorarProfesor = $ValorarProfesor;
		}

		public function getidExpectativaNuevaForm(){
			return $this -> idExpectativaNuevaForm;
        }
        public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
        public function getAtraccion(){
			return $this -> Atraccion;
        }
        public function getPreocupacion(){
			return $this -> Preocupacion;
        }
        public function getEstudiosEs(){
			return $this -> EstudiosEs;
        }
        public function getProblemaCausa(){
			return $this -> ProblemaCausa;
        }
        public function getPreparado(){
			return $this -> Preparado;
        }
        public function getValorarProfesor(){
			return $this -> ValorarProfesor;
        }
	}
?>