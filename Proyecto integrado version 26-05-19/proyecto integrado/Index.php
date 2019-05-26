<?php
if (!isset($_SESSION)) { session_start(); }
/*if (isset ($_SESSION['LoggedinAlumno']) )
{
     echo "<script language='javascript'>window.location='inicioalumno.php'</script>";
   }*/
   ?>
   <!doctype html>
   <html lang="en">

   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <!--Icono en pestaña-->
    <link rel="icon" type="image/vnd.microsoft.icon" href="imagenes/Mapa.ico">
    <!--Iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!--STYLOS-->
    <link rel="stylesheet" type="text/css" href="css/EstiloMenuIndex.css">
    <link rel="stylesheet" type="text/css" href="css/EstiloPiePagina.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>  
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </head>
     <body>

    <!--Inicio contenedor Cabecera-->
    <div class="container">
    	<br>
    	<?php include "script/formularios/menus/MenuIndex.php";
     MenuInicioIndex();?>


   </div>
   <!--Fin contenedor Cabecera-->

   <!--Inicio Contenedor medio-->
   <div class="container" id="contenedor">
    <br>
    <!--Poner titulo o nombre -->
  
    <!--Poner titulo o nombre -->
    
    <div class="row">
      <!--Inicio de menu izquierdo-->

      <div class="col-sm-1">
        <!--<?php// include 'menu_izquierdo_alumno.php'?>-->
        <!--Fin inicio menu izquierdo-->
      </div>
      <!--Inicio Contenido central-->
      <div class="col-sm-10">
       <!--Inicio de contenido de caja de texto--> 

       <!--<img src="imagenes/2.jpg" width="900" height="490">-->
       <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner" >
          <div class="carousel-item active">
            <img src="imagenes/edificio1.JPG" class="d-block w-100" alt="..." width="100" height="490">
          </div>
          <div class="carousel-item">
            <img src="imagenes/edificio2.JPG" class="d-block w-100" alt="..." width="100" height="490">
          </div>
          <div class="carousel-item">
            <img src="imagenes/edificio3.JPG" class="d-block w-100" alt="..." width="100" height="490">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--Fin de contenido de caja de texto--> 
    </div>
    <div class="col-sm-1">
      <!--<?php// include 'menu_izquierdo_alumno.php'?>-->
      <!--Fin inicio menu izquierdo-->
    </div>
    <!--Fin Contenido central-->
    
  </div>
  <!--Fin Contenedor medio-->

  <!--Inicio de pie de pagina-->
  <br>
   <?php include "script/formularios/menus/PiePagina.php";?>
  <div class="container">
   <!-- <?php //include 'pie_pagina.php';?>-->
   <!-- <?php// include 'pie_pagina1.php';?>-->
 </div>
 <!--fin de pie de pagina-->
</body>
</html>