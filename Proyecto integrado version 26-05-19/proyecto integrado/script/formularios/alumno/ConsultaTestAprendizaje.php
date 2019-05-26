<?php
if (!isset($_SESSION)) { session_start(); }
if ((!isset ($_SESSION['IdUsuarioAlumno']))&&(!isset ($_SESSION['LoggedinAlumno'])))
{
 echo "<script language='javascript'>window.location='LoginAlumno.php'</script>";
}

include_once "../../clases/SQLControlador.php";
include_once "../../clases/Alumno.php";

$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta = "SELECT Total FROM testaprendizaje WHERE Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."';";
$Resultado = $Mysql->Consulta($Consulta);
                        if ($Resultado->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                          //echo "<script language='javascript'>window.location='consultatestaprendizaje.php'</script>";
                        }else{
                          echo "<script language='javascript'>window.location='testaprendizajealumno.php'</script>";
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
                         <div class="container" id="contenedor">
                          <!--Poner titulo o nombre -->
                          <br><center><h2> Tu resultado es  </h2></center>
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
                             <br><br>

                             <?php
                             include_once "../../Clases/SQLControlador.php";
                             include_once "../../Clases/Alumno.php";

                             $Mysql = new MySQLConector();
                             $Mysql->Conectar();
                             $Consulta = "SELECT Visual,Auditivo,Kinestesico FROM testaprendizaje WHERE Alumno_idAlumno ='".$_SESSION['IdUsuarioAlumno']."';";
                             $Resultado = $Mysql->Consulta($Consulta);
                             $row = mysqli_fetch_array($Resultado);

                             $ResultadoVisual=$row["Visual"];
                             $ResultadoAuditivo=$row["Auditivo"];
                             $ResultadoKinestesico=$row["Kinestesico"];

                             if (($ResultadoVisual>$ResultadoAuditivo)&&($ResultadoVisual>$ResultadoKinestesico)){
                        //echo "visual";
                              ?>
                              <img src="./../../../imagenes/visual.png" width="600" height="300">
                              <?php
                            }else if (($ResultadoAuditivo>$ResultadoVisual)&&($ResultadoAuditivo>$ResultadoKinestesico)){
                        //echo "auditivo";
                              ?>
                              <img src="./../../../imagenes/auditivo.png" width="600" height="300">
                              <?php
                            }else if (($ResultadoKinestesico>$ResultadoVisual)&&($ResultadoKinestesico>$ResultadoAuditivo)){
                        //echo "kinestesico";
                              ?>
                              <img src="./../../../imagenes/kinestesico.png" width="600" height="300">
                              <?php
                            }else if (($ResultadoVisual==$ResultadoAuditivo)&&($ResultadoAuditivo==$ResultadoKinestesico)){
                        //echo "poner las 3 imagenes";
                              ?>
                              <img src="./../../../imagenes/visual.png" width="600" height="300">
                              <img src="./../../../imagenes/auditivo.png" width="600" height="300">
                              <img src="./../../../imagenes/kinestesico.png" width="600" height="300">
                              <?php
                            }else if (($ResultadoVisual==$ResultadoAuditivo)&&($ResultadoAuditivo!=$ResultadoKinestesico)){
                        //echo "visual y auditivo";
                              ?>
                              <img src="./../../../imagenes/visual.png" width="600" height="300">
                              <img src="./../../../imagenes/auditivo.png" width="600" height="300">
                              <?php
                            }else if (($ResultadoVisual==$ResultadoKinestesico)&&($ResultadoKinestesico!=$ResultadoAuditivo)){
                        //echo "visual y kinestesico";
                              ?>
                              <img src="./../../../imagenes/visual.png" width="600" height="300">
                              <img src="./../../../imagenes/kinestesico.png" width="600" height="300">
                              <?php
                            }else if (($ResultadoAuditivo==$ResultadoKinestesico)&&($ResultadoKinestesico!=$ResultadoVisual)){
                        //echo "kinestesico y auditivo";
                              ?>
                              <img src="./../../../imagenes/auditivo.png" width="600" height="300">
                              <img src="./../../../imagenes/kinestesico.png" width="600" height="300">
                              <?php
                            }

                            ?>

                            <br><br><br><br>
                            <!--Fin de contenido de caja de texto--> 
                          </div>
                          <!--Fin Contenido central-->

                        </div>
                        <!--Fin Contenedor medio-->
                         <?php include "../menus/PiePagina.php";?>
                        <!--Inicio de pie de pagina-->
                        <div class="container">
                         <!-- <?php //include 'pie_pagina.php';?>-->
                         <?php //include 'pie_pagina1.php';?>
                       </div>
                       <!--fin de pie de pagina-->
                     </body>
                     </html>