<?php
if (!isset($_SESSION)) { session_start(); }
if ((!isset ($_SESSION['IdUsuarioAlumno']))&&(!isset ($_SESSION['LoggedinAlumno'])))
{
 echo "<script language='javascript'>window.location='LoginAlumno.php'</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
 <!--Icono en pestaña-->
 <link rel="icon" type="image/vnd.microsoft.icon" href="./../../../imagenes/Mapa.ico">
 <!--Iconos-->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">
 <!--STYLOS-->
 <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuAlumno.css">
 <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
 <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuIzquierdoAlumno.css">

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>  
 <script src="./../../../js/jquery-3.3.1.js"></script>
 <script src="./../../../js/jquery-3.3.1.min.js"></script>
 <script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
 <script src="./../../../js/popper.min.js"></script>
 <script src="./../../../js/bootstrap.min.js"></script>

 <script>
   $(document).ready(function()
   {
    $("#mostrarmodal").modal("show");
  });
</script>
</head>


<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
   <br>
   <?php  include "../menus/MenuAlumno.php";
   MenuAlumno();?>
 </div>
 <!--Fin contenedor Cabecera-->

 <!--Inicio Contenedor medio-->
 <div class="container">
  <!--Poner titulo o nombre -->
  <br><center><h2> Encuestas de reprobación en el semestre actual</h2></center>
  <!--Poner titulo o nombre -->
  
  <div class="row">
    <!--Inicio de menu izquierdo-->

    <div class="col-sm-3">
      <?php include '../menus/MenuIzquierdoAlumno.php'?>
      <!--Fin inicio menu izquierdo-->
    </div>
    <!--Inicio Contenido central-->
    <div class="col-sm-9">
     <!--Inicio de contenido de caja de texto--> 
     <hr>
     <center><h3>Primer parcial</h3></center>
     <?php    
     include_once "../../clases/SQLControlador.php";
     $Mysql = new MySQLConector();
     $Mysql->Conectar();

     $Consulta="SELECT encuestareprobacion.idEncuestaReprobacion FROM encuestareprobacion WHERE encuestareprobacion.Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."' AND Parcial=1";
     $Resultado = $Mysql->Consulta($Consulta);
     if ($Resultado->num_rows > 0) {
      ?>
      <center><h6> Ya realizaste la encuesta de reprobación del primer parcial de tus materias</h6><ceter>
        <?php
      }else{
        
        $Consulta1 = "SELECT calificaciones.idCalificaciones,materia.Nombre,calificaciones.PrimerParcial, materia.Componente, (CASE WHEN (materia.Componente='B')AND(calificaciones.PrimerParcial<6) THEN 'Esta reprobada' WHEN (materia.Componente='B')AND(calificaciones.PrimerParcial>=6) THEN 'Esta aprobada' WHEN (materia.Componente='P')AND(calificaciones.PrimerParcial<8) THEN 'Esta reprobada' WHEN (materia.Componente='P')AND(calificaciones.PrimerParcial>=8) THEN 'Esta aprobada' END) AS respuesta FROM calificaciones INNER JOIN materiagruposdocentes ON materiagruposdocentes.idMateriaGruposDocentes= calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria= materia.idMateria INNER JOIN grupos ON calificaciones.idGrupo=grupos.idGrupos WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."' AND grupos.Estatus=1;";
        $Resultado1=$Mysql->Consulta($Consulta1);
        
        $NumeroReprobadasP1=0;
        while($row=mysqli_fetch_array($Resultado1)){
          if ($row[4]=='Esta reprobada') {
            $NumeroReprobadasP1=$NumeroReprobadasP1+1;
          }else if ($row[4]=='Esta aprobada'){
            $NumeroReprobadasP1=$NumeroReprobadasP1+0;
          }

        }
        if($NumeroReprobadasP1>=1){
          ?>
          <center><label style="text-align: justify;"> <b>Reprobaste el primer parcial de una o de varias materias, realiza la encuesta de reprobación</b></label></center>
          <form name = "form" method="POST" action="AgregarEncuestaReprobacion.php?">
            <input type="text" name="Parcial" id="Parcial" hidden="" value="1">
            <input class="btn btn-success center-block " type="submit" name="Encuesta" value="Realizar encuesta de reprobación"></input>
            <br><br><br><br>
          </form>

          <?php
        }else{
          ?>
          <center><h6>Las materias estan aprobadas con éxito o aun no tienes calificaciones registradas del parcial 1 </h6></center>
          <?php
        }
        
      }
      ?>
      <hr>
      
      <center><h3>Segundo parcial</h3></center>
      <?php    
      include_once "../../clases/SQLControlador.php";
      $Mysql = new MySQLConector();
      $Mysql->Conectar();

      $Consulta2="SELECT encuestareprobacion.idEncuestaReprobacion FROM encuestareprobacion WHERE encuestareprobacion.Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."' AND Parcial=2";
      $Resultado2 = $Mysql->Consulta($Consulta2);
      if ($Resultado2->num_rows > 0) {
        ?>
        <center><h6> Ya realizaste la encuesta de reprobación del segundo parcial de tus materias</h6><ceter>
          <?php
        }else{
          
          $Consulta3 = "SELECT calificaciones.idCalificaciones,materia.Nombre,calificaciones.SegundoParcial, materia.Componente, (CASE WHEN (materia.Componente='B')AND(calificaciones.SegundoParcial<6) THEN 'Esta reprobada' WHEN (materia.Componente='B')AND(calificaciones.SegundoParcial>=6) THEN 'Esta aprobada' WHEN (materia.Componente='P')AND(calificaciones.SegundoParcial<8) THEN 'Esta reprobada' WHEN (materia.Componente='P')AND(calificaciones.SegundoParcial>=8) THEN 'Esta aprobada' END) AS respuesta FROM calificaciones INNER JOIN materiagruposdocentes ON materiagruposdocentes.idMateriaGruposDocentes= calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria= materia.idMateria INNER JOIN grupos ON calificaciones.idGrupo=grupos.idGrupos WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."' AND grupos.Estatus=1;";
          $Resultado3=$Mysql->Consulta($Consulta3);
          
          $NumeroReprobadasP2=0;
          while($row1=mysqli_fetch_array($Resultado3)){
            if ($row1[4]=='Esta reprobada') {
              $NumeroReprobadasP2=$NumeroReprobadasP2+1;
            }else if ($row1[4]=='Esta aprobada'){
              $NumeroReprobadasP2=$NumeroReprobadasP2+0;
            }

          }
          if($NumeroReprobadasP2>=1){
            ?>
            <center><label style="text-align: justify;"> <b>Reprobaste el segundo parcial de una o de varias materias, realiza la encuesta de reprobación</b></label></center>
            <form name = "form" method="POST" action="AgregarEncuestaReprobacion2.php?">
              <input type="text" name="Parcial" id="Parcial" hidden="" value="2">
              <input class="btn btn-success center-block " type="submit" name="Encuesta" value="Realizar encuesta de reprobación"></input>
              <br><br><br><br>
            </form>

            <?php
          }else{
            ?>
            <center><h6>Las materias estan aprobadas con éxito o aun no tienes calificaciones registradas del parcial 2 </h6></center>
            <?php
          }
          
        }
        ?>


        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <hr>
        
        <center><h3>Tercer parcial</h3></center>
        <?php    
        include_once "../../clases/SQLControlador.php";
        $Mysql = new MySQLConector();
        $Mysql->Conectar();

        $Consulta4="SELECT encuestareprobacion.idEncuestaReprobacion FROM encuestareprobacion WHERE encuestareprobacion.Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."' AND Parcial=3";
        $Resultado4 = $Mysql->Consulta($Consulta4);
        if ($Resultado4->num_rows > 0) {
          ?>
          <center><h6> Ya realizaste la encuesta de reprobación del tercer  parcial de tus materias</h6><ceter>
            <?php
          }else{
            
            $Consulta5 = "SELECT calificaciones.idCalificaciones,materia.Nombre,calificaciones.TercerParcial, materia.Componente, (CASE WHEN (materia.Componente='B')AND(calificaciones.TercerParcial<6) THEN 'Esta reprobada' WHEN (materia.Componente='B')AND(calificaciones.TercerParcial>=6) THEN 'Esta aprobada' WHEN (materia.Componente='P')AND(calificaciones.TercerParcial<8) THEN 'Esta reprobada' WHEN (materia.Componente='P')AND(calificaciones.TercerParcial>=8) THEN 'Esta aprobada' END) AS respuesta FROM calificaciones INNER JOIN materiagruposdocentes ON materiagruposdocentes.idMateriaGruposDocentes= calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria= materia.idMateria INNER JOIN grupos ON calificaciones.idGrupo=grupos.idGrupos WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."' AND grupos.Estatus=1;";
            $Resultado5=$Mysql->Consulta($Consulta5);
            
            $NumeroReprobadasP3=0;
            while($row2=mysqli_fetch_array($Resultado5)){
              if ($row2[4]=='Esta reprobada') {
                $NumeroReprobadasP3=$NumeroReprobadasP3+1;
              }else if ($row2[4]=='Esta aprobada'){
                $NumeroReprobadasP3=$NumeroReprobadasP3+0;
              }

            }
            if($NumeroReprobadasP3>=1){
              ?>
              <center><label style="text-align: justify;"> <b>Reprobaste el tercer parcial de una o de varias materias, realiza la encuesta de reprobación</b></label></center>
              <form name = "form" method="POST" action="AgregarEncuestaReprobacion3.php?">
                <input type="text" name="Parcial" id="Parcial" hidden="" value="3">
                <input class="btn btn-success center-block " type="submit" name="Encuesta" value="Realizar encuesta de reprobación"></input>
                <br><br><br><br>
              </form>

              <?php
            }else{
              ?>
              <center><h6>Las materias estan aprobadas con éxito o aun no tienes calificaciones registradas del parcial 3 </h6></center>
              <?php
            }
            
          }
          ?>

          <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
          

          <br><br>

          
          <!--Fin de contenido de caja de texto--> 
        </div>
        <!--Fin Contenido central-->

      </div>
      <!--Fin Contenedor medio-->
      <?php include "../menus/PiePagina.php";?>
      <!--Inicio de pie de pagina-->
      <div class="container">
        <?php //include 'pie_pagina.php';?>
      </div>
      <!--fin de pie de pagina-->
    </body>
    </html>