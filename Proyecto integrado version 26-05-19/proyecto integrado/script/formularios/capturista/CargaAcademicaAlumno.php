<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
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
    	<?php include "../menus/MenuCapturista.php";
      MenuAlumnoCapturista();?>
    </div>
    <!--Fin contenedor Cabecera-->

    <!--Inicio Contenedor medio-->
    <div class="container" id="contenedor">
      <!--Poner titulo o nombre -->
              <br><center><h2> Carga Academica </h2></center>
            <!--Poner titulo o nombre -->
      
      <div class="row">
        <!--Inicio de menu izquierdo-->

        <div class="col-sm-3">

          <?php include '../menus/MenuIzquierdoAlumnoCap.php';
          ?>
        
          <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--Fin inicio menu izquierdo-->
        </div>
        <!--Inicio Contenido central-->
        <div class="col-sm-9">
          <br>
        	<!--Inicio de contenido de caja de texto--> 
          
          <form name="CargaRegular" id="CargaRegular" method="GET" action="../../clases/CargaAcademicaRegular.php">
            <button name="submit" class="btn btn-success center-block">Cargar Materias Regulares</button>
          </form>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <br>
              </caption>
              <thead class="thead-light">
              <tr>
                <th>Id</td>
                <th>Materia</td>
                <th>Docente</td>
              </tr>
              </thead>

              <?php 
                include_once "../../clases/SQLControlador.php";
                $Mysql = new MySQLConector();
                $Mysql->Conectar();

                $Consulta="SELECT Grupos_idGrupos FROM alumno WHERE idAlumno='".$_SESSION['IdAlumnoCapturista']."';";
                $Resultado = $Mysql->Consulta($Consulta);
                $row = mysqli_fetch_array($Resultado);
                $IdGrupo = $row['Grupos_idGrupos'];




                $Consulta = "SELECT calificaciones.idCalificaciones,calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes,materia.idMateria,materia.Nombre,materiagruposdocentes.Personal_idPersonal,CONCAT(personal.Nombre,' ',personal.ApellidoP,' ', personal.ApellidoM)AS NombreDocente FROM calificaciones INNER JOIN materiagruposdocentes on calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes=materiagruposdocentes.idMateriaGruposDocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria=materia.idMateria INNER JOIN personal ON materiagruposdocentes.Personal_idPersonal=personal.idPersonal WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdAlumnoCapturista']."' and calificaciones.idGrupo='".$IdGrupo."';";
                $Resultado = $Mysql->Consulta($Consulta);
                while($ver=mysqli_fetch_row($Resultado)){ 

                  $datos=$ver[0]."||".
                  $ver[1]."||".
                  $ver[2]."||".
                  $ver[3]."||".
                  $ver[4];
                  //echo $datos;
                  ?>

                  <tr>
                    <td><?php echo $ver[0] ?></td>
                    <td><?php echo $ver[3] ?></td>
                    <td><?php echo $ver[5] ?></td>
                </tr>
                <?php 
              }
              ?>
            </table>
            </div>
        			
        	<!--Fin de contenido de caja de texto--> 
        </div>
        <!--Fin Contenido central-->
      
    </div>
    <!--Fin Contenedor medio-->
    <br><br><br>
     <?php include "../menus/PiePagina.php";?>
    <!--Inicio de pie de pagina-->
      <div class="container">
     <!-- <?php //include 'pie_pagina.php';?>-->
    </div>
    <!--fin de pie de pagina-->
  </body>
</html>