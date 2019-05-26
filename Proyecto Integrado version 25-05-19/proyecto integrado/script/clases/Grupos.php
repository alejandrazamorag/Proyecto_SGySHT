<?php
	class Grupos{
	private $idGrupos;
	private $idAsesor;
	private $Carreras_idCarreras;
	private $Grupo;
	private $Grado;
	private $CicloEscolar;
	private $Estatus;

	function __construct(){
		$this->idGrupos=0;
		$this->idAsesor=0;
		$this->Carreras_idCarreras=0;
		$this->Grupo=null;
		$this->Grado=0;
		$this->CicloEscolar=null;
		$this->Estatus=0;
	}

	public function setidGrupos($idGrupos){
			$this -> idGrupos = $idGrupos;
		}
		public function setidAsesor($idAsesor){
			$this -> idAsesor = $idAsesor;
		}
		public function setCarreras_idCarreras($Carreras_idCarreras){
			$this -> Carreras_idCarreras = $Carreras_idCarreras;
		}
		public function setGrupo($Grupo){
			$this -> Grupo = $Grupo;
		}
		public function setGrado($Grado){
			$this -> Grado = $Grado;
		}
		public function setCicloEscolar($CicloEscolar){
			$this -> CicloEscolar = $CicloEscolar;
		}
		public function setEstatus($Estatus){
			$this -> Estatus = $Estatus;
		}
		public function getidGrupos(){
			return $this -> idGrupos;
        }
        public function getidAsesor(){
			return $this -> idAsesor;
        }
        public function getCarreras_idCarreras(){
			return $this -> Carreras_idCarreras;
        }
        public function getGrupo(){
			return $this -> Grupo;
        }
        public function getGrado(){
			return $this -> Grado;
        }
        public function getCicloEscolar(){
			return $this -> CicloEscolar;
        }
         public function getEstatus(){
			return $this -> Estatus;
        }
	}
?>