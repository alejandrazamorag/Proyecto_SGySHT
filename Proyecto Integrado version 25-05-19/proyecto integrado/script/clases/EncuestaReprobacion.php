<?php
	class EncuestaReprobacion{
		private $idEncuestaReprobacion;	
		private $Alumno_idAlumno;	
		private $MateriasReprobadas;
		private $Parcial;	
		private $Causas;
		private $Sugerencia;	
		private $Compromisos;	
		private $Comentarios;	
		private $idGrupo;	
		private $idTutor;	
		private $idFamiliar;
		private $Fecha;



		function __construct(){
			$this->idEncuestaReprobacion=0;
			$this->Alumno_idAlumno=0;	
			$this->MateriasReprobadas=null;	
			$this->Parcial=0;	
			$this->Causas=null;	
			$this->Sugerencia=null;	
			$this->Compromisos=null;	
			$this->Comentarios=null;
			$this->idGrupo=0;	
			$this->idTutor=0;	
			$this->idFamiliar=0;
			$this->Fecha=null;

		}
		
		public function setidEncuestaReprobacion($idEncuestaReprobacion){
			$this -> idEncuestaReprobacion = $idEncuestaReprobacion;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}
		public function setMateriasReprobadas($MateriasReprobadas){
			$this -> MateriasReprobadas = $MateriasReprobadas;
		}
		public function setParcial($Parcial){
			$this -> Parcial = $Parcial;
		}
		public function setCausas($Causas){
			$this -> Causas = $Causas;
		}
		public function setSugerencia($Sugerencia){
			$this -> Sugerencia = $Sugerencia;
		}
		public function setCompromisos($Compromisos){
			$this -> Compromisos = $Compromisos;
		}
		public function setiComentarios($Comentarios){
			$this -> Comentarios = $Comentarios;
		}
		public function setidGrupo($idGrupo){
			$this -> idGrupo = $idGrupo;
		}
		public function setidTutor($idTutor){
			$this -> idTutor = $idTutor;
		}
		public function setidFamiliar($idFamiliar){
			$this -> idFamiliar = $idFamiliar;
		}
		public function setFecha($Fecha){
			$this -> Fecha = $Fecha;
		}

		public function getidEncuestaReprobacion(){
			return $this -> idEncuestaReprobacion;
        }
        public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
        public function getMateriasReprobadas(){
			return $this -> MateriasReprobadas;
        }
        public function getParcial(){
			return $this -> Parcial;
        }
        public function getCausas(){
			return $this -> Causas;
        }
        public function getSugerencia(){
			return $this -> Sugerencia;
        }
        public function getCompromisos(){
			return $this -> Compromisos;
        }
        public function getComentarios(){
			return $this -> Comentarios;
        }
        public function getidGrupo(){
			return $this -> idGrupo;
        }
        public function getidTutor(){
			return $this -> idTutor;
        }
        public function getidFamiliar(){
			return $this -> idFamiliar;
        }
        public function getFecha(){
			return $this -> Fecha;
        }
	}
?>
