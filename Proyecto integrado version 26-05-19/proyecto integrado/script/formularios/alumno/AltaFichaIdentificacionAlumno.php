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
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
  <!--STYLOS-->
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuAlumno.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuIzquierdoAlumno.css">

  <link rel="icon" type="image/vnd.microsoft.icon" href="./../../../imagenes/Mapa.ico">


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


  function LimpiarDeshabilitatCajaOtrasOpciones(){
    if(document.fromularioFichaIdentificacion.PE.checked){
      document.getElementById('primero').disabled = false;

    }else{
      document.getElementById('primero').disabled = true;
      document.getElementById('primero').value = "";

    }
  }

  function LimpiarDeshabilitatCajaOtrasOpciones2(){
    if(document.fromularioFichaIdentificacion.Or.checked){
      document.getElementById('segundo').disabled = false;

    }else{
      document.getElementById('segundo').disabled = true;
      document.getElementById('segundo').value = "";

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
  alert('Verifica en el apartado DATOS PERSONALES el campo Telefono Particular esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("TelefonoParticular").value;

if ((miCampoTexto.length < 7)||(miCampoTexto.length > 10)) {
  alert('Verifica en el apartado DATOS PERSONALES el campo Telefono Particular debe ser de 7-10 digitos!');
  return false;
}

miCampoTexto = document.getElementById("NoHermanos").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS FAMILIARES en el campo Numero de Hermanos esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("LugarOcupas").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS FAMILIARES en el campo Lugar que ocupas esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("OtrasPersonas").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS FAMILIARES en el campo Otras personas que viven con tigo esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("ActualmenteVives").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS FAMILIARES en el campo Actualmente vives con esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("SituacionFamiliar").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS FAMILIARES en el campo Situacion Familiar esta vacio!');
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
  alert('Seleccione una opción en la pregunta f) en el apartado DATOS FAMILIARES!');
  return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('ReprobadoSec');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}
if(!banderaRBTN){
  alert('Seleccione una opción en la pregunta b) en el apartado DATOS ESCOLARES');
  return false;
}

Validacion = document.getElementById('txt1').disabled;
if(Validacion == false){
  miCampoTexto = document.getElementById("txt1").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    alert('Verifica en el apartado DATOS ESCOLARES en el campo ¿Cuál? esta vacio!');
    return false;
  }
}

Validacion = document.getElementById('txt2').disabled;
if(Validacion == false){
  miCampoTexto = document.getElementById("txt2").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    alert('Verifica en el apartado DATOS ESCOLARES en el campo Motivo esta vacio!');
    return false;
  }
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('OtrosEstudios');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert('Seleccione una opción en la pregunta c) en el apartado DATOS ESCOLARES');
  return false;
}

Validacion = document.getElementById('TipoEstudio').disabled;
if(Validacion == false){
  miCampoTexto = document.getElementById("TipoEstudio").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    alert('Verifica en el apartado DATOS ESCOLARES el campo de texto ¿De que tipo? esta vacio!');
    return false;
  }
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('RendimientoEscolar');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert('Seleccione una opcion en la pregunta e) en el apartado DATOS ESCOLARES');
  return false;
}
miCampoTexto = document.getElementById("MateriaGustada").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS ESCOLARES en el campo de la pregunta e) esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("MateriaDisgustada").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS ESCOLARES en el campo de la pregunta f) esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("ReaccionPadres").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS ESCOLARES en el campo de la pregunta g) esta vacio!');
  return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('Expectativa');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert('Seleccione una opcion en la pregunta g) en el apartado DATOS ESCOLARES');
  return false;
}

miCampoTexto = document.getElementById("PorqueExpectativa").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado DATOS FAMILIARES el campo ¿Por qué? de la pregunta g) esta vacio!');
  return false;
}

miCampoTexto = document.getElementById("Atraccion").value;
if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  alert('Verifica en el apartado EXPECTATIVAS ANTE MI NUEVA FORMACION el campo de la pregunta a) esta vacio!');
  return false;
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('PreocupacionEtapa');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert('Verifica el apartado de EXPECTATIVAS ANTE MI NUEVA FORMACION en la pregunta b) Selecciona una opcion!');
  return false;
}

Validacion = document.getElementById('Preocupacion').disabled;
if(Validacion == false){
  miCampoTexto = document.getElementById("Preocupacion").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    alert('Verifica en el apartado EXPECTATIVAS ANTE MI NUEVA FORMACION el campo de texto ¿Que es? de la pregunta b) esta vacio!');
    return false;
  }
}

var chkEstado = document.getElementsByName('EstudioEs[]');
banderaRBTN =  false;

for(var i = 0; i < chkEstado.length; i++){
  if(chkEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert ('Verifica el apartado de EXPECTATIVAS ANTE MI NUEVA FORMACION en la pregunta c) Selecciona al menos una opcion!');
  return false;
}


chkEstado = document.getElementsByName('ProblemasEstudio[]');
banderaRBTN =  false;

for(var i = 0; i < chkEstado.length; i++){
  if(chkEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert ('Verifica el apartado de EXPECTATIVAS ANTE MI NUEVA FORMACION en la pregunta d) Selecciona al menos una opcion!');
  return false;
}

Validacion = document.getElementById('primero').disabled;
if(Validacion == false){
  miCampoTexto = document.getElementById("primero").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    alert('Verifica en el apartado EXPECTATIVAS ANTE MI NUEVA FORMACION el campo de texto ¿Otras Razones? de la pregunta b) esta vacio!');
    return false;
  }
}

banderaRBTN = false;
rbtEstado = document.getElementsByName('PreparadoExito');

for(var i = 0; i < rbtEstado.length; i++){
  if(rbtEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert('Verifica el apartado de EXPECTATIVAS ANTE MI NUEVA FORMACION en la pregunta e) Selecciona una opcion!');
  return false;
}

chkEstado = document.getElementsByName('ValorasProfesor[]');
banderaRBTN =  false;

for(var i = 0; i < chkEstado.length; i++){
  if(chkEstado[i].checked){
    banderaRBTN = true;
    break;
  }
}

if(!banderaRBTN){
  alert ('Verifica el apartado de EXPECTATIVAS ANTE MI NUEVA FORMACION en la pregunta f) Selecciona al menos una opcion!');
  return false;
}

Validacion = document.getElementById('segundo').disabled;
if(Validacion == false){
  miCampoTexto = document.getElementById("segundo").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    alert('Verifica en el apartado EXPECTATIVAS ANTE MI NUEVA FORMACION el campo ¿Otras? de la pregunta f) esta vacio!');
    return false;
  }
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
  alert ('erifica el apartado de HABITOS DE ESTUDIO en la pregunta b) Selecciona al menos una opcion!');
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
    alert('Verifica en el apartado HABITOS DE ESTUDIO el campo ¿De que manera? de la pregunta d) esta vacio!');
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
    document.fromularioFichaIdentificacion.txt1.value = ""; 
    document.fromularioFichaIdentificacion.txt2.value = ""; 
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
        if((!isset($_POST['TelefonoParticular']))&&(!isset($_POST['NoHermanos']))&&(!isset($_POST['LugarOcupas']))&&(!isset($_POST['ActualmenteVives']))&&(!isset($_POST['SituacionFamiliar']))){
          ?>
          <h6> Los datos que proporciones en este cuestionario tendrán carácter reservado, serán utilizados únicamente para ayudarte.</h6>
          <form method="POST" name="fromularioFichaIdentificacion" id="fromularioFichaIdentificacion" action="AltaFichaIdentificacionAlumno.php" onsubmit="return validar()">
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

                      $Consulta = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.FechaNac, lugarnacimiento.Municipio, lugarnacimiento.Estado, domicilio.Calle, domicilio.Numero, domicilio.Colonia, domicilio.CP, domicilio.Municipio AS MunicipioDomicilio, domicilio.Localidad, domicilio.Estado AS EstadoDomicilio, domicilio.TelefonoCasa, alumno.Telefono AS TelefonoParticular , alumno.TelefonoEmergencia from alumno, lugarnacimiento, domicilio WHERE alumno.idAlumno = '".$_SESSION['IdUsuarioAlumno']."' AND lugarnacimiento.idLugarNacimiento = alumno.LugarNacimiento_idLugarNacimiento AND domicilio.idDomicilio = alumno.Domicilio_idDomicilio;";
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
                        
                        <b><i>En caso de emergencia llamar a:</i></b>
                        <label for=""><?php echo $fila['TelefonoEmergencia']?></label><br>
                        <div class="form-inline">
                          <b><i>Telefono Particular:</i></b>
                          <input type="text" id="TelefonoParticular" name="TelefonoParticular" class="m-1 form-control" placeholder="Escribe tu respuesta" onKeyPress="return soloNumeros(event)" maxlength="10" >
                        </div>
                        <br>
                        <?php
                      }
                      ?>  
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="DF">
                    <br>
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

                        <!--Inicio opcion a-->

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
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-inline">
                          <b>b) Numero hermanos:</b>
                          <input type="text" name="NoHermanos" class="form-control" id="NoHermanos" placeholder="Escribe tu respuesta" onKeyPress="return soloNumeros(event)" maxlength="2" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-inline"> 
                          <b>Lugar que ocupas: </b>
                          <input type="text" name="LugarOcupas" class="m-1 form-control" id="LugarOcupas" placeholder="Escribe tu respuesta"  onKeyPress="return soloNumeros(event)" maxlength="2"  />
                        </div>
                      </div>
                    </div>
                    <!--Final opcion b-->
                    <br>
                    <!--Inicio opcion c-->
                    <div class="row">
                      <div class="col-md">
                        <b>c) Otras personas que viven con tigo</b>
                        <input type="text" name="OtrasPersonas" class="form-control" id="OtrasPersonas" placeholder="Escribe tu respuesta" onkeypress="return soloLetras(event);"  />
                      </div>                   
                    </div>
                    <!--Final opcion c-->
                    <br>
                    <!--Incio opcion d-->
                    <div class="row">
                      <div class="col-md-12">
                        <b>d) Actualmente vives con</b> 
                        <input type="text" name="ActualmenteVives" class="form-control" id="ActualmenteVives" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" maxlength="20"  />
                      </div>                
                    </div>
                    <!--Final opcion d-->
                    <br>
                    <!--Inicio opcion e-->
                    <div class="row">
                      <div class="col-md-12">
                        <b>e) ¿Hay alguna situación familiar que se pueda considerar especial? (fallecimiento de padre/madre, separacion de los padres, divorcio, enfermedad de algún familiar)</b>
                        <input type="text" name="SituacionFamiliar" class="form-control" id="SituacionFamiliar" placeholder="Escribe tu respuesta"   onkeypress="return soloLetras(event);" />  
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
                          <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="6" >Excelente
                          <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="5" >Muy Buena
                          <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="4" >Buena
                          <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="3" >Regular
                          <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="2" >Mala
                          <input name="RelacionPadres" id="RelacionPadres" type="radio" class="m-2"  value="1" >Muy mala
                        </div> 
                      </div>
                    </div>
                    <!--Final opcion f-->
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
                    <?php }?>
                      <!--Inicio opcion b-->
                      <div class="row">
                        <div class="col-md-12">
                          <b> b) ¿En tu formación previa reprobaste alguna materia?</b>
                          Si<input class="m-2" type="radio" name="ReprobadoSec" value="O" onclick="habilita()">
                          No<input class="m-2" type="radio" name="ReprobadoSec" value="F" onclick="deshabilita()">
                        </div>
                        <br>
                        <div class="col-md-6">
                          ¿Cuál?<input type='text' name='txt1' id="txt1" disabled class='m-2 form-control inputText' placeholder="Escribe tu respuesta" onkeypress="return soloLetras(event);"> 
                        </div>
                        <div class="-md-6">
                          Motivo:<input type='text' name='txt2' id="txt2" disabled class='m-2 form-control inputText' placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);">
                        </div>
                      </div>
                      <!--Final opcion b-->
                      <!--Inicio opcion c-->
                      <div class="row">
                        <div class="col-12">
                          <b>c) ¿Actualmente realizas otro tipo de estudios? (música, idiomas, informativa)</b>
                          <div class="form-check-inline">
                            Si <input class="m-2" type="radio"  value="O" name="OtrosEstudios" onclick="habilitar(this.value,'TipoEstudio')" />
                            No <input class="m-2" type="radio"  value="F" name="OtrosEstudios" onclick="habilitar(this.value,'TipoEstudio')"/>
                          </div>
                        </div>
                        <div class="col-md-12">
                          ¿De que tipo?<input type="text" name="TipoEstudio" id="TipoEstudio" disabled="disabled" class="m-2 form-control" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" />
                        </div>
                      </div>
                      <!--Final opcion c-->
                      <!--Inicio opcion d-->
                      <div class="row">
                        <div class="col-md-12">
                          <b>d) ¿Cómo piensas que ha sido tu rendimiento escolar hasta ahora?</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="5" name="RendimientoEscolar" >Excelente
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="4" name="RendimientoEscolar" >Muy Bueno
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="3" name="RendimientoEscolar" >Bueno
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="2" name="RendimientoEscolar" >Regular
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="1" name="RendimientoEscolar" >Malo
                            </label>
                          </div><div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="0" name="RendimientoEscolar" >Muy malo
                            </label>
                          </div>
                        </div>
                      </div>
                      <!--Final opcion d-->
                      <br>
                      <!--Inicio opcion e-->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <b>e) Las asignaturas que más te han gustado en tu formación anterior han sido:</b> <br>
                            <input type="text" name="MateriaGustada" id="MateriaGustada" class="form-control" id="formGroupExampleInput" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" >
                          </div>
                        </div>
                      </div>
                      <!--Final opcion e-->
                      <!--Inicio opcion f-->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <b>f) Las asignaturas que menos te han interesado en tu formación anterior han sido: </b> <br>
                            <input type="text" name="MateriaDisgustada" id="MateriaDisgustada" class="form-control" id="formGroupExampleInput" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" >
                          </div>
                        </div>
                      </div>
                      <!--Fin opcion f-->
                      <!--Inicio opcion g-->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <b>g) ¿Cómo reaccionan tus padres ante tus calificaciones? </b>
                            <input type="text" name="ReaccionPadres" id="ReaccionPadres" class="form-control" id="formGroupExampleInput" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" >
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <b>¿Cress que cumples con lo que ellos esperan de ti? </b>
                            <div class="form-check-inline">
                              <label for=""> Si <input type="radio" value="O" name="Expectativa" /></label>
                              <label for=""> No <input type="radio" value="F" name="Expectativa" /></label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <label class="m-4-">¿Por qué?</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="m-auto form-control" name="PorqueExpectativa" id="PorqueExpectativa" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" />
                          </div>
                        </div>   
                      </div>
                      <!--Fin opcion g-->
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
                            <b>a) ¿Padeces alguna enfermedad o existe alguna condicion fisica que te afecte? (oido, vista, enfermedad respiratoria, cardiaca, convulsiones, diabetes, asma, etc)</b>
                            <label for=""><?php echo $fila['Enfermedad']?></label>
                          </div>
                        </div>
                        <!--Fin opcion a-->
                        <br>
                        <!--Inicio opcion b-->
                        <div class="row">
                          <div class="col-md-12">
                            <b>b) Actualmente ¿recibes algún tratamiento médico o psicológico? ¿Lo has recibido alguna vez?</b>
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
  <!--inicio opcion a-->
  <div class="row">
    <div class="col-md-12">
      <b>a) ¿Qué es lo que más me trajo del CECyTE?</b>
      <input type="text"  name="Atraccion" class="form-control" id="Atraccion" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" />
    </div>
  </div>
  <!--fin opcion a--> 
  <!--Inicio opcion b--> 
  <div class="row">
    <div class="col-md-12">
      <b>b) Hay algo que te preocupe sobre la nueva etapa que ahora empiezas?</b>
      <label for=""> Si <input type="radio"  value="O" name="PreocupacionEtapa" onclick="habilitar(this.value,'Preocupacion')"/></label>
      <label for=""> No <input type="radio"  value="F" name="PreocupacionEtapa" onclick="habilitar(this.value,'Preocupacion')"/></label>
    </div>
    <div class="col-md-12">
      <b>¿Qué es?</b><input type="text"  name="Preocupacion" disabled="disabled" class="col-10 form-control" id="Preocupacion" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);"/>
    </div>
  </div>
  <!--Final opcion b--> 
  <!--Inicio opcion c-->
  <b>c) Para ti el estudio es: (seleccione una o mas opciones)</b> <br>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="6" id="I" class="form-check-input" name="EstudioEs[]">Interesante
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="5" id="A" class="form-check-input" name="EstudioEs[]">Aburrido
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="4" id="U" class="form-check-input" name="EstudioEs[]">Util para el futuro
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="3" id="O" class="form-check-input" name="EstudioEs[]">Algo obligado por tus padres
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label"> 
      <input type="checkbox" value="2" id="PR" class="form-check-input" name="EstudioEs[]">Una forma de pasar el tiempo
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" value="1" id="HA" class="form-check-input" name="EstudioEs[]">Una forma de hacer amigos
    </label>
  </div>
  <!--Final opcion c--> 
  <br>
  <!--Inicio opcion d--> 
  <b> d) Cuando tienes problemas con el estudio ¿a que piensas que se debe? (seleccione una o mas opciones)</b> <br>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="Me organizo mal" id="OM" name="ProblemasEstudio[]" >Me organizo mal
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="Siento poco interés" id="PI" name="ProblemasEstudio[]" >Siento poco interés
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="Me distraigo fácilmente" id="DF" name="ProblemasEstudio[]" >Me distraigo fácilmente 
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="No me esfuerzo lo suficiente" id="ES" name="ProblemasEstudio[]" >No me esfuerzo lo suficiente
    </label>
  </div>
  <div class="form-check-inline form-inline">
    <label class="form-check-label">
      <input type="checkbox" value="o" class="form-check-input" name="ProblemasEstudio[]" id="PE" onclick="LimpiarDeshabilitatCajaOtrasOpciones();">Otras Razones
      <input type="text" name="OtrasRazones" id="primero" disabled class="m-2 form-control" id="OtrasRazones" placeholder="Escribe tu respuesta"  onkeypress="return soloLetras(event);" />
    </label>
  </div>
  <!--Final opcion d--> 
  <!--Inicio opcion e-->
  <div class="flex-row">
    <b>e) ¿Te consideras preparado/a para tener éxito en esta nueva etapa de formación?</b> <br>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio"  value="4" class="form-check-input" name="PreparadoExito">Mucho
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio"  value="3" class="form-check-input" name="PreparadoExito">Normal
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio"  value="2" class="form-check-input" name="PreparadoExito">Poco
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio"  value="1" class="form-check-input" name="PreparadoExito">Muy poco
      </label>
    </div> 
  </div>
  <!--Final opcion e-->
  <!--Inicio opcion f-->
  <b>f) En un profesor lo que más valoras es: (seleccione una o mas opciones)</b>
  <br>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" id="EXC"  class="form-check-input" name="ValorasProfesor[]" value="Explique claro">Explique claro
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox"   id="QC" class="form-check-input" name="ValorasProfesor[]" value="Que confie en mi">Que confie en mi
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox"   id="QR" class="form-check-input" name="ValorasProfesor[]" value="Que se haga respetar y que ponga orden">Que se haga respetar y que ponga orden
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox"   id="QP" class="form-check-input" name="ValorasProfesor[]" value="Que se preocupe por mi y no solo de mi estudio">Que se preocupe por mi y no solo de mi estudio
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox"   id="QFP" value="Que de facilidades para preguntar en clase" class="form-check-input" name="ValorasProfesor[]" value="Que de facilidades para preguntar en clase">Que de facilidades para preguntar en clase
    </label>
  </div>
  <div class="form-check-inline form-inline">
    <label class="form-check-label">
      <input type="checkbox" id="Or" value="o" class="form-check-input" name="ValorasProfesor[]" onclick="LimpiarDeshabilitatCajaOtrasOpciones2()">Otras
      <input type="text" id="segundo" class="m-2 form-control" name="otraF" disabled="disabled" placeholder="Escribe tu respuesta" onkeypress="return soloLetras(event);" />
    </label>
  </div>
</div>

<div role="tabpanel" class="tab-pane fade" id="HE">
  <!--Inicio opcion a-->
  <div class="form-group">
    <b>a) Tiempo de trabajo diario en casa:</b><br>
    <div class="container">
      <i><b>Tareas:</b></i>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="0"  class="form-check-input" name="Tareas">Nada
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Tareas">Una hora
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Tareas">Dos horas
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Tareas">Mas de dos horas
        </label>
      </div>
      <br>
      <i><b>Estudio:</b></i>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="0"  class="form-check-input" name="Estudio">Nada
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Estudio">Una hora
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Estudio">Dos horas
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Estudio">Mas de dos horas
        </label>
      </div>
      <br><b><i>Tiempo Semanal que le dedicas a la lectura:</i></b><br>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="0"  class="form-check-input" name="Lectura">Nada
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Lectura">Una hora
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Lectura">Dos horas
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Lectura">Mas de dos horas
        </label>
      </div>
    </div>
  </div>
  <!--Fin opcion a-->
  <!--Inicio opcion b-->
  <div>
    <b>b) Lugar de Estudio: (seleccione una o mas opciones)</b><br>
    <div class="col-sm-12">
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" id="HP" value="4" class="form-check-input" name="LugarEstudio[]">Habitacion propia
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" id="S"  value="3" class="form-check-input" name="LugarEstudio[]">Sala
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" id="C" value="2" class="form-check-input" name="LugarEstudio[]">Cocina
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" id="Ot" value="1" class="form-check-input" name="LugarEstudio[]">Otros
        </label>
      </div>
    </div>
  </div>
  <!--Fin opcion b-->
  <br>
  <!--Inicio opcion c-->
  <div>
    <b>c) Técnicas de estudio que utilizas: (seleccione una o mas opciones)</b><br>
    <div class="col-sm-12">
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" value="4" id="S" class="form-check-input" name="TecnicasEstudio[]">Subrayado
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" value="3" id="E" class="form-check-input" name="TecnicasEstudio[]">Esquema
        </label> 
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" value="2" id="R" class="form-check-input" name="TecnicasEstudio[]">Resumen
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="checkbox" value="1" id="M" class="form-check-input" name="TecnicasEstudio[]">Memoria
        </label>
      </div>
    </div>
  </div>
  <!--Fin opcion c-->
  <br>
  <!--Inicio opcion d-->
  <div>
    <b>d) ¿Te estimulan tus padres en tus estudios?</b>
    <label for=""> Si <input type="radio"  value="O" name="Estimulan" onclick="habilitar(this.value,'EstimulacionEstudio')"/></label>
    <label for=""> No <input type="radio"  value="F" name="Estimulan" onclick="habilitar(this.value,'EstimulacionEstudio')"/></label>
    <p>¿De que manera?</p>
    <input type="text"  name="EstimulacionEstudio" disabled="disabled" class="col-10 form-control" id="EstimulacionEstudio" placeholder="Escribe tu respuesta" onkeypress="return soloLetras(event);"/>
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
          <input type="radio" value="4"  class="form-check-input" name="AprenderMas">Muchisimo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="AprenderMas">Normal
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="AprenderMas">Algo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="AprenderMas">Nada
        </label>
      </div>
      <br>
      <b><i>Poder hacer las cosas por ti mismo/a y a tu manera</i></b><br>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="4"  class="form-check-input" name="Hacer">Muchisimo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Hacer">Normal
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Hacer">Algo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Hacer">Nada
        </label>
      </div>
      <br>
      <b><i>El interes que despierta en ti todo lo que estudias</i></b><br>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="4"  class="form-check-input" name="Interes">Muchisimo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Interes">Normal
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Interes">Algo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Interes">Nada
        </label>
      </div>
      <br>
      <b><i>La satisfacción que se siente cuando se obtienen buenos resultados</i></b><br>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="4"  class="form-check-input" name="Satisfaccion">Muchisimo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Satisfaccion">Normal
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Satisfaccion">Algo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Satisfaccion">Nada
        </label>
      </div>
      <br>
      <b><i>Evitar un posible fracaso en los estudios</i></b><br>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="4"  class="form-check-input" name="Fracaso">Muchisimo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Fracaso">Normal
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Fracaso">Algo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Fracaso">Nada
        </label>
      </div>
      <br>
      <b><i>Agradecer a tus padres y/o profesores</i></b><br>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="4"  class="form-check-input" name="Agradecer">Muchisimo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Agradecer">Normal
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Agradecer">Algo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Agradecer">Nada
        </label>
      </div>
      <br>
      <b><i>Conseguir los premios que te han prometido tus padres</i></b><br>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="4"  class="form-check-input" name="Premio">Muchisimo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="3"  class="form-check-input" name="Premio">Normal
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="2"  class="form-check-input" name="Premio">Algo
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" value="1"  class="form-check-input" name="Premio">Nada
        </label>
      </div>
    </div>
  </div>
  <!--Fin opcion e-->
</div>
<div align="center" role="tabpanel" class="tab-pane fade" id="TT">
  <h2 >Agradecemos su tiempo</h2><br>
  <button type="submit" value="Enviar" id="Enviar" name="Enviar" class="btn btn-success glyphicon glyphicon-plus"> Terminar </button>
</div>
<br><br>
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
  include_once "../../clases/DatosEscolares.php";
  include_once "../../clases/MateriasSecuReprobadas.php";
//Vari MateriasReprobadasSec
  $RS = $_POST['ReprobadoSec'];

  if($RS == 'O'){
    $Materias = "Si, ". $_POST['txt1'];
    $Motivo = $_POST['txt2'];
    $MateriasSecuReprobadas = new MateriasSecuReprobadas();
    $MateriasSecuReprobadas->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
    $MateriasSecuReprobadas->setMaterias($Materias);
    $MateriasSecuReprobadas->setMotivo($Motivo);
  }else{
    $MateriasSecuReprobadas = new MateriasSecuReprobadas();
    $MateriasSecuReprobadas->setAlumno_idAlumno(0);
  }


  $Estudios = $_POST['OtrosEstudios'];
  if($Estudios == 'O'){
    $OtrosEstudios = "Si, ". $_POST['TipoEstudio']; 
  }elseif ($Estudios == 'F') {
    $OtrosEstudios = "No";
  }

//vari Rendimiento Escolar
  $RendimientoEscolar = $_POST['RendimientoEscolar'];
//$Alumno_idAlumno = $_POST['otraSec'];

//Variable Expectativa padre
  $EP = $_POST['Expectativa'];
  if($EP == 'O'){
    $Expectativa = "Si, ". $_POST['PorqueExpectativa']; 
  }elseif ($EP == 'F') {
    $Expectativa = "No";
  }

//echo "<script>alert('".$Expectativa."');</script>";

  $MateriaGustada = $_POST['MateriaGustada'];
  $MateriaDisgustada = $_POST['MateriaDisgustada'];
  $ReaccionPadres = $_POST['ReaccionPadres'];

  $DatosEscolares = new DatosEscolares();

  $DatosEscolares->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
  $DatosEscolares->setOtrosEstudios($OtrosEstudios);
  $DatosEscolares->setRendimientoEscolar($RendimientoEscolar);
  $DatosEscolares->setMateriaGustada($MateriaGustada);
  $DatosEscolares->setMateriaDisgustada($MateriaDisgustada);
  $DatosEscolares->setReaccionPadres($ReaccionPadres);
  $DatosEscolares->setExpectativa($Expectativa);
//----------------------------------------------------------------------------------
  $Atraccion = $_POST['Atraccion'];
//echo $Atraccion;

  $Pre = $_POST['PreocupacionEtapa'];
  if($Pre == 'O'){
    $Preocupacion = "Si, ". $_POST['Preocupacion']; 
  }elseif ($Pre == 'F') {
    $Preocupacion = "No";
  }

  $EstudioEs = '';
  foreach ($_POST['EstudioEs'] as $id){
    $s = ', ';
    if($EstudioEs == ''){
      $EstudioEs =$id;
    }else{
      $EstudioEs .= $s.$id;
    }
  }
//echo $EstudioEs;

  $ProblemaCausa = '';
  foreach ($_POST['ProblemasEstudio'] as $id){
    $s = ', ';
    if($ProblemaCausa == ''){
      $ProblemaCausa = $id;
    }else{
      if($id == 'o'){
        $ProblemaCausa .= $s.$_POST['OtrasRazones'];
      }else{
        $ProblemaCausa .= $s.$id;
      }
    }
  }
//echo $ProblemaCausa;

  $Preparado = $_POST['PreparadoExito'];
//echo $Preparado;

  $ValorarProfesor = '';
  foreach ($_POST['ValorasProfesor'] as $id){
    $s = ', ';
    if($ValorarProfesor == ''){
      $ValorarProfesor =$id;
    }else{
      if($id == 'o'){
        $ValorarProfesor .= $s.$_POST['otraF'];
      }else{
        $ValorarProfesor .= $s.$id;
      }
    }
  }
  include_once "../../clases/ExpectativaNuevaForm.php";

  $ExpectativaNuevaForm= new ExpectativaNuevaForm();

  $ExpectativaNuevaForm->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
  $ExpectativaNuevaForm->setAtraccion($Atraccion);
  $ExpectativaNuevaForm->setPreocupacion($Preocupacion);
  $ExpectativaNuevaForm->setEstudiosEs($EstudioEs);
  $ExpectativaNuevaForm->setProblemaCausa($ProblemaCausa);
  $ExpectativaNuevaForm->setPreparado($Preparado);
  $ExpectativaNuevaForm->setValorarProfesor($ValorarProfesor);
//----------------------------------------------------------------------------------
  $TiempoTarea = $_POST['Tareas'];
  $TiempoEstudio = $_POST['Estudio'];
  $TiempoLectura = $_POST['Lectura'];
//$LugarEstudio = $_POST['LugarEstudio'];
//echo $LugarEstudio;

  $LugarEstudio = '';
  foreach ($_POST['LugarEstudio'] as $id){
    $s = ', ';
    if($LugarEstudio == ''){
      $LugarEstudio =$id;
    }else{
      $LugarEstudio .= $s.$id;
    }
  }
//echo $LugarEstudio;

  $TecnicasEstudio = '';
  foreach ($_POST['TecnicasEstudio'] as $id){
    $s = ', ';
    if($TecnicasEstudio == ''){
      $TecnicasEstudio =$id;
    }else{
      $TecnicasEstudio .= $s.$id;
    }
  }
//echo $TecnicasEstudio;

  $EE = $_POST['Estimulan'];
  if($EE == 'O'){
    $EstimulacionEstudio = "Si, ". $_POST['EstimulacionEstudio']; 
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
  $SQLControlador->AgregarFichaIdentificacionAlumno($Alumno,$DatosFamiliares,$DatosEscolares,$ExpectativaNuevaForm,$MateriasSecuReprobadas,$HabitosEstudios);
//----------------------------------------------------------------------------------
}
?>
<!--Fin de contenido de caja de texto-->
</div> 

<!--Inicio de pie de pagina-->
<?php include '../menus/PiePagina.php';?>

<!--fin de pie de pagina-->
</div>
<!--Fin Contenido central-->
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

    $('#txt1').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#txt2').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#TipoEstudio').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#MateriaGustada').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#MateriaDisgustada').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#ReaccionPadres').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#PorqueExpectativa').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#Atraccion').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#Preocupacion').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#ReaccionPadres').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#primero').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
      }
    });

    $('#segundo').on('input', function (e) {
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