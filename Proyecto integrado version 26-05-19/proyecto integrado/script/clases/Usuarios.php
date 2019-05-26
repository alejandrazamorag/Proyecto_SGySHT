<?php
class Usuarios{
	private $idUsuarios;
	private $Personal_idPersonal;
	private $NombreUsuario;
	private $Contrasena;

	function __construct(){
			$this-> idUsuarios=0;
			$this-> Personal_idPersonal=0;
			$this-> NombreUsuario=null;
			$this-> Contrasena=null;
		}

		public function setidUsuarios($idUsuarios){
			$this -> idUsuarios = $idUsuarios;
		}
		public function setPersonal_idPersonal($Personal_idPersonal){
			$this -> Personal_idPersonal = $Personal_idPersonal;
		}
		public function setNombreUsuario($NombreUsuario){
			$this -> NombreUsuario = $NombreUsuario;
		}
		public function setContrasena($Contrasena){
			$this -> Contrasena = $Contrasena;
		}

		public function getidUsuarios(){
			return $this -> idUsuarios;
        }
        public function getPersonal_idPersonal(){
			return $this -> Personal_idPersonal;
        }
        public function getNombreUsuario(){
			return $this -> NombreUsuario;
        }
        public function getContrasena(){
			return $this -> Contrasena;
        }
}
?>