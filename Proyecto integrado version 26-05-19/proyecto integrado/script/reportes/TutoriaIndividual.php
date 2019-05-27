<?php
session_start();
$TutoriaIndividual = $_GET['idTutoriaIndividual'];

function calculaedad($fechanacimiento){
	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	$ano_diferencia = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia = date("d") - $dia;
	if ($dia_diferencia < 0 && $mes_diferencia <= 0)
		$ano_diferencia--;
	return $ano_diferencia;
}

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
$Consulta = "SELECT tutoriaindividual.Alumno_idAlumno,tutoriaindividual.NoTutoria,tutoriaindividual.FechaTutoria,tutoriaindividual.Horario,tutoriaindividual.ActividadesTareas, alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno,alumno.FechaNac, alumno.Sexo, grupos.Grupo, grupos.Grado, carreras.Nombre AS NombreCarrera, personal.Nombre, personal.ApellidoP, personal.ApellidoM FROM tutoriaindividual,personal, alumno, grupos,carreras WHERE tutoriaindividual.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' and alumno.idAlumno = tutoriaindividual.Alumno_idAlumno and tutoriaindividual.idGrupo = grupos.idGrupos AND grupos.Carreras_idCarreras = carreras.idCarreras AND tutoriaindividual.idTutor = personal.idPersonal and tutoriaindividual.idTutoriaIndividual = '".$TutoriaIndividual."';";
$Resultado = $Mysql->Consulta($Consulta);
while ($fila = $Resultado->fetch_assoc()) {
	$Fecha = $fila['FechaTutoria'];



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
	$pdf->SetAuthor('T&A');
	$pdf->SetTitle('Tutoria Individual');
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
	$html = '<h2 align="center">TUTORIA INDIVIDUAL</h2>
	<table  border="1" cellpadding="3" cellspacing="2" nobr="true">

	<tr style="background-color:#E7E4E4;">
	<td colspan="5" align="center"><b>DATOS DEL ALUMNO</b></td>
	</tr>

	<tr>
	<td colspan="5"><b>Nombre: </b>'.$fila['NombreAlumno'].' '.$fila['ApellidoPAlumno'].' '.$fila['ApellidoMAlumno'].'</td>
	</tr>

	<tr>
	<td><b>Semestre: </b>'.$fila['Grado'].'</td>
	<td><b>Grado: </b>'.$fila['Grupo'].'</td>
	<td><b>Sexo: </b>'.$fila['Sexo'].'</td>
	<td colspan="2"><b>Edad: </b>'.calculaedad ($fila['FechaNac']).'</td>
	</tr>

	<tr>
	<td colspan="5"><b>Carrera: </b>'.$fila['NombreCarrera'].'</td>
	</tr>

	<tr style="background-color:#E7E4E4;">
	<td colspan="5" align="center"><b>DATOS DEL DOCENTE TUTOR</b></td>
	</tr>

	<tr>
	<td colspan="5"><b>Nombre: </b>'.$fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'].'</td>
	</tr>

	<tr style="background-color:#E7E4E4;">
	<td colspan="5" align="center"><b>INFORMACIÓN DE TUTORIA</b></td>
	</tr>

	<tr align="center">
	<td><b>No.Tutoria</b></td>
	<td><b>Fecha</b></td>
	<td><b>Horario</b></td>
	<td colspan="2"><b>Actividades y Tareas</b></td>
	</tr>

	<tr>
	<td align="center">'.$fila['NoTutoria'].'</td>
	<td align="center">'.$fila['FechaTutoria'].'</td>
	<td align="center">'.$fila['Horario'].'</td>
	<td colspan="2">';
	$ActividadesTareas =explode("|", $fila['ActividadesTareas']);
	for ($i=0; $i < count($ActividadesTareas); $i++) {
		if($i==0){
			$html .= '<t>'.$ActividadesTareas[$i].'</t>';
		}else{
			$html .= '<br><t>'.$ActividadesTareas[$i].'</t>';
		}

	} 
	$html.='</td>
	</tr>

	</table>

	<table>
	<tr align="center">
	<td colspan="2"><br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<b>_________________________________
	<br>
	'.$fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'].'<br>
	Firma del docente tutor</b></td>
	<td colspan="2"><br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<b>_________________________________
	<br>
	'.$fila['NombreAlumno'].' '.$fila['ApellidoPAlumno'].' '.$fila['ApellidoMAlumno'].'<br>
	Firma del Alumno</b></td>
	</tr>
	</table>';

	$pdf->SetFont('helvetica', '', 11);
	$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
	$pdf->Output('TutoriaIndividual'.$TutoriaIndividual.'.pdf', 'I');
}

//============================================================+
// END OF FILE
//============================================================+
