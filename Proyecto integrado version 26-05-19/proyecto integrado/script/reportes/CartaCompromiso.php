<?php
session_start();
$idCartaCompromiso = $_GET['idCartaCompromiso'];

// Include the main TCPDF library (search for installation path).
require_once('../../TCPDF/TCPDF-master/tcpdf.php');
include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta2 = "SELECT * FROM `plantel` WHERE 1;";
$Resultado2 = $Mysql->Consulta($Consulta2);
while ($fila2 = $Resultado2->fetch_assoc()) {
	$Lugar = $fila2['Ciudad'] .", ". $fila2['Estado'];
	$NombrePlantel = strtoupper($fila2['Nombre']);
	$Plantel = $fila2['Ciudad'];

}
$Consulta = "SELECT alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno, familiares.Nombre AS NombreFamiliar,familiares.ApellidoP AS ApellidoPFamiliar ,familiares.ApellidoM AS ApellidoMFamiliar, personal.Nombre AS NombrePersonal , personal.ApellidoP AS ApellidoPPersonal, personal.ApellidoM AS ApellidoMPersonal ,carreras.Nombre AS NombreCarrera , grupos.Grupo , grupos.Grado, cartacompromiso.idCartaCompromiso, cartacompromiso.Fecha, cartacompromiso.AcuerdosRealizados, cartacompromiso.Lugar FROM alumno, familiares, personal, carreras, grupos, cartacompromiso WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND cartacompromiso.Alumno_idAlumno = alumno.idAlumno AND cartacompromiso.idFamiliar = familiares.idFamiliares AND cartacompromiso.idPersonal = personal.idPersonal AND cartacompromiso.idGrupo = grupos.idGrupos AND grupos.Carreras_idCarreras = carreras.idCarreras AND cartacompromiso.idCartaCompromiso = '".$idCartaCompromiso."' ;";
$Resultado = $Mysql->Consulta($Consulta);
while ($fila = $Resultado->fetch_assoc()) {
	$Fecha = $fila['Fecha'];



// Extend the TCPDF class to create custom Header and Footer
	class MYPDF extends TCPDF {

	//Page header
		public function Header() {

			include_once "../Clases/mysqlconector.php";
			$Mysql = new mysqlconector();
			$Mysql->Conectar();
			$Consulta2 = "SELECT * FROM `plantel` WHERE 1;";
			$Resultado2 = $Mysql->Consulta($Consulta2);
			while ($fila2 = $Resultado2->fetch_assoc()) {
				$Lugar = $fila2['Ciudad'] .", ". $fila2['Estado'];
				$NombrePlantel = strtoupper($fila2['Nombre']);
				$Plantel =  strtoupper($fila2['Ciudad']);
				$Clave = $fila2['Clave'];
				$LogoCECyTERioGrandeZac = $fila2['LogoCECyTERioGrandeZac'];
				$LogoSeduzac = $fila2['LogoSeduzac'];
			}

		// Logo Seduzac
			$this->Image('@'.$LogoCECyTERioGrandeZac, 20, 10, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// LogoCECyTE
			$this->Image('@'.$LogoSeduzac, 140, 10, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			$this->SetFont('helvetica', 'B', 11);
			$this->Ln();
			$this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
			$this->Ln();
			$this->Ln(5);
			$this->Cell(0, 10, ''.$NombrePlantel.'', 0, false, 'C', 0, '', 0, false, 'T', 'M');
			$this->Ln(8);
			$this->Cell(0, 10, ' PLANTEL: '.$Plantel.' '.$Clave.'', 0, false, 'C', 0, '', 0, false, 'T', 'M');

		}

	// Page footer
		public function Footer() {
		// Position at 15 mm from bottom
			$this->SetY(-15);
		// Set font
			$this->SetFont('helvetica', 'I', 8);
		// Page number
			$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		}
	}

// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Nicola Asuni');
	$pdf->SetTitle('Carta Compromiso');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
	$pdf->SetMargins(20, 52, 20);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}

// ---------------------------------------------------------
// add a page
	$pdf->AddPage();

// create some HTML content
	$html = '
	<b align="right"><i>Asunto: Carta Compromiso</i></b>
	<p align="right">Lugar: '.$fila['Lugar'].'</p>
	<p align="right">Fecha: '.$Fecha.'</p>

	<h4>Del Alumno:</h4>
	<div align="justify">En mi calidad de alumno: <br><b>'.$fila['NombreAlumno'].' '.$fila['ApellidoPAlumno'].' '.$fila['ApellidoMAlumno'].'</b>, Grupo: <b>'.$fila['Grado'] .'-'. $fila['Grupo'].'</b>,
	Carrera: <b>'.$fila['NombreCarrera'].'</b>
	me comprometo a participar como estudiante en todo lo que ello implica, Responsabilizandome de mi asistencia puntual a cada una de mis clases que la Coordinación Académica señale, así como el cumplimiento de las actividades de estudio y crecimiento personal para conducirme con la actitud de respeto y tolerancia hacia mis compañeros, hacia los docentes y personal de apoyo de la institución.
	<h4>Del Padre de Familia y/o Tutor Legal: </h4>
	Como padre de familia y/o tutor legal del alumno me responsabilizo en apoyar e impulsar la participación activa de mi hijo(a) en sus actividades del Colegio, asi como
	también en atender e involucrarme en las acciones que las autoridades del plantel me sugieran y que favorezcan al desarrollo integral y académico de mi hijo(a).

	<h4> Acuerdos Realizados: </h4><br>';
	$CadenaAcuerdosRealizados =explode("|", $fila['AcuerdosRealizados']);
	for ($i=0; $i < count($CadenaAcuerdosRealizados); $i++) {
		if($i==0){
			$html .= '<t>'.$CadenaAcuerdosRealizados[$i].'</t>';
		}else{
			$html .= '<br><t>'.$CadenaAcuerdosRealizados[$i].'</t>';
		}
	} 
	$html .='</div>
	<br>
	<p align="center"><b>Firman de Conformidad</b></p>
	<table class="egt" align="center" >
	<tr>
	<td><br><br><br>_________________________________<br><b>'.$fila['NombreAlumno'].' '.$fila['ApellidoPAlumno'].' '.$fila['ApellidoMAlumno'].'</b> <br>Firma del Alumno</td>
	<td><br><br><br>_________________________________<br> <b>'.$fila['NombreFamiliar'].' '.$fila['ApellidoPFamiliar'].' '.$fila['ApellidoMFamiliar'].'</b><br>Firma del Padre o tutor legal</td>

	</tr>
	<tr>
	<td><br><br><br><br>_________________________________<br><b>'.$fila['NombrePersonal'].' '.$fila['ApellidoPPersonal'].' '.$fila['ApellidoMPersonal'].'</b><br>Firma del Docente-Tutor</td>
	</tr>
	</table>';


	$pdf->SetFont('helvetica', '', 11);
	$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
	$pdf->Output('Carta Compromiso '.$fila['idCartaCompromiso'].'.pdf', 'I');
}

//============================================================+
// END OF FILE
//============================================================+
