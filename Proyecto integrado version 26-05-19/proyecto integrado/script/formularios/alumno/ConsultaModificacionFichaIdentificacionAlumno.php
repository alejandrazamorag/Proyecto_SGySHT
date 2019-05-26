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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">
  <link rel="icon" type="image/vnd.microsoft.icon" href="../../../imagenes/Mapa.ico">
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

  <!--Solo Numeros-->
  <script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
}

function NumerosLetrasSinCaracteres(e) {
  tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
      return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }

  function NumerosLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
      return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9-_.,\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }


//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 39, 46, 6, 44, 95 ,45]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

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

<!--Validar Cajas Vacias-->
<script language="javascript" type="text/javascript">
  function validar() {
  //obteniendo el valor que se puso en el campo text del formulario
  miCampoTexto = document.getElementById("TelefonoParticular").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica en el apartado DATOS PERSONALES el campo de texto Telefono Particular esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("TelefonoParticular").value;

        if ((miCampoTexto.length < 7)||(miCampoTexto.length > 10)) {
          alert('Verifica en el apartado DATOS PERSONALES el campo de texto Telefono Particular debe ser de 7-10 digitos!');
          return false;
        }

        miCampoTexto = document.getElementById("NoHermanos").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica en el apartado DATOS FAMILIARES el campo de texto Numero de Hermanos esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("LugarOcupas").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica en el apartado DATOS FAMILIARES el campo de texto Lugar que ocupas esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("OtrasPersonas").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica en el apartado DATOS FAMILIARES el campo de texto Otras personas que viven con tigo esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("ActualmenteVives").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica en el apartado DATOS FAMILIARES el campo de texto Actualmente vives con esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("SituacionFamiliar").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica en el apartado DATOS FAMILIARES el campo de texto Situacion Familiar esta vacio!');
          return false;
        }
        
        var banderaRBTN = false;
        var rbtEstado = document.getElementsByName('RelacionPadres');

        for(var i = 0; i < rbtEstado.length; i++){
          if(rbtEstado[i].checked){
            banderaRBTN = true;
            break;
          }
        }
        if(!banderaRBTN){
          alert('Debes elegir una opción Relacion con Padres en el apartado DATOS FAMILIARES!');
          return false;
        }

        banderaRBTN = false;
        rbtEstado = document.getElementsByName('Tareas');

        for(var i = 0; i < rbtEstado.length; i++){
          if(rbtEstado[i].checked){
            banderaRBTN = true;
            break;
          }
        }

        if(!banderaRBTN){
         alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta a) Tareas Selecciona una opcion!');
         return false;
       }

       banderaRBTN = false;
       rbtEstado = document.getElementsByName('Estudio');

       for(var i = 0; i < rbtEstado.length; i++){
        if(rbtEstado[i].checked){
          banderaRBTN = true;
          break;
        }
      }

      if(!banderaRBTN){
       alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta a) Estudio Selecciona una opcion!');
       return false;
     }

     banderaRBTN = false;
     rbtEstado = document.getElementsByName('Lectura');

     for(var i = 0; i < rbtEstado.length; i++){
      if(rbtEstado[i].checked){
        banderaRBTN = true;
        break;
      }
    }

    if(!banderaRBTN){
     alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta a) Lectura Selecciona una opcion!');
     return false;
   }

   chkEstado = document.getElementsByName('LugarEstudio[]');
   banderaRBTN =  false;

   for(var i = 0; i < chkEstado.length; i++){
    if(chkEstado[i].checked){
      banderaRBTN = true;
      break;
    }
  }

  if(!banderaRBTN){
    alert ('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta b) Selecciona al menos una opcion!');
    return false;
  }

  chkEstado = document.getElementsByName('TecnicasEstudio[]');
  banderaRBTN =  false;

  for(var i = 0; i < chkEstado.length; i++){
    if(chkEstado[i].checked){
      banderaRBTN = true;
      break;
    }
  }

  if(!banderaRBTN){
    alert ('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta c) Selecciona al menos una opcion!');
    return false;
  }

  banderaRBTN = false;
  rbtEstado = document.getElementsByName('Estimulan');

  for(var i = 0; i < rbtEstado.length; i++){
    if(rbtEstado[i].checked){
      banderaRBTN = true;
      break;
    }
  }

  if(!banderaRBTN){
   alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta d) Selecciona una opcion!');
   return false;
 }

 Validacion = document.getElementById('EstimulacionEstudio').disabled;
 if(Validacion == false){
  miCampoTexto = document.getElementById("EstimulacionEstudio").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    alert('Verifica en el apartado HABITOS DE ESTUDIO el campo de texto ¿De que manera? de la pregunta d) esta vacio!');
    return false;
  }
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('AprenderMas');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
 alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta e) motivo 1 Selecciona una opcion!');
 return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('Hacer');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
 alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta e) motivo 2 Selecciona una opcion!');
 return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('Interes');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
 alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta e) motivo 3 Selecciona una opcion!');
 return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('Satisfaccion');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
 alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta e) motivo 4 Selecciona una opcion!');
 return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('Fracaso');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
 alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta e) motivo 5 Selecciona una opcion!');
 return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('Agradecer');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
 alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta e) motivo 6 Selecciona una opcion!');
 return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('Premio');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
 alert('Verifica el apartado de HABITOS DE ESTUDIO en la pregunta e) motivo 7 Selecciona una opcion!');
 return false;
}
return true;
}

</script>

</script>
<script language="JavaScript">
  function habilita(){
    $(".inputText").removeAttr("disabled");
  }

  function deshabilita(){
    $(".inputText").attr("disabled","disabled");
    document.frm.txt1.value = ""; 
    document.frm.txt2.value = ""; 
  }
</script>
<script>
  function habilitar(value,caja)
  {
    if(value=="o" || value=="O")
    {
                // habilitamos
                document.getElementById(caja).disabled=false;
              }else if(value!="o" || value!="O"){
                // deshabilitamos
                document.getElementById(caja).disabled=true;
                document.getElementById(caja).value= "";
              }
            }
          </script>
          <?php 
          function calculaedad($fechanacimiento){
            list($ano,$mes,$dia) = explode("-",$fechanacimiento);
            $ano_diferencia = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia = date("d") - $dia;
            if ($dia_diferencia < 0 && $mes_diferencia <= 0)
              $ano_diferencia--;
            return $ano_diferencia;
          }
          ?>
          <!--Icono en pestaña-->
          <link rel="icon" type="image/vnd.microsoft.icon" href="./../../imagenes/Mapa.ico">

          <!--STYLOS-->
          <link rel="stylesheet" type="text/css" href="./../../../css/style_menu_alumno.css">
          <link rel="stylesheet" type="text/css" href="./../../../css/style_menu_izquierdo_alumno.css">
          <link rel="stylesheet" type="text/css" href="./../../../css/style_pie_pagina.css">
          <link rel="stylesheet" type="text/css" href="./../../../css/style_paneles.css">



          <!--Iconos-->
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        </head>


        <body>
          <!--Inicio contenedor Cabecera-->
          <div class="container">
           <br>
           <?php  include "../menus/MenuAlumno.php";
           MenuAlumno();?>
         </div>
         <!--Fin contenedor Cabecera-->

         <!--Inicio Contenedor medio-->
         <div class="container">
          <!--Poner titulo o nombre -->
          <br><center><h2> Ficha de identificación del tutorado </h2></center>
          <!--Poner titulo o nombre -->

          <div class="row">
            <!--Inicio de menu izquierdo-->
            <div class="col-sm-3">
             <?php include '../menus/MenuIzquierdoAlumno.php'?>
             <!--Fin inicio menu izquierdo-->
           </div>
           <!--Inicio Contenido central-->


           <div class="col-sm-9">
            <!--Inicio de contenido de caja de texto-->
            <?php 
            if ((empty($_POST['TelefonoParticular']))&&(empty($_POST['NoHermanos']))&&(empty($_POST['LugarOcupas']))&&(empty($_POST['ActualmenteVives']))&&(empty($_POST['SituacionFamiliar']))){
              ?>
              <h6> Los datos que proporciones en este cuestionario tendrán carácter reservado, serán utilizados únicamente para ayudarte.</h6>
              
              <form method="POST" name="fromularioFichaIdentificacion" id="fromularioFichaIdentificacion" action="ConsultaModificacionFichaIdentificacionAlumno.php" onsubmit="return validar()">
                <div class="container">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <br>
                    <ul class="nav nav-tabs nav-pills">
                      <li class="nav-item active">
                        <a href="#DP" class="nav-link active" role="tab" data-toggle="tab">1. Datos Personales</a>
                      </li>

                      <li class="nav-item">
                        <a href="#DF" class="nav-link" role="tab" data-toggle="tab">2. Datos Familiares</a>
                      </li>

                      <li class="nav-item">
                        <a href="#DE" class="nav-link" role="tab" data-toggle="tab">3. Datos Escolares</a>
                      </li>

                      <li class="nav-item">
                        <a href="#DM" class="nav-link" role="tab" data-toggle="tab">4. Datos Medicos</a>
                      </li>

                      <li class="nav-item">
                        <a href="#Ex" class="nav-link" role="tab" data-toggle="tab">5. Expectativa ante mi nueva formacion</a>
                      </li>

                      <li class="nav-item">
                        <a href="#HE" class="nav-link" role="tab" data-toggle="tab">6. Habitos de Estudio</a>
                      </li>

                      <li class="nav-item">
                        <a href="#TT" class="nav-link" role="tab" data-toggle="tab">7. Terminar</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active " id="DP">   
                        <div class="container">
                          <br>
                          <?php
                          include_once "../../clases/MySQLConector.php";

                          $Mysql = new MySQLConector();
                          $Mysql->Conectar();

                          $Consulta = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.FechaNac, alumno.TelefonoEmergencia ,lugarnacimiento.Municipio, lugarnacimiento.Estado, domicilio.Calle, domicilio.Numero, domicilio.Colonia, domicilio.CP, domicilio.Municipio AS MunicipioDomicilio, domicilio.Localidad, domicilio.Estado AS EstadoDomicilio, domicilio.TelefonoCasa, alumno.Telefono AS TelefonoParticular from alumno, lugarnacimiento, domicilio WHERE alumno.idAlumno = '".$_SESSION['IdUsuarioAlumno']."' AND lugarnacimiento.idLugarNacimiento = alumno.LugarNacimiento_idLugarNacimiento AND domicilio.idDomicilio = alumno.Domicilio_idDomicilio;";
                          $Resultado = $Mysql->Consulta($Consulta);
                          while ($fila = $Resultado->fetch_assoc()) {
                            ?>
                            <b><i>Nombre:</i></b> 
                            <label for="lblNombre"><?php echo $fila['Nombre']?> <?php echo $fila['ApellidoP']?> <?php echo $fila['ApellidoM']?> </label><br>
                            
                            <b><i>Fecha de nacimiento:</i></b>
                            <?php 
                            $originalDate = $fila['FechaNac'];
                            $newDate = date("d/m/Y", strtotime($originalDate));
                            ?>
                            <label for="lblFechaNacimiento"><?php echo $newDate ?></label><br>
                            <b><i>Edad:</i></b>
                            <label for=""><?php echo calculaedad ($fila['FechaNac']);?> </label><br>
                            <b><i>Lugar de Nacimiento:</i></b>
                            <label for="lblLugarNacimiento"><?php echo $fila['Municipio']?>, <?php echo $fila['Estado']?></label><br>
                            <b><i>Domicilio:</i></b>
                            <label for="lblCalle"><?php echo $fila['Calle']?> #<?php echo $fila['Numero']?> Col.<?php echo $fila['Colonia']?> CP: <?php echo $fila['CP']?> </label><br>
                            <b>Municipio:</b>
                            <label for="lblMunicipio"><?php echo $fila['MunicipioDomicilio']?></label>
                            <b>Localidad:</b>
                            <label for="lblLocalidad"><?php echo $fila['Localidad']?></label>
                            <b>Estado:</b>
                            <label for="lblEstado"><?php echo $fila['EstadoDomicilio']?></label><br>
                            <!--<label for="lblTelefonoParticular"><?php //echo $fila['TelefonoParticular']?></label>-->
                            <b><i>En caso de emergencia llamar a:</i></b>
                            <label for=""><?php echo $fila['TelefonoEmergencia']?></label><br>
                            <div class="form-inline">
                              <b><i>Telefono Particular:</i></b>
                              <?php echo "<input type=\"text\" id=\"TelefonoParticular\" name=\"TelefonoParticular\" class=\"m-1 form-control\" placeholder=\"Escribe tu respuesta\" value=\"".$fila['TelefonoParticular']."\" onKeyPress=\"return soloNumeros(event)\" maxlength=\"10\" >"; ?>
                              
                            </div>
                            <br>
                            <?php
                          }
                          ?>  
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="DF">
                        <br>
                        <!--Inicio opcion a-->
                        <div class="row">
                          <div class="col-md-12">
                            <b>a) Datos Familiares</b>
                          </div>
                        </div>
                        <?php
                        include_once "../../clases/MySQLConector.php";

                        $Mysql = new MySQLConector();
                        $Mysql->Conectar();

                        $Consulta = "SELECT familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, familiares.FechaNacimiento, familiares.Profesion, familiares.LugarTrabajo, familiares.Parentesco  from familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."'";

                        $Resultado = $Mysql->Consulta($Consulta);

                        while ($fila = $Resultado->fetch_assoc()) {
                          if($fila['Parentesco'] == 'Padre'){ 
                            ?>
                            <br>
                            <div class="row">
                              <div class="col-md-7">
                                <b>Nombre del padre: </b>
                                <label for="NombreP"><?php echo $fila['Nombre']?>  <?php echo $fila['ApellidoP']?>  <?php echo $fila['ApellidoM']?></label>
                              </div>
                              <div class="col-md-3">
                                <b>Edad: </b>
                                <label for="EdadP"><?php echo calculaedad ($fila['FechaNacimiento']);?></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <b>Profesion:</b>
                                <label for="ProfesionP"><?php echo $fila['Profesion']?></label>
                              </div>
                              <div class="col-md-6">
                                <b>Lugar de Trabajo:</b>
                                <label for="LugarTrabajoP"><?php echo $fila['LugarTrabajo']?></label>
                              </div>
                            </div>
                          <?php }else if($fila['Parentesco'] == 'Madre') {?>
                            <div class="row">
                              <div class="col-md-7">
                                <b>Nombre de la madre:</b>
                                <label for="NombreM"><?php echo $fila['Nombre']?> <?php echo $fila['ApellidoP']?>  <?php echo $fila['ApellidoM']?></label>
                              </div>
                              <div class="col-md-3">
                                <b>Edad:</b>
                                <label for="EdadM"><?php echo calculaedad ($fila['FechaNacimiento']);?></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <b>Profesion</b>
                                <label for="ProfesionM"><?php echo $fila['Profesion']?></label>
                              </div>
                              <div class="col-md-6">
                                <b>Lugar de Trabajo</b>
                                <label for="LugarTrabajoM"><?php echo $fila['LugarTrabajo']?></label>
                              </div>
                            </div>
                            <!--Final opcion a-->
                            <?php
                          }
                          echo "<hr>";
                        }
                        ?>  
                        <br>
                        <!--Inicio opcion b-->

                        <?php 
                        include_once "../../clases/MySQLConector.php";

                        $Mysql = new MySQLConector();
                        $Mysql->Conectar();

                        $Consulta = "SELECT datosfamiliares.NoHermanos, datosfamiliares.LugarOcupas, datosfamiliares.OtrasPersonas, datosfamiliares.ActualmenteVives, datosfamiliares.SituacionFamiliar, datosfamiliares.RelacionPadres FROM datosfamiliares where datosfamiliares.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."';";

                        $Resultado = $Mysql->Consulta($Consulta);

                        while ($fila = $Resultado->fetch_assoc()) {
                          ?>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-inline">
                                <b>b) Numero hermanos:</b>
                                <?php echo "<input type=\"text\" name=\"NoHermanos\" class=\"form-control\" id=\"NoHermanos\" placeholder=\"Escribe tu respuesta\" value=\"".$fila['NoHermanos']."\" onKeyPress=\"return soloNumeros(event)\" maxlength=\"2\" />"; ?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-inline"> 
                                <b>Lugar que ocupas: </b>
                                <?php echo "<input type=\"text\" name=\"LugarOcupas\" class=\"m-1 form-control\" id=\"LugarOcupas\" placeholder=\"Escribe tu respuesta\"  onKeyPress=\"return soloNumeros(event)\" maxlength=\"2\" value=\"".$fila['LugarOcupas']."\"  />"; ?>
                              </div>
                            </div>
                          </div>
                          <!--Final opcion b-->
                          <br>
                          <!--Inicio opcion c-->
                          <div class="row">
                            <div class="col-md">
                              <b>c) Otras personas que viven con tigo</b>
                              <?php echo "<input type=\"text\" name=\"OtrasPersonas\" class=\"form-control\" id=\"OtrasPersonas\" placeholder=\"Escribe tu respuesta\" onkeypress=\"return soloLetras(event);\" value=\"".$fila['OtrasPersonas']."\" />";?>
                            </div>                   
                          </div>
                          <!--Final opcion c-->
                          <br>
                          <!--Incio opcion d-->
                          <div class="row">
                            <div class="col-md-12">
                              <b>d) Actualmente vives con</b> 
                              <?php echo "<input type=\"text\" name=\"ActualmenteVives\" class=\"form-control\" id=\"ActualmenteVives\" placeholder=\"Escribe tu respuesta\"  onkeypress=\"return soloLetras(event);\" value=\"".$fila['ActualmenteVives']."\"  maxlength=\"25\"/>"; ?>
                            </div>                
                          </div>
                          <!--Final opcion d-->
                          <br>
                          <!--Inicio opcion e-->
                          <div class="row">
                            <div class="col-md-12">
                              <b>e) ¿Hay alguna situación familiar que se pueda considerar especial? (fallecimiento de padre/madre, separacion de los padres, divorcio, enfermedad de algún familiar)</b>
                              <?php echo "<input type=\"text\" name=\"SituacionFamiliar\" class=\"form-control\" id=\"SituacionFamiliar\" placeholder=\"Escribe tu respuesta\" onkeypress=\"return soloLetras(event);\" value=\"".$fila['SituacionFamiliar']."\" />"  ?>
                            </div>
                          </div>
                          <!--Final opcion e-->
                          <br>
                          <!--Inicio opcion f-->
                          <div class="row">
                            <div class="col-md-12">
                              <b>f) ¿Cómo es la relación con tus padres?</b>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div  class="form-inline">
                                <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="6" <?php if($fila['RelacionPadres'] == '6') echo "checked"; ?> >Excelente
                                <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="5"  <?php if($fila['RelacionPadres'] == '5') echo "checked"; ?> >Muy Buena
                                <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="4"  <?php if($fila['RelacionPadres'] == '4') echo "checked"; ?> >Buena
                                <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="3"  <?php if($fila['RelacionPadres'] == '3') echo "checked"; ?> >Regular
                                <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="2"  <?php if($fila['RelacionPadres'] == '2') echo "checked"; ?> >Mala
                                <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="1"  <?php if($fila['RelacionPadres'] == '1') echo "checked"; ?> >Muy mala
                              </div> 
                            </div>
                          </div>
                          <!--Final opcion f-->
                        <?php } ?>
                      </div>
                      <!--Datos Escolares-->
                      <div role="tabpanel" class="tab-pane fade" id="DE">
                        <?php
                        include_once "../../clases/MySQLConector.php";

                        $Mysql = new MySQLConector();
                        $Mysql->Conectar();

                        $Consulta = "SELECT secundaria.Nombre , datosescolares.PromedioSecu, datosescolares.OtrosEstudios, datosescolares.RendimientoEscolar, datosescolares.MateriaGustada, datosescolares.MateriaDisgustada, datosescolares.ReaccionPadres, datosescolares.Espectativa FROM secundaria, datosescolares WHERE secundaria.idSecundaria = datosescolares.Secundaria_idSecundaria AND datosescolares.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."';";
                        $Resultado = $Mysql->Consulta($Consulta);
                        while ($fila = $Resultado->fetch_assoc()) {

                          ?>
                          <!--Inicio opcion a-->
                          <br>
                          <div class="row">
                            <div class=" col-md-12">
                              <b>a) Secundaria: </b>
                              <label for=""><?php echo $fila['Nombre']?></label>
                              <b class="m-4">Promedio:</b><label for=""><?php echo $fila['PromedioSecu'] ?></label>
                            </div>
                          </div>
                          <!--Final opcion a-->
                          <!--Inicio opcion b-->
                          <?php 
                          $Mysql = new MySQLConector();
                          $Mysql->Conectar();

                          $Consulta2 = "SELECT * FROM `materiassecureprobadas` WHERE materiassecureprobadas.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."'";
                          $Resultado2 = $Mysql->Consulta($Consulta2);
                          if(mysqli_num_rows($Resultado2) == 0){
                            ?>
                            <div class="row">
                              <div class="col-md-12">
                                <b> b) ¿En tu formación previa reprobaste alguna materia?</b><br>No 
                              </div>
                            </div> 
                            <?php
                          }else{
                            while ($fila2 = $Resultado2->fetch_assoc()) {
                              ?>
                              <div class="row">
                                <div class="col-md-12">

                                  <b> b) ¿En tu formación previa reprobaste alguna materia?</b> Si
                                  <div class="col-md-6">
                                    <b><i>¿Cuál?</i></b> <label for=""><?php echo substr($fila2['Materias'], 3) ?></label>
                                  </div>
                                  <div class="col-md-6">
                                    <b><i>Motivo: </i></b> <label for=""><?php echo $fila2['Motivo'] ?></label>
                                  </div>
                                </div>
                              </div>
                            <?php } }?>
                            <!--Final opcion b-->
                            <!--Inicio opcion c-->
                            <div class="row">
                              <div class="col-12">
                                <b>c) ¿Actualmente realizas otro tipo de estudios? (música, idiomas, informativa)</b> <br>
                                <?php echo $fila['OtrosEstudios'] ?>
                              </div>
                            </div>
                            <!--Final opcion c-->
                            <!--Inicio opcion d-->
                            <div class="row">
                              <div class="col-md-12">
                                <b>d) ¿Cómo piensas que ha sido tu rendimiento escolar hasta ahora?</b><br>
<label for=""><?php  if($fila['RendimientoEscolar']  == 5){
  echo "Excelente";

}elseif ($fila['RendimientoEscolar'] == 4) {
  echo "Muy Bueno";

}elseif ($fila['RendimientoEscolar'] == 3) {
  echo "Bueno";

}elseif ($fila['RendimientoEscolar'] == 2) {
  echo "Regular";

}elseif ($fila['RendimientoEscolar'] == 1) {
  echo "malo";

}elseif ($fila['RendimientoEscolar'] == 0) {
  echo "Muy malo";

}?></label>
</div>
</div>
<!--Final opcion d-->
<!--Inicio opcion e-->
<div class="row">
  <div class="col-md-12">
    <b>e) Las asignaturas que más te han gustado en tu formación anterior han sido:</b> <br>
    <label for=""><?php  echo $fila['MateriaGustada'];?></label>
  </div>
</div>
<!--Final opcion e-->
<!--Inicio opcion f-->
<div class="row">
  <div class="col-md-12">
    <b>f) Las asignaturas que menos te han interesado en tu formación anterior han sido: </b> <br>
    <label for=""><?php echo $fila['MateriaDisgustada'] ?></label>
  </div>
</div>
<!--Fin opcion f-->
<!--Inicio opcion g-->
<div class="row">
  <div class="col-md-12">
    <b>g) ¿Cómo reaccionan tus padres ante tus calificaciones? </b> <br>
    <label for=""><?php echo $fila['ReaccionPadres'] ?></label>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <b>¿Cress que cumples con lo que ellos esperan de ti? ¿Por qué?</b> <br>
    <label for=""><?php echo $fila['Espectativa'] ?></label>
  </div>
</div>   
<!--Fin opcion g-->   
<?php }?>
</div>
<br>  
<div role="tabpanel" class="tab-pane fade" id="DM">
  <!--Inicio opcion a-->
  <?php 
  include_once "../../clases/MySQLConector.php";

  $Mysql = new MySQLConector();
  $Mysql->Conectar();

  $Consulta = "SELECT datosmedicos.Enfermedad , datosmedicos.Tratamiento , datosmedicos.Tabaquismo, datosmedicos.Drogadiccion, datosmedicos.Alcoholismo from datosmedicos WHERE datosmedicos.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."'";

  $Resultado = $Mysql->Consulta($Consulta);

  while ($fila = $Resultado->fetch_assoc()) {
    ?>
    <div class="row">
      <div class="col-md-12">
        <b>a) ¿Padeces alguna enfermedad o existe alguna condicion fisica que te afecte? (oido, vista, enfermedad respiratoria, cardiaca, convulsiones, diabetes, asma, etc)</b><br>
        <label for=""><?php echo $fila['Enfermedad']?></label>
      </div>
    </div>
    <!--Fin opcion a-->
    <!--Inicio opcion b-->
    <div class="row">
      <div class="col-md-12">
        <b>b) Actualmente ¿recibes algún tratamiento médico o psicológico? ¿Lo has recibido alguna vez?</b><br>
        <label for=""><?php echo $fila['Tratamiento'] ?></label>
      </div>
    </div>
    <!--Fin opcion b-->
    <!--Inicio opcion c-->
    <div class="row">
      <div class="col-md-4 form-group">
        <b>c) Tabaquismo:</b>
<?php
$Tabaquismo = $fila['Tabaquismo'];
if($Tabaquismo == 1){
  echo "<label for=\"\"> Si </label>";
}else{
  echo "<label for=\"\"> No </label>";
}
?>
</div>
<div class="col-md-4 ">
  <b class="m-2">Alcohol:</b>
  <?php
  $Alcoholismo = $fila['Alcoholismo'];
  if($Alcoholismo == 1){
    echo "<label for=\"\"> Si </label>";
  }else{
    echo "<label for=\"\"> No </label>";
  }
  ?>
</div>

<div class="col-md-4 ">
  <b class="m-2">Drogas:</b>
  <?php
  $Drogas = $fila['Drogadiccion'];
  if($Drogas == 1){
    echo "<label for=\"\"> Si </label>";
  }else{
    echo "<label for=\"\"> No </label>";
  }
  ?>
</div>
</div>
<!--Fin opcion c-->
<?php
} 
?> 
</div>

<div role="tabpanel" class="tab-pane fade" id="Ex">
 <?php 
 include_once "../../clases/MySQLConector.php";

 $Mysql = new MySQLConector();
 $Mysql->Conectar();

 $Consulta = "SELECT expectativanuevaform.Atraccion, expectativanuevaform.Precupacion, expectativanuevaform.EstudioEs, expectativanuevaform.ProblemaCausa, expectativanuevaform.Preparado, expectativanuevaform.ValorarProfesor FROM expectativanuevaform WHERE expectativanuevaform.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."';";

 $Resultado = $Mysql->Consulta($Consulta);

 while ($fila = $Resultado->fetch_assoc()) {
  ?>
  <!--inicio opcion a-->
  <div class="row">
    <div class="col-md-12">
      <b>a) ¿Qué es lo que más me trajo del CECyTE?</b><br>
      <label for=""><?php echo $fila['Atraccion']?></label>
    </div>
  </div>
  <!--fin opcion a--> 
  <!--Inicio opcion b--> 
  <div class="row">
    <div class="col-md-12">
      <b>b) Hay algo que te preocupe sobre la nueva etapa que ahora empiezas? ¿Qué es?</b><br>
      <label for=""><?php echo $fila['Precupacion'] ?></label>
    </div>
  </div>
  <!--Final opcion b--> 
  <!--Inicio opcion c-->
  <b>c) Para ti el estudio es:</b> <br>
<?php
$Opciones= explode(",",  $fila['EstudioEs']);
$EstudioEs = "";
$c = ',';
for ($i=0; $i < count($Opciones); $i++) { 
  if($EstudioEs == ""){
   if($Opciones[$i] == '6'){
     $EstudioEs = "Intersante";
   }elseif ($Opciones[$i] == '5') {
    $EstudioEs =  "Aburrido" ;
  }elseif ($Opciones[$i] == '4') {
    $EstudioEs =  "Util para el futuro";
  }elseif ($Opciones[$i] == '3') {
    $EstudioEs =  "Algo obligado por tus padres";
  }elseif ($Opciones[$i] == '2') {
    $EstudioEs =  "Una Forma de pasar el tiempo";
  }elseif ($Opciones[$i] == '1') {
    $EstudioEs =  "Una Forma de hacer amigo";
  }
}else{
 if($Opciones[$i] == '6'){
   $EstudioEs =  $EstudioEs .$c." Intersante";
 }elseif ($Opciones[$i] == '5') {
  $EstudioEs =  $EstudioEs .$c." Aburrido" ;
}elseif ($Opciones[$i] == '4') {
  $EstudioEs =  $EstudioEs .$c." Util para el futuro";
}elseif ($Opciones[$i] == '3') {
  $EstudioEs =  $EstudioEs .$c." Algo obligado por tus padres";
}elseif ($Opciones[$i] == '2') {
  $EstudioEs =   $EstudioEs .$c." Una Forma de pasar el tiempo";
}elseif ($Opciones[$i] == '1') {
  $EstudioEs =  $EstudioEs .$c." Una Forma de hacer amigo";
}
}
}
echo "<label>".$EstudioEs."</label>";  
?>

<!--Final opcion c--> 
<br>
<!--Inicio opcion d--> 
<b> d) Cuando tienes problemas con el estudio ¿a que piensas que se debe?</b> <br>
<label for=""><?php echo $fila['ProblemaCausa'] ?></label>
<!--Final opcion d--> 
<!--Inicio opcion e-->
<div class="flex-row">
  <b>e) ¿Te consideras preparado/a para tener éxito en esta nueva etapa de formación?</b> <br>
<?php
$Opciones= explode(",",  $fila['Preparado']);
$Preparado = "";
$c = ',';
for ($i=0; $i < count($Opciones); $i++) { 
  if($Preparado == ""){
   if($Opciones[$i] == '4'){
     $Preparado = "Mucho";
   }elseif ($Opciones[$i] == '3') {
    $Preparado =  "Normal" ;
  }elseif ($Opciones[$i] == '2') {
    $Preparado =  "Poco";
  }elseif ($Opciones[$i] == '1') {
    $Preparado =  "Muy poco";
  }
}else{
 if($Opciones[$i] == '4'){
   $Preparado =  $Preparado .$c." Mucho";
 }elseif ($Opciones[$i] == '3') {
  $Preparado =  $Preparado .$c." Normal" ;
}elseif ($Opciones[$i] == '2') {
  $Preparado =  $Preparado .$c." Poco";
}elseif ($Opciones[$i] == '1') {
  $Preparado =  $Preparado .$c." Muy poco";
}
}
}
echo "<label>".$Preparado."</label>";
?>

</div>
<!--Final opcion e-->
<!--Inicio opcion f-->
<b>f) En un profesor lo que más valoras es:</b>
<br>
<label for=""><?php echo $fila['ValorarProfesor'] ?></label>
<?php } ?>
</div>

<div role="tabpanel" class="tab-pane fade" id="HE">
  <!--Inicio opcion a-->
  <?php 
  include_once "../../clases/MySQLConector.php";

  $Mysql = new MySQLConector();
  $Mysql->Conectar();

  $Consulta = "SELECT habitosestudio.TiempoTarea, habitosestudio.TiempoEstudio, habitosestudio.TiempoLectura, habitosestudio.LugarEstudio, habitosestudio.EstimulacionEstudio, habitosestudio.MotivoAprender, habitosestudio.MotivoInteres, habitosestudio.MotivoSatisfaccion, habitosestudio.MotivoFracaso, habitosestudio.MotivoAgradecer, habitosestudio.MotivoPremio, habitosestudio.MotivoHacer, habitosestudio.TecnicasEstudio FROM habitosestudio WHERE habitosestudio.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."';";

  $Resultado = $Mysql->Consulta($Consulta);

  while ($fila = $Resultado->fetch_assoc()) {
    ?>


    <div class="form-group">
      <b>a) Tiempo de trabajo diario en casa:</b><br>
      <div class="container">
        <i><b>Tareas:</b></i>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="0"  class="form-check-input" name="Tareas" <?php if($fila['TiempoTarea'] == '0') echo "checked";?> >Nada
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="1"  class="form-check-input" name="Tareas" <?php if($fila['TiempoTarea'] == '1') echo "checked";?> >Una hora
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="2"  class="form-check-input" name="Tareas" <?php if($fila['TiempoTarea'] == '2') echo "checked";?> >Dos horas
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="3"  class="form-check-input" name="Tareas"  <?php if($fila['TiempoTarea'] == '3') echo "checked";?> >Mas de dos horas
          </label>
        </div>
        <br>
        <i><b>Estudio:</b></i>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="0"  class="form-check-input" name="Estudio" <?php if($fila['TiempoEstudio'] == '0') echo "checked";?> >Nada
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="1"  class="form-check-input" name="Estudio" <?php if($fila['TiempoEstudio'] == '1') echo "checked";?> >Una hora
          </label>

        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="2"  class="form-check-input" name="Estudio" <?php if($fila['TiempoEstudio'] == '2') echo "checked";?> >Dos horas
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="3"  class="form-check-input" name="Estudio" <?php if($fila['TiempoEstudio'] == '3') echo "checked";?> >Mas de dos horas
          </label>
        </div>
        <br><b><i>Tiempo Semanal que le dedicas a la lectura:</i></b><br>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="0"  class="form-check-input" name="Lectura" <?php if($fila['TiempoLectura'] == '0') echo "checked";?> >Nada
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="1"  class="form-check-input" name="Lectura" <?php if($fila['TiempoLectura'] == '1') echo "checked";?> >Una hora
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="2"  class="form-check-input" name="Lectura" <?php if($fila['TiempoLectura'] == '2') echo "checked";?> >Dos horas
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" value="3"  class="form-check-input" name="Lectura" <?php if($fila['TiempoLectura'] == '3') echo "checked";?> >Mas de dos horas
          </label>
        </div>
      </div>
    </div>
    <!--Fin opcion a-->
    <!--Inicio opcion b-->
    <div>
      <b>b) Lugar de Estudio: (seleccione una o mas opciones)</b><br>

<?php

$Opciones= explode(",",  $fila['LugarEstudio']);
                 //print_r($Opciones);
					//for ($i=0; $i < count($Opciones); $i++) {
					//$dato['Opciones'] = $Opciones[$i];
?>
<div class="col-sm-12">
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" id="HP" value="4" class="form-check-input" name="LugarEstudio[]" <?php if (in_array("4", $Opciones)) { echo "checked"; } ?>>Habitacion propia
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" id="S"  value="3" class="form-check-input" name="LugarEstudio[]" <?php if (in_array("3", $Opciones)) { echo "checked"; } ?>>Sala
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" id="C" value="2" class="form-check-input" name="LugarEstudio[]" <?php if (in_array("2", $Opciones)) { echo "checked"; } ?>>Cocina
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" id="Ot" value="1" class="form-check-input" name="LugarEstudio[]" <?php if (in_array("1", $Opciones)) { echo "checked"; } ?>>Otros
    </label>
  </div>
</div>
<?php ?>
</div>
<!--Fin opcion b-->
<br>
<!--Inicio opcion c-->
<div>
  <b>c) Técnicas de estudio que utilizas: (seleccione una o mas opciones)</b><br>
<?php

$Opciones= explode(",",  $fila['TecnicasEstudio']);
                 //print_r($Opciones);
					//for ($i=0; $i < count($Opciones); $i++) {
					//$dato['Opciones'] = $Opciones[$i];
?>        <div class="col-sm-12">
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="4" id="S" class="form-check-input" name="TecnicasEstudio[]" <?php if (in_array("4", $Opciones)) { echo "checked"; } ?>>Subrayado
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="3" id="E" class="form-check-input" name="TecnicasEstudio[]" <?php if (in_array("3", $Opciones)) { echo "checked"; } ?>>Esquema
    </label> 
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="2" id="R" class="form-check-input" name="TecnicasEstudio[]" <?php if (in_array("2", $Opciones)) { echo "checked"; } ?>>Resumen
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="1" id="M" class="form-check-input" name="TecnicasEstudio[]" <?php if (in_array("1", $Opciones)) { echo "checked"; } ?>>Memoria
    </label>
  </div>
</div>
</div>
<!--Fin opcion c-->
<br>
<!--Inicio opcion d-->
<div>
  <b>d) ¿Te estimulan tus padres en tus estudios?</b>
<?php

$Opciones= explode(",",  $fila['EstimulacionEstudio']);
                // print_r($Opciones);
					//for ($i=0; $i < count($Opciones); $i++) {
					//$dato['Opciones'] = $Opciones[$i];
if (count($Opciones) >= 2) {
 ?>
 <label for=""> Si <input type="radio"  value="O" name="Estimulan" onclick="habilitar(this.value,'EstimulacionEstudio')" <?php if (in_array("Si", $Opciones)) { echo "checked"; } ?>/></label>
 <label for=""> No <input type="radio"  value="F" name="Estimulan" onclick="habilitar(this.value,'EstimulacionEstudio')" <?php if (in_array("No", $Opciones)) { echo "checked"; } ?>/></label>
 <br>
 <b>De que manera?</b>
 <?php echo"<input type=\"text\"  name=\"EstimulacionEstudio\" class=\"col-10 form-control\" id=\"EstimulacionEstudio\" placeholder=\"Escribe tu respuesta\" onkeypress=\"return soloLetras(event);\" value=\"".$Opciones[1]."\"/>";?>
 <?php 
                 	 	# code...
}else {
 ?>
 <label for=""> Si <input type="radio"  value="O" name="Estimulan" onclick="habilitar(this.value,'EstimulacionEstudio')" <?php if (in_array("Si", $Opciones)) { echo "checked"; } ?>/></label>
 <label for=""> No <input type="radio"  value="F" name="Estimulan" onclick="habilitar(this.value,'EstimulacionEstudio')" <?php if (in_array("No", $Opciones)) { echo "checked"; } ?>/></label>
 <br>
 <b>De que manera?</b>
 <input type="text"  name="EstimulacionEstudio" disabled class="col-10 form-control" id="EstimulacionEstudio" placeholder="Escribe tu respuesta" onkeypress="return soloLetras(event);" />
 <?php
                 	 	# code...
}
?>

</div> 
<!--Fin opcion d-->
<!--Inicio opcion e-->
<div class="form-group">
  <b>
    e) En estos momentos, el motivo principal que te anima en tus estudios son:
  </b><br>
  <div class="container">
    <b><i>Aprender cada día más</i></b><br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="4"  class="form-check-input" name="AprenderMas" <?php if($fila['MotivoAprender'] == '4') echo "checked";?> >Muchisimo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="3"  class="form-check-input" name="AprenderMas"  <?php if($fila['MotivoAprender'] == '3') echo "checked";?> >Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="2"  class="form-check-input" name="AprenderMas"  <?php if($fila['MotivoAprender'] == '2') echo "checked";?> >Algo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="1"  class="form-check-input" name="AprenderMas"  <?php if($fila['MotivoAprender'] == '1') echo "checked";?> >Nada
      </label>
    </div>
    <br>
    <b><i>Poder hacer las cosas por ti mismo/a y a tu manera</i></b><br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="4"  class="form-check-input" name="Hacer" <?php if($fila['MotivoHacer'] == '4') echo "checked";?> >Muchisimo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="3"  class="form-check-input" name="Hacer" <?php if($fila['MotivoHacer'] == '3') echo "checked";?> >Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="2"  class="form-check-input" name="Hacer" <?php if($fila['MotivoHacer'] == '2') echo "checked";?> >Algo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="1"  class="form-check-input" name="Hacer" <?php if($fila['MotivoHacer'] == '1') echo "checked";?> >Nada
      </label>
    </div>
    <br>
    <b><i>El interes que despierta en ti todo lo que estudias</i></b><br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="4"  class="form-check-input" name="Interes" <?php if($fila['MotivoInteres'] == '4') echo "checked";?> >Muchisimo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="3"  class="form-check-input" name="Interes" <?php if($fila['MotivoInteres'] == '3') echo "checked";?> >Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="2"  class="form-check-input" name="Interes" <?php if($fila['MotivoInteres'] == '2') echo "checked";?> >Algo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="1"  class="form-check-input" name="Interes" <?php if($fila['MotivoInteres'] == '1') echo "checked";?> >Nada
      </label>
    </div>
    <br>
    <b><i>La satisfacción que se siente cuando se obtienen buenos resultados</i></b><br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="4"  class="form-check-input" name="Satisfaccion" <?php if($fila['MotivoSatisfaccion'] == '4') echo "checked";?> >Muchisimo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="3"  class="form-check-input" name="Satisfaccion" <?php if($fila['MotivoSatisfaccion'] == '3') echo "checked";?>>Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="2"  class="form-check-input" name="Satisfaccion" <?php if($fila['MotivoSatisfaccion'] == '2') echo "checked";?>>Algo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="1"  class="form-check-input" name="Satisfaccion" <?php if($fila['MotivoSatisfaccion'] == '1') echo "checked";?>>Nada
      </label>
    </div>
    <br>
    <b><i>Evitar un posible fracaso en los estudios</i></b><br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="4"  class="form-check-input" name="Fracaso" <?php if($fila['MotivoFracaso'] == '4') echo "checked";?> >Muchisimo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="3"  class="form-check-input" name="Fracaso" <?php if($fila['MotivoFracaso'] == '3') echo "checked";?> >Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="2"  class="form-check-input" name="Fracaso" <?php if($fila['MotivoFracaso'] == '2') echo "checked";?> >Algo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="1"  class="form-check-input" name="Fracaso" <?php if($fila['MotivoFracaso'] == '1') echo "checked";?> >Nada
      </label>
    </div>
    <br>
    <b><i>Agradecer a tus padres y/o profesores</i></b><br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="4"  class="form-check-input" name="Agradecer" <?php if($fila['MotivoAgradecer'] == '4') echo "checked";?> >Muchisimo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="3"  class="form-check-input" name="Agradecer" <?php if($fila['MotivoAgradecer'] == '3') echo "checked";?> >Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="2"  class="form-check-input" name="Agradecer" <?php if($fila['MotivoAgradecer'] == '2') echo "checked";?> >Algo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="1"  class="form-check-input" name="Agradecer" <?php if($fila['MotivoAgradecer'] == '1') echo "checked";?> >Nada
      </label>
    </div>
    <br>
    <b><i>Conseguir los premios que te han prometido tus padres</i></b><br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="4"  class="form-check-input" name="Premio" <?php if($fila['MotivoPremio'] == '4') echo "checked";?> >Muchisimo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="3"  class="form-check-input" name="Premio" <?php if($fila['MotivoPremio'] == '3') echo "checked";?> >Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="2"  class="form-check-input" name="Premio" <?php if($fila['MotivoPremio'] == '2') echo "checked";?>>Algo
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" value="1"  class="form-check-input" name="Premio" <?php if($fila['MotivoPremio'] == '1') echo "checked";?>>Nada
      </label>
    </div>
  </div>
</div>
<!--Fin opcion e-->
<?php }
?>
</div>
<div align="center" role="tabpanel" class="tab-pane fade" id="TT">
  <h2 >Agradecemos su tiempo</h2><br>
  <button type="submit" value="Enviar" id="Enviar" name="Enviar" class="btn btn-success glyphicon glyphicon-plus"> Terminar Modificación </button>
</div>
<br>
<br>
<br>
</div>
</div>
</div>
</form>
<?php 
}else{   
  include_once "../../clases/SQLControlador.php";
  include_once "../../clases/Alumno.php";

  $Alumno = new Alumno();
  $TelefonoParticular = $_POST['TelefonoParticular'];
  $Alumno->setidAlumno($_SESSION['IdUsuarioAlumno']);
  $Alumno->setTelefono($TelefonoParticular);
//----------------------------------------------------------------------------------
  $NoHermanos = $_POST['NoHermanos'];
  $LugarOcupas = $_POST['LugarOcupas'];
  $OtrasPersonas = $_POST['OtrasPersonas'];
  $ActualmenteVives = $_POST['ActualmenteVives'];
  $SituacionFamiliar = $_POST['SituacionFamiliar'];
  $RelacionPadres = $_POST['RelacionPadres'];

  include_once "../../clases/DatosFamiliares.php";

  $DatosFamiliares = new DatosFamiliares();

  $DatosFamiliares->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
  $DatosFamiliares->setNoHermanos($NoHermanos);
  $DatosFamiliares->setLugarOcupas($LugarOcupas);
  $DatosFamiliares->setOtrasPersonas($OtrasPersonas);
  $DatosFamiliares->setActualmenteVives($ActualmenteVives);
  $DatosFamiliares->setSituacionFamiliar($SituacionFamiliar);
  $DatosFamiliares->setRelacionPadres($RelacionPadres);
//----------------------------------------------------------------------------------
  $TiempoTarea = $_POST['Tareas'];
  $TiempoEstudio = $_POST['Estudio'];
  $TiempoLectura = $_POST['Lectura'];
                  //$LugarEstudio = $_POST['LugarEstudio'];
                  //echo $LugarEstudio;

  $LugarEstudio = '';
  foreach ($_POST['LugarEstudio'] as $id){
    $s = ',';
    if($LugarEstudio == ''){
      $LugarEstudio =$id;
    }else{
      $LugarEstudio .= $s.$id;
    }
  }
                  //echo $LugarEstudio;

  $TecnicasEstudio = '';
  foreach ($_POST['TecnicasEstudio'] as $id){
    $s = ',';
    if($TecnicasEstudio == ''){
      $TecnicasEstudio =$id;
    }else{
      $TecnicasEstudio .= $s.$id;
    }
  }
                  //echo $TecnicasEstudio;

  $EE = $_POST['Estimulan'];
  if($EE == 'O'){
    $EstimulacionEstudio = "Si,". $_POST['EstimulacionEstudio']; 
  }elseif ($EE == 'F') {
    $EstimulacionEstudio = "No";
  }
                  //echo $EstimulacionEstudio;

  $MotivoAprender = $_POST['AprenderMas'];
  $MotivoHacer = $_POST['Hacer'];
  $MotivoInteres = $_POST['Interes'];
  $MotivoSatisfaccion = $_POST['Satisfaccion'];
  $MotivoFracaso = $_POST['Fracaso'];
  $MotivoAgradecer = $_POST['Agradecer'];
  $MotivoPremio = $_POST['Premio'];
  
  include_once "../../clases/HabitosEstudios.php";

  $HabitosEstudios = new HabitosEstudios();

  $HabitosEstudios->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
  $HabitosEstudios->setTiempoTarea($TiempoTarea);
  $HabitosEstudios->setTiempoEstudio($TiempoEstudio);
  $HabitosEstudios->setTiempoLectura($TiempoLectura);
  $HabitosEstudios->setLugarEstudio($LugarEstudio);
  $HabitosEstudios->setTecnicasEstudio($TecnicasEstudio);
  $HabitosEstudios->setEstimulacionEstudio($EstimulacionEstudio);
  $HabitosEstudios->setMotivoAprender($MotivoAprender);
  $HabitosEstudios->setMotivoInteres($MotivoInteres);
  $HabitosEstudios->setMotivoSatisfaccion($MotivoSatisfaccion);
  $HabitosEstudios->setMotivoFracaso($MotivoFracaso);
  $HabitosEstudios->setMotivoAgradecer($MotivoAgradecer);
  $HabitosEstudios->setMotivoPremio($MotivoPremio);
  $HabitosEstudios->setMotivoHacer($MotivoHacer);

  $SQLControlador = new SQLControlador();
  $SQLControlador->ModificacionFichaIdentificacionAlumno($Alumno,$DatosFamiliares,$HabitosEstudios);
//----------------------------------------------------------------------------------
}
?>
<!--Fin de contenido de caja de texto-->
</div> 
</div>
<!--Fin Contenido central-->
<!--Inicio de pie de pagina-->
<?php include '../menus/PiePagina.php';?>
<!--fin de pie de pagina-->
</div>
<!--Fin Contenedor medio-->


</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){

    $('#TelefonoParticular').on('input', function (e) {
      if (!/^[0-9.]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^0-9]+/ig,"");
      }
    });

    $('#NoHermanos').on('input', function (e) {
      if (!/^[0-9.]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^0-9]+/ig,"");
      }
    });

    $('#LugarOcupas').on('input', function (e) {
      if (!/^[0-9.]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^0-9]+/ig,"");
      }
    });

    $('#OtrasPersonas').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#ActualmenteVives').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#TipoTratamiento').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#SituacionFamiliar').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#EstimulacionEstudio').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

  });
</script>