<?php
	class Secundaria{

		private $idSecundaria;
		private $Matricula;
		private $Nombre;
		private $Municipio;
		private $Estado;
		private $Pais;


		function __construct(){
			$this->idSecundaria = 0;
			$this->Matricula = null;
			$this->Nombre = null;
			$this->Municipio = null;
			$this->Estado = null;
			$this->Pais = null;
		}

		public function setidSecundaria($idSecundaria){
			$this -> idSecundaria = $idSecundaria;
		}
		public function setMatricula($Matricula){
			$this -> Matricula = $Matricula;
		}
		public function setNombre($Nombre){
			$this -> Nombre = $Nombre;
		}
		public function setMunicipio($Municipio){
			$this -> Municipio = $Municipio;
		}
		public function setEstado($Estado){
			$this -> Estado = $Estado;
		}
		public function setPais($Pais){
			$this -> Pais = $Pais;
		}

		public function getidSecundaria(){
			return $this -> idSecundaria;
        }
        public function getMatricula(){
			return $this -> Matricula;
        }
        public function getNombre(){
			return $this -> Nombre;
        }
        public function getMunicipio(){
			return $this -> Municipio;
        }
        public function getEstado(){
			return $this -> Estado;
        }
        public function getPais(){
			return $this -> Pais;
        }

	}
?>