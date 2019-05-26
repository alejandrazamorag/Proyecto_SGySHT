<?php

 	class Domicilio{
 		private $idDomicilio;
 		private $CP;
 		private $Calle;
 		private $Numero;
 		private $Colonia;
 		private $Municipio;
 		private $Localidad;
 		private $Estado;
 		private $TelefonoCasa;


 		function __construct(){
 			$this->idDomicilio = 0;
 			$this->CP = 0;
			$this->Calle = null;
 			$this->Numero = 0;
 			$this->Colonia = null;
 			$this->Municipio = null;
 			$this->Localidad = null;
 			$this->Estado = null;
 			$this->TelefonoCasa = null;
 		}


 		public function setIdDomicilio($idDomicilio){
 			$this->idDomicilio=$idDomicilio;
 		}

 		public function getIdDomicilio(){
 			return $this->idDomicilio;
 		}

 		public function setCP($CP){
 			$this->CP=$CP;
 		}

 		public function getCP(){
 			return $this->CP;
 		}

 		public function setCalle($Calle){
 			$this->Calle=$Calle;
 		}

 		public function getCalle(){
 			return $this->Calle;
 		}

 		public function setNumero($Numero){
 			$this->Numero=$Numero;
 		}

 		public function getNumero(){
 			return $this->Numero;
 		}

 		public function setColonia($Colonia){
 			$this->Colonia=$Colonia;
 		}

 		public function getColonia(){
 			return $this->Colonia;
 		}

 		public function setMunicipio($Municipio){
 			$this->Municipio=$Municipio;
 		}

 		public function getMunicipio(){
 			return $this->Municipio;
 		}

 		public function setLocalidad($Localidad){
 			$this->Localidad=$Localidad;
 		}

 		public function getLocalidad(){
 			return $this->Localidad;
 		}

 		public function setEstado($Estado){
 			$this->Estado=$Estado;
 		}

 		public function getEstado(){
 			return $this->Estado;
 		}

 		public function setTelefonoCasa($TelefonoCasa){
 			$this->TelefonoCasa=$TelefonoCasa;
 		}

 		public function getTelefonoCasa(){
 			return $this->TelefonoCasa;
 		}

 	}

 ?>