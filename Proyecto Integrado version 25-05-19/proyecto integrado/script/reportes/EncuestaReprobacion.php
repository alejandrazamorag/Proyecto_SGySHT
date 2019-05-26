<?php
session_start();
$idEncuestaReprobacion= $_GET['idEncuestaReprobacion'];

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


$Consulta = "SELECT idEncuestaReprobacion, CONCAT(alumno.Nombre,' ',alumno.ApellidoP,' ',alumno.ApellidoM) AS NombreAlumno, encuestareprobacion.MateriasReprobadas,encuestareprobacion.Parcial,encuestareprobacion.Causas,encuestareprobacion.Sugerencia,encuestareprobacion.Compromisos,encuestareprobacion.Comentarios,grupos.Grado,grupos.Grupo, carreras.Nombre, CONCAT(personal.Nombre,' ',personal.ApellidoP,' ',personal.ApellidoM) AS NombreTutor, CONCAT(familiares.Nombre,' ',familiares.ApellidoP,' ',familiares.ApellidoM) AS NombreFamiliar, encuestareprobacion.Fecha FROM encuestareprobacion INNER JOIN alumno ON encuestareprobacion.Alumno_idAlumno=alumno.idAlumno INNER JOIN grupos on alumno.Grupos_idGrupos=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras INNER JOIN personal ON encuestareprobacion.idTutor=personal.idPersonal INNER JOIN familiares ON encuestareprobacion.idFamiliar=familiares.idFamiliares WHERE encuestareprobacion.idEncuestaReprobacion= '".$idEncuestaReprobacion."';";
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
	<b style="text-align: center;"><i><h2>Encuesta de reprobación</h2></i></b>

	<div align="justify">Nombre del alumno(a) <b>'.$fila['NombreAlumno'].'</b><br> Carrera y semestre: <b>'.$fila['Grado'] .'-'. $fila['Grupo'].'</b> <b>'.$fila['Nombre'].'</b><br>Parcial: <b>'.$fila['Parcial'].'</b> Fecha: <b>'.$fila['Fecha'].'</b>

	<h4> I. Nombre de las(s) materias(s) reprobada(s). </h4><br>';
	$CadenaMateriasReprobadas =explode("|", $fila['MateriasReprobadas']);
	for ($i=0; $i < count($CadenaMateriasReprobadas); $i++) {
		if($i==0){
			$html .= '<t>'.$CadenaMateriasReprobadas[$i].'</t>';
		}else{
			$html .= '<br><t>'.$CadenaMateriasReprobadas[$i].'</t>';
		}
	} 
	$html .='<div class="row">
					<div class="col-md-6">
						<h4>II.¿Cuáles crees que son las causas por que reprobaste? Menciona de la más importante a la menos:</h4><br>';
						$CadenaCausas =explode("|", $fila['Causas']);
						for ($i=0; $i < count($CadenaCausas); $i++) {
							if($i==0){
								$html .= '<t>'.$CadenaCausas[$i].'</t>';
							}else{
								$html .= '<br><t>'.$CadenaCausas[$i].'</t>';
							}
						} 
	$html .= '		</div>
					<div class="col-md-6">
						<h4> III. Qué sugerencias puedes hacer para mejorar las materias:</h4><br>';
						$CadenaSugerencia =explode("|", $fila['Sugerencia']);
						for ($i=0; $i < count($CadenaSugerencia); $i++) {
							if($i==0){
								$html .= '<t>'.$CadenaSugerencia[$i].'</t>';
							}else{
								$html .= '<br><t>'.$CadenaSugerencia[$i].'</t>';
							}
						} 
	$html .= '		</div>
					<div class="col-md-6">
						<h4> IV. Cuáles son los compromisos que tu estableces:</h4><br>';
						$CadenaCompromisos =explode("|", $fila['Compromisos']);
						for ($i=0; $i < count($CadenaCompromisos); $i++) {
							if($i==0){
								$html .= '<t>'.$CadenaCompromisos[$i].'</t>';
							}else{
								$html .= '<br><t>'.$CadenaCompromisos[$i].'</t>';
							}
						} 
	$html .= '		</div>
					<div class="col-md-6">
						<h4> V.Expresa tus comentarios</h4><br>';
						$CadenaComentarios =explode("|", $fila['Comentarios']);
						for ($i=0; $i < count($CadenaComentarios); $i++) {
							if($i==0){
								$html .= '<t>'.$CadenaComentarios[$i].'</t>';
							}else{
								$html .= '<br><t>'.$CadenaComentarios[$i].'</t>';
							}
						} 					
	$html .= '		</div>
			</div>';
	
	$html .='</div>
	<p align="center"><b>Firman de Conformidad</b></p>
	<table class="egt" align="center" >
	<tr>
	<td><br><br>_________________________________<br><b>'.$fila['NombreAlumno'].'</b><br>Firma del Alumno</td>
	<td><br><br>_________________________________<br> <b>'.$fila['NombreFamiliar'].'</b><br>Firma del Padre o tutor legal</td>

	</tr>
	<tr>
	<td><br><br>_________________________________<br><b>'.$fila['NombreTutor'].'</b><br>Firma del Docente-Tutor</td>
	</tr>
	</table>';


	$pdf->SetFont('helvetica', '', 11);
	$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
	$pdf->Output('Encuesta de reprobacion '.$fila['idEncuestaReprobacion'].'.pdf', 'I');
}

//============================================================+
// END OF FILE
//============================================================+
