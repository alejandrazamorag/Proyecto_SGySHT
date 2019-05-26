<?php
if (!isset($_SESSION)) { session_start(); }


if ((!isset ($_SESSION['IdUsuarioAlumno']))&&(!isset ($_SESSION['LoggedinAlumno'])))
{
 echo "<script language='javascript'>window.location='LoginAlumno.php'</script>";
}
include_once "../../clases/SQLControlador.php";
include_once "../../clases/Alumno.php";

$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta = "SELECT Total FROM testaprendizaje WHERE Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."';";
$Resultado = $Mysql->Consulta($Consulta);
                        if ($Resultado->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                          echo "<script language='javascript'>window.location='consultatestaprendizaje.php'</script>";
                        }else{
                         // echo "<script language='javascript'>window.location='testaprendizajealumno.php'</script>";
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

                         <script>
                           $(document).ready(function()
                           {
                            $("#mostrarmodal").modal("show");
                          });
                        </script>
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
                        <br><center><h2> Test para determinar el canal de aprendizaje de preferencia</h2></center>
                        <center><h3> Lynn O'Brien (1990)</h3></center>
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
                           

                           <br><br>
                           
                           <script type="text/javascript" src="js/jquery.js"></script>
                           <script language="javascript">
                            function validacion(formu, obj) {
              limite=1; //limite de checks a seleccionar
              num=0;
              if (obj.checked) {
                for (i=0; ele=document.getElementById(formu).children[i]; i++)
                  if (ele.checked) num++;
                if (num>limite)
                  obj.checked=false;
              }

            }  
          </script>

          <script>
            function validarFormulario(){
              var chkEstado1 = document.getElementsByName('pregunta1');
              var chkEstado2 = document.getElementsByName('pregunta2');
              var chkEstado3 = document.getElementsByName('pregunta3');
              var chkEstado4 = document.getElementsByName('pregunta4');
              var chkEstado5 = document.getElementsByName('pregunta5');
              var chkEstado6 = document.getElementsByName('pregunta6');
              var chkEstado7 = document.getElementsByName('pregunta7');
              var chkEstado8 = document.getElementsByName('pregunta8');
              var chkEstado9 = document.getElementsByName('pregunta9');
              var chkEstado10 = document.getElementsByName('pregunta10');
              var chkEstado11 = document.getElementsByName('pregunta11');
              var chkEstado12 = document.getElementsByName('pregunta12');
              var chkEstado13 = document.getElementsByName('pregunta13');
              var chkEstado14 = document.getElementsByName('pregunta14');
              var chkEstado15 = document.getElementsByName('pregunta15');
              var chkEstado16 = document.getElementsByName('pregunta16');
              var chkEstado17 = document.getElementsByName('pregunta17');
              var chkEstado18 = document.getElementsByName('pregunta18');
              var chkEstado19 = document.getElementsByName('pregunta19');
              var chkEstado20 = document.getElementsByName('pregunta20');
              var chkEstado21 = document.getElementsByName('pregunta21');
              var chkEstado22 = document.getElementsByName('pregunta22');
              var chkEstado23 = document.getElementsByName('pregunta23');
              var chkEstado24 = document.getElementsByName('pregunta24');
              var chkEstado25 = document.getElementsByName('pregunta25');
              var chkEstado26 = document.getElementsByName('pregunta26');
              var chkEstado27 = document.getElementsByName('pregunta27');
              var chkEstado28 = document.getElementsByName('pregunta28');
              var chkEstado29 = document.getElementsByName('pregunta29');
              var chkEstado30 = document.getElementsByName('pregunta30');
              var chkEstado31 = document.getElementsByName('pregunta31');
              var chkEstado32 = document.getElementsByName('pregunta32');
              var chkEstado33 = document.getElementsByName('pregunta33');
              var chkEstado34 = document.getElementsByName('pregunta34');
              var chkEstado35 = document.getElementsByName('pregunta35');
              var chkEstado36 = document.getElementsByName('pregunta36');


              banderaRBTN1 =  false;
              banderaRBTN2 =  false;
              banderaRBTN3 =  false;
              banderaRBTN4 =  false;
              banderaRBTN5 =  false;
              banderaRBTN6 =  false;
              banderaRBTN7 =  false;
              banderaRBTN8 =  false;
              banderaRBTN9 =  false;
              banderaRBTN10 =  false;
              banderaRBTN11 =  false;
              banderaRBTN12 =  false;
              banderaRBTN13 =  false;
              banderaRBTN14 =  false;
              banderaRBTN15 =  false;
              banderaRBTN16 =  false;
              banderaRBTN17 =  false;
              banderaRBTN18 =  false;
              banderaRBTN19 =  false;
              banderaRBTN20 =  false;
              banderaRBTN21 =  false;
              banderaRBTN22 =  false;
              banderaRBTN23 =  false;
              banderaRBTN24 =  false;
              banderaRBTN25 =  false;
              banderaRBTN26 =  false;
              banderaRBTN27 =  false;
              banderaRBTN28 =  false;
              banderaRBTN29 =  false;
              banderaRBTN30 =  false;
              banderaRBTN31 =  false;
              banderaRBTN32 =  false;
              banderaRBTN33 =  false;
              banderaRBTN34 =  false;
              banderaRBTN35 =  false;
              banderaRBTN36 =  false;


              for(var i = 0; i < chkEstado1.length; i++){
                if(chkEstado1[i].checked){
                  banderaRBTN1 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado2.length; i++){
                if(chkEstado2[i].checked){
                  banderaRBTN2 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado3.length; i++){
                if(chkEstado3[i].checked){
                  banderaRBTN3 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado4.length; i++){
                if(chkEstado4[i].checked){
                  banderaRBTN4 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado5.length; i++){
                if(chkEstado5[i].checked){
                  banderaRBTN5 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado6.length; i++){
                if(chkEstado6[i].checked){
                  banderaRBTN6 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado7.length; i++){
                if(chkEstado7[i].checked){
                  banderaRBTN7 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado8.length; i++){
                if(chkEstado8[i].checked){
                  banderaRBTN8 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado9.length; i++){
                if(chkEstado9[i].checked){
                  banderaRBTN9 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado10.length; i++){
                if(chkEstado10[i].checked){
                  banderaRBTN10 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado11.length; i++){
                if(chkEstado11[i].checked){
                  banderaRBTN11 = true;
                  break;
                }
              }

              for(var i = 0; i < chkEstado12.length; i++){
                if(chkEstado12[i].checked){
                  banderaRBTN12 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado13.length; i++){
                if(chkEstado13[i].checked){
                  banderaRBTN13 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado14.length; i++){
                if(chkEstado14[i].checked){
                  banderaRBTN14 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado15.length; i++){
                if(chkEstado15[i].checked){
                  banderaRBTN15 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado16.length; i++){
                if(chkEstado16[i].checked){
                  banderaRBTN16 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado17.length; i++){
                if(chkEstado17[i].checked){
                  banderaRBTN17 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado18.length; i++){
                if(chkEstado18[i].checked){
                  banderaRBTN18 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado19.length; i++){
                if(chkEstado19[i].checked){
                  banderaRBTN19 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado20.length; i++){
                if(chkEstado20[i].checked){
                  banderaRBTN20 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado21.length; i++){
                if(chkEstado21[i].checked){
                  banderaRBTN21 = true;
                  break;
                }
              }

              for(var i = 0; i < chkEstado22.length; i++){
                if(chkEstado22[i].checked){
                  banderaRBTN22 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado23.length; i++){
                if(chkEstado23[i].checked){
                  banderaRBTN23 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado24.length; i++){
                if(chkEstado24[i].checked){
                  banderaRBTN24 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado25.length; i++){
                if(chkEstado25[i].checked){
                  banderaRBTN25 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado26.length; i++){
                if(chkEstado26[i].checked){
                  banderaRBTN26 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado27.length; i++){
                if(chkEstado27[i].checked){
                  banderaRBTN27 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado28.length; i++){
                if(chkEstado28[i].checked){
                  banderaRBTN28 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado29.length; i++){
                if(chkEstado29[i].checked){
                  banderaRBTN29 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado30.length; i++){
                if(chkEstado30[i].checked){
                  banderaRBTN30 = true;
                  break;
                }
              }

              for(var i = 0; i < chkEstado31.length; i++){
                if(chkEstado31[i].checked){
                  banderaRBTN31 = true;
                  break;
                }
              }

              for(var i = 0; i < chkEstado32.length; i++){
                if(chkEstado32[i].checked){
                  banderaRBTN32 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado33.length; i++){
                if(chkEstado33[i].checked){
                  banderaRBTN33 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado34.length; i++){
                if(chkEstado34[i].checked){
                  banderaRBTN34 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado35.length; i++){
                if(chkEstado35[i].checked){
                  banderaRBTN35 = true;
                  break;
                }
              }
              for(var i = 0; i < chkEstado36.length; i++){
                if(chkEstado36[i].checked){
                  banderaRBTN36 = true;
                  break;
                }
              }


              if(!banderaRBTN1){
                alert ('Necesitas contestar la pregunta 1');
                return false;
              }
              if(!banderaRBTN2){
                alert ('Necesitas contestar la pregunta 2');
                return false;
              }
              if(!banderaRBTN3){
                alert ('Necesitas contestar la pregunta 3');
                return false;
              }
              if(!banderaRBTN4){
                alert ('Necesitas contestar la pregunta 4');
                return false;
              }
              if(!banderaRBTN5){
                alert ('Necesitas contestar la pregunta 5');
                return false;
              }
              if(!banderaRBTN6){
                alert ('Necesitas contestar la pregunta 6');
                return false;
              }
              if(!banderaRBTN7){
                alert ('Necesitas contestar la pregunta 7');
                return false;
              }
              if(!banderaRBTN8){
                alert ('Necesitas contestar la pregunta 8');
                return false;
              }
              if(!banderaRBTN9){
                alert ('Necesitas contestar la pregunta 9');
                return false;
              }
              if(!banderaRBTN10){
                alert ('Necesitas contestar la pregunta 10');
                return false;
              }
              if(!banderaRBTN11){
                alert ('Necesitas contestar la pregunta 11');
                return false;
              }
              if(!banderaRBTN12){
                alert ('Necesitas contestar la pregunta 12');
                return false;
              }
              if(!banderaRBTN13){
                alert ('Necesitas contestar la pregunta 13');
                return false;
              }
              if(!banderaRBTN14){
                alert ('Necesitas contestar la pregunta 14');
                return false;
              }
              if(!banderaRBTN15){
                alert ('Necesitas contestar la pregunta 15');
                return false;
              }
              if(!banderaRBTN16){
                alert ('Necesitas contestar la pregunta 16');
                return false;
              }
              if(!banderaRBTN17){
                alert ('Necesitas contestar la pregunta 17');
                return false;
              }
              if(!banderaRBTN18){
                alert ('Necesitas contestar la pregunta 18');
                return false;
              }
              if(!banderaRBTN19){
                alert ('Necesitas contestar la pregunta 19');
                return false;
              }
              if(!banderaRBTN20){
                alert ('Necesitas contestar la pregunta 20');
                return false;
              }
              if(!banderaRBTN21){
                alert ('Necesitas contestar la pregunta 21');
                return false;
              }
              if(!banderaRBTN22){
                alert ('Necesitas contestar la pregunta 22');
                return false;
              }
              if(!banderaRBTN23){
                alert ('Necesitas contestar la pregunta 23');
                return false;
              }
              if(!banderaRBTN24){
                alert ('Necesitas contestar la pregunta 24');
                return false;
              }
              if(!banderaRBTN25){
                alert ('Necesitas contestar la pregunta 25');
                return false;
              }
              if(!banderaRBTN26){
                alert ('Necesitas contestar la pregunta 26');
                return false;
              }
              if(!banderaRBTN27){
                alert ('Necesitas contestar la pregunta 27');
                return false;
              }
              if(!banderaRBTN28){
                alert ('Necesitas contestar la pregunta 28');
                return false;
              }
              if(!banderaRBTN29){
                alert ('Necesitas contestar la pregunta 29');
                return false;
              }
              if(!banderaRBTN30){
                alert ('Necesitas contestar la pregunta 30');
                return false;
              }
              if(!banderaRBTN31){
                alert ('Necesitas contestar la pregunta 31');
                return false;
              }
              if(!banderaRBTN32){
                alert ('Necesitas contestar la pregunta 32');
                return false;
              }
              if(!banderaRBTN33){
                alert ('Necesitas contestar la pregunta 33');
                return false;
              }
              if(!banderaRBTN34){
                alert ('Necesitas contestar la pregunta 34');
                return false;
              }
              if(!banderaRBTN35){
                alert ('Necesitas contestar la pregunta 35');
                return false;
              }
              if(!banderaRBTN36){
                alert ('Necesitas contestar la pregunta 36');
                return false;
              }

            }
          </script>


          <form name = "form" onsubmit="return validarFormulario()" method="POST" action="../../clases/CalculoTestAlumno.php">

           <div id="form1">
            <label><b>1.-Puedo recordar algo mejor si lo escribo.</b></label><br>
            <input type = "checkbox" name = "pregunta1" onchange="validacion('form1', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta1" onchange="validacion('form1', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta1" onchange="validacion('form1', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta1" onchange="validacion('form1', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta1" onchange="validacion('form1', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          
          <div id="form2">
            <label><b>2.-Al leer, oigo las palabras en mi cabeza o leo en voz alta.</b></label><br>
            <input type = "checkbox" name = "pregunta2" onchange="validacion('form2', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta2" onchange="validacion('form2', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta2" onchange="validacion('form2', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta2" onchange="validacion('form2', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta2" onchange="validacion('form2', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          
          <div id="form3">
            <label><b>3.-Necesito habla las cosas para entenderlas mejor.</b></label><br>
            <input type = "checkbox" name = "pregunta3" onchange="validacion('form3', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta3" onchange="validacion('form3', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta3" onchange="validacion('form3', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta3" onchange="validacion('form3', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta3" onchange="validacion('form3', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          
          <div id="form4">
            <label><b>4.-No me gusta leer o escuchar instrucciones, prefiero simplemente comenzar a hacer las cosas.</b></label><br>
            <input type = "checkbox" name = "pregunta4" onchange="validacion('form4', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta4" onchange="validacion('form4', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta4" onchange="validacion('form4', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta4" onchange="validacion('form4', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta4" onchange="validacion('form4', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form5">
            <label><b>5.-Puedo visualizar imágenes en mi cabeza.</b></label><br>
            <input type = "checkbox" name = "pregunta5" onchange="validacion('form5', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta5" onchange="validacion('form5', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta5" onchange="validacion('form5', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta5" onchange="validacion('form5', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta5" onchange="validacion('form5', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form6">
            <label><b>6.-Puedo estudiar mejor si escucho música.</b></label><br>
            <input type = "checkbox" name = "pregunta6" onchange="validacion('form6', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta6" onchange="validacion('form6', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta6" onchange="validacion('form6', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta6" onchange="validacion('form6', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta6" onchange="validacion('form6', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form7">
            <label><b>7.-Necesito recreos frecuentes cuando estudios.</b></label><br>
            <input type = "checkbox" name = "pregunta7" onchange="validacion('form7', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta7" onchange="validacion('form7', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta7" onchange="validacion('form7', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta7" onchange="validacion('form7', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta7" onchange="validacion('form7', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form8">
            <label><b>8.-Pienso mejor cuando tengo tengo la libertadad de moverme, estar sentado detrás de un escritorio no es para mí.</b></label><br>
            <input type = "checkbox" name = "pregunta8" onchange="validacion('form8', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta8" onchange="validacion('form8', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta8" onchange="validacion('form8', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta8" onchange="validacion('form8', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta8" onchange="validacion('form8', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form9">
            <label><b>9.-Tomo muchas notas de lo que leo y escucho.</b></label><br>
            <input type = "checkbox" name = "pregunta9" onchange="validacion('form9', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta9" onchange="validacion('form9', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta9" onchange="validacion('form9', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta9" onchange="validacion('form9', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta9" onchange="validacion('form9', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form10">
            <label><b>10.-Me ayuda a MIRAR a la persona que está hablando. Me mantiene enfocado.</b></label><br>
            <input type = "checkbox" name = "pregunta10" onchange="validacion('form10', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta10" onchange="validacion('form10', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta10" onchange="validacion('form10', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta10" onchange="validacion('form10', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta10" onchange="validacion('form10', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form11">
            <label><b>11.-Se me hace difícil entender lo que una persona está diciendo si hay ruidos alrededor.</b></label><br>
            <input type = "checkbox" name = "pregunta11" onchange="validacion('form11', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta11" onchange="validacion('form11', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta11" onchange="validacion('form11', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta11" onchange="validacion('form11', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta11" onchange="validacion('form11', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form12">
            <label><b>12.-Prefiero que alguien me diga cómo tengo que hacer las cosas que leer las instrucciones.</b></label><br>
            <input type = "checkbox" name = "pregunta12" onchange="validacion('form12', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta12" onchange="validacion('form12', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta12" onchange="validacion('form12', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta12" onchange="validacion('form12', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta12" onchange="validacion('form12', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form13">
            <label><b>13.-Prefiero escuchar una conferencia o una grabación a leer un libro.</b></label><br>
            <input type = "checkbox" name = "pregunta13" onchange="validacion('form13', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta13" onchange="validacion('form13', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta13" onchange="validacion('form13', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta13" onchange="validacion('form13', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta13" onchange="validacion('form13', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form14">
            <label><b>14.-Cuando no puedo pensar en una palabra especifica, uso mis manos y llamo al objeto "coso".</b></label><br>
            <input type = "checkbox" name = "pregunta14" onchange="validacion('form14', this)" value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta14" onchange="validacion('form14', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta14" onchange="validacion('form14', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta14" onchange="validacion('form14', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta14" onchange="validacion('form14', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form15">
            <label><b>15.-Puedo seguir facilmente a una persona que está hablando aunque mi cabeza esté hacia abajo o me encuetre mirando por una ventana.</b></label><br>
            <input type = "checkbox" name = "pregunta15" onchange="validacion('form15', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta15" onchange="validacion('form15', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta15" onchange="validacion('form15', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta15" onchange="validacion('form15', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta15" onchange="validacion('form15', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form16">
            <label><b>16.-Es mas fácil para mi hacer un trabajo en un lugar tranquilo</b></label><br>
            <input type = "checkbox" name = "pregunta16" onchange="validacion('form16', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta16" onchange="validacion('form16', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta16" onchange="validacion('form16', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta16" onchange="validacion('form16', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta16" onchange="validacion('form16', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form17">
            <label><b>17.-Me resulta fácil entender mapas,tablas y gráficos.</b></label><br>
            <input type = "checkbox" name = "pregunta17" onchange="validacion('form17', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta17" onchange="validacion('form17', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta17" onchange="validacion('form17', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta17" onchange="validacion('form17', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta17" onchange="validacion('form17', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form18">
            <label><b>18.-Cuando comienzo un artículo o un libro, prefiero espiar la última página.</b></label><br>
            <input type = "checkbox" name = "pregunta18" onchange="validacion('form18', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta18" onchange="validacion('form18', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta18" onchange="validacion('form18', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta18" onchange="validacion('form18', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta18" onchange="validacion('form18', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form19">
            <label><b>19.-Recuerdo mejor lo que la gente dice que su aspecto..</b></label><br>
            <input type = "checkbox" name = "pregunta19" onchange="validacion('form19', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta19" onchange="validacion('form19', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta19" onchange="validacion('form19', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta19" onchange="validacion('form19', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta19" onchange="validacion('form19', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form20">
            <label><b>20.-Recuerdo mejor si estudio en voz alta con alguien.</b></label><br>
            <input type = "checkbox" name = "pregunta20" onchange="validacion('form20', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta20" onchange="validacion('form20', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta20" onchange="validacion('form20', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta20" onchange="validacion('form20', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta20" onchange="validacion('form20', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form21">
            <label><b>21.-Tomo notas. pero nunca vuelvo a releerlas. </b></label><br>
            <input type = "checkbox" name = "pregunta21" onchange="validacion('form21', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta21" onchange="validacion('form21', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta21" onchange="validacion('form21', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta21" onchange="validacion('form21', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta21" onchange="validacion('form21', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form22">
            <label><b>22.-Cuando estoy concentrado leyendo o escribiendo, la radio me molesta.</b></label><br>
            <input type = "checkbox" name = "pregunta22" onchange="validacion('form22', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta22" onchange="validacion('form22', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta22" onchange="validacion('form22', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta22" onchange="validacion('form22', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta22" onchange="validacion('form22', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form23">
            <label><b>23.-Me resulta difícil crear imágenes en mi cabeza.</b></label><br>
            <input type = "checkbox" name = "pregunta23" onchange="validacion('form23', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta23" onchange="validacion('form23', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta23" onchange="validacion('form23', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta23" onchange="validacion('form23', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta23" onchange="validacion('form23', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form24">
            <label><b>24.-Me resulta útil decir en voz alta las tareas que tengo para hacer.</b></label><br>
            <input type = "checkbox" name = "pregunta24" onchange="validacion('form24', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta24" onchange="validacion('form24', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta24" onchange="validacion('form24', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta24" onchange="validacion('form24', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta24" onchange="validacion('form24', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form25">
            <label><b>25.-Mi cuaderno y mi escritorio pueden verse un desastre, pero sé exactamente dónde está cada cosa.</b></label><br>
            <input type = "checkbox" name = "pregunta25" onchange="validacion('form25', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta25" onchange="validacion('form25', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta25" onchange="validacion('form25', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta25" onchange="validacion('form25', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta25" onchange="validacion('form25', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form26">
            <label><b>26.-Cuando estoy en un examen, puedo "ver" la página en el libro de textos y la respuesta.</b></label><br>
            <input type = "checkbox" name = "pregunta26" onchange="validacion('form26', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta26" onchange="validacion('form26', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta26" onchange="validacion('form26', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta26" onchange="validacion('form26', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta26" onchange="validacion('form26', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form27">
            <label><b>27.-No puedo recordar una broma lo suficiente para contarla luego.</b></label><br>
            <input type = "checkbox" name = "pregunta27" onchange="validacion('form27', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta27" onchange="validacion('form27', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta27" onchange="validacion('form27', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta27" onchange="validacion('form27', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta27" onchange="validacion('form27', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form28">
            <label><b>28.-Al aprender algo nuevo, prefiero escuchar la información, luego leer y luego hacerlo.</b></label><br>
            <input type = "checkbox" name = "pregunta28" onchange="validacion('form28', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta28" onchange="validacion('form28', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta28" onchange="validacion('form28', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta28" onchange="validacion('form28', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta28" onchange="validacion('form28', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form29">
            <label><b>29.-Me gusta completar una tarea antes de comenzar otra.</b></label><br>
            <input type = "checkbox" name = "pregunta29" onchange="validacion('form29', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta29" onchange="validacion('form29', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta29" onchange="validacion('form29', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta29" onchange="validacion('form29', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta29" onchange="validacion('form29', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form30">
            <label><b>30.-Uso mis dedos para contar y muevo los labios cuando leo.</b></label><br>
            <input type = "checkbox" name = "pregunta30" onchange="validacion('form30', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta30" onchange="validacion('form30', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta30" onchange="validacion('form30', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta30" onchange="validacion('form30', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta30" onchange="validacion('form30', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form31">
            <label><b>31.-No me gusta releer mi trabajo.</b></label><br>
            <input type = "checkbox" name = "pregunta31" onchange="validacion('form31', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta31" onchange="validacion('form31', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta31" onchange="validacion('form31', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta31" onchange="validacion('form31', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta31" onchange="validacion('form31', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form32">
            <label><b>32.-Cuando estoy tratando de recordar algo nuevo, por ejemplo, un número de teléfono, me ayuda formarme una imagen mental para lograrlo.</b></label><br>
            <input type = "checkbox" name = "pregunta32" onchange="validacion('form32', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta32" onchange="validacion('form32', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta32" onchange="validacion('form32', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta32" onchange="validacion('form32', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta32" onchange="validacion('form32', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form33">
            <label><b>33.-Para obtener una nota extra, prefiero grabar un informe a escribirlo.</b></label><br>
            <input type = "checkbox" name = "pregunta33" onchange="validacion('form33', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta33" onchange="validacion('form33', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta33" onchange="validacion('form33', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta33" onchange="validacion('form33', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta33" onchange="validacion('form33', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form34">
            <label><b>34.-Fantaceo en clase.</b></label><br>
            <input type = "checkbox" name = "pregunta34" onchange="validacion('form34', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta34" onchange="validacion('form34', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta34" onchange="validacion('form34', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta34" onchange="validacion('form34', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta34" onchange="validacion('form34', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form35">
            <label><b>35.-Para obtener una calificacion extra,prefiero crear un proyecto a escribir un informe.</b></label><br>
            <input type = "checkbox" name = "pregunta35" onchange="validacion('form35', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta35" onchange="validacion('form35', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta35" onchange="validacion('form35', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta35" onchange="validacion('form35', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta35" onchange="validacion('form35', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <div id="form36">
            <label><b>36.-Cuando tengo una gran idea debo escribirla inmediatamente, o la olvido con facilidad.</b></label><br>
            <input type = "checkbox" name = "pregunta36" onchange="validacion('form36', this)"  value = "5" /><label>Casi siempre</label>
            <input type = "checkbox" name = "pregunta36" onchange="validacion('form36', this)" value = "4" /><label>Frecuentemente</label>
            <input type = "checkbox" name = "pregunta36" onchange="validacion('form36', this)" value = "3" /><label>A veces</label>
            <input type = "checkbox" name = "pregunta36" onchange="validacion('form36', this)" value = "2" /><label>Rara vez</label>
            <input type = "checkbox" name = "pregunta36" onchange="validacion('form36', this)" value = "1" /><label>Casi nunca</label>
            <br><br>
          </div>
          <input class="btn btn-success center-block " type="submit" name="Inicar" value="Guardar Test"></input>
          <br><br><br><br>
        </form>
        <!--Fin de contenido de caja de texto--> 
      </div>
      <!--Fin Contenido central-->
      
    </div>
    <!--Fin Contenedor medio-->
    <?php include "../menus/PiePagina.php";?>
    <!--Inicio de pie de pagina-->
    <div class="container">
      <?php //include 'pie_pagina.php';?>
    </div>
    <!--fin de pie de pagina-->
  </body>
  </html>