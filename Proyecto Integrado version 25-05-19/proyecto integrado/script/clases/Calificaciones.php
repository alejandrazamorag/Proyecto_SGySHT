<?php
class Calificaciones
{
		private $idCalificaciones;	
		private $MateriaGruposDocentes_idMateriaGruposDocentes;	
		private $Alumno_idAlumno;	
		private $PrimerParcial;	
		private $SegundoParcial;
		private $TercerParcial;	
		private $EXT;	
		private $Total;	
		private $F1;
		private $F2;
		private $F3;

		function __construct()
		{
			$this-> idCalificaciones=0;	
			$this-> MateriaGruposDocentes_idMateriaGruposDocentes=0;
			$this-> Alumno_idAlumno	= 0;
			$this-> PrimerParcial = 0;	
			$this-> SegundoParcial = 0;	
			$this-> TercerParcial= 0;
			$this-> EXT=0;
			$this-> Total=0;
			$this-> F1=0;
			$this-> F2=0;
			$this-> F3=0;
		}

		public function setidCalificaciones($idCalificaciones){
			$this -> idCalificaciones = $idCalificaciones;
		}
		public function setMateriaGruposDocentes_idMateriaGruposDocentes($MateriaGruposDocentes_idMateriaGruposDocentes){
			$this -> MateriaGruposDocentes_idMateriaGruposDocentes = $MateriaGruposDocentes_idMateriaGruposDocentes;
		}
		public function setAlumno_idAlumno($Alumno_idAlumno){
			$this -> Alumno_idAlumno = $Alumno_idAlumno;
		}
		public function setPrimerParcial($PrimerParcial){
			$this -> PrimerParcial = $PrimerParcial;
		}
		public function setSegundoParcial($SegundoParcial){
			$this -> SegundoParcial = $SegundoParcial;
		}
		public function setTercerParcial($TercerParcial){
			$this -> TercerParcial = $TercerParcial;
		}
		public function setEXT($EXT){
			$this -> EXT = $EXT;
		}
		public function setiTotal($Total){
			$this -> Total = $Total;
		}
		public function setF1($F1){
			$this -> F1 = $F1;
		}
		public function setF2($F2){
			$this -> F2 = $F2;
		}
		public function setF3($F3){
			$this -> F3 = $F3;
		}

		public function getidCalificaciones(){
			return $this -> idCalificaciones;
        }
        public function getMateriaGruposDocentes_idMateriaGruposDocentes(){
			return $this -> MateriaGruposDocentes_idMateriaGruposDocentes;
        }
        public function getAlumno_idAlumno(){
			return $this -> Alumno_idAlumno;
        }
        public function getPrimerParcial(){
			return $this -> PrimerParcial;
        }
        public function getSegundoParcial(){
			return $this -> SegundoParcial;
        }
        public function getTercerParcial(){
			return $this -> TercerParcial;
        }
        public function getEXT(){
			return $this -> EXT;
        }
         public function getTotal(){
			return $this -> Total;
        }
        public function getF1(){
			return $this -> F1;
        }
        public function getF2(){
			return $this -> F2;
        }
        public function getF3(){
			return $this -> F3;
        }
       
	}
?>