<?php
session_start();
$idCartaResponsiva= $_GET['idCartaResponsiva'];

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

$Consulta = "SELECT alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno, familiares.Nombre AS NombreFamiliar,familiares.ApellidoP AS ApellidoPFamiliar ,familiares.ApellidoM AS ApellidoMFamiliar, personal.Nombre AS NombrePersonal , personal.ApellidoP AS ApellidoPPersonal, personal.ApellidoM AS ApellidoMPersonal ,carreras.Nombre AS NombreCarrera , grupos.Grupo , grupos.Grado, cartaresponsiva.idCartaResponsiva, cartaresponsiva.Fecha ,cartaresponsiva.Motivos ,cartaresponsiva.CompromisosPadres,cartaresponsiva.CompromisosAlumnos, cartaresponsiva.Lugar FROM alumno, familiares, personal, carreras, grupos, cartaresponsiva WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND cartaresponsiva.Alumno_idAlumno = alumno.idAlumno AND cartaresponsiva.idFamiliares = familiares.idFamiliares AND cartaresponsiva.idPersonal = personal.idPersonal AND cartaresponsiva.idGrupo = grupos.idGrupos AND grupos.Carreras_idCarreras = carreras.idCarreras AND cartaresponsiva.idCartaResponsiva = '".$idCartaResponsiva."';";
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
	<b align="right"><i>Asunto: Carta Responsiva</i></b>
	<p align="right">Lugar: '.$fila['Lugar'].'</p>
	<p align="right">Fecha: '.$Fecha.'</p>

	<div align="justify">Por medio del presente e hace constar que acude el Sr.(a) <b>'.$fila['NombreFamiliar'].' '.$fila['ApellidoPFamiliar'].' '.$fila['ApellidoMFamiliar'].'</b> padre de familia o tutor legal del alumno(a) <b>'.$fila['NombreAlumno'].' '.$fila['ApellidoPAlumno'].' '.$fila['ApellidoMAlumno'].'</b> de la carrera <b>'.$fila['NombreCarrera'].'</b>, del grupo: <b>'.$fila['Grado'] .'-'. $fila['Grupo'].'</b> para tratar asuntos de disciplina y académicos de su hijo, ya que es consciente de la importancia y transcendencia que tiene  que su hijo curse con exito su Educación en Nivel Media Superior, así como de la responsabilidad que como tutor(a) le corresponde para contribuir a que lleve a cabo con éxito su preparación académica.

	<h4> Los motivos por que se a solicitado la presencia  de los padres de familia son los siguientes: </h4><br>';
	$CadenaMotivos =explode("|", $fila['Motivos']);
	for ($i=0; $i < count($CadenaMotivos); $i++) {
		if($i==0){
			$html .= '<t>'.$CadenaMotivos[$i].'</t>';
		}else{
			$html .= '<br><t>'.$CadenaMotivos[$i].'</t>';
		}
	} 
	$html .='<div class="row">
					<div class="col-md-6">
						<h4> Compromiso de los padres de familia </h4><br>';
						$CadenaCompromisosPadres =explode("|", $fila['CompromisosPadres']);
						for ($i=0; $i < count($CadenaCompromisosPadres); $i++) {
							if($i==0){
								$html .= '<t>'.$CadenaCompromisosPadres[$i].'</t>';
							}else{
								$html .= '<br><t>'.$CadenaCompromisosPadres[$i].'</t>';
							}
						} 
	$html .= '		</div>
					<div class="col-md-6">
						<h4> Compromiso de los alumnos</h4><br>';
						$CadenaCompromisosAlumnos =explode("|", $fila['CompromisosAlumnos']);
						for ($i=0; $i < count($CadenaCompromisosAlumnos); $i++) {
							if($i==0){
								$html .= '<t>'.$CadenaCompromisosAlumnos[$i].'</t>';
							}else{
								$html .= '<br><t>'.$CadenaCompromisosAlumnos[$i].'</t>';
							}
						} 
	$html .= '		</div>
			</div>';
	$html .='</div>
	<p align="center"><b>Firman de Conformidad</b></p>
	<table class="egt" align="center" >
	<tr>
	<td><br><br>_________________________________<br><b>'.$fila['NombreAlumno'].' '.$fila['ApellidoPAlumno'].' '.$fila['ApellidoMAlumno'].'</b> <br>Firma del Alumno</td>
	<td><br><br>_________________________________<br> <b>'.$fila['NombreFamiliar'].' '.$fila['ApellidoPFamiliar'].' '.$fila['ApellidoMFamiliar'].'</b><br>Firma del Padre o tutor legal</td>

	</tr>
	<tr>
	<td><br><br>_________________________________<br><b>'.$fila['NombrePersonal'].' '.$fila['ApellidoPPersonal'].' '.$fila['ApellidoMPersonal'].'</b><br>Firma del Docente-Tutor</td>
	</tr>
	</table>';


	$pdf->SetFont('helvetica', '', 11);
	$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
	$pdf->Output('Carta Responsiva '.$fila['idCartaResponsiva'].'.pdf', 'I');
}

//============================================================+
// END OF FILE
//============================================================+
