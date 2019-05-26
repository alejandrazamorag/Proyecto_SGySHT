<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinDocenteTutor']) && !isset ($_SESSION['IdDocenteTutor']) && !isset ($_SESSION['IdAlumnoDocenteTutor']))
{
   echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
}
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_bar.php');
require_once ('../../../jpgraph/src/jpgraph_pie.php'); 
require_once ('../../../jpgraph/src/jpgraph_pie3d.php');


include_once "../../clases/MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta="SELECT Visual,Auditivo,Kinestesico FROM testaprendizaje WHERE Alumno_idAlumno='".$_SESSION['IdAlumnoDocenteTutor']."'";
$Resultado=$Mysql->Consulta($Consulta);;

$row = mysqli_fetch_row($Resultado);	

$idAlumno = $_SESSION['IdAlumnoDocenteTutor'];	
$Visual=$row[0];
$Auditivo=$row[1];
$kinestesico=$row[2];
$data = array($Visual,$Auditivo,$kinestesico); 

$graph = new PieGraph(450,200,"auto"); 
$graph->img->SetAntiAliasing(); 
$graph->SetMarginColor('white'); 
//$graph->SetShadow(); 

// Setup margin and titles 
$graph->title->Set("Resultado  del test del canal de aprendizaje  de preferencia"); 

$p1 = new PiePlot3D($data); 
$p1->SetSize(0.35); 
$p1->SetCenter(0.5); 

// Setup slice labels and move them into the plot 
$p1->value->SetFont(FF_FONT1,FS_BOLD); 
$p1->value->SetColor("black"); 

$p1->SetLabelPos(0.2); 

$nombres=array("Visual","Auditivo","Kinestésico"); 
$p1->SetLegends($nombres); 

// Explode all slices 
$p1->ExplodeAll(); 

$graph->Add($p1); 
$graph->Stroke(); 


$graph->Stroke(_IMG_HANDLER);

$fileName = 'graficastest/grafica'.$idAlumno.'.png';
$graph->img->Stream($fileName);
//$pdf->Output('TutoriaIndividual'.$TutoriaIndividual.'.pdf', 'I');

// mostrarlo en el navegador
$graph->img->Headers();
$graph->img->Stream();

?>