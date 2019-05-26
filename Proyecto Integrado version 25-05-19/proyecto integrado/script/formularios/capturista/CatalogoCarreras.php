<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
}
unset($_SESSION['ConsultaC']);
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
  <br><center><h2> Tabla de carreras</h2></center>
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

          <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Agregar nueva carrera</h4>
                  <button id="cerrar" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <label>Clave:</label>
                  <input type="text" name="" id="clave" class="form-control input-sm" maxlength="50">
                  <label>Nombre:</label>
                  <input type="text" name="" id="nombre" class="form-control input-sm" maxlength="50">
                  <label>Área de especialidad:</label>
                  <input type="text" name="" id="area" class="form-control input-sm" maxlength="50">
                  <label>Estatus:</label>
                  <input type="text" name="" id="area" class="form-control input-sm" value="Activo" readonly>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="guardarnueva" >
                    Agregar
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal para edicion de datos -->

          <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Actualizar carrera</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <!--<input type="text" hidden="" id="id" name="">-->
                  <input type="text" name="" id="idu" hidden="">
                  <label>Clave</label>
                  <input type="text" name="" id="claveu" class="form-control input-sm" maxlength="50">
                  <label>Nombre</label>
                  <input type="text" name="" id="nombreu" class="form-control input-sm" maxlength="50">
                  <label>Área de especialidad</label>
                  <input type="text" name="" id="areau" class="form-control input-sm" maxlength="50">
                  <label>Estatus</label>
                  <select id="estatusu" class="form-control">
                    <option value ="0">Inactivo</option>
                    <option value ="1">Activo</option>
                  </select>
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
          $('#tabla').load('./../../clases/tablasmodales/TablaCarreras.php');
          $('#buscador').load('./../../clases/tablasmodales/BuscadorCarreras.php');
        });
      </script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#cerrar').click(function(){
            document.getElementById("clave").value = "";
            document.getElementById("nombre").value = "";
            document.getElementById("area").value = "";
          });

          $('#clave').on('input', function (e) {
            if (!/^[ A-Za-z0-9-]*$/i.test(this.value)) {
              this.value = this.value.replace(/[^A-Za-z0-9-]+/ig,"");
            }
          });

          $('#nombre').on('input', function (e) {
            if (!/^[ A-Za-z0-9\s.,-_]*$/i.test(this.value)) {
                this.value = this.value.replace(/[^A-Za-z0-9\s.,-]+/ig,"");
              }
            });

          $('#area').on('input', function (e) {
            if (!/^[ A-Za-z0-9\s.,-_]*$/i.test(this.value)) {
              this.value = this.value.replace(/[^A-Za-z0-9\s.,-]+/ig,"");
            }
          });

          $('#claveu').on('input', function (e) {
            if (!/^[ A-Za-z0-9-]*$/i.test(this.value)) {
              this.value = this.value.replace(/[^A-Za-z0-9-]+/ig,"");
            }
          });

          $('#nombreu').on('input', function (e) {
            if (!/^[ A-Za-z0-9\s.,-_]*$/i.test(this.value)) {
              this.value = this.value.replace(/[^A-Za-z0-9\s.,-]+/ig,"");
            }
          });

          $('#areau').on('input', function (e) {
            if (!/^[ A-Za-z0-9\s.,-_]*$/i.test(this.value)) {
              this.value = this.value.replace(/[^A-Za-z0-9\s.,-]+/ig,"");
            }
          });

          $('#actualizadatos').click(function(){
            var regu = /^[0-9a-zA-Z]([a-zA-Z0-9-]{1,49})$/;
            var regu1 = /^[0-9a-zA-Z]([a-zA-Z0-9\s.,-_]{1,49})$/;
            var clave = $('#claveu').val();
            var nombre = $('#nombreu').val();
            var area = $('#areau').val();
            if(clave=='' || !regu.  test(clave)){
              alert('Ingresa la clave de manera correcta, no se puede dejar campos vacíos y/o espacios en blanco');
            }else if(nombre=='' || !regu1.test(nombre)){
              alert('Ingresa el nombre de manera correcta y/o no se puede dejar campos vacíos.');
            }else if(area=='' || !regu1.test(area)){
              alert('Ingresa el área de especialidad de manera correcta');
            }else{
              ModificacionCarrera();
            }
          });

          $('#guardarnueva').click(function(){
            var reg = /^[0-9a-zA-Z]([a-zA-Z0-9-]{1,49})$/;
            var reg1 = /^[0-9a-zA-Z]([a-zA-Z0-9\s.,-_]{1,49})$/;
            var clave = $('#clave').val();
            var nombre = $('#nombre').val();
            var area = $('#area').val();

            if(clave=='' || !reg.  test(clave)){
              alert('Ingresa la clave de manera correcta, no se puede dejar campos vacíos y/o espacios en blanco');
            }else if(nombre=='' || !reg1.test(nombre)){
              alert('Ingresa el nombre de manera correcta y/o no se puede dejar campos vacíos.');
            }else if(area=='' || !reg1.test(area)){
              alert('Ingresa el área de especialidad de manera correcta');
            }else{
              clave=$('#clave').val();
              nombre=$('#nombre').val();
              area=$('#area').val();
              AgregarNuevaCarrera(clave,nombre,area);
              document.getElementById("clave").value = "";
              document.getElementById("nombre").value = "";
              document.getElementById("area").value = "";
          }
        });
      });
</script>