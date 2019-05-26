<?php
if (!isset($_SESSION)) { session_start(); }
	$respuesta1=$_POST['pregunta1'];
	$respuesta2=$_POST['pregunta2'];
	$respuesta3=$_POST['pregunta3'];
	$respuesta4=$_POST['pregunta4'];
	$respuesta5=$_POST['pregunta5'];
	$respuesta6=$_POST['pregunta6'];
	$respuesta7=$_POST['pregunta7'];
	$respuesta8=$_POST['pregunta8'];
	$respuesta9=$_POST['pregunta9'];
	$respuesta10=$_POST['pregunta10'];
	$respuesta11=$_POST['pregunta11'];
	$respuesta12=$_POST['pregunta12'];
	$respuesta13=$_POST['pregunta13'];
	$respuesta14=$_POST['pregunta14'];
	$respuesta15=$_POST['pregunta15'];
	$respuesta16=$_POST['pregunta16'];
	$respuesta17=$_POST['pregunta17'];
	$respuesta18=$_POST['pregunta18'];
	$respuesta19=$_POST['pregunta19'];
	$respuesta20=$_POST['pregunta20'];
	$respuesta21=$_POST['pregunta21'];
	$respuesta22=$_POST['pregunta22'];
	$respuesta23=$_POST['pregunta23'];
	$respuesta24=$_POST['pregunta24'];
	$respuesta25=$_POST['pregunta25'];
	$respuesta26=$_POST['pregunta26'];
	$respuesta27=$_POST['pregunta27'];
	$respuesta28=$_POST['pregunta28'];
	$respuesta29=$_POST['pregunta29'];
	$respuesta30=$_POST['pregunta30'];
	$respuesta31=$_POST['pregunta31'];
	$respuesta32=$_POST['pregunta32'];
	$respuesta33=$_POST['pregunta33'];
	$respuesta34=$_POST['pregunta34'];
	$respuesta35=$_POST['pregunta35'];
	$respuesta36=$_POST['pregunta36'];
	
	$TotalVisual=$respuesta1+$respuesta5+$respuesta9+$respuesta10+$respuesta11+$respuesta16+$respuesta17+$respuesta22+$respuesta26+$respuesta27+$respuesta32+$respuesta36;
	$TotalAuditivo=$respuesta2+$respuesta3+$respuesta12+$respuesta13+$respuesta15+$respuesta19+$respuesta20+$respuesta23+$respuesta24+$respuesta28+$respuesta29+$respuesta33;
	$TotalKinestesico=$respuesta4+$respuesta6+$respuesta7+$respuesta8+$respuesta14+$respuesta18+$respuesta21+$respuesta25+$respuesta30+$respuesta31+$respuesta34+$respuesta35;
	$TotalCategorias=$TotalVisual+$TotalAuditivo+$TotalKinestesico;

 	$respuestas="$respuesta1"."$respuesta2"."$respuesta3"."$respuesta4"."$respuesta5"."$respuesta6"."$respuesta7"."$respuesta8"."$respuesta9"."$respuesta10"."$respuesta11"."$respuesta12"."$respuesta13"."$respuesta14"."$respuesta15"."$respuesta16"."$respuesta17"."$respuesta18"."$respuesta19"."$respuesta20"."$respuesta21"."$respuesta22"."$respuesta23"."$respuesta24"."$respuesta25"."$respuesta26"."$respuesta27"."$respuesta28"."$respuesta29"."$respuesta30"."$respuesta31"."$respuesta32"."$respuesta33"."$respuesta34"."$respuesta35"."$respuesta36";

 	function porcentaje($total, $parte, $redondear = 0) {
	    return round($parte / $total * 100, $redondear);
	}

 	$PorcentajeVisual=porcentaje($TotalCategorias, $TotalVisual, 0);
 	$PorcentajeAuditivo=porcentaje($TotalCategorias, $TotalAuditivo, 0);
 	$PorcentajeKinestesico=porcentaje($TotalCategorias, $TotalKinestesico, 0);

	/*echo "$TotalVisual es el " . $PorcentajeVisual . "% de $TotalCategorias <br>";
	echo "$TotalAuditivo es el " . $PorcentajeAuditivo . "% de $TotalCategorias <br>";
	echo "$TotalKinestesico es el " . $PorcentajeKinestesico . "% de $TotalCategorias <br>";*/

	include_once "SQLControlador.php";
    include_once "TestAprendizaje.php";

    $TestAprendizaje = new TestAprendizaje();
    $TestAprendizaje->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
    $TestAprendizaje->setRespuestas($respuestas);
    $TestAprendizaje->setVisual($PorcentajeVisual);
     $TestAprendizaje->setAuditivo($PorcentajeAuditivo);
      $TestAprendizaje->setKinestesico($PorcentajeKinestesico);
       $TestAprendizaje->setTotal($TotalCategorias);

    $SQLControlador = new SQLControlador();
    $SQLControlador->AgregarTest($TestAprendizaje);




?>