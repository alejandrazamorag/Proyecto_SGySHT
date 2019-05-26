<?php
	class CartaResponsiva
	{
		private $idCartaResponsiva;
		private $Alumno_idAlumno;	
		private $idFamiliares;
		private $idPersonal;
		private $Lugar;	
		private $Fecha;	
		private $Motivos;	
		private $CompromisosPadres;	
		private $CompromisosAlumnos;
		private $Asunto;
		private $idGrupo;

		
		function __construct(){
			$this-> idCartaResponsiva=0;
			$this-> Alumno_idAlumno=0;	
			$this-> idFamiliares=0;
			$this-> idPersonal=0;
			$this-> Lugar=null;	
			$this-> Fecha=null;
			$this-> Motivos=null;	
			$this-> CompromisosPadres=null;	
			$this-> CompromisosAlumnos=null;
			$this-> Asunto=null;
			$this-> idGrupo=0;
			
		}

		public function setidCartaResponsiva($idCartaResponsiva){
			$this -> idCartaResponsiva = $idCartaResponsiva;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}
		public function setidFamiliares($idFamiliares){
			$this -> idFamiliares = $idFamiliares;
		}
		public function setidPersonal($idPersonal){
			$this -> idPersonal = $idPersonal;
		}
		public function setLugar($Lugar){
			$this -> Lugar = $Lugar;
		}
		public function setFecha($Fecha){
			$this -> Fecha = $Fecha;
		}
		public function setMotivos($Motivos){
			$this -> Motivos = $Motivos;
		}
		public function setCompromisosPadres($CompromisosPadres){
			$this -> CompromisosPadres = $CompromisosPadres;
		}
		public function setCompromisosAlumnos($CompromisosAlumnos){
			$this -> CompromisosAlumnos = $CompromisosAlumnos;
		}
		public function setAsunto($Asunto){
			$this -> Asunto = $Asunto;
		}
		public function setidGrupo($idGrupo){
			$this -> idGrupo = $idGrupo;
		}
		

		 public function getidCartaResponsiva(){
			return $this -> idCartaResponsiva;
        }
         public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
         public function getidFamiliares(){
			return $this -> idFamiliares;
        }
         public function getidPersonal(){
			return $this -> idPersonal;
        }
         public function getLugar(){
			return $this -> Lugar;
        }
         public function getFecha(){
			return $this -> Fecha;
        }
         public function getMotivos(){
			return $this -> Motivos;
        }
         public function getCompromisosPadres(){
			return $this -> CompromisosPadres;
        }
         public function getCompromisosAlumnos(){
			return $this -> CompromisosAlumnos;
        }
         public function getAsunto(){
			return $this -> Asunto;
        }
         public function getidGrupo(){
			return $this -> idGrupo;
        }
	}
?>