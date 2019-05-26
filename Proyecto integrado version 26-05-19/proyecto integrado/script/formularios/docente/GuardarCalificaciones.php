<?php
if (!isset($_SESSION)) { session_start(); }
if ((!isset ($_SESSION['IdUsuarioDocente']))&&(!isset ($_SESSION['LoggedinDocente'])))
{
   echo "<script language='javascript'>window.location='LoginDocente.php'</script>";
}


  include_once "../../clases/MySQLConector.php";
$Mysql = new MySQLConector();
          $Mysql->Conectar();

  $listaidCalificaciones=$_GET["idCalificaciones"]; 
  $listaParcial1=$_GET["Parcial1"];
  $listaParcial2=$_GET["Parcial2"];
  $listaParcial3=$_GET["Parcial3"];
  $listaEXT=$_GET["Ext"];
      $i=0;

      foreach ($listaidCalificaciones as $id) {
        $listaParcial1[$i] = !empty($listaParcial1[$i]) ? "'" . $listaParcial1[$i] . "'" : 'null';
        $listaParcial2[$i] = !empty($listaParcial2[$i]) ? "'" . $listaParcial2[$i] . "'" : 'null';
        $listaParcial3[$i] = !empty($listaParcial3[$i]) ? "'" . $listaParcial3[$i] . "'" : 'null';
        $listaEXT[$i] = !empty($listaEXT[$i]) ? "'" . $listaEXT[$i] . "'" : 'null';
        $Consulta="UPDATE calificaciones SET PrimerParcial=$listaParcial1[$i],SegundoParcial=$listaParcial2[$i],TercerParcial=$listaParcial3[$i],EXT=$listaEXT[$i] WHERE idCalificaciones='$listaidCalificaciones[$i]'";
        $Resultado= $Mysql->Consulta($Consulta);
        $i++;
      }

        echo "<script language='javascript'>alert('Calificaciones grupales modificadas con exito!')</script>";
        echo "<script language='javascript'>window.location = 'BusquedaTodosGrupos.php'</script>";


?>