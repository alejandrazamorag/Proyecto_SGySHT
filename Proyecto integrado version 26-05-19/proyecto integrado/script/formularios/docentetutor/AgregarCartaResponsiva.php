<?php 
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinDocenteTutor']) && !isset ($_SESSION['IdDocenteTutor']) && !isset ($_SESSION['IdAlumnoDocenteTutor']))
{
   echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
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
  <link rel="icon" type="image/vnd.microsoft.icon" href="../../imagenes/Mapa.ico">


  <!--STYLOS-->
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">


  <!--Iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script language="javascript" type="text/javascript">
    function validar() {
    //obteniendo el valor que se puso en el campo text del formulario
    miCampoTexto = document.getElementById('Lugar').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Lugar se encuentra vacío!');
          return false;
        }
        miCampoTexto = document.getElementById('Motivo').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo motivo se encuentra vacío!');
          return false;
        }


        miCampoTexto = document.getElementById('MotivoSolicitud').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de motivos de solicitud esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          AcuerdosRealizados = '';
          CadenaMotivoSolicitud = miCampoTexto.split('\n');
          //alert(CadenaMotivoSolicitud);
          for (var i = 0; i < CadenaMotivoSolicitud.length; i++) {
            //alert('AYYY');
            CadenaMotivoSolicitud[i].trim();
            TamanoCadena = CadenaMotivoSolicitud[i].length;
            //alert(TamanoCadena);
            primer = CadenaMotivoSolicitud[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaMotivoSolicitud[i].substr(-1);
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
            alert('Los motivos de solicitud no son  validas verifique por favor');
            return false;
          }
        }

        miCampoTexto = document.getElementById('ComprimisoPadres').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de compromisos de padres esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          ObservacionesHP = '';
          CadenaComprimisoPadres = miCampoTexto.split('\n');
          //alert(CadenaComprimisoPadres);
          for (var i = 0; i < CadenaComprimisoPadres.length; i++) {
            //alert('AYYY');
            CadenaComprimisoPadres[i].trim();
            TamanoCadena = CadenaComprimisoPadres[i].length;
            //alert(TamanoCadena);
            primer = CadenaComprimisoPadres[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaComprimisoPadres[i].substr(-1);
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
            alert('Los compromiso de padres de familia no  son validos verifique por favor');
            return false;
          }
        }
  /////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///
  miCampoTexto = document.getElementById('CompromisoAlumnos').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de compromisos de alumnos esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          ObservacionesCA = '';
          CadenaCompromisoAlumnos = miCampoTexto.split('\n');
          //alert(CadenaComprimisoPadres);
          for (var i = 0; i < CadenaCompromisoAlumnos.length; i++) {
            //alert('AYYY');
            CadenaCompromisoAlumnos[i].trim();
            TamanoCadena = CadenaCompromisoAlumnos[i].length;
            //alert(TamanoCadena);
            primer = CadenaCompromisoAlumnos[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaCompromisoAlumnos[i].substr(-1);
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
            alert('Los compromiso de alumnos no son validas verifique porfavor');
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
    var x = document.getElementById("MotivoSolicitud");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("MotivoSolicitud").value+"\n-";
    }
  }

  function myFunctionCompromisosPadres(event) {
    var codigo=window.event.keyCode;
    var x = document.getElementById("ComprimisoPadres");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("ComprimisoPadres").value+"\n-";
    }
  }

  function myFunctionCompromisosAlumno(event) {
    var codigo=window.event.keyCode;
    var x = document.getElementById("CompromisoAlumnos");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("CompromisoAlumnos").value+"\n-";
    }
  }
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
    <?php include "../menus/MenuDocenteTutor.php";
    MenuAlumnoDocenteCartaResponsiva();?>
  </div>
  <!--Fin contenedor Cabecera-->

  <!--Inicio Contenedor medio-->
  <div class="container">
    <!--Poner titulo o nombre -->
    <br><center><h2> Carta Responsiva</h2></center>
    <!--Poner titulo o nombre -->

    <div class="row">
      <!--Inicio Contenido central-->
      <div class="col-sm-1"></div>
      <?php 
      $Lugar = "Rio Grande Zacatecas";
      $Fecha = date("Y-m-d");
      $idTutor = " ";
      $Cont = 0;

      include_once "../../clases/MySQLConector.php";

      $Mysql = new MySQLConector();
      $Mysql->Conectar();
      $Consulta6 = "SELECT * FROM `personal` WHERE personal.idPersonal = '".$_SESSION['IdDocenteTutor']."'";
      $Resultado6 = $Mysql->Consulta($Consulta6);
      if($Resultado6)
        while ($fila6 = mysqli_fetch_array($Resultado6)){ 
          $idTutor = $fila6['idPersonal']; 
          $NombreTutor = $fila6['Nombre'] ." ". $fila6['ApellidoP'] ." ". $fila6['ApellidoM'];
        }
        ?>
        <?php
        if (!isset($_POST['Lugar'])&&!isset($_POST['Disciplina']) &&!isset($_POST['MotivoSolicitud'])&&!isset($_POST['ComprimisoPadres']) &&!isset($_POST['ComprimisoAlumnos'])) {
          ?>
          <div class="col-sm-10">
            <!--Inicio de contenido de caja de texto--> 
            <form method="POST" action="AgregarCartaResponsiva.php" onsubmit="return validar()" >
             <div class="form-inline justify-content-end">
              <div class="form-group">
                <label for="inputPassword" class="col-form-label" ><b>Lugar: </b></label>
                <?php echo"<input type=\"text\" name=\"Lugar\" id=\"Lugar\" placeholder=\"Lugar\" class=\"form-control m-2\" value=\"".$Lugar."\" maxlength=\"50\"  onkeypress=\"return NumerosLetras(event);\">"; ?>
              </div>
            </div>
            <div class="form-inline justify-content-end">
              <div class="form-group">
                <label for="inputPassword" class="col-form-label"><b>Motivo:</b></label>
                <?php echo"<input type=\"text\" name=\"Motivo\" id=\"Motivo\" placeholder=\"Motivo\" class=\"form-control m-2\" value=\"Disciplina\" maxlength=\"50\"  onkeypress=\"return NumerosLetras(event);\">"; ?>
              </div>
            </div>
            <div class="form-inline justify-content-end">
              <div class="form-group">
                <b>Fecha: </b><label for="Fecha" class="m-1"><?php print_r($Fecha) ?></label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 list-inline">
                Por medio de la presente se hace constar que acude el Sr.(a) 
                <select  name="Padre" class="m-1 custom-select"> 
                  <?php
                  include_once "../../clases/MySQLConector.php";

                  $Mysql = new MySQLConector();
                  $Mysql->Conectar();
                  $Consulta2 = "SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM FROM familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND familiares.Tutor = '1';";
                  $Resultado2 = $Mysql->Consulta($Consulta2);
                  if($Resultado2)
                    while ($fila2 = mysqli_fetch_array($Resultado2)){           
                      echo " <option value=\"{$fila2['idFamiliares']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <?php
              include_once "../../clases/MySQLConector.php";
              $Mysql = new MySQLConector();
              $Mysql->Conectar();

              $Consulta = "SELECT alumno.Grupos_idGrupos, alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.NC, grupos.Grado, grupos.Grupo, carreras.Nombre AS Carrera, domicilio.Calle, domicilio.Numero, domicilio.Localidad, domicilio.Municipio, alumno.Telefono, alumno.Correo, alumno.SS FROM alumno INNER JOIN grupos ON alumno.Grupos_idGrupos = grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras = carreras.idCarreras INNER JOIN domicilio ON alumno.Domicilio_idDomicilio = domicilio.idDomicilio WHERE alumno.idAlumno ='".$_SESSION['IdAlumnoDocenteTutor']."'";
              $Resultado = $Mysql->Consulta($Consulta);

              while ($fila = $Resultado->fetch_assoc()) {
                ?>
                <div class="row">
                  <div class="col-md-12">

                    <label style="text-align: justify;">padre de familia o tutor legal del alumno(a) <b><?php echo $fila['Nombre']?> <?php echo $fila['ApellidoP']?> <?php echo $fila['ApellidoM']?></b> de la carrera de <b><?php echo $fila['Carrera']?></b> del grupo <b><?php echo $fila['Grado']?>-<?php echo $fila['Grupo']?></b> para tratar asuntos de disciplina y académicos de su hijo, ya que es consciente de la importancia y transcendencia que tiene  que su hijo curse con exito su Educación en Nivel Media Superior, así como de la responsabilidad que como tutor(a) le corresponde para contribuir a que lleve a cabo con éxito su preparación académica.</label>
                  </div>
                </div>
                <?php echo "<input type=\"hidden\" value=".$fila['Grupos_idGrupos']." id=\"idGrupo\" name=\"idGrupo\">" ?>
              <?php }?>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="flex-row">
                    Los motivos por que  se ha solicitado la presencia de los padres de familia son los siguientes:  <textarea type="text" name="MotivoSolicitud" class="m-2 form-control" id="MotivoSolicitud" placeholder="Observaciones" onkeyup="myFunction(event)"  onkeypress="return NumerosLetras(event);" rows="4">-</textarea>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="flex-row">
                    Compromiso de los padres de familia <textarea type="text" name="ComprimisoPadres" id="ComprimisoPadres" class="m-2 form-control" id="formGroupExampleInput" placeholder="Observaciones" onkeyup="myFunctionCompromisosPadres(event)"  onkeypress="return NumerosLetras(event);" rows="3">-</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="flex-row">
                    Compromiso de los alumnos<textarea type="text" name="CompromisoAlumnos" id="CompromisoAlumnos" class="m-2 form-control" id="formGroupExampleInput" placeholder="Observaciones" onkeyup="myFunctionCompromisosAlumno(event)"  onkeypress="return NumerosLetras(event);" rows="3">-</textarea>
                  </div>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-success glyphicon glyphicon-plus"> Guardar</button><br><br>
              <br>
              <br>
            </form>     
            <!--Fin de contenido de caja de texto--> 

            <?php
          }else{

            $Lugar=$_POST['Lugar'];
            $Asunto=$_POST['Motivo'];
            $idFamiliares = $_POST['Padre'];
            $idGrupo = $_POST['idGrupo'];

            $CadenaMotivoSolicitud =explode("\n", $_POST['MotivoSolicitud']);
            $MotivoSolicitud = '';
            for ($i=0; $i < count($CadenaMotivoSolicitud); $i++) {
              $CadenaMotivoSolicitud[$i] = trim($CadenaMotivoSolicitud[$i]);
              $primer = substr($CadenaMotivoSolicitud[$i],0,1);
              $ultimo = substr($CadenaMotivoSolicitud[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
              $TamanoCadena = strlen($CadenaMotivoSolicitud[$i]);
                    //print_r($TamanoCadena);

              if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
                $MotivoSolicitud = $MotivoSolicitud.substr($CadenaMotivoSolicitud[$i],0,$TamanoCadena).'.'.'|';
              }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
                $MotivoSolicitud = $MotivoSolicitud.'-'.substr($CadenaMotivoSolicitud[$i],0,$TamanoCadena).'.'.'|';
              } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
                $MotivoSolicitud = $MotivoSolicitud.$CadenaMotivoSolicitud[$i].'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
                $MotivoSolicitud = $MotivoSolicitud;
              }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
                $MotivoSolicitud = $MotivoSolicitud;
              }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
                $MotivoSolicitud = $MotivoSolicitud.'-'.substr($CadenaMotivoSolicitud[$i],0,$TamanoCadena).'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
                $MotivoSolicitud = $MotivoSolicitud;
              }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
                $MotivoSolicitud = $MotivoSolicitud;
              }
                  //echo "<script language='javascript'>alert('".$MotivoSolicitud."')</script>";
            }

            $CadenaComprimisoPadres =explode("\n", $_POST['ComprimisoPadres']);
            $ComprimisoPadres = '';
            for ($i=0; $i < count($CadenaComprimisoPadres); $i++) {
              $CadenaComprimisoPadres[$i] = trim($CadenaComprimisoPadres[$i]);
              $primer = substr($CadenaComprimisoPadres[$i],0,1);
              $ultimo = substr($CadenaComprimisoPadres[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
              $TamanoCadena = strlen($CadenaComprimisoPadres[$i]);
                    //print_r($TamanoCadena);

              if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
                //print_r('a');
                $ComprimisoPadres = $ComprimisoPadres.substr($CadenaComprimisoPadres[$i],0,$TamanoCadena).'.'.'|';
              }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
                //print_r('b');
                $ComprimisoPadres = $ComprimisoPadres.'-'.substr($CadenaComprimisoPadres[$i],0,$TamanoCadena).'.'.'|';
              } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
                $ComprimisoPadres = $ComprimisoPadres.$CadenaComprimisoPadres[$i].'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
                $ComprimisoPadres = $ComprimisoPadres;
              }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
                $ComprimisoPadres = $ComprimisoPadres;
              }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
                $ComprimisoPadres = $ComprimisoPadres.'-'.substr($CadenaComprimisoPadres[$i],0,$TamanoCadena).'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
                $ComprimisoPadres = $ComprimisoPadres;
              }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
                $ComprimisoPadres = $ComprimisoPadres;
              }
                  //echo "<script language='javascript'>alert('".$ComprimisoPadres."')</script>";
            }

                      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $CadenaCompromisoAlumnos =explode("\n", $_POST['CompromisoAlumnos']);
            $CompromisoAlumnos = '';
            for ($i=0; $i < count($CadenaCompromisoAlumnos); $i++) {
              $CadenaCompromisoAlumnos[$i] = trim($CadenaCompromisoAlumnos[$i]);
              $primer = substr($CadenaCompromisoAlumnos[$i],0,1);
              $ultimo = substr($CadenaCompromisoAlumnos[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
              $TamanoCadena = strlen($CadenaCompromisoAlumnos[$i]);
                    //print_r($TamanoCadena);

              if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
                //print_r('a');
                $CompromisoAlumnos = $CompromisoAlumnos.substr($CadenaCompromisoAlumnos[$i],0,$TamanoCadena).'.'.'|';
              }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
                //print_r('b');
                $CompromisoAlumnos = $CompromisoAlumnos.'-'.substr($CadenaCompromisoAlumnos[$i],0,$TamanoCadena).'.'.'|';
              } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
                $CompromisoAlumnos = $CompromisoAlumnos.$CadenaCompromisoAlumnos[$i].'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
                $CompromisoAlumnos = $CompromisoAlumnos;
              }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
                $CompromisoAlumnos = $CompromisoAlumnos;
              }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
                $CompromisoAlumnos = $CompromisoAlumnos.'-'.substr($CadenaCompromisoAlumnos[$i],0,$TamanoCadena).'|';
              }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
                $CompromisoAlumnos = $CompromisoAlumnos;
              }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
                $CompromisoAlumnos = $CompromisoAlumnos;
              }
                  //echo "<script language='javascript'>alert('".$CompromisoAlumnos."')</script>";
            }



                      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





            include_once "../../clases/SQLControlador.php";
            include_once "../../clases/CartaResponsiva.php";

            $CartaResponsiva = new CartaResponsiva();

            $CartaResponsiva->setAlumno_idAlumno($_SESSION['IdAlumnoDocenteTutor']);
            $CartaResponsiva->setidFamiliares($idFamiliares);
            $CartaResponsiva->setidPersonal($_SESSION['IdDocenteTutor']);
            $CartaResponsiva->setLugar($Lugar);
            $CartaResponsiva->setFecha($Fecha);
            
            
            $CartaResponsiva->setMotivos($MotivoSolicitud);
            $CartaResponsiva->setCompromisosPadres($ComprimisoPadres);
            $CartaResponsiva->setCompromisosAlumnos($CompromisoAlumnos);
            $CartaResponsiva->setAsunto($Asunto);
            $CartaResponsiva->setidGrupo($idGrupo);

            $SQLControlador = new SQLControlador();
            $SQLControlador->AgregarCartaResponsiva($CartaResponsiva);
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

        $('#MotivoSolicitud').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#ComprimisoPadres').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });

        $('#ComprimisoAlumnos').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });
      });
    </script>