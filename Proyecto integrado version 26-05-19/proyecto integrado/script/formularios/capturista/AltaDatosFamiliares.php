<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
}
unset($_SESSION['consulta']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--  meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="./../../../js/jquery-3.3.1.js"></script>
  <script src="../../js/Funciones.js"></script>
  <script src="./../../../js/jquery-3.3.1.min.js"></script>
  <script src="./../../../js/popper.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>

  <!--Icono en pestaña-->
  <link rel="icon" type="image/vnd.microsoft.icon" href="../../imagenes/Mapa.ico">
  
  <!--STYLOS-->
   <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
 <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuIzquierdoAlumno.css">


  <!--Iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script>
    function habilitar(value)
    {
      if((value=="Madre")||(value=="Padre"))
      {
        document.getElementById("Tutor").checked = true;
        document.getElementById("Justificantes").checked = true;
      }else{
        document.getElementById("Tutor").checked = false;
        document.getElementById("Justificantes").checked = false;
      }


    }
  </script>
  <!--Solo Numeros-->
  <script type="text/javascript">
    function soloNumeros(e){
      var key = window.Event ? e.which : e.keyCode
      if(key >= 48 && key <= 57){

      }else{
        //alert('Solo numeros Por favor');
      }
      return (key >= 48 && key <= 57)
    }

//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 39, 46, 6, 44]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
      if(key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
      //alert('Tecla no aceptada');
      return false;
    }
  }
</script>

<script language="javascript" type="text/javascript">
  function validar() {
        //obteniendo el valor que se puso en el campo text del formulario
        miCampoTexto = document.getElementById("nombre").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Nombre esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("apellidopaterno").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Apellido Paterno esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("apellidomaterno").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de Apellido Materno esta vacio!');
          return false;
        }

        var txtFecha = document.getElementById('fechanacimiento').value;
        if(!isNaN(txtFecha)){
          alert('Seleccione o introduzca una fecha');
          return false;
        }

        miCampoTexto = document.getElementById("profesion").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Profesion esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("lugartrabajo").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Lugar de Trabajo esta vacio!');
          return false;
        }

        ckbTutor = document.getElementById('Tutor');
        ckbJustificantes = document.getElementById('Justificantes');
        cmbSelector = document.getElementById('parentesco')
        var pro = cmbSelector.options[cmbSelector.selectedIndex].value;
        if((pro == 'Padre')||(pro == 'Madre')){
          //alert('yehi');
          if((!ckbTutor.checked) && (!ckbJustificantes.checked)){
            alert('Debes seleccionar las dos opciones Tutor-Justificantes' );
            return false;
          }else{

          }
        }else{
          if((!ckbTutor.checked) && (!ckbJustificantes.checked)){
            alert('Debes seleccionar al menos una opcion Tutor o Justificantes');
            return false;
          }else if ((!ckbTutor.checked) || (!ckbJustificantes.checked)) {

          }
        }

        var txtCorreo = document.getElementById("email").value;
        if(txtCorreo.length > 0 && !(/\S+@\S+\.\S+/.test(txtCorreo))){
          alert('Escriba un correo válido');
          return false;
        }

        miCampoTexto = document.getElementById("CP").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de texto CP esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Calle").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Calle esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Numero").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Numero de Casa esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Colonia").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Colonia esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Municipio").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de Municipio esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Localidad").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de Localidad esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Estado").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de Estado esta vacio!');
          return false;
        }

        return true;
      }
    </script>

    <script language="javascript" type="text/javascript">
      function ValidarModificacion() {
  //obteniendo el valor que se puso en el campo text del formulario
  miCampoTexto = document.getElementById("nombreu").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Nombre esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("apellidopaternou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Apellido Paterno esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("apellidomaternou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Apellido Materno esta vacio!');
          return false;
        }

        var txtFecha = document.getElementById('fechanacimientou').value;
        if(!isNaN(txtFecha)){
          alert('Seleccione o introduzca una fecha');
          return false;
        }

        miCampoTexto = document.getElementById("profesionu").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Profesion esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("lugartrabajou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Lugar de Trabajo esta vacio!');
          return false;
        }


        var ckbTutor = document.getElementById('Tutoru');
        var ckbJustificantes = document.getElementById('Justificantesu');
        if((!ckbTutor.checked) && (!ckbJustificantes.checked)){
          var cmbSelector = document.getElementById('parentescou')
          var pro = cmbSelector.options[cmbSelector.selectedIndex].value;
          if((pro == 'Padre')||(pro == 'Madre')){
            if((!ckbTutor.checked) && (!ckbJustificantes.checked)){
              alert('Debes seleccionar las dos opciones Tutor-Justificantes');
              return false;
            }else{

            }
          }else{
            if((!ckbTutor.checked) && (!ckbJustificantes.checked)){
              alert('Debes seleccionar al menos una opcion Tutor o Justificantes');
              return false;
            }else if ((!ckbTutor.checked) || (!ckbJustificantes.checked)) {

            }
          }
        }else{ 

        }

        var txtCorreo = document.getElementById("emailu").value;
        if(txtCorreo.length > 0 && !(/\S+@\S+\.\S+/.test(txtCorreo))){
          alert('Escriba un correo válido');
          return false;
        }

        miCampoTexto = document.getElementById("CPu").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo CP esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Calleu").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Calle esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Numerou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Numero de Casa esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Coloniau").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Colonia esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Municipiou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Municipio esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Localidadu").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Localidad esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("Estadou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Estado esta vacio!');
          return false;
        }
        return true;
      }
    </script>
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
    <div class="container">
      <!--Poner titulo o nombre -->
      <br><center><h2> Datos Padres/Familiares tutores .. </h2></center>
      <!--Poner titulo o nombre -->
      
      <div class="row">
        <!--Inicio de menu izquierdo-->
        <!--Inicio Contenido central-->
        <div class="col-sm-3">

          <?php include '../menus/MenuIzquierdoAlumnoCap.php';
          ?>
        
          <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--Fin inicio menu izquierdo-->
        </div>
        <div class="col-sm-9">
        	<!--Inicio de contenido de caja de texto-->
          <br>
          <div class="col-md-12" id="tabla"></div>
          
          <!--Modal para nuevo-->
          <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
                  <button type="button" class="close" data-dismiss="modal" id="CerrarRegistro" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <label>Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="form-control input-sm"  onkeypress="return soloLetras(event);" maxlength="25" >
                  <label>Apellido Paterno</label>
                  <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="20" >
                  <label>Apellido Materno</label>
                  <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="20">
                  <label>Fecha Naciemiento</label>
                  <input type="date" name="" id="fechanacimiento" class="form-control input-sm" >
                  <label>Profesion</label>
                  <input type="text" name="" id="profesion" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="50" >
                  <label>Lugar de Trabajo</label>
                  <input type="text" name="" id="lugartrabajo" class="form-control input-sm" maxlength="50" >
                  <label for="">Parentesco</label>
                  <select name="parentesco" id="parentesco" class="custom-select" onchange=" ValidarTutorJustificantesRegistro()">
                    <option value="Madre">Madre</option>
                    <option value="Padre">Padre</option>
                    <option value="Abuela">Abuela</option>
                    <option value="Abuelo">Abuelo</option>
                    <option value="Tio">Tio</option>
                    <option value="Tia">Tia</option>
                    <option value="Hermano">Hermano</option>
                    <option value="Hermana">Hermana</option>
                  </select>
                  <label>Telefono</label>
                  <input type="text" name="" id="telefono" class="form-control input-sm" onKeyPress="return soloNumeros(event)" maxlength="10">
                  <input type="checkbox" id="Tutor" name="Tutor"  value="1"> Tutor
                  <input type="checkbox" id="Justificantes" name="Justificantes" value="1"> Justificantes <br>
                  <label>Email</label>
                  <input type="email" name="" id="email" class="form-control input-sm" maxlength="50" >
                  <hr>
                  <h5>Direccion</h5>
                  <label>CP</label>
                  <input type="text" name="" id="CP" class="form-control input-sm" onKeyPress="return soloNumeros(event)" maxlength="10">
                  <label>Calle</label>
                  <input type="text" name="" id="Calle" class="form-control input-sm" maxlength="30" >
                  <label>Numero</label>
                  <input type="text" name="" id="Numero" class="form-control input-sm" maxlength="20" >

                  <label>Colonia</label>
                  <input type="text" name="" id="Colonia" class="form-control input-sm" maxlength="50">
                  <label>Municipio</label>
                  <input type="text" name="" id="Municipio" class="form-control input-sm" maxlength="50">
                  <label>Localidad</label>
                  <input type="text" name="" id="Localidad" class="form-control input-sm" maxlength="50" >
                  <label>Estado</label>
                  <input type="text" name="" id="Estado" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="50" >
                  <label>Tel. Casa</label>
                  <input type="text" name="" id="TelCasa" class="form-control input-sm" onKeyPress="return soloNumeros(event)" maxlength="10" >
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success"  id="GuardarRegistro" onclick="return validar()" >
                    Agregar
                  </button>
                  <button type="button" class="btn btn-danger"  id="CerrarRegistroA"  data-dismiss="modal"  >
                    Cerrar
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--Modal modificar datos-->

          <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"  data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Modificando datos...</h4>
                  <button type="button" class="close" data-dismiss="modal" id="CerrarRegistro" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <input type="text" hidden="" id="idpersona" name="">
                  <label>Nombre</label>
                  <input type="text" name="" id="nombreu" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="25">
                  <label>Apellido Paterno</label>
                  <input type="text" name="" id="apellidopaternou" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="20">
                  <label>Apellido Materno</label>
                  <input type="text" name="" id="apellidomaternou" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="20">
                  <label>Fecha Naciemiento</label>
                  <input type="date" name="" id="fechanacimientou" class="form-control input-sm" >
                  <label>Profesion</label>
                  <input type="text" name="" id="profesionu" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="50">
                  <label>Lugar de Trabajo</label>
                  <input type="text" name="" id="lugartrabajou" class="form-control input-sm"  maxlength="50">
                  <label for="">Parentesco</label>
                  <select name="" id="parentescou" class="custom-select" onchange="ValidarTutorJustificantesModificacion()">
                    <option value="Madre">Madre</option>
                    <option value="Padre">Padre</option>
                    <option value="Abuela">Abuela</option>
                    <option value="Abuelo">Abuelo</option>
                    <option value="Tio">Tio</option>
                    <option value="Tia">Tia</option>
                    <option value="Hermano">Hermano</option>
                    <option value="Hermana">Hermana</option>
                  </select>
                  <label>Telefono</label>
                  <input type="text" name="" id="telefonou" class="form-control input-sm" onKeyPress="return soloNumeros(event);" maxlength="10" >
                  <input type="checkbox" id="Tutoru" name="Tutoru" value="1"> Tutor
                  <input type="checkbox" id="Justificantesu" name="Justificantesu" value="1"> Justificantes <br>
                  <label>Email</label>
                  <input type="email" name="" id="emailu" class="form-control input-sm" maxlength="50">
                  <hr>
                  <h5>Direccion</h5>
                  <label>CP</label>
                  <input type="text" name="" id="CPu" class="form-control input-sm" onKeyPress="return soloNumeros(event);" maxlength="10" >
                  <label>Calle</label>
                  <input type="text" name="" id="Calleu" class="form-control input-sm" maxlength="30">
                  <label>Numero</label>
                  <input type="text" name="" id="Numerou" class="form-control input-sm" maxlength="20">
                  <label>Colonia</label>
                  <input type="text" name="" id="Coloniau" class="form-control input-sm" maxlength="50">
                  <label>Municipio</label>
                  <input type="text" name="" id="Municipiou" class="form-control input-sm" maxlength="50">
                  <label>Localidad</label>
                  <input type="text" name="" id="Localidadu" class="form-control input-sm"  maxlength="50">
                  <label>Estado</label>
                  <input type="text" name="" id="Estadou" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="50">
                  <label>Tel. Casa</label>
                  <input type="text" name="" id="TelCasau" class="form-control input-sm" onKeyPress="return soloNumeros(event)" maxlength="10" >
                  <label for="">Estado</label>
                  <select name="" id="Estatus" class="custom-select" style="width: 100%" >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="actualizadatos" onclick="return ValidarModificacion()">
                    Actualizar Datos
                  </button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="CerrarRegistroA" >
                    Cerrar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!--Fin de contenido de caja de texto--> 
        </div>
        <!--Fin Contenido central-->
      </div>
      <!--Fin Contenedor medio-->

      <!--Inicio de pie de pagina-->
        <?php include "../menus/PiePagina.php";?>

      <!--fin de pie de pagina-->
    </body>
    </html>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#tabla').load('../../clases/tablasmodales/TablaFamiliares.php');
        ValidarTutorJustificantesRegistro();
         //ValidarTutorJustificantesModificacion();
         
       });
     </script>

     <script type="text/javascript">
      $(document).ready(function(){
        $('#GuardarRegistro').click(function(){
          event.preventDefault();
          Tutor=$('#Tutor').prop('checked');
          Justificantes=$('#Justificantes').prop('checked');
          if($('#nombre').val() == ''){
                    //alert('Nombre solos');
                  }else if ($('#apellidopaterno').val()=='') {
                    //alert('Campo de texto Apellido Paterno solo');
                  }else if ($('#apellidomaterno').val()=='') {
                    //alert('Campo de texto Apellido Materno solo');
                  }else if ($('#fechanacimiento').val()=='') {
                    //alert('Campo de texto FechaNacimiento Paterno solo');
                  }else if ($('#profesion').val()=='') {
                    //alert('Campo de texto Profesion solo');
                  }else if ($('#lugartrabajo').val()=='') {
                    //alert('Campo de texto LugarTrabajo solo');
                  }else if ((Tutor == false)&&(Justificantes==false)) {

                  }else if (($('#email').val() != '') && ($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1)) {
                    //alert('Campo de texto Correo solo');
                  }else if ($('#CP').val()=='') {
                    //alert('Campo de texto Codigo Postal solo');
                  }else if ($('#Calle').val()=='') {
                    //alert('Campo de texto Calle solo');
                  }else if ($('#Numero').val()=='') {
                    //alert('Campo de texto Numero solo');
                  }else if ($('#Colonia').val()=='') {
                    //alert('Campo de texto Colonia solo');
                  }else if ($('#Municipio').val()=='') {
                    //alert('Campo de texto Municipio solo');
                  }else if ($('#Localidad').val()=='') {
                    //alert('Campo de texto Localidad solo');
                  }else if ($('#Estado').val()=='') {
                    //alert('Campo de texto Estado solo'); LIMPIAR CAJAS AL BOTON CERRAR ;(
                  }else{
                    Nombre=$('#nombre').val();
                    ApellidoP=$('#apellidopaterno').val();
                    ApellidoM=$('#apellidomaterno').val();
                    FechaNacimiento=$('#fechanacimiento').val();
                    Profesion=$('#profesion').val();
                    LugarTrabajo=$('#lugartrabajo').val();
                    Parentesco=$('#parentesco').val();
                    Telefono=$('#telefono').val();
                    Tutor=$('#Tutor').prop('checked');
                    if(Tutor == false){
                      Tutor = '0';
                    }else if (Tutor == true) {
                      Tutor = '1';
                    }
                    Justificantes=$('#Justificantes').prop('checked');
                    if(Justificantes == false){
                      Justificantes = '0';
                    }else if (Justificantes == true) {
                      Justificantes = '1';
                    }
                    Correo=$('#email').val();
                    CP=$('#CP').val();
                    Calle=$('#Calle').val();
                    Numero=$('#Numero').val();
                    Colonia=$('#Colonia').val();
                    Municipio=$('#Municipio').val();
                    Localidad=$('#Localidad').val();
                    Estado=$('#Estado').val();
                    TelefonoCasa=$('#TelCasa').val();
                    agregarDatos(Nombre,ApellidoP,ApellidoM,FechaNacimiento,Profesion,LugarTrabajo,Parentesco,Telefono,Tutor,Justificantes,Correo,CP,Calle,Numero,Colonia,Municipio,Localidad,Estado,TelefonoCasa);
                  }
                });

        $('#nombre').on('input', function (e) {
          if (!/^[ a-z0-9.\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.\s]+/ig,"");
          }
        });
        $('#apellidopaterno').on('input', function (e) {
          if (!/^[a-z0-9.\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.\s]+/ig,"");
          }
        });

        $('#apellidomaterno').on('input', function (e) {
          if (!/^[a-z0-9.\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.\s]+/ig,"");
          }
        });

        $('#profesion').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#lugartrabajo').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#email').on('input', function (e) {
          if (!/^[ a-z0-9-_.@]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9-_.@]+/ig,"");
          }
        });

        $('#telefono').on('input', function (e) {
          if (!/^[ 0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
          }
        });

        $('#CP').on('input', function (e) {
          if (!/^[ 0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
          }
        });

        $('#Calle').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9@.-_\s]+/ig,"");
          }
        });

        $('#Numero').on('input', function (e) {
          if (!/^[A-Z0-9-]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^A-Z0-9-]+/ig,"");
          }
        });

        $('#Colonia').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Municipio').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Localidad').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Estado').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#TelCasa').on('input', function (e) {
          if (!/^[ 0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
          }
        });

        $('#nombreU').on('input', function (e) {
          if (!/^[a-zA-Z.\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-zA-Z.\s]+/ig,"");
          }
        });
        $('#apellidopaternoU').on('input', function (e) {
          if (!/^[a-zA-Z\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-zA-Z\s]+/ig,"");
          }
        });

        $('#apellidomaternoU').on('input', function (e) {
          if (!/^[a-zA-Z\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-zA-Z\s]+/ig,"");
          }
        });

        $('#profesionu').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#lugartrabajou').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#emailu').on('input', function (e) {
          if (!/^[ a-z0-9-_.@]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9-_.@]+/ig,"");
          }
        });

        $('#telefonou').on('input', function (e) {
          if (!/^[ 0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
          }
        });

        $('#CPu').on('input', function (e) {
          if (!/^[ 0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
          }
        });

        $('#Calleu').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9@.-_\s]+/ig,"");
          }
        });

        $('#Numerou').on('input', function (e) {
          if (!/^[A-Z0-9-]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^A-Z0-9-]+/ig,"");
          }
        });

        $('#Coloniau').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Municipiou').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Localidadu').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Estadou').on('input', function (e) {
          if (!/^[ a-z0-9.,-_\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#TelCasau').on('input', function (e) {
          if (!/^[ 0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
          }
        });

        $('#actualizadatos').click(function(event){
         event.preventDefault();
         Tutor=$('#Tutoru').prop('checked');
         Justificantes=$('#Justificantesu').prop('checked');


         
         if($('#nombreu').val() == ''){
                    //alert('Nombre solos');
                  }else if ($('#apellidopaternou').val()=='') {
                    //alert('Campo de texto Apellido Paterno solo');
                  }else if ($('#apellidomaternou').val()=='') {
                    //alert('Campo de texto Apellido Materno solo');
                  }else if ($('#fechanacimientou').val()=='') {
                    //alert('Campo de texto FechaNacimiento Paterno solo');
                  }else if ($('#profesionu').val()=='') {
                    //alert('Campo de texto Profesion solo');
                  }else if ($('#lugartrabajou').val()=='') {
                    //alert('Campo de texto LugarTrabajo solo');
                  }else if ((Tutor == false)&&(Justificantes==false)) {

                  }else if (($('#emailu').val() != '') && ($("#emailu").val().indexOf('@', 0) == -1 || $("#emailu").val().indexOf('.', 0) == -1)) {
                    //alert('El correo electrónico introducido no es correcto.');
                  }else if ($('#CPu').val()=='') {
                    //alert('Campo de texto Codigo Postal solo');
                  }else if ($('#Calleu').val()=='') {
                    //alert('Campo de texto Calle solo');
                  }else if ($('#Numerou').val()=='') {
                    //alert('Campo de texto Numero solo');
                  }else if ($('#Coloniau').val()=='') {
                    //alert('Campo de texto Colonia solo');
                  }else if ($('#Municipiou').val()=='') {
                    //alert('Campo de texto Municipio solo');
                  }else if ($('#Localidadu').val()=='') {
                    //alert('Campo de texto Localidad solo');
                  }else if ($('#Estadou').val()=='') {
                    //alert('Campo de texto Estado solo'); LIMPIAR CAJAS AL BOTON CERRAR ;(
                  }else{
                    actualizaDatos();
                  }
                });

        $('#CerrarRegistro').click(function() {
          $("#nombre").val("");
          $('#apellidopaterno').val("");
          $('#apellidomaterno').val("");
          $('#fechanacimiento').val("");
          $('#profesion').val("");
          $('#lugartrabajo').val("");
          $('#parentesco').val("");
          $('#telefono').val("");
          $('#Tutor').prop('checked');
          $('#Justificantes').prop('checked');
          $('#email').val("");
          $('#CP').val("");
          $('#Calle').val("");
          $('#Numero').val("");
          $('#Colonia').val("");
          $('#Municipio').val("");
          $('#Localidad').val("");
          $('#Estado').val("");
          $('#TelCasa').val("");
        });

        $('#CerrarRegistroA').click(function() {
          $("#nombre").val("");
          $('#apellidopaterno').val("");
          $('#apellidomaterno').val("");
          $('#fechanacimiento').val("");
          $('#profesion').val("");
          $('#lugartrabajo').val("");
          $('#parentesco').val("");
          $('#telefono').val("");
          $('#Tutor').prop('checked');
          $('#Justificantes').prop('checked');
          $('#email').val("");
          $('#CP').val("");
          $('#Calle').val("");
          $('#Numero').val("");
          $('#Colonia').val("");
          $('#Municipio').val("");
          $('#Localidad').val("");
          $('#Estado').val("");
          $('#TelCasa').val("");
        });

      });
    </script>

    <script>
      function ValidarTutorJustificantesRegistro() 
      {
        Parentesco=$('#parentesco').val();
        if((Parentesco=='Madre')||(Parentesco=='Padre')){
          $("#Tutor").prop("checked", true);
          $("#Justificantes").prop("checked", true);
          $("#Tutor").prop("disabled", true);
          $("#Justificantes").prop("disabled", true);
        }else {
          $("#Tutor").prop("checked", false);
          $("#Justificantes").prop("checked", false);
          $("#Tutor").prop("disabled", false);
          $("#Justificantes").prop("disabled", false);
        }
      }

      function ValidarTutorJustificantesModificacion() 
      {
        Parentescou=$('#parentescou').val();
        if((Parentescou=='Madre')||(Parentescou=='Padre')){
          $("#Tutoru").prop("checked", true);
          $("#Justificantesu").prop("checked", true);
          $("#Tutoru").prop("disabled", true);
          $("#Justificantesu").prop("disabled", true);
        }else {
          $("#Tutoru").prop("checked", false);
          $("#Justificantesu").prop("checked", false);
          $("#Tutoru").prop("disabled", false);
          $("#Justificantesu").prop("disabled", false);
        }
      }
    </script>