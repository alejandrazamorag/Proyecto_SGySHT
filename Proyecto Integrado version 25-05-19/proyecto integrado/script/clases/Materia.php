<?php
	class Materia{
		private $idMateria;	
		private $Carreras_idCarreras;
		private $Clave;
		private $Nombre;	
		private $Componente;	
		private $Semestre;
		private $Estatus;

		function __construct(){
			$this->idMateria=0;	
			$this->Carreras_idCarreras=0;
			$this->Clave=null;
			$this->Nombre=null;	
			$this->Componente=null;	
			$this->Semestre=0;
			$this->Estatus=0;
		}

		public function setidMateria($idMateria){
			$this -> idMateria = $idMateria;
		}
		public function setCarreras_idCarreras($Carreras_idCarreras){
			$this -> Carreras_idCarreras = $Carreras_idCarreras;
		}
		public function setClave($Clave){
			$this -> Clave = $Clave;
		}
		public function setNombre($Nombre){
			$this -> Nombre = $Nombre;
		}
		public function setComponente($Componente){
			$this -> Componente = $Componente;
		}
		public function setSemestre($Semestre){
			$this -> Semestre = $Semestre;
		}
		public function setEstatus($Estatus){
			$this -> Estatus = $Estatus;
		}
		public function getidMateria(){
			return $this -> idMateria;
        }
        public function getCarreras_idCarreras(){
			return $this -> Carreras_idCarreras;
        }
        public function getClave(){
			return $this -> Clave;
        }
        public function getNombre(){
			return $this -> Nombre;
        }
        public function getComponente(){
			return $this -> Componente;
        }
        public function getSemestre(){
			return $this -> Semestre;
        }
        public function getEstatus(){
			return $this -> Estatus;
        }
	}
?>
