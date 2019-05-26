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
  </head>


  <body>
    <!--Inicio contenedor Cabecera-->
    <div class="container">
    	<br>
    	<?php include "../menus/MenuAlumno.php";
      MenuAlumno();?>
    </div>
    <!--Fin contenedor Cabecera-->

    <!--Inicio Contenedor medio-->
    <div class="container" id="contenedor">
      <!--Poner titulo o nombre -->
              <br><center><h2> Bienvenid@ </h2></center>
            <!--Poner titulo o nombre -->
      
      <div class="row">
        <!--Inicio de menu izquierdo-->

        <div class="col-sm-3">

          <?php include '../menus/MenuIzquierdoAlumno.php';
          ?>
        
          <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--Fin inicio menu izquierdo-->
        </div>
        <!--Inicio Contenido central-->
        <div class="col-sm-9">
          <br>
        	<!--Inicio de contenido de caja de texto--> 
          <div class="row">
            <div class="col-sm-4"  style=" top: 0px; left: 0px">
               <div class="main">
                  <div class="panel panel-primary">
                    <div class="panel panel-primary">
                      <?php                        
                   $Consulta = "SELECT Fotografia from alumno where idAlumno='".$_SESSION['IdUsuarioAlumno']."';";
                       $Resultado = $Mysql->Consulta($Consulta);
                        if ($Resultado->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                          while ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
                            echo "<img width='250' height='300' src='data:imagen/jpeg;base64,".base64_encode($row["Fotografia"]). "' />";
                          }
                        }else{

                          echo "<font color='red'>Aun no hay fotografia</font>";
                        }
                      ?>
                      </div>
                    </div>
                 </div>  
                 <br><br><br><br>
            </div>
            <div class="col-sm-5">
              <?php
                        $Consulta = "SELECT alumno.Nombre AS NombreAlumno,alumno.ApellidoP,alumno.ApellidoM, grupos.Grado, grupos.Grupo, carreras.Nombre AS NombreCarrera FROM alumno INNER JOIN grupos ON alumno.Grupos_idGrupos = grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE alumno.idAlumno='".$_SESSION['IdUsuarioAlumno']."';";
                        $Resultado = $Mysql->Consulta($Consulta);
                        if ($Resultado->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                          while ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
                            //echo "<font color='black'><em><b>Nombre del Alumno:<b><em></font>";
                            echo "<font color='black' size='5' ><i><b>Nombre:</i></b></font>";
                            ?><br><?php
                             echo "<font color='black' size='4' >".$row["NombreAlumno"]." ".$row["ApellidoP"]." ".$row["ApellidoM"]."</i></font>";
                            
                            ?><br><br><?php
                            echo "<font color='black' size='5'><b><i>Carrera:</i></b></font>";
                            ?><br><?php
                             echo "<font color='black' size='4' >".$row["Grado"].".".$row["Grupo"]." de ".$row["NombreCarrera"]."</i></font>";
                            ?><br><?php
                            //echo "<font color='black'><em><b>".$row["idAlumno"]."<b><em></font>";
                            //echo "<font color='black'>".$row["Nombre"]." ".$row["ApellidoP"]." ".$row["ApellidoM"]."</font>";
                          }
                        }
               
              ?>
            </div>
          </div>

        			
        	<!--Fin de contenido de caja de texto--> 
        </div>
        <!--Fin Contenido central-->
      
    </div>
    <!--Fin Contenedor medio-->
     <?php include "../menus/PiePagina.php";?>
    <!--Inicio de pie de pagina-->
      <div class="container">
     <!-- <?php //include 'pie_pagina.php';?>-->
    </div>
    <!--fin de pie de pagina-->
  </body>
</html>