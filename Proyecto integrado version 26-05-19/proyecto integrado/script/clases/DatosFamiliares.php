<?php
	class DatosFamiliares{
		private $idDatosFamiliares;
		private $Alumno_idAlumno;
		private $NoHermanos;
		private $LugarOcupas;
		private $OtrasPersonas;
		private $ActualmenteVives;
		private $SituacionFamiliar;
		private $RelacionPadres;

		function __construct(){
			$this->idDatosFamiliares=0;
			$this->idDatosFamiliares = 0;
			$this->Alumno_idAlumno=0;
			$this->NoHermanos=0;
			$this->LugarOcupas=null;
			$this->OtrasPersonas=null;
			$this->ActualmenteVives=null;
			$this->SituacionFamiliar=null;
			$this->RelacionPadres=null;
		}

		public function setidDatosFamiliares($idDatosFamiliares){
			$this->idDatosFamiliares=$idDatosFamiliares;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this->Alumno_idAlumno=$Alumno_idAlumno;
		}
		public function setNoHermanos($NoHermanos){
			$this ->NoHermanos=$NoHermanos;
		}
		public function setLugarOcupas($LugarOcupas){
			$this->LugarOcupas=$LugarOcupas;
		}
		public function setOtrasPersonas($OtrasPersonas){
			$this->OtrasPersonas=$OtrasPersonas;
		}
		public function setActualmenteVives($ActualmenteVives){
			$this->ActualmenteVives=$ActualmenteVives;
		}
		public function setSituacionFamiliar($SituacionFamiliar){
			$this->SituacionFamiliar=$SituacionFamiliar;
		}
		public function setRelacionPadres($RelacionPadres){
			$this->RelacionPadres=$RelacionPadres;
		}

		public function getidDatosFamiliares(){
			return $this->idDatosFamiliares;
        }
        public function getAlumno_idAlumno(){
			return $this->Alumno_idAlumno;
        }
        public function getNoHermanos(){
			return $this->NoHermanos;
        }
        public function getLugarOcupas(){
			return $this->LugarOcupas;
        }
        public function getOtrasPersonas(){
			return $this->OtrasPersonas;
        }
        public function getActualmenteVives(){
			return $this->ActualmenteVives;
        }
        public function getSituacionFamiliar(){
			return $this->SituacionFamiliar;
        }
        public function getRelacionPadres(){
			return $this->RelacionPadres;
        }
	}
?>