<?php

 	class LugarNacimiento{
 		private $idLugarNacimiento;
 		private $Pais;
 		private $Estado;
 		private $Localidad;
 		private $Municipio;


 		function __construct(){
 			$this->idLugarNacimiento = 0;
 			$this->Pais = null;
			$this->Estado = null;
 			$this->Localidad = null;
 			$this->Municipio = null;
 		}


 		public function setidLugarNacimiento($idLugarNacimiento){
 			$this->idLugarNacimiento=$idLugarNacimiento;
 		}

 		public function getidLugarNacimiento(){
 			return $this->idLugarNacimiento;
 		}

 		public function setPais($Pais){
 			$this->Pais=$Pais;
 		}

 		public function getPais(){
 			return $this->Pais;
 		}

 		public function setEstado($Estado){
 			$this->Estado=$Estado;
 		}

 		public function getEstado(){
 			return $this->Estado;
 		}

 		public function setLocalidad($Localidad){
 			$this->Localidad=$Localidad;
 		}

 		public function getLocalidad(){
 			return $this->Localidad;
 		}

 		public function setMunicipio($Municipio){
 			$this->Municipio=$Municipio;
 		}

 		public function getMunicipio(){
 			return $this->Municipio;
 		}
 	}

 ?>