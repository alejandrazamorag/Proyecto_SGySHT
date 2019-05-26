<?php
	class UsuariosAlumnos{
		private $idUsuariosAlumnos;
		private $Alumno_idAlumno;
		private $NombreUsuario;
		private $Contrasena;

		function __construct(){
			$this-> idUsuariosAlumnos=0;
			$this-> Alumno_idAlumno=0;
			$this-> NombreUsuario=null;
			$this-> Contrasena=null;
		}

		public function setidUsuariosAlumnos($idUsuariosAlumnos){
			$this -> idUsuariosAlumnos = $idUsuariosAlumnos;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}
		public function setNombreUsuario($NombreUsuario){
			$this -> NombreUsuario = $NombreUsuario;
		}
		public function setContrasena($Contrasena){
			$this -> Contrasena = $Contrasena;
		}

		public function getidUsuariosAlumnos(){
			return $this -> idUsuariosAlumnos;
        }
        public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
        public function getNombreUsuario(){
			return $this -> NombreUsuario;
        }
        public function getContrasena(){
			return $this -> Contrasena;
        }
	}
?>