<?php
	class DatosEscolares{
		private $idDatosEscolares;
		private $Alumno_idAlumno;
		private $Secundaria_idSecundaria;
		private $PromedioSecu;
		private $OtrosEstudios;
		private $RendimientoEscolar;
		private $MateriaGustada;
		private $MateriaDisgustada;
		private $ReaccionPadres;
		private $Expectativa;

		function __construct(){
			$this-> idDatosEscolares = 0;
			$this-> Alumno_idAlumno = 0;
			$this-> Secundaria_idSecundaria = 0;
			$this-> PromedioSecu = 0;
			$this-> OtrosEstudios = null;
			$this-> RendimientoEscolar = null;
			$this-> MateriaGustada = null;
			$this-> MateriaDisgustada = null;
			$this-> ReaccionPadres = null;
			$this-> Expectativa = null;
		}


		public function setidDatosEscolares($idDatosEscolares){
			$this -> idDatosEscolares = $idDatosEscolares;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}

		public function setSecundaria_idSecundaria($Secundaria_idSecundaria){
			$this -> Secundaria_idSecundaria = $Secundaria_idSecundaria;
		}

		public function setPromedioSecu($PromedioSecu){
			$this -> PromedioSecu = $PromedioSecu;
		}
		public function setOtrosEstudios($OtrosEstudios){
			$this -> OtrosEstudios = $OtrosEstudios;
		}
		public function setRendimientoEscolar($RendimientoEscolar){
			$this -> RendimientoEscolar = $RendimientoEscolar;
		}
		public function setMateriaGustada($MateriaGustada){
			$this -> MateriaGustada = $MateriaGustada;
		}
		public function setMateriaDisgustada($MateriaDisgustada){
			$this -> MateriaDisgustada = $MateriaDisgustada;
		}
		public function setReaccionPadres($ReaccionPadres){
			$this -> ReaccionPadres = $ReaccionPadres;
		}
		public function setExpectativa($Expectativa){
			$this -> Expectativa = $Expectativa;
		}
		

		public function getidDatosEscolares(){
			return $this -> idDatosEscolares;
        }
        public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
        public function getSecundaria_idSecundaria(){
			return $this -> Secundaria_idSecundaria;
        }
        public function getPromedioSecu(){
			return $this -> PromedioSecu;
        }
        public function getOtrosEstudios(){
			return $this -> OtrosEstudios;
        }
        public function getRendimientoEscolar(){
			return $this -> RendimientoEscolar;
        }
        public function getMateriaGustada(){
			return $this -> MateriaGustada;
        }
        public function getMateriaDisgustada(){
			return $this -> MateriaDisgustada;
        }
        public function getReaccionPadres(){
			return $this -> ReaccionPadres;
        }

        public function getExpectativa(){
			return $this -> Expectativa;
        }
        


	}
?>