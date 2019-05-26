<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
}
unset($_SESSION['ConsultaM']);
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
  <br><center><h2> Tabla de materias</h2></center>
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


          <div class="modal fade" id="modalNuevo" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Agregar nueva materia</h4>
                  <button id="cerrar" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <?php 
                  include_once "../../clases/SQLControlador.php";
                  $Mysql = new MySQLConector();
                  $Mysql->Conectar();
                  $Consulta = "SELECT idCarreras, Nombre FROM carreras where Estatus=1;";
                  $Resultado = $Mysql->Consulta($Consulta);
                  ?>
                  <label>Carreras</label>
                  <div class="row">
                    <div class="col-sm-8">
                      <select style="width:70%;" id="carrera" class="form-control">
                        <option value="0">Seleciona uno</option>
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
                <label>Clave:</label>
                <input type="text" name="" id="clave" class="form-control input-sm" maxlength="50">
                <label>Nombre:</label>
                <input type="text" name="" id="nombre" class="form-control input-sm" maxlength="50">
                <div class="row">
                  <div class="col-sm-8">
                    <label>Componente</label>
                    <br>
                    <select style="width:70%;" id="componente" class="form-control">
                      <option value ="0">Selecciona uno</option>
                      <option value ="B">Básico</option>
                      <option value ="P">Profesional</option>


                    </select>
                  </div>
                </div>
                <label>Semestre:</label>
                <input type="text" name="" id="semestre" class="form-control input-sm" maxlength="1">
                <label>Estatus:</label>
                <input type="text" name="" id="estatus" class="form-control input-sm" value="Activo" readonly>
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

        <div class="modal fade" id="modalEdicion" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Actualizar Materia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <input type="text" name="" id="idu" hidden="">
                <?php 
                include_once "../../clases/SQLControlador.php";
                $Mysql = new MySQLConector();
                $Mysql->Conectar();
                $Consulta = "SELECT idCarreras, Nombre FROM carreras where Estatus=1;";
                $Resultado = $Mysql->Consulta($Consulta);
                ?>
                <label>Carreras</label>
                <div class="row">
                  <div class="col-sm-8">
                    <select style="width:70%;" id="carrerau" class="form-control">
                      <option value="0">Seleciona uno</option>
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
              <label>Clave</label>
              <input type="text" name="" id="claveu" class="form-control input-sm" maxlength="50">
              <label>Nombre</label>
              <input type="text" name="" id="nombreu" class="form-control input-sm" maxlength="50">
              <div class="row">
                <div class="col-sm-8">
                  <label>Componente</label>
                  <br>
                  <select style="width:70%;" id="componenteu" class="form-control">
                    <option value ="0">Selecciona uno</option>
                    <option value ="B">Básico</option>
                    <option value ="P">Profesional</option>
                  </select>
                </div>
              </div>
              <label>Semestre:</label>
              <input type="text" name="" id="semestreu" class="form-control input-sm" maxlength="1">
              <div class="row">
                <div class="col-sm-8">
                  <label>Estatus</label>
                  <br>
                  <select style="width:70%;" id="estatusu" class="form-control">
                    <option value ="0">Inactivo</option>
                    <option value ="1">Activo</option>
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
        $('#tabla').load('./../../clases/tablasmodales/TablaMaterias.php');
        $('#buscador').load('./../../clases/tablasmodales/BuscadorMaterias.php');
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


        $('#cerrar').click(function(){
          $("#carrera").val(0);
          $('#carrera').change();
          $("#componente").val(0);
          $('#componente').change();
          document.getElementById("clave").value = "";
          document.getElementById("nombre").value = "";
          document.getElementById("semestre").value = "";


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
          $('#semestre').on('input', function (e) {
            if (!/^[1-6]*$/i.test(this.value)) {
                this.value = this.value.replace(/[^1-6]+/ig,"");
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
          $('#semestreu').on('input', function (e) {
            if (!/^[1-6]*$/i.test(this.value)) {
                this.value = this.value.replace(/[^1-6]+/ig,"");
              }
        });

         $('#guardarnueva').click(function(){
          var reg = /^[0-9a-zA-Z]([a-zA-Z0-9-]{1,49})$/;
          var reg1 = /^[0-9a-zA-Z]([a-zA-Z0-9\s.,-_]{1,49})$/;
          var carrera=$('#carrera').val();
          var clave=$('#clave').val();
          var nombre=$('#nombre').val();
          var componente=$('#componente').val();
          var semestre=$('#semestre').val();

          if(carrera==0){
            alert('Selecciona una carrera');
          }else if(clave=='' || !reg.  test(clave)){
              alert('Ingresa la clave de manera correcta, no se puede dejar campos vacíos y/o espacios en blanco');
          }else if(nombre=='' || !reg1.test(nombre)){
            alert('Ingresa el nombre de manera correcta y/o no se puede dejar campos vacíos.');
          }else if(componente==0){
            alert('Selecciona un componente');
          }else if(semestre==''){
            alert('Ingresa el semestre de manera correcta, no se puede dejar campos vacíos');
          }else {
            carrera=$('#carrera').val();
            clave=$('#clave').val();
            nombre=$('#nombre').val();
            componente=$('#componente').val();
            semestre=$('#semestre').val();
            AgregarNuevaMateria(carrera,clave,nombre,componente,semestre);
            $("#carrera").val(0);
            $('#carrera').change();
            $("#componente").val(0);
            $('#componente').change();
            document.getElementById("clave").value = "";
            document.getElementById("nombre").value = "";
            document.getElementById("semestre").value = "";
          }
          
          
      });

        $('#actualizadatos').click(function(){
          var regu = /^[0-9a-zA-Z]([a-zA-Z0-9-]{1,49})$/;
          var regu1 = /^[0-9a-zA-Z]([a-zA-Z0-9\s.,-_]{1,49})$/;
          var carrera=$('#carrerau').val();
          var clave=$('#claveu').val();
          var nombre=$('#nombreu').val();
          var componente=$('#componenteu').val();
          var semestre=$('#semestreu').val();
          if(carrera==0){
            alert('Selecciona una carrera');
          }else if(clave=='' || !regu.  test(clave)){
              alert('Ingresa la clave de manera correcta, no se puede dejar campos vacíos y/o espacios en blanco');
          }else if(nombre=='' || !regu1.test(nombre)){
            alert('Ingresa el nombre de manera correcta y/o no se puede dejar campos vacíos.');
          }else if(componente==0){
            alert('Selecciona un componente');
          }else if(semestre==''){
            alert('Ingresa el semestre de manera correcta, no se puede dejar campos vacíos');
          }else {
          ModificacionMateria();
          }
        });



       

      });

</script>
