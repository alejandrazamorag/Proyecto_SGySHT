<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
}
unset($_SESSION['ConsultaMGD']);
/*if ((!isset ($_SESSION['IdUsuarioAlumno']))&&(!isset ($_SESSION['LoggedinAlumno'])))
{
   echo "<script language='javascript'>window.location='loginalumno.php'</script>";
 }*/
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
  <link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/alertify.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/select2.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/select2.min.css">
  <!--STYLOS-->
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuCapturista.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>  
  <script src="./../../../js/jquery-3.3.1.js"></script>
  <script src="./../../../js/jquery-3.3.1.min.js"></script>
  <script src="./../../../js/popper.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>
  <script src="./../../../js/bootstrap.js"></script>
  <script src="./../../../js/alertify.js"></script>
  <script src="./../../../js/select2.js"></script>
  <script src="./../../js/Funciones.js"></script>
  
  

</head>


<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
   <?php include "../menus/MenuCapturista.php";
   MenuCapturista();?>


 </div>
</div>

</div>
<!--Fin contenedor Cabecera-->

<!--Inicio Contenedor medio-->
<div class="container" id="contenedor">
  <!--Poner titulo o nombre -->
  <br><center><h2> Tabla de Docentes con materias y grupos a los cuales impartira clases</h2></center>
  <!--Poner titulo o nombre -->

  <div class="row">
    <!--Inicio de menu izquierdo-->

    <div class="col-sm-1">

          <?php// include 'menu_izquierdo_alumno.php';
          ?>
          <!--Fin inicio menu izquierdo-->
        </div>
        <!--Inicio Contenido central-->
        <div class="col-sm-10">
          <!--Inicio de contenido de caja de texto--> 
          <div class="container">
            <div id="buscador"></div>
            <div id="tabla"></div>
          </div>

        <!-- Modal para edicion de datos -->

        <div class="modal fade" id="modalEdicion" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Asignar docente a la materia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
              <input type="text" name="" id="idu" hidden="">
              <label>Carrera:</label>
              <input type="text" name="" id="carrerau" class="form-control input-sm" maxlength="1" readonly>
              <label>Grado:</label>
              <input type="text" name="" id="gradou" class="form-control input-sm" maxlength="1" readonly>
              <label>Grupo:</label>
              <input type="text" name="" id="grupou" class="form-control input-sm" maxlength="1" readonly>
              <label>Materia:</label>
              <input type="text" name="" id="materiau" class="form-control input-sm" maxlength="1" readonly>
              <?php 
                include_once "../../clases/SQLControlador.php";
                $Mysql = new MySQLConector();
                $Mysql->Conectar();
                $Consulta = "SELECT personal.idPersonal, CONCAT( personal.Nombre,' ', personal.ApellidoP,' ', personal.ApellidoM) AS NombreTutor FROM personal INNER JOIN usuarios ON personal.idPersonal=usuarios.Personal_idPersonal INNER JOIN privilegios ON usuarios.idUsuarios=privilegios.Usuarios_idUsuarios WHERE privilegios.TipoPrivilegio=4;";
                $Resultado = $Mysql->Consulta($Consulta);
                ?>
                <label>Nombre de docentes</label>
                  <div class="row">
                    <div class="col-sm-8">
                      <select style="width:80%;" id="docenteu" class="form-control">
                        <option value="">No hay docente asignado</option>
                        <?php
                        while($ver=mysqli_fetch_row($Resultado)): 
                         ?>
                         <option value="<?php echo $ver[0] ?>">
                          <?php echo $ver[1]?>
                        </option>

                      <?php endwhile; ?>

                    </select>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" id="actualizadatos">Actualizar</button>
              </div>
            </div>
          </div>
        </div>


        <!--Fin de contenido de caja de texto--> 

        <br><br></div>
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

    <script type="text/javascript">
      $(document).ready(function(){
        $('#tabla').load('./../../clases/tablasmodales/TablaMateriaGruposDocentes.php');
        $('#buscador').load('./../../clases/tablasmodales/BuscadorMateriaGrupoDocente.php');
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){

        $('select').select2({    
          language: {
            noResults: function() {
              return "No hay resultado";        
            },
            searching: function() {
              return "Buscando..";
            }
          }
        });

         $('#actualizadatos').click(function(){
           var docente=$('#docenteu').val();
          if (docente==0) {
            alert('Selecciona un docente');
          }else{          
            ModificacionMatereriaGrupoDocente();
          }
        });
      });
</script>
