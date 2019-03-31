<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="./../../css/bootstrap.min.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>

    <!--Icono en pestaña-->
    <link rel="icon" type="image/vnd.microsoft.icon" href="./../imagenes/Mapa.ico">
    
    <!--STYLOS-->
    <link rel="stylesheet" type="text/css" href="./../../css/style_menu_alumno.css">
    <link rel="stylesheet" type="text/css" href="./../../css/style_menu_izquierdo_alumno.css">
      <link rel="stylesheet" type="text/css" href="./../../css/style_pie_pagina.css">

      <!--Iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>


  <body>
    <!--Inicio contenedor Cabecera-->
    <div class="container">
    	<br>
    	<?php include "menu_alumno.php";?>
    </div>
    <!--Fin contenedor Cabecera-->

    <!--Inicio Contenedor medio-->
    <div class="container">
      <!--Poner titulo o nombre -->
              <br><center><h2> Titulo del formulario </h2></center>
            <!--Poner titulo o nombre -->
      
      <div class="row">
        <!--Inicio de menu izquierdo-->

        <div class="col-sm-3">
          <?php include 'menu_izquierdo_alumno.php'?>
        <!--Fin inicio menu izquierdo-->
        </div>
        <!--Inicio Contenido central-->
        <div class="col-sm-9">
        	<!--Inicio de contenido de caja de texto--> 



        			
        	<!--Fin de contenido de caja de texto--> 
        </div>
        <!--Fin Contenido central-->
      
    </div>
    <!--Fin Contenedor medio-->

    <!--Inicio de pie de pagina-->
      <div class="container">
      <?php include 'pie_pagina.php';?>
    </div>
    <!--fin de pie de pagina-->
  </body>
</html>