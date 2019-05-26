<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinDocenteTutor']) && !isset ($_SESSION['IdDocenteTutor']))
{
   echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
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
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>  
  <script src="./../../../js/jquery-3.3.1.js"></script>
  <script src="./../../../js/jquery-3.3.1.min.js"></script>
  <script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
  <script src="./../../../js/popper.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>
  <script src="./../../../js/jquery.min.js"></script>
  <script src="./../../js/Main2.js"></script>



</head>


<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
   <br>
   <?php include "../menus/MenuDocenteTutor.php";
   MenuDocenteTutorAlumnoInicio();?>


 </div>
</div>

</div>
<!--Fin contenedor Cabecera-->

<!--Inicio Contenedor medio-->
<div class="container" id="contenedor">
  <!--Poner titulo o nombre -->
  <br><center><h2> Tabla alumnos</h2></center>
  <!--Poner titulo o nombre -->

  <div class="row">
    <!--Inicio de menu izquierdo-->

    <div class="col-sm-1">

          <?php// include 'menu_izquierdo_alumno.php';
          ?>

          <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
          <!--Fin inicio menu izquierdo-->
        </div>
        <!--Inicio Contenido central-->
        <div class="col-sm-10">
          <br>
          <!--Inicio de contenido de caja de texto--> 
          
          <div class="formulario" align="left">
           <b> <label for="caja_busqueda">Buscar por nombre..... </label><br></b>
            <input size="30"  type="text" name="caja_busqueda" id="caja_busqueda" ></input>
          </div>
          <center>
            <br>
          <div id="datos"></div>
          </center>


          <!--Fin de contenido de caja de texto--> 

          <br><br>
        </div>
        <!--Fin Contenido central-->
        <div class="col-sm-1">

        </div>

      </div>
      <!--Fin Contenedor medio-->

      <!--Inicio de pie de pagina-->

      <?php include "../menus/PiePagina.php";?>



      
      <!-- <?php //include 'pie_pagina.php';?>-->


      <!--fin de pie de pagina-->

    </body>
    </html>