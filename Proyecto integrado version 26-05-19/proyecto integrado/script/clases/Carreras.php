<?php
	class Carreras{
		private $idCarreras;
		private $Clave;
		private $Nombre;
		private $AreaEspecialidad;
		private $Estatus;

		function __construct(){
			$this->idCarreras=0;
			$this->Clave=null;
			$this->Nombre=null;
			$this->AreaEspecialidad=null;
			$this->Estatus=0;
		}

		public function setidCarreras($idCarreras){
			$this -> idCarreras = $idCarreras;
		}
		public function setClave($Clave){
			$this -> Clave = $Clave;
		}
		public function setNombre($Nombre){
			$this -> Nombre = $Nombre;
		}
		public function setAreaEspecialidad($AreaEspecialidad){
			$this -> AreaEspecialidad = $AreaEspecialidad;
		}
		public function setEstatus($Estatus){
			$this -> Estatus = $Estatus;
		}
		public function getidCarreras(){
			return $this -> idCarreras;
        }
        public function getClave(){
			return $this -> Clave;
        }
        public function getNombre(){
			return $this -> Nombre;
        }
        public function getAreaEspecialidad(){
			return $this -> AreaEspecialidad;
        }
        public function getEstatus(){
			return $this -> Estatus;
        }
	}

?>