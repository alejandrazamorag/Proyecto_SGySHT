<?php
	class MateriaGruposDocentes{

		private $idMateriaGruposDocentes;	
		private $Personal_idPersonal;	
		private $Materia_idMateria;	
		private $idGrupo;
		
		function __construct(){
			$this-> idMateriaGruposDocentes=0;
			$this-> Personal_idPersonal=0;
			$this-> Materia_idMateria=0;
			$this-> idGrupo=0;

		}

		public function setidMateriaGruposDocentes($idMateriaGruposDocentes){
			$this -> idMateriaGruposDocentes = $idMateriaGruposDocentes;
		}
		public function setPersonal_idPersonal($Personal_idPersonal){
			$this -> Personal_idPersonal = $Personal_idPersonal;
		}
		public function setMateria_idMateria($Materia_idMateria){
			$this -> Materia_idMateria = $Materia_idMateria;
		}
		public function setidGrupo($idGrupo){
			$this -> idGrupo = $idGrupo;
		}

		public function getidMateriaGruposDocentes(){
			return $this -> idMateriaGruposDocentes;
        }
        public function getPersonal_idPersonal(){
			return $this -> Personal_idPersonal;
        }
        public function getMateria_idMateria(){
			return $this -> Materia_idMateria;
        }
        public function getidGrupo(){
			return $this -> idGrupo;
        }
	}
?>


