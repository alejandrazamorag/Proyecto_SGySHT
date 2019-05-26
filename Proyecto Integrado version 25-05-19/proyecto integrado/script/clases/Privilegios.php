<?php
class Privilegios{
	private $idPrivilegiosPrimaria;
	private $Usuarios_idUsuariosÍndice;
	private $TipoPrivilegio;

	function __construct(){
			$this-> idPrivilegiosPrimaria=0;
			$this-> Usuarios_idUsuariosÍndice=0;
			$this-> TipoPrivilegio=0;
		}

		public function setidPrivilegiosPrimaria($idPrivilegiosPrimaria){
			$this -> idPrivilegiosPrimaria = $idPrivilegiosPrimaria;
		}
		public function setUsuarios_idUsuariosÍndice($Usuarios_idUsuariosÍndice){
			$this -> Usuarios_idUsuariosÍndice = $Usuarios_idUsuariosÍndice;
		}
		public function setTipoPrivilegio($TipoPrivilegio){
			$this -> TipoPrivilegio = $TipoPrivilegio;
		}

		public function getidPrivilegiosPrimaria(){
			return $this -> idPrivilegiosPrimaria;
        }
        public function getUsuarios_idUsuariosÍndice(){
			return $this -> Usuarios_idUsuariosÍndice;
        }
        public function getTipoPrivilegio(){
			return $this -> TipoPrivilegio;
        }
}

?>