<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinDocenteTutor']) && !isset ($_SESSION['IdDocenteTutor']) && !isset ($_SESSION['IdAlumnoDocenteTutor']))
{
   echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
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
   <link rel="stylesheet" type="text/css" href="./../../../css/select2.css">


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="./../../../js/jquery-3.3.1.js"></script>
  <script src="../../js/funciones.js"></script>
  <script src="./../../../js/jquery-3.3.1.min.js"></script>
  <script src="./../../../js/popper.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>
  <script src="./../../../js/select2.js"></script>
  

  <!--Icono en pestaña-->
   <link rel="icon" type="image/vnd.microsoft.icon" href="./../../../imagenes/Mapa.ico">
  
  <!--STYLOS-->
<link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
 <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuIzquierdoAlumno.css">

  <!--Iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script>
    function myFunction(event) {
      var codigo=window.event.keyCode;
      var x = document.getElementById("actividadestareas");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("actividadestareas").value+"\n-";
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

<!--Solo Numeros-->
<script type="text/javascript">
  function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    if(key >= 48 && key <= 57){

    }else{
      alert('Solo numeros Por favor');
    }
    return (key >= 48 && key <= 57)
  }

//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6, 44]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
      if(key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
      alert('Tecla no aceptada');
      return false;
    }
  }
</script>

</head>

<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
   <br>
    <?php include "../menus/MenuDocenteTutor.php";
      MenuAlumnoDocenteTutor();?>
 </div>
 <!--Fin contenedor Cabecera-->

 <!--Inicio Contenedor medio-->
 <div class="container">
  <!--Poner titulo o nombre -->
  <br><center><h2> Tabla Tutorias individuales </h2></center>
  <!--Poner titulo o nombre -->

  <div class="row">
    <!--Inicio de menu izquierdo-->
    <div class="col-sm-3">

          <?php include '../menus/MenuIzquierdoAlumnoDocenteTutor.php';
          ?>
        
          <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--Fin inicio menu izquierdo-->
        </div>
    <!--Inicio Contenido central-->
    <div class="col-sm-9">
     <!--Inicio de contenido de caja de texto-->
     <br>
     <div id="buscador"></div>
     <div id="tabla"></div>
     <br><br><br>

  </div>
  <!--Fin Contenido central-->
  <!--Inicio de pie de pagina-->
  
  <!--fin de pie de pagina-->
  
</div>
<!--Fin Contenedor medio-->
<br><br><br>
<?php include '../menus/PiePagina.php';?>

</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('../../clases/tablasmodales/TablaTutoriasIndividuales.php');
    $('#buscador').load('../../clases/tablasmodales/BuscadorTutoriasIndividuales.php');
      //ValidarTutorJustificantesRegistro();
         //ValidarTutorJustificantesModificacion();
       });
     </script>

    