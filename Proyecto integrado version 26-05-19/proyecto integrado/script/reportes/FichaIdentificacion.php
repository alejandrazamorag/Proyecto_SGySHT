<?php
session_start();

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
$pdf->SetTitle('Ficha de Identificación');
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
$pdf->SetMargins(20, 49, 20);
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
$Consulta = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.FechaNac, alumno.TelefonoEmergencia ,lugarnacimiento.Municipio, lugarnacimiento.Estado, domicilio.Calle, domicilio.Numero, domicilio.Colonia, domicilio.CP, domicilio.Municipio AS MunicipioDomicilio, domicilio.Localidad, domicilio.Estado AS EstadoDomicilio, alumno.Telefono AS TelefonoParticular from alumno, lugarnacimiento, domicilio WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND lugarnacimiento.idLugarNacimiento = alumno.LugarNacimiento_idLugarNacimiento AND domicilio.idDomicilio = alumno.Domicilio_idDomicilio;";
$Resultado = $Mysql->Consulta($Consulta);
while ($fila = $Resultado->fetch_assoc()) {

	$html = '<h1 align="center">Ficha de Identificación del tutorado</h1>
	<h4>1. DATOS PERSONALES</h4>
	
	<b><i>Nombre:</i></b> 
	<label for="lblNombre">'.$fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'].'</label><br>

	<b><i>Fecha de nacimiento: </i></b>';

	$originalDate = $fila['FechaNac'];
	$newDate = date("d/m/Y", strtotime($originalDate));

	$html .='<label for="lblFechaNacimiento">'.$newDate.'</label><br>
	<b><i>Edad: </i></b>
	<label for="">'.calculaedad ($fila['FechaNac']).'</label><br>
	<b><i>Lugar de Nacimiento: </i></b>
	<label for="lblLugarNacimiento">'.$fila['Municipio'] .', '. $fila['Estado'].'</label><br>
	<b><i>Domicilio: </i></b>
	<label for="lblCalle">'.$fila['Calle'].' #'.$fila['Numero'].'   Col.'.$fila['Colonia'].'   CP: '.$fila['CP'].'</label><br>
	<b>Municipio: </b>
	<label for="lblMunicipio">'.$fila['MunicipioDomicilio'].'</label>
	<b>Localidad: </b>
	<label for="lblLocalidad">'.$fila['Localidad'].'</label>
	<b>Estado: </b>
	<label for="lblEstado">'.$fila['EstadoDomicilio'].'</label><br>
	<b><i>En caso de emergencia llamar a: </i></b>
	<label for="">'.$fila['TelefonoEmergencia'].'</label><br>
	<b><i>Telefono Particular: </i></b>
	<label for="">'.$fila['TelefonoParticular'].'</label><br> 
	
	<h4>2. DATOS FAMILIARES</h4><br><b>a) </b>';

	$Consulta = "SELECT familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, familiares.FechaNacimiento, familiares.Profesion, familiares.LugarTrabajo, familiares.Parentesco  from familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."'";

	$Resultado = $Mysql->Consulta($Consulta);

	while ($fila = $Resultado->fetch_assoc()) {
		if($fila['Parentesco'] == 'Padre'){ 
			$html.='<b>Nombre del padre: </b>
			<label for="NombreP">'.$fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'].'</label><br>
			<b>Edad: </b>
			<label for="EdadP">'.calculaedad ($fila['FechaNacimiento']).'</label><br>
			<b>Profesion:</b>
			<label for="ProfesionP">'.$fila['Profesion'].'</label><br>
			<b>Lugar de Trabajo:</b>
			<label for="LugarTrabajoP">'.$fila['LugarTrabajo'].'</label><br><br>';
		}else if($fila['Parentesco'] == 'Madre') {
			$html.='<b>Nombre de la madre:</b>
			<label for="NombreM">'.$fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'].'</label><br>
			<b>Edad:</b>
			<label for="EdadM">'.calculaedad ($fila['FechaNacimiento']).'</label><br>
			<b>Profesion</b>
			<label for="ProfesionM">'.$fila['Profesion'].'</label><br>
			<b>Lugar de Trabajo</b>
			<label for="LugarTrabajoM">'.$fila['LugarTrabajo'].'</label><br><br>';
		}
		//$html .="<br>";
	}

	$Consulta = "SELECT datosfamiliares.NoHermanos, datosfamiliares.LugarOcupas, datosfamiliares.OtrasPersonas, datosfamiliares.ActualmenteVives, datosfamiliares.SituacionFamiliar, datosfamiliares.RelacionPadres FROM datosfamiliares where datosfamiliares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";

	$Resultado = $Mysql->Consulta($Consulta);

	while ($fila = $Resultado->fetch_assoc()) {

		$html.='<b>b) Numero de hermanos: </b><label>'.$fila['NoHermanos'].'</label>
		<b>  Lugar que ocupas: </b>
		<label>'.$fila['LugarOcupas'].'</label><br>
		<b>c) Otras personas que viven con tigo: </b>
		<label>'.$fila['OtrasPersonas'].'</label><br>
		<b>d) Actualmente vives con: </b> 
		<label>'. $fila['ActualmenteVives'].'</label><br>
		<b>e) ¿Hay alguna situación familiar que se pueda considerar especial? (fallecimiento de padre/madre, separacion de los padres, divorcio, enfermedad de algún familiar): </b>
		<label>'.$fila['SituacionFamiliar'].'</label><br>
		<b>f) ¿Cómo es la relación con tus padres? </b>
		<label>';
		if($fila['RelacionPadres'] == '6'){
			$html.="Excelente";
		}elseif($fila['RelacionPadres'] == '5'){
			$html.="Muy Buena";
		}elseif($fila['RelacionPadres'] == '4'){
			$html.="Buena";
		}elseif($fila['RelacionPadres'] == '3'){
			$html.="Regular";
		}elseif($fila['RelacionPadres'] == '2'){
			$html.="Mala";
		}elseif($fila['RelacionPadres'] == '1'){
			$html.="Muy Mala";
		}
		$html.='</label>
		';
	}
	$html.='<br>
	<h4>3. DATOS ESCOLARES</h4>';

	$Consulta = "SELECT secundaria.Nombre , datosescolares.PromedioSecu, datosescolares.OtrosEstudios, datosescolares.RendimientoEscolar, datosescolares.MateriaGustada, datosescolares.MateriaDisgustada, datosescolares.ReaccionPadres, datosescolares.Espectativa FROM secundaria, datosescolares WHERE secundaria.idSecundaria = datosescolares.Secundaria_idSecundaria AND datosescolares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
	$Resultado = $Mysql->Consulta($Consulta);
	while ($fila = $Resultado->fetch_assoc()) {
		$html.='<br>
		<b>a) Secundaria: </b>
		<label for="">'.$fila['Nombre'].'</label>
		<b> Promedio: </b><label>'.$fila['PromedioSecu'].'</label><br>
		';

		$Consulta2 = "SELECT * FROM `materiassecureprobadas` WHERE materiassecureprobadas.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."'";
		$Resultado2 = $Mysql->Consulta($Consulta2);
		if(mysqli_num_rows($Resultado2) == 0){
			$html.='<b>b) ¿En tu formación previa reprobaste alguna materia? </b>No <br>';
		}else{
			while ($fila2 = $Resultado2->fetch_assoc()) {
				$html.='
				<b>b) ¿En tu formación previa reprobaste alguna materia?</b> Si <br>
				<b><i> ¿Cuál? </i></b> <label for="">'.substr($fila2['Materias'], 3).'</label><br>
				<b><i> Motivo: </i></b> <label for="">'.$fila2['Motivo'].'</label> <br>';
			} }

			$html.='<b>c) ¿Actualmente realizas otro tipo de estudios?</b>
			<label>'.$fila['OtrosEstudios'].'</label><br>
			<b>d) ¿Cómo piensas que ha sido tu rendimiento escolar hasta ahora? </b>';
			if($fila['RendimientoEscolar']  == 5){
				$html.'Excelente';

			}elseif ($fila['RendimientoEscolar'] == 4) {
				$html.="Muy Bueno";

			}elseif ($fila['RendimientoEscolar'] == 3) {
				$html.="Bueno";

			}elseif ($fila['RendimientoEscolar'] == 2) {
				$html.="Regular";

			}elseif ($fila['RendimientoEscolar'] == 1) {
				$html.="malo";

			}elseif ($fila['RendimientoEscolar'] == 0) {
				$html.="Muy malo";

			}
			$html.='<br>
			<b>e) Las asignaturas que más te han gustado en tu formación anterior han sido: </b>
			<label >'. $fila['MateriaGustada'].'</label><br>
			<b>f) Las asignaturas que menos te han interesado en tu formación anterior han sido: </b>
			<label>'. $fila['MateriaDisgustada'].'</label><br>
			<b>g) ¿Cómo reaccionan tus padres ante tus calificaciones? </b>
			<label>'.$fila['ReaccionPadres'].'</label><br>
			<b>    ¿Cress que cumples con lo que ellos esperan de ti? ¿Por que?</b>
			<label>'.$fila['Espectativa'].'</label> <br>
			<h4>4. DATOS MEDICOS</h4>';
		}

		$Consulta = "SELECT datosmedicos.Enfermedad , datosmedicos.Tratamiento , datosmedicos.Tabaquismo, datosmedicos.Drogadiccion, datosmedicos.Alcoholismo from datosmedicos WHERE datosmedicos.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."'";

		$Resultado = $Mysql->Consulta($Consulta);

		while ($fila = $Resultado->fetch_assoc()) {
			$html.='
			<b>a) ¿Padeces alguna enfermedad o existe alguna condicion fisica que te afecte? (oido, vista, enfermedad respiratoria, cardiaca, convulsiones, diabetes, asma, etc) </b>
			<label for="">'.$fila['Enfermedad'].'</label><br>
			<b>b) Actualmente ¿recibes algún tratamiento médico o psicológico? ¿Lo has recibido alguna vez? </b>
			<label for="">'.$fila['Tratamiento'].'</label><br>	
			<b style=\'margin-left: 2em\'>c) Tabaquismo:</b>';
			$Tabaquismo = $fila['Tabaquismo'];
			if($Tabaquismo == 1){
				$html.="<label for=\"\"> Si </label>";
			}else{
				$html.="<label for=\"\"> No </label>";
			}
			$html.='<br><b> Alcohol:</b>';
			$Alcoholismo = $fila['Alcoholismo'];
			if($Alcoholismo == 1){
				$html.="<label for=\"\"> Si </label>";
			}else{
				$html.="<label for=\"\"> No </label>";
			}
			$html.='<br><b>	Drogas:</b>';
			$Drogas = $fila['Drogadiccion'];
			if($Drogas == 1){
				$html.="<label for=\"\"> Si </label>";
			}else{
				$html.="<label for=\"\"> No </label>";
			}

		} 

		$html.='<br><h4>5. EXPECTATIVAS ANTE MI NUEVA FORMACIÓN</h4>';
		$Consulta = "SELECT expectativanuevaform.Atraccion, expectativanuevaform.Precupacion, expectativanuevaform.EstudioEs, expectativanuevaform.ProblemaCausa, expectativanuevaform.Preparado, expectativanuevaform.ValorarProfesor FROM expectativanuevaform WHERE expectativanuevaform.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";

		$Resultado = $Mysql->Consulta($Consulta);

		while ($fila = $Resultado->fetch_assoc()) {

			$html.='<b>a) ¿Qué es lo que más me trajo del CECyTE?</b>
			<label for="">'.$fila['Atraccion'].'</label><br>

			<b>b) Hay algo que te preocupe sobre la nueva etapa que ahora empiezas?</b>
			<label for="">'.$fila['Precupacion'].'</label><br>
			<b>c) Para ti el estudio es:</b>';

			$Opciones= explode(",",  $fila['EstudioEs']);
			$EstudioEs = "";
			$c = ',';
			for ($i=0; $i < count($Opciones); $i++) { 
				if($EstudioEs == ""){
					if($Opciones[$i] == '6'){
						$EstudioEs = "Intersante";
					}elseif ($Opciones[$i] == '5') {
						$EstudioEs =  "Aburrido" ;
					}elseif ($Opciones[$i] == '4') {
						$EstudioEs =  "Util para el futuro";
					}elseif ($Opciones[$i] == '3') {
						$EstudioEs =  "Algo obligado por tus padres";
					}elseif ($Opciones[$i] == '2') {
						$EstudioEs =  "Una Forma de pasar el tiempo";
					}elseif ($Opciones[$i] == '1') {
						$EstudioEs =  "Una Forma de hacer amigo";
					}
				}else{
					if($Opciones[$i] == '6'){
						$EstudioEs =  $EstudioEs .$c." Intersante";
					}elseif ($Opciones[$i] == '5') {
						$EstudioEs =  $EstudioEs .$c." Aburrido" ;
					}elseif ($Opciones[$i] == '4') {
						$EstudioEs =  $EstudioEs .$c." Util para el futuro";
					}elseif ($Opciones[$i] == '3') {
						$EstudioEs =  $EstudioEs .$c." Algo obligado por tus padres";
					}elseif ($Opciones[$i] == '2') {
						$EstudioEs =   $EstudioEs .$c." Una Forma de pasar el tiempo";
					}elseif ($Opciones[$i] == '1') {
						$EstudioEs =  $EstudioEs .$c." Una Forma de hacer amigo";
					}
				}
			}
			$html.='<t>'.$EstudioEs.'</t><br><b>d) Cuando tienes problemas con el estudio ¿a que piensas que se debe?</b>
			<label>'.$fila['ProblemaCausa'].'</label><br>
			<b>e) ¿Te consideras preparado/a para tener éxito en esta nueva etapa de formación?</b>';
			$Opciones= explode(",",  $fila['Preparado']);
			$Preparado = "";
			$c = ',';
			for ($i=0; $i < count($Opciones); $i++) { 
				if($Preparado == ""){
					if($Opciones[$i] == '4'){
						$Preparado = "Mucho";
					}elseif ($Opciones[$i] == '3') {
						$Preparado =  "Normal" ;
					}elseif ($Opciones[$i] == '2') {
						$Preparado =  "Poco";
					}elseif ($Opciones[$i] == '1') {
						$Preparado =  "Muy poco";
					}
				}else{
					if($Opciones[$i] == '4'){
						$Preparado =  $Preparado .$c." Mucho";
					}elseif ($Opciones[$i] == '3') {
						$Preparado =  $Preparado .$c." Normal" ;
					}elseif ($Opciones[$i] == '2') {
						$Preparado =  $Preparado .$c." Poco";
					}elseif ($Opciones[$i] == '1') {
						$Preparado =  $Preparado .$c." Muy poco";
					}
				}
			}
			$html.='<label>'.$Preparado.'</label><br>
			<b>f) En un profesor lo que más valoras es:</b>
			<label for="">'.$fila['ValorarProfesor'].'</label><br>';
		} 

		$Consulta = "SELECT habitosestudio.TiempoTarea, habitosestudio.TiempoEstudio, habitosestudio.TiempoLectura, habitosestudio.LugarEstudio, habitosestudio.EstimulacionEstudio, habitosestudio.MotivoAprender, habitosestudio.MotivoInteres, habitosestudio.MotivoSatisfaccion, habitosestudio.MotivoFracaso, habitosestudio.MotivoAgradecer, habitosestudio.MotivoPremio, habitosestudio.MotivoHacer, habitosestudio.TecnicasEstudio FROM habitosestudio WHERE habitosestudio.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";

		$Resultado = $Mysql->Consulta($Consulta);

		while ($fila = $Resultado->fetch_assoc()) {

			$html.='<h4>6. HÁBITOS DE ESTUDIO</h4>
			<b>a) Tiempo de trabajo diario en casa:</b><br>
			<i><b> -Tareas: </b></i>';
			if($fila['TiempoTarea'] == '0'){
				$html.='Nada';
			}elseif($fila['TiempoTarea'] == '1'){
				$html.='Una hora';
			}elseif($fila['TiempoTarea'] == '2'){
				$html.='Dos horas';
			}elseif($fila['TiempoTarea'] == '3'){
				$html.='Mas de dos horas';
			}
			$html.='<br>
			<i><b> -Estudio: </b></i>';
			if($fila['TiempoEstudio'] == '0'){
				$html.='Nada';
			}elseif($fila['TiempoEstudio'] == '1'){
				$html.='Una hora';
			}elseif($fila['TiempoEstudio'] == '2'){
				$html.='Dos horas';
			}elseif($fila['TiempoEstudio'] == '3'){
				$html.='Mas de dos horas';
			}
			$html.='<br>
			<i><b> -Tiempo Semanal que le dedicas a la lectura: </b></i>';
			if($fila['TiempoLectura'] == '0'){
				$html.='Nada';
			}elseif($fila['TiempoLectura'] == '1'){
				$html.='Una hora';
			}elseif($fila['TiempoLectura'] == '2'){
				$html.='Dos horas';
			}elseif($fila['TiempoLectura'] == '3'){
				$html.='Mas de dos horas';
			}

			$html.='<br><b>b) Lugar de Estudio: </b>';
			$Opciones= explode(",",  $fila['LugarEstudio']);

			for ($i=0; $i < count($Opciones); $i++) {

				if($i == 0){
					if ($Opciones[$i] == "4"){
						$html.='Habitacion propia';
					}elseif ($Opciones[$i] == "3") {
						$html.='Sala';
					}elseif ($Opciones[$i] == "2") {
						$html.='Cocina';
					}elseif ($Opciones[$i] == "1") {
						$html.='Otros';
					}

				}else{
					if ($Opciones[$i] == "4"){
						$html.=', Habitacion propia';
					}elseif ($Opciones[$i] == "3") {
						$html.=', Sala';
					}elseif ($Opciones[$i] == "2") {
						$html.=', Cocina';
					}elseif ($Opciones[$i] == "1") {
						$html.=', Otros';
					}

				}
			}

			$html.='<br><b>c) Técnicas de estudio que utilizas: </b>';
			$Opciones= explode(",",  $fila['TecnicasEstudio']);

			for ($i=0; $i < count($Opciones); $i++) {

				if($i == 0){
					if ($Opciones[$i] == "4"){
						$html.='Subrayado';
					}elseif ($Opciones[$i] == "3") {
						$html.='Esquema';
					}elseif ($Opciones[$i] == "2") {
						$html.='Resumen';
					}elseif ($Opciones[$i] == "1") {
						$html.='Memoria';
					}

				}else{
					if ($Opciones[$i] == "4"){
						$html.=', Subrayado';
					}elseif ($Opciones[$i] == "3") {
						$html.=', Esquema';
					}elseif ($Opciones[$i] == "2") {
						$html.=', Resumen';
					}elseif ($Opciones[$i] == "1") {
						$html.=', Memoria';
					}

				}

			}
			$html.='<br><b>d) ¿Te estimulan tus padres en tus estudios?</b>
			<label for="">'.$fila['EstimulacionEstudio'].'</label>'; 

			$html.='<br>
			<b>e) En estos momentos, el motivo principal que te anima en tus estudios son:
			</b>
			<br><i><b> -Aprender cada día más: </b></i>';
			if($fila['MotivoAprender'] == '4'){
				$html.='Muchisimo';
			}elseif ($fila['MotivoAprender'] == '3') {
				$html.='Normal';
			}elseif ($fila['MotivoAprender'] == '2') {
				$html.='Algo';
			}elseif ($fila['MotivoAprender'] == '1') {
				$html.='Nada';
			}
			
			$html.='<br>
			<i><b> -Poder hacer las cosas por ti mismo/a y a tu manera: </b></i>';
			if($fila['MotivoHacer'] == '4'){
				$html.='Muchisimo';
			}elseif ($fila['MotivoHacer'] == '3') {
				$html.='Normal';
			}elseif ($fila['MotivoHacer'] == '2') {
				$html.='Algo';
			}elseif ($fila['MotivoHacer'] == '1') {
				$html.='Nada';
			}

			$html.='<br>
			<b><i> -El interes que despierta en ti todo lo que estudias: </i></b>';
			if($fila['MotivoInteres'] == '4'){
				$html.='Muchisimo';
			}elseif ($fila['MotivoInteres'] == '3') {
				$html.='Normal';
			}elseif ($fila['MotivoInteres'] == '2') {
				$html.='Algo';
			}elseif ($fila['MotivoInteres'] == '1') {
				$html.='Nada';
			}
			
			$html.='<br>
			<b><i> -La satisfacción que se siente cuando se obtienen buenos resultados: </i></b>';
			if($fila['MotivoSatisfaccion'] == '4'){
				$html.='Muchisimo';
			}elseif ($fila['MotivoSatisfaccion'] == '3') {
				$html.='Normal';
			}elseif ($fila['MotivoSatisfaccion'] == '2') {
				$html.='Algo';
			}elseif ($fila['MotivoSatisfaccion'] == '1') {
				$html.='Nada';
			}

			$html.='<br>
			<b><i> -Evitar un posible fracaso en los estudios: </i></b>';
			if($fila['MotivoFracaso'] == '4'){
				$html.='Muchisimo';
			}elseif ($fila['MotivoFracaso'] == '3') {
				$html.='Normal';
			}elseif ($fila['MotivoFracaso'] == '2') {
				$html.='Algo';
			}elseif ($fila['MotivoFracaso'] == '1') {
				$html.='Nada';
			}

			$html.='<br>
			<b><i> -Agradecer a tus padres y/o profesores: </i></b>';
			if($fila['MotivoAgradecer'] == '4'){
				$html.='Muchisimo';;
			}elseif ($fila['MotivoAgradecer'] == '3') {
				$html.='Normal';
			}elseif ($fila['MotivoAgradecer'] == '2') {
				$html.='Algo';
			}elseif ($fila['MotivoAgradecer'] == '1') {
				$html.='Nada';
			}

			$html.='<br>
			<b><i> -Conseguir los premios que te han prometido tus padres: </i></b>';
			if($fila['MotivoPremio'] == '4'){
				$html.='Muchisimo';
			}elseif ($fila['MotivoPremio'] == '3') {
				$html.='Normal';
			}elseif ($fila['MotivoPremio'] == '2') {
				$html.='Algo';
			}elseif ($fila['MotivoPremio'] == '1') {
				$html.='Nada';
			}

		}

	}


	$pdf->SetFont('helvetica', '', 11);
	$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
	$pdf->Output('Ficha de Identificación.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
