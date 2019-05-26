<?php
	class HabitosEstudios{
		
		private $idHabitosEstudio;
		private $Alumno_idAlumno;
		private $TiempoTarea;
		private $TiempoEstudio;
		private $TiempoLectura;
		private $LugarEstudio;
		private $TecnicasEstudio;
		private $EstimulacionEstudio;
		private $MotivoAprender;
		private $MotivoInteres;
		private $MotivoSatisfaccion;
		private $MotivoFracaso;
		private $MotivoAgradecer;
		private $MotivoPremio;
		private $MotivoHacer;

		function __construct(){
			$this-> idHabitosEstudio = 0;
			$this-> Alumno_idAlumno = 0;
			$this -> TiempoTarea = null;
			$this -> TiempoEstudio = null;
			$this -> TiempoLectura = null;
			$this -> LugarEstudio = null;
			$this -> TecnicasEstudio = null;
			$this -> EstimulacionEstudio = null;
			$this -> MotivoAprender = null;
			$this -> MotivoInteres = null;
			$this -> MotivoSatisfaccion = null;
			$this -> MotivoFracaso = null;
			$this -> MotivoAgradecer = null;
			$this -> MotivoPremio = null;
			$this -> MotivoHacer = null;

		}
		

		public function setidHabitosEstudio($idHabitosEstudio){
			$this -> idHabitosEstudio = $idHabitosEstudio;
		}

		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}

		public function setTiempoTarea($TiempoTarea){
			$this -> TiempoTarea = $TiempoTarea;
		}

		public function setTiempoEstudio($TiempoEstudio){
			$this -> TiempoEstudio = $TiempoEstudio;
		}

		public function setTiempoLectura($TiempoLectura){
			$this -> TiempoLectura = $TiempoLectura;
		}

		public function setLugarEstudio($LugarEstudio){
			$this -> LugarEstudio = $LugarEstudio;
		}

		public function setTecnicasEstudio($TecnicasEstudio){
			$this -> TecnicasEstudio = $TecnicasEstudio;
		}

		public function setEstimulacionEstudio($EstimulacionEstudio){
			$this -> EstimulacionEstudio = $EstimulacionEstudio;
		}

		public function setMotivoAprender($MotivoAprender){
			$this -> MotivoAprender = $MotivoAprender;
		}
		
		public function setMotivoInteres($MotivoInteres){
			$this -> MotivoInteres = $MotivoInteres;
		}
		
		public function setMotivoSatisfaccion($MotivoSatisfaccion){
			$this -> MotivoSatisfaccion = $MotivoSatisfaccion;
		}
		
		public function setMotivoFracaso($MotivoFracaso){
			$this -> MotivoFracaso = $MotivoFracaso;
		}
		
		public function setMotivoAgradecer($MotivoAgradecer){
			$this -> MotivoAgradecer = $MotivoAgradecer;
		}
		
		public function setMotivoPremio($MotivoPremio){
			$this -> MotivoPremio = $MotivoPremio;
		}

		public function setMotivoHacer($MotivoHacer){
			$this -> MotivoHacer = $MotivoHacer;
		}

		public function getidHabitosEstudio(){
			return $this -> idHabitosEstudio;
        }

		public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }

        public function getTiempoTarea(){
			return $this -> TiempoTarea;
        }
        
        public function getTiempoEstudio(){
			return $this -> TiempoEstudio;
        }
        
        public function getTiempoLectura(){
			return $this -> TiempoLectura;
        }
        
        public function getLugarEstudio(){
			return $this -> LugarEstudio;
        }

        public function getTecnicasEstudio(){
			return $this -> TecnicasEstudio;
        }
        
        public function getEstimulacionEstudio(){
			return $this -> EstimulacionEstudio;
        }
        
        public function getMotivoAprender(){
			return $this -> MotivoAprender;
        }
        
        public function getMotivoInteres(){
			return $this -> MotivoInteres;
        }
        
        public function getMotivoSatisfaccion(){
			return $this -> MotivoSatisfaccion;
        }
        
        public function getMotivoFracaso(){
			return $this -> MotivoFracaso;
        }
        
        public function getMotivoAgradecer(){
			return $this -> MotivoAgradecer;
        }
        
        public function getMotivoPremio(){
			return $this -> MotivoPremio;
        }

        public function getMotivoHacer(){
			return $this -> MotivoHacer;
        }

	}

?>
