<?php
session_start();
// Include the main TCPDF library (search for installation path).
$idSolicitudBaja = $_GET['idSolicitudBaja'];

require_once('../../TCPDF/TCPDF-master/tcpdf.php');
include_once "../Clases/mysqlconector.php";

$idDirector = " ";
$idCorAcademico = " ";
$idCorAdministrativo = " ";
$idTutor = " ";
$idFamiliar = " ";
$Motivo = " ";
$Observaciones = " ";
$Cont = 0;


include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();

$ConsultaP = "SELECT * FROM `plantel` WHERE 1;";
$Resultado2 = $Mysql->Consulta($ConsultaP);
while ($fila2 = $Resultado2->fetch_assoc()) {
  $Lugar = $fila2['Ciudad'] ." ". $fila2['Estado'];
  $NombrePlantel = strtoupper($fila2['Nombre']);
  $Plantel =  strtoupper($fila2['Ciudad']);
  $Clave = $fila2['Clave'];
}

$ConsultaG = "SELECT * FROM `solicitudbaja` WHERE solicitudbaja.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' and solicitudbaja.idSolicitudBaja = '".$idSolicitudBaja."';";
$ResultadoG = $Mysql->Consulta($ConsultaG);
while ($filaG = mysqli_fetch_array($ResultadoG)){ 
  $idDirector = $filaG['idDirector'];
  $idCorAcademico = $filaG['idCorAcademico'];
  $idCorAdministrativo = $filaG['idCorAdministrativo'];
  $idTutor = $filaG['idDocenteTutor'];
  $idGrupo = $filaG['idGrupo'];
  $idFamiliar = $filaG['idFamiliares'];
  $Motivo = $filaG['Motivo'];
  $ObservacionesTutor = $filaG['ObservacionesTutor'];
  $ObservacionesHistorialPagos = $filaG['ObservacionesHistorialPagos'];
}


$Consulta6 = "SELECT * FROM `personal` WHERE personal.idPersonal = '".$idTutor."'";
$Resultado6 = $Mysql->Consulta($Consulta6);
while ($fila6 = mysqli_fetch_array($Resultado6)){ 
  $NombreTutor = strtoupper($fila6['Nombre'] ." ". $fila6['ApellidoP'] ." ". $fila6['ApellidoM']);
}

$Consulta3 = "SELECT * FROM `personal` WHERE personal.idPersonal = '".$idCorAcademico."'";
$Resultado3 = $Mysql->Consulta($Consulta3);
while ($fila3 = mysqli_fetch_array($Resultado3)){ 
  $NombreCorAcademico = strtoupper($fila3['Nombre'] ." ". $fila3['ApellidoP'] ." ". $fila3['ApellidoM']);
}

$Consulta4 = "SELECT * FROM `personal` WHERE personal.idPersonal = '".$idCorAdministrativo."'";
$Resultado4 = $Mysql->Consulta($Consulta4);
while ($fila4 = mysqli_fetch_array($Resultado4)){
  $NombreCorAdministrativo = strtoupper($fila4['Nombre'] ." ". $fila4['ApellidoP'] ." ". $fila4['ApellidoM']);
}

$Consulta5 = "SELECT * FROM `personal` WHERE personal.idPersonal = '".$idDirector."'";
$Resultado5 = $Mysql->Consulta($Consulta5);
while ($fila5 = mysqli_fetch_array($Resultado5)){ 
  $NombreDirector = strtoupper($fila5['Nombre'] ." ". $fila5['ApellidoP'] ." ". $fila5['ApellidoM']);
}

$Consulta7 = "SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM FROM familiares WHERE familiares.idFamiliares = '".$idFamiliar."';";
$Resultado7 = $Mysql->Consulta($Consulta7);
while ($fila2 = mysqli_fetch_array($Resultado7)){           
  $NombrePadre = $fila2['Nombre']." ".$fila2['ApellidoP']." ".$fila2['ApellidoM']; 
}

$Consulta8 = "SELECT calificaciones.idCalificaciones,calificaciones.EXT, materia.Componente, 
(CASE
  WHEN (materia.Componente='B')AND(calificaciones.EXT<6) THEN 'Esta reprobada'
  WHEN (materia.Componente='B')AND(calificaciones.EXT>=6) THEN 'Esta aprobada'
  WHEN (materia.Componente='P')AND(calificaciones.EXT<8) THEN 'Esta reprobada'
  WHEN (materia.Componente='P')AND(calificaciones.EXT>=8) THEN 'Esta reprobada'

  END) AS respuesta

  FROM calificaciones
  INNER JOIN  materiagruposdocentes ON materiagruposdocentes.idMateriaGruposDocentes= calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes
  INNER JOIN materia ON materiagruposdocentes.Materia_idMateria= materia.idMateria 
  WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdAlumnoDocenteTutor']."'";
  $Resultado8 = $Mysql->Consulta($Consulta8);
  if($Resultado8)
    while ($fila8 = mysqli_fetch_array($Resultado8)){ 
      if($fila8['respuesta'] == "Esta reprobada"){
        $Cont++;
      }
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
    $pdf->SetTitle('Solicitud de Baja');
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
    $pdf->SetMargins(20, 45, 20);
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

// set some text to print
/*$txt = <<<EOD

COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE ZACATECAS
Plantel: Rio Grande #3

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);*/
$Consulta = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.NC, grupos.Grado, grupos.Grupo, carreras.Nombre AS Carrera, domicilio.Calle, domicilio.Numero, domicilio.Localidad, domicilio.Municipio, alumno.Telefono, alumno.Correo, alumno.SS FROM alumno, carreras, grupos , domicilio WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND  grupos.idGrupos = '".$idGrupo ."' AND grupos.Carreras_idCarreras = carreras.idCarreras AND alumno.Domicilio_idDomicilio = domicilio.idDomicilio ";
$Resultado = $Mysql->Consulta($Consulta);

while ($fila = $Resultado->fetch_assoc()) {
// create some HTML content 61 TABLA
  $html = '
  <table border="1" cellpadding="2" cellspacing="2" nobr="true">
  <tr style="background-color:#E7E4E4;">
  <th colspan="4" align="center"><b>SOLICITUD DE BAJA</b></th>
  </tr>
  <tr>
  <td><b>NOMBRE DEL ALUMNO: </b></td>
  <td colspan="3">'.$fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'].'</td>
  </tr>
  <tr>
  <td align="center">'.$fila['NC'].'</td>
  <td align="center">'.$fila['Grado'].'-'.$fila['Grupo'].'</td>
  <td align="center" colspan="2">'.$fila['Carrera'].'</td>
  </tr>
  <tr>
  <td align="center"><b>NUMERO DE CONTROL</b></td>
  <td align="center"><b>GRADO Y GRUPO</b></td>
  <td  align="center" colspan="2"><b>CARRERA QUE CURSA</b></td>
  </tr>
  <tr>
  <td><b>NOMBRE DEL PADRE O TUTOR: </b></td>
  <td colspan="3">'.$NombrePadre.'</td>
  </tr>
  <tr>
  <td align="center">'.$fila['Calle'].'</td>
  <td align="center">'.$fila['Numero'].'</td>
  <td align="center">'.$fila['Localidad'].'</td>
  <td align="center">'.$fila['Municipio'].'</td>
  </tr>
  <tr>
  <td align="center"><b>CALLE</b></td>
  <td align="center"><b>NUMERO</b></td>
  <td align="center"><b>COMUNIDAD</b></td>
  <td align="center"><b>MUNICIPIO</b></td>
  </tr>
  <tr>
  <td align="center">'.$fila['Telefono'].'</td>
  <td align="center">'.$fila['Correo'].'</td>
  <td align="center">'.$fila['SS'].'</td>
  <td align="center">'.$Cont.'</td>
  </tr>
  <tr>
  <td align="center"><b>TELÉFONO</b></td>
  <td align="center"><b>CORREO</b></td>
  <td align="center"><b>NUMERO DE SSA</b></td>
  <td align="center"><b>ADEUDO DE MATERIAS</b></td>
  </tr>
  <tr>
  <td><b>MOTIVO DE BAJA: </b></td>
  <td colspan="3">'.$Motivo.'</td>
  </tr>
  <tr style="background-color:#E7E4E4;">
  <th colspan="4" align="center"><b>DATOS DEL TUTOR</b></th>
  </tr>
  <tr>
  <td><b>NOMBRE DEL TUTOR: </b></td>
  <td colspan="3">'.$NombreTutor.'</td>
  </tr>
  <tr>
  <td><b>OBSERVACIONES DEL TUTOR: </b></td>
  <td colspan="3">';
  $CadenaObservacionesTutor =explode("|", $ObservacionesTutor);

  for ($i=0; $i < count($CadenaObservacionesTutor); $i++) {
    $html .= ''.$CadenaObservacionesTutor[$i].' ';
  }
  $html .='</td>
  </tr>
  <tr>
  <td colspan="4" align="center"><b>NOMBRE Y FIRMA DEL TUTOR </b><br>
  <br>
  <br><br><b>'.$NombreTutor.'</b></td>
  </tr>
  <tr>
  <td colspan="4" align="center"><b>Vo. BO. COORDINACIÓN ACADÉMICA</b><br>
  <br>
  <br><br><b>'.$NombreCorAcademico.'</b></td>
  </tr>
  <tr style="background-color:#E7E4E4;">
  <th colspan="4" align="center"><b>COORDINACIÓN ADMINISTRATIVA</b></th>
  </tr>
  <tr>
  <td><b>OBSERVACIONES DEL HISTORIAL DE PAGOS</b></td>
  <td colspan="3">'; 
  $CadenaObservacionesHistorialPagos =explode("|", $ObservacionesHistorialPagos);

  for ($i=0; $i < count($CadenaObservacionesHistorialPagos); $i++) {
    $html .= ''.$CadenaObservacionesHistorialPagos[$i].' ';
  }
  $html.='</td>
  </tr>
  <tr>
  <td colspan="4" align="center"><b>FIRMA DE LA COORDINADORA ADMINISTRATIVA</b><br>
  <br>
  <br><br><b>'.$NombreCorAdministrativo.'</b></td>
  </tr>
  <tr style="background-color:#E7E4E4;">
  <th colspan="4" align="center"><b>DIRECCIÓN</b></th>
  </tr>
  <tr>
  <th colspan="4"><p align="justify">Una vez que se ha recabado la información del alumno y que las partes correspondientes realizaron las acciones pertinentes para evitar la baja, es importante señalar que después de haber realizado la presente solicitud es imposible la reincorporación del alumno a esta institución educativa.</p>
  </th>
  </tr>
  <tr>
  <td colspan="2" align="center">FIRMA DE CONFORMIDAD<br>
  <br>
  <br><b>___________________________________</b><br>
  '.strtoupper($NombrePadre).'<br>
  PADRE O TUTOR-LEGAL</td>
  <td colspan="2" align="center">DIRECTOR DEL PLANTEL <br>
  <br>
  <br><b>___________________________________</b><br>
  '.$NombreDirector.'<br> DIRECTORA DEL PLANTEL</td>
  </tr>
  </table>';
}

$pdf->SetFont('helvetica', '',9.5);
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Solicitud Baja '.$idSolicitudBaja.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
