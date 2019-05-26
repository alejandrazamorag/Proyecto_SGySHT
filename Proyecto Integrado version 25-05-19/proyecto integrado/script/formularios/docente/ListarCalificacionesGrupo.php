<?php
if (!isset($_SESSION)) { session_start(); }
if ((!isset ($_SESSION['IdUsuarioDocente']))&&(!isset ($_SESSION['LoggedinDocente'])))
{
   echo "<script language='javascript'>window.location='LoginDocente.php'</script>";
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
  <script src="./../../js/Main3.js"></script>
  <script type="text/javascript">
    <!--
      function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
      if(filter(tempValue)=== false){
        return false;
      }else{       
        return true;
      }
    }else{
      if(key == 8 || key == 13 || key == 0) {     
        return true;              
      }else if(key == 46){
        if(filter(tempValue)=== false){
          return false;
        }else{       
          return true;
        }
      }else{
        return false;
      }
    }
  }
  function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
      return true;
    }else{
     return false;
   }
   
 }
</script>


</head>


<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
   <br>
   <?php include "../menus/MenuDocente.php";
   MenuListarGrupos();?>


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
          <form name="frmdatos"   method="get" action="GuardarCalificaciones.php">
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <br>
              </caption>
              <thead class="thead-light">
                <tr>
                  <th>id</td>
                    <th>Nombre completo</td>
                      <th>Parcial 1</td>
                        <th>Parcial 2</td>
                          <th>Parcial 3</td>
                            <th>Ext</td>
                          </tr>
                        </thead>

                        <?php 
                        $GrupoId=$_GET['idgrupo'];
                        include_once "../../clases/SQLControlador.php";
                        $Mysql = new MySQLConector();
                        $Mysql->Conectar();
                        $Consulta = "SELECT alumno.idAlumno, calificaciones.idCalificaciones,CONCAT(alumno.ApellidoP,' ',alumno.ApellidoM,' ',alumno.Nombre) AS NombreCompleto,calificaciones.PrimerParcial ,calificaciones.SegundoParcial,calificaciones.TercerParcial, calificaciones.EXT FROM calificaciones INNER JOIN alumno ON calificaciones.Alumno_idAlumno=alumno.idAlumno WHERE calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes='".$GrupoId."' ORDER BY NombreCompleto ASC;";

                        $Resultado = $Mysql->Consulta($Consulta);
                        while($ver=mysqli_fetch_row($Resultado)){ 
                          ?>

                          <tr>

                            <td><?php echo $ver[0] ?></td>
                            <td><?php echo $ver[2] ?></td>
                            <td><input type="text" value="<?php echo$ver[3]?>" name="Parcial1[]" size=5 onkeypress="return filterFloat(event,this);"></td>
                            <td><input type="text" value="<?php echo$ver[4]?>" name="Parcial2[]" size=5 onkeypress="return filterFloat(event,this);"></td>
                            <td><input type="text" value="<?php echo$ver[5]?>" name="Parcial3[]" size=5 onkeypress="return filterFloat(event,this);"></td>
                            <td><input type="text" value="<?php echo$ver[6]?>" name="Ext[]" size=5 onkeypress="return filterFloat(event,this);"></td>
                            <input type=hidden value="<?php echo$ver[1]?>" name=idCalificaciones[] >
                          </tr>
                          <?php 
                        }
                        ?>

                      </table>
                      <button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerDatosMateriaModificacion('<?php  ?>')">
                        Modificar
                      </button>
                      <br><br>
                    </div>
                  </form>


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