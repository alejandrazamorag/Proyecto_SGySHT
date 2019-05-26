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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/jquery.min.js"></script>

  <!--Icono en pestaña-->
<link rel="icon" type="image/vnd.microsoft.icon" href="./../../../imagenes/Mapa.ico">

  <!--STYLOS-->
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
   <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuAlumno.css">


  <!--Iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script language="javascript" type="text/javascript">
    function validar() {
    //obteniendo el valor que se puso en el campo text del formulario

        miCampoTexto = document.getElementById('Causas').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de causas esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          AcuerdosRealizados = '';
          CadenaCausas = miCampoTexto.split('\n');
          //alert(CadenaCausas);
          for (var i = 0; i < CadenaCausas.length; i++) {
            //alert('AYYY');
            CadenaCausas[i].trim();
            TamanoCadena = CadenaCausas[i].length;
            //alert(TamanoCadena);
            primer = CadenaCausas[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaCausas[i].substr(-1);
            //alert(ultimo);
            
            if((primer == '-')&&(ultimo == '.')&&(TamanoCadena == 2)){
              //alert('-.');
              AcuerdosRealizados = AcuerdosRealizados + '';
            }else if((primer == '-')&&(ultimo == '-')){
              //alert('--');
              AcuerdosRealizados = AcuerdosRealizados + '';
            }else if((primer == '.')&&(ultimo == '.')){
              //alert('..');
              AcuerdosRealizados = AcuerdosRealizados + '';
            }else if((primer == '')&&(ultimo == '')){
              //alert('vacio');
              AcuerdosRealizados = AcuerdosRealizados + '';
            }else if((primer == '-')&&(ultimo > 0) && (TamanoCadena == 2)){
              //alert('Es numerooo');
              AcuerdosRealizados = AcuerdosRealizados + '';
            }else{
              AcuerdosRealizados = "a";
            }
          }

          if(AcuerdosRealizados.length == 0){
            alert('Las causas no son validas verifique por favor');
            return false;
          }
        }

        miCampoTexto = document.getElementById('Sugerencias').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de sugerencias esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          ObservacionesHP = '';
          CadenaSugerencias = miCampoTexto.split('\n');
          //alert(CadenaSugerencias);
          for (var i = 0; i < CadenaSugerencias.length; i++) {
            //alert('AYYY');
            CadenaSugerencias[i].trim();
            TamanoCadena = CadenaSugerencias[i].length;
            //alert(TamanoCadena);
            primer = CadenaSugerencias[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaSugerencias[i].substr(-1);
            //alert(ultimo);
            
            if((primer == '-')&&(ultimo == '.')&&(TamanoCadena == 2)){
              //alert('-.');
              ObservacionesHP = ObservacionesHP + '';
            }else if((primer == '-')&&(ultimo == '-')){
              //alert('--');
              ObservacionesHP = ObservacionesHP + '';
            }else if((primer == '.')&&(ultimo == '.')){
              //alert('..');
              ObservacionesHP = ObservacionesHP + '';
            }else if((primer == '')&&(ultimo == '')){
              //alert('vacio');
              ObservacionesHP = ObservacionesHP + '';
            }else if((primer == '-')&&(ultimo > 0) && (TamanoCadena == 2)){
              //alert('Es numerooo');
              ObservacionesHP = ObservacionesHP + '';
            }else{
              ObservacionesHP = "a";
            }
          }

          if(ObservacionesHP.length == 0){
            alert('Las sugerencias no son validas verifique por favor');
            return false;
          }
        }
  ///
  miCampoTexto = document.getElementById('Compromisos').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de compromisos esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          ObservacionesCA = '';
          CadenaCompromisos = miCampoTexto.split('\n');
          //alert(CadenaSugerencias);
          for (var i = 0; i < CadenaCompromisos.length; i++) {
            //alert('AYYY');
            CadenaCompromisos[i].trim();
            TamanoCadena = CadenaCompromisos[i].length;
            //alert(TamanoCadena);
            primer = CadenaCompromisos[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaCompromisos[i].substr(-1);
            //alert(ultimo);
            
            if((primer == '-')&&(ultimo == '.')&&(TamanoCadena == 2)){
              //alert('-.');
              ObservacionesCA = ObservacionesCA + '';
            }else if((primer == '-')&&(ultimo == '-')){
              //alert('--');
              ObservacionesCA = ObservacionesCA + '';
            }else if((primer == '.')&&(ultimo == '.')){
              //alert('..');
              ObservacionesCA = ObservacionesCA + '';
            }else if((primer == '')&&(ultimo == '')){
              //alert('vacio');
              ObservacionesCA = ObservacionesCA + '';
            }else if((primer == '-')&&(ultimo > 0) && (TamanoCadena == 2)){
              //alert('Es numerooo');
              ObservacionesCA = ObservacionesCA + '';
            }else{
              ObservacionesCA = "a";
            }
          }

          if(ObservacionesCA.length == 0){
            alert('Los compromiso no son validos verifique por favor');
            return false;
          }
        }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////
       miCampoTexto = document.getElementById('Comentarios').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de Comentarios esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          ObservacionesCom = '';
          CadenaComentarios = miCampoTexto.split('\n');
          //alert(CadenaSugerencias);
          for (var i = 0; i < CadenaComentarios.length; i++) {
            //alert('AYYY');
            CadenaComentarios[i].trim();
            TamanoCadena = CadenaComentarios[i].length;
            //alert(TamanoCadena);
            primer = CadenaComentarios[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaComentarios[i].substr(-1);
            //alert(ultimo);
            
            if((primer == '-')&&(ultimo == '.')&&(TamanoCadena == 2)){
              //alert('-.');
              ObservacionesCom = ObservacionesCom + '';
            }else if((primer == '-')&&(ultimo == '-')){
              //alert('--');
              ObservacionesCom = ObservacionesCom + '';
            }else if((primer == '.')&&(ultimo == '.')){
              //alert('..');
              ObservacionesCom = ObservacionesCom + '';
            }else if((primer == '')&&(ultimo == '')){
              //alert('vacio');
              ObservacionesCom = ObservacionesCom + '';
            }else if((primer == '-')&&(ultimo > 0) && (TamanoCadena == 2)){
              //alert('Es numerooo');
              ObservacionesCom = ObservacionesCom + '';
            }else{
              ObservacionesCom = "a";
            }
          }

          if(ObservacionesCom.length == 0){
            alert('Comentarios no validos verifique por favor');
            return false;
          }
        }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////


  return true;
}
</script>
<script>
  function myFunction(event) {
    var codigo=window.event.keyCode;
    var x = document.getElementById("Causas");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("Causas").value+"\n-";
    }
  }

  function myFunctionSugerencias(event) {
    var codigo=window.event.keyCode;
    var x = document.getElementById("Sugerencias");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("Sugerencias").value+"\n-";
    }
  }

  function myFunctionCompromisos(event) {
    var codigo=window.event.keyCode;
    var x = document.getElementById("Compromisos");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("Compromisos").value+"\n-";
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function myFunctionComentarios(event) {
    var codigo=window.event.keyCode;
    var x = document.getElementById("Comentarios");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("Comentarios").value+"\n-";
    }
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>
</head>

<script type="text/javascript">
  function NumerosLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
      return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9-_.,?)(¿@\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }
</script>
<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
    <br>
    <?php  include "../menus/MenuAlumno.php";
                         menuAlumnoEncuesta();?>
  </div>
  <!--Fin contenedor Cabecera-->

  <!--Inicio Contenedor medio-->
  <div class="container">
    <!--Poner titulo o nombre -->
    <br><center><h2> Encuesta de reprobación coordinador de tutorías</h2></center><br><br>
    <!--Poner titulo o nombre -->

    <div class="row">
      <!--Inicio Contenido central-->
      <div class="col-sm-1"></div>
      <?php 
      
      $Fecha = date("Y-m-d");
      $idTutor = " ";
      $Cont = 0;

      include_once "../../clases/MySQLConector.php";

      $Mysql = new MySQLConector();
      $Mysql->Conectar();
      $Consulta6 = "SELECT personaltutores.idPersonal,CONCAT(personal.Nombre,' ',personal.ApellidoP,' ',personal.ApellidoM) AS NombreTutor FROM personaltutores INNER JOIN personal ON personaltutores.idPersonal= personal.idPersonal INNER JOIN grupos ON personaltutores.idGrupos=grupos.idGrupos INNER JOIN alumno ON alumno.Grupos_idGrupos = grupos.idGrupos WHERE alumno.idAlumno= '".$_SESSION['IdUsuarioAlumno']."'";
      $Resultado6 = $Mysql->Consulta($Consulta6);
      if($Resultado6)
        while ($fila6 = mysqli_fetch_array($Resultado6)){ 
          $idTutor = $fila6['idPersonal']; 
          $NombreTutor = $fila6['NombreTutor'];
        }
        ?>
        <?php
        if (!isset($_POST['Causas'])&&!isset($_POST['Sugerencias']) &&!isset($_POST['Compromisos'])&&!isset($_POST['Comentarios'])) {
          ?>
          <div class="col-sm-10">
            <!--Inicio de contenido de caja de texto--> 
            <form method="POST" action="AgregarEncuestaReprobacion.php" onsubmit="return validar()" >
            <div class="row">
              </div>
              <?php
              include_once "../../clases/MySQLConector.php";
              $Mysql = new MySQLConector();
              $Mysql->Conectar();

              $Consulta = "SELECT alumno.Grupos_idGrupos,CONCAT(alumno.Nombre,' ', alumno.ApellidoP,' ',alumno.ApellidoM) AS NombreAlumno,grupos.Grado, grupos.Grupo, carreras.Nombre AS NombreCarrera FROM alumno INNER JOIN grupos ON alumno.Grupos_idGrupos = grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras = carreras.idCarreras WHERE alumno.idAlumno ='".$_SESSION['IdUsuarioAlumno']."'";
              $Resultado = $Mysql->Consulta($Consulta);

              while ($fila = $Resultado->fetch_assoc()) {
                $Parcial=$_POST['Parcial'];
                ?>
                <div class="row">
                  <div class="col-md-12">

                    <label style="text-align: justify;">Nombre del alumno(a): <b><?php echo $fila['NombreAlumno']?></b><br>Carrera y semestre: <b><?php echo $fila['Grado']?></b>-<b><?php echo $fila['Grupo']?></b> de <b><?php echo $fila['NombreCarrera']?></b><br>Parcial: <b><?php echo $Parcial?></b> Fecha: <b><?php echo $Fecha?></b></label>
                  </div>
                </div>
                <?php 
                  echo "<input type=\"hidden\" value=".$fila['Grupos_idGrupos']." id=\"idGrupo\" name=\"idGrupo\">" ;
                  echo "<input type=\"hidden\" value=".$Parcial." id=\"ParcialG\" name=\"ParcialG\">";
                ?>
              <?php }?>
              <br>
              <div class="row">
                  <div class="col-md-6">
                    <b>I.Nombre de la(s) materia(s) reprobada(s)</b>
                    <br>
                    <?php 
                         $Mysql = new MySQLConector();
                            $Mysql->Conectar();
                            $Consulta1 = "SELECT calificaciones.idCalificaciones,materia.Nombre,calificaciones.SegundoParcial, materia.Componente, (CASE WHEN (materia.Componente='B')AND(calificaciones.SegundoParcial<6) THEN 'Esta reprobada' WHEN (materia.Componente='B')AND(calificaciones.SegundoParcial>=6) THEN 'Esta aprobada' WHEN (materia.Componente='P')AND(calificaciones.SegundoParcial<8) THEN 'Esta reprobada' WHEN (materia.Componente='P')AND(calificaciones.SegundoParcial>=8) THEN 'Esta aprobada' END) AS respuesta FROM calificaciones INNER JOIN materiagruposdocentes ON materiagruposdocentes.idMateriaGruposDocentes= calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria= materia.idMateria INNER JOIN grupos ON calificaciones.idGrupo=grupos.idGrupos WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."' AND grupos.Estatus=1;";
                              $Resultado1=$Mysql->Consulta($Consulta1);
                              $MateriasReprobadas='';
                              while($row=mysqli_fetch_array($Resultado1)){
                                if ($row[4]=='Esta reprobada') {
                                  $MateriasReprobadas=$MateriasReprobadas.$row['Nombre']."|";
                                }
                              }

                             $CadenaCompromisosPadres =explode("|", $MateriasReprobadas);
                             for ($i=0; $i < count($CadenaCompromisosPadres); $i++) {
                                 echo $CadenaCompromisosPadres[$i];
                                 ?>
                                 <br>
                                 <?php  
                              }
                               echo "<input type=\"hidden\" value='".$MateriasReprobadas."' id=\"Materias\" name=\"Materias\">";

                              //echo($MateriasReprobadas);
                    ?>
                </div>
                <div class="col-md-12">
                  <div class="flex-row">
                    <b>II.¿Cuáles crees que son las causas por las que reprobaste? Menciona de la mas importante a la menos:</b>
                    <textarea type="text" name="Causas" class="m-2 form-control" id="Causas" placeholder="Observaciones" onkeyup="myFunction(event)"  onkeypress="return NumerosLetras(event);" rows="4">-</textarea>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="flex-row">
                    <b>III. Qué sugerencias puedes hacer para mejorar las materias: </b>
                    <textarea type="text" name="Sugerencias" id="Sugerencias" class="m-2 form-control" id="formGroupExampleInput" placeholder="Observaciones" onkeyup="myFunctionSugerencias(event)"  onkeypress="return NumerosLetras(event);" rows="3">-</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="flex-row">
                    <b>IV. Cuáles son los compromisos que tu estableces:</b>
                    <textarea type="text" name="Compromisos" id="Compromisos" class="m-2 form-control" id="formGroupExampleInput" placeholder="Observaciones" onkeyup="myFunctionCompromisos(event)"  onkeypress="return NumerosLetras(event);" rows="3">-</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="flex-row">
                    <b>V. Expresa tus comentarios:</b>
                    <textarea type="text" name="Comentarios" id="Comentarios" class="m-2 form-control" id="formGroupExampleInput" placeholder="Observaciones" onkeyup="myFunctionComentarios(event)"  onkeypress="return NumerosLetras(event);" rows="3">-</textarea>
                  </div>
                </div>
              </div>
               <div class="col-md-12 list-inline">
                <b>Padrey/o tutor legal </b>
                <select  name="Padre" class="m-1 custom-select"> 
                  <?php
                  include_once "../../clases/MySQLConector.php";

                  $Mysql = new MySQLConector();
                  $Mysql->Conectar();
                  $Consulta2 = "SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM FROM familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdUsuarioAlumno']."' AND familiares.Tutor = '1';";
                  $Resultado2 = $Mysql->Consulta($Consulta2);
                  if($Resultado2)
                    while ($fila2 = mysqli_fetch_array($Resultado2)){           
                      echo " <option value=\"{$fila2['idFamiliares']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
                    }
                    ?>
                  </select>
                </div>
              <br>
              <button type="submit" class="btn btn-success glyphicon glyphicon-plus"> Guardar</button><br><br>
              <br>
              <br>
            </form>  

            <!--Fin de contenido de caja de texto--> 

            <?php
          }else{
            $MateriasRep=$_POST['Materias'];
            $ParcialGuardar=$_POST['ParcialG'];
            $idFamiliares = $_POST['Padre'];
            $idGrupo = $_POST['idGrupo'];
            //echo "<script language='javascript'>alert('".$MateriasRep."')</script>";

            $CadenaCausas =explode("\n", $_POST['Causas']);
            $Causas = '';
            for ($i=0; $i < count($CadenaCausas); $i++) {
              $CadenaCausas[$i] = trim($CadenaCausas[$i]);
              $primer = substr($CadenaCausas[$i],0,1);
              $ultimo = substr($CadenaCausas[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
              $TamanoCadena = strlen($CadenaCausas[$i]);
                    //print_r($TamanoCadena);

              if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
                $Causas = $Causas.substr($CadenaCausas[$i],0,$TamanoCadena).'.'.'|';
              }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
                $Causas = $Causas.'-'.substr($CadenaCausas[$i],0,$TamanoCadena).'.'.'|';
              } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
                $Causas = $Causas.$CadenaCausas[$i].'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
                $Causas = $Causas;
              }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
                $Causas = $Causas;
              }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
                $Causas = $Causas.'-'.substr($CadenaCausas[$i],0,$TamanoCadena).'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
                $Causas = $Causas;
              }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
                $Causas = $Causas;
              }
                  //echo "<script language='javascript'>alert('".$Causas."')</script>";
            }

            $CadenaSugerencias =explode("\n", $_POST['Sugerencias']);
            $Sugerencias = '';
            for ($i=0; $i < count($CadenaSugerencias); $i++) {
              $CadenaSugerencias[$i] = trim($CadenaSugerencias[$i]);
              $primer = substr($CadenaSugerencias[$i],0,1);
              $ultimo = substr($CadenaSugerencias[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
              $TamanoCadena = strlen($CadenaSugerencias[$i]);
                    //print_r($TamanoCadena);

              if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
                //print_r('a');
                $Sugerencias = $Sugerencias.substr($CadenaSugerencias[$i],0,$TamanoCadena).'.'.'|';
              }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
                //print_r('b');
                $Sugerencias = $Sugerencias.'-'.substr($CadenaSugerencias[$i],0,$TamanoCadena).'.'.'|';
              } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
                $Sugerencias = $Sugerencias.$CadenaSugerencias[$i].'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
                $Sugerencias = $Sugerencias;
              }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
                $Sugerencias = $Sugerencias;
              }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
                $Sugerencias = $Sugerencias.'-'.substr($CadenaSugerencias[$i],0,$TamanoCadena).'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
                $Sugerencias = $Sugerencias;
              }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
                $Sugerencias = $Sugerencias;
              }
                  //echo "<script language='javascript'>alert('".$Sugerencias."')</script>";
            }


            $CadenaCompromisos =explode("\n", $_POST['Compromisos']);
            $Compromisos = '';
            for ($i=0; $i < count($CadenaCompromisos); $i++) {
              $CadenaCompromisos[$i] = trim($CadenaCompromisos[$i]);
              $primer = substr($CadenaCompromisos[$i],0,1);
              $ultimo = substr($CadenaCompromisos[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
              $TamanoCadena = strlen($CadenaCompromisos[$i]);
                    //print_r($TamanoCadena);

              if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
                //print_r('a');
                $Compromisos = $Compromisos.substr($CadenaCompromisos[$i],0,$TamanoCadena).'.'.'|';
              }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
                //print_r('b');
                $Compromisos = $Compromisos.'-'.substr($CadenaCompromisos[$i],0,$TamanoCadena).'.'.'|';
              } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
                $Compromisos = $Compromisos.$CadenaCompromisos[$i].'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
                $Compromisos = $Compromisos;
              }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
                $Compromisos = $Compromisos;
              }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
                $Compromisos = $Compromisos.'-'.substr($CadenaCompromisos[$i],0,$TamanoCadena).'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
                $Compromisos = $Compromisos;
              }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
                $Compromisos = $Compromisos;
              }
                  //echo "<script language='javascript'>alert('".$Compromisos."')</script>";
            }



            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $CadenaComentarios =explode("\n", $_POST['Comentarios']);
            $Comentarios = '';
            for ($i=0; $i < count($CadenaComentarios); $i++) {
              $CadenaComentarios[$i] = trim($CadenaComentarios[$i]);
              $primer = substr($CadenaComentarios[$i],0,1);
              $ultimo = substr($CadenaComentarios[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
              $TamanoCadena = strlen($CadenaComentarios[$i]);
                    //print_r($TamanoCadena);

              if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
                //print_r('a');
                $Comentarios = $Comentarios.substr($CadenaComentarios[$i],0,$TamanoCadena).'.'.'|';
              }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
                //print_r('b');
                $Comentarios = $Comentarios.'-'.substr($CadenaComentarios[$i],0,$TamanoCadena).'.'.'|';
              } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
                $Comentarios = $Comentarios.$CadenaComentarios[$i].'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
                $Comentarios = $Comentarios;
              }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
                $Comentarios = $Comentarios;
              }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
                $Comentarios = $Comentarios.'-'.substr($CadenaComentarios[$i],0,$TamanoCadena).'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
                $Comentarios = $Comentarios;
              }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
                $Comentarios = $Comentarios;
              }
                  //echo "<script language='javascript'>alert('".$Comentarios."')</script>";
            }

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            include_once "../../clases/SQLControlador.php";
            include_once "../../clases/EncuestaReprobacion.php";

            $EncuestaReprobacion = new EncuestaReprobacion();
            $EncuestaReprobacion->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
            $EncuestaReprobacion->setMateriasReprobadas($MateriasRep);
            $EncuestaReprobacion->setParcial($ParcialGuardar);
            $EncuestaReprobacion->setCausas($Causas);
            $EncuestaReprobacion->setSugerencia($Sugerencias);
            $EncuestaReprobacion->setCompromisos($Compromisos);
            $EncuestaReprobacion->setiComentarios($Comentarios);
            $EncuestaReprobacion->setidGrupo($idGrupo);
            $EncuestaReprobacion->setidTutor($idTutor);
            $EncuestaReprobacion->setidFamiliar($idFamiliares);
            $EncuestaReprobacion->setFecha($Fecha);
            $SQLControlador = new SQLControlador();
            $SQLControlador->AgregarEncuestaReprobacion($EncuestaReprobacion);
          }
          ?>
        </div>
        <!--Fin Contenido central-->
      </div>
      <!--Fin Contenedor medio-->

      <!--Inicio de pie de pagina-->
     
      <?php include '../menus/PiePagina.php';?>
      <!--fin de pie de pagina-->
    </body>
    </html>
    <script type="text/javascript">
      $(document).ready(function(){

        $('#Causas').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Sugerencias').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#Compromisos').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });


         $('#Comentarios').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });
      });
    </script>