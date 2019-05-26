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
  <link rel="icon" type="image/vnd.microsoft.icon" href="../../../imagenes/Mapa.ico">




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> 
  <script src="./../../../js/jquery-3.3.1.js"></script>
  <script src="./../../../js/jquery-3.3.1.min.js"></script>
  <script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
  <script src="./../../../js/popper.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>
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
 <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
 <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuIzquierdoAlumno.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/style_paneles.css">



  <!--Iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>


<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
   <br>
    <?php include "../menus/MenuDocenteTutor.php";
      MenuAlumnoDocenteTutor();?>
 <!--Fin contenedor Cabecera-->

 <!--Inicio Contenedor medio-->
 <div class="container">
  <!--Poner titulo o nombre -->
  <br><center><h2> Ficha de identificación del tutorado </h2></center>
  <!--Poner titulo o nombre -->

  <div class="row">
    <!--Inicio de menu izquierdo-->
    <div class="col-sm-3">
      <?php include '../menus/MenuIzquierdoAlumnoDocenteTutor.php';
          ?>
      <!--Fin inicio menu izquierdo-->
    </div>
    <!--Inicio Contenido central-->
    <div class="col-sm-9">
      <!--Inicio de contenido de caja de texto-->
      <div align="right"><a href="../../reportes/FichaIdentificacion.php" target="_blank"><button  class="btn btn-success" >Generar PDF</button></a></div>
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
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active " id="DP">   
                <div class="container">
                  <br>
                  <?php
                  include_once "../../clases/MySQLConector.php";

                  $Mysql = new MySQLConector();
                  $Mysql->Conectar();

                  $Consulta = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.FechaNac, alumno.TelefonoEmergencia ,lugarnacimiento.Municipio, lugarnacimiento.Estado, domicilio.Calle, domicilio.Numero, domicilio.Colonia, domicilio.CP, domicilio.Municipio AS MunicipioDomicilio, domicilio.Localidad, domicilio.Estado AS EstadoDomicilio, alumno.Telefono AS TelefonoParticular from alumno, lugarnacimiento, domicilio WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND lugarnacimiento.idLugarNacimiento = alumno.LugarNacimiento_idLugarNacimiento AND domicilio.idDomicilio = alumno.Domicilio_idDomicilio;";
                  $Resultado = $Mysql->Consulta($Consulta);
                  while ($fila = $Resultado->fetch_assoc()) {
                    ?>
                    <b><i>Nombre: </i></b> 
                    <label for="lblNombre"><?php echo $fila['Nombre']?> <?php echo $fila['ApellidoP']?> <?php echo $fila['ApellidoM']?> </label><br>

                    <b><i>Fecha de nacimiento:</i></b>
                    <?php 
                    $originalDate = $fila['FechaNac'];
                    $newDate = date("d/m/Y", strtotime($originalDate));
                    ?>
                    <label for="lblFechaNacimiento"><?php echo $newDate ?></label><br>
                    <b><i>Edad: </i></b>
                    <label for=""><?php echo calculaedad ($fila['FechaNac']);?> </label><br>
                    <b><i>Lugar de Nacimiento: </i></b>
                    <label for="lblLugarNacimiento"><?php echo $fila['Municipio']?>, <?php echo $fila['Estado']?></label><br>
                    <b><i>Domicilio: </i></b>
                    <label for="lblCalle"><?php echo $fila['Calle']?> #<?php echo $fila['Numero']?> Col.<?php echo $fila['Colonia']?> CP: <?php echo $fila['CP']?> </label><br>
                    <b>Municipio: </b>
                    <label for="lblMunicipio"><?php echo $fila['MunicipioDomicilio']?></label>
                    <b>Localidad: </b>
                    <label for="lblLocalidad"><?php echo $fila['Localidad']?></label>
                    <b>Estado: </b>
                    <label for="lblEstado"><?php echo $fila['EstadoDomicilio']?></label><br>
                    <!--<label for="lblTelefonoParticular"><?php //echo $fila['TelefonoParticular']?></label>-->
                    <b><i>En caso de emergencia llamar a: </i></b>
                    <label for=""><?php echo $fila['TelefonoEmergencia']?></label><br>
                    <div class="form-inline">
                      <b><i>Telefono Particular: </i></b>
                      <label for=""><?php echo $fila['TelefonoParticular']?></label><br>                                
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

                $Consulta = "SELECT familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, familiares.FechaNacimiento, familiares.Profesion, familiares.LugarTrabajo, familiares.Parentesco  from familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."'";

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
                        <b>Profesion: </b>
                        <label for="ProfesionP"><?php echo $fila['Profesion']?></label>
                      </div>
                      <div class="col-md-6">
                        <b>Lugar de Trabajo: </b>
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

                $Consulta = "SELECT datosfamiliares.NoHermanos, datosfamiliares.LugarOcupas, datosfamiliares.OtrasPersonas, datosfamiliares.ActualmenteVives, datosfamiliares.SituacionFamiliar, datosfamiliares.RelacionPadres FROM datosfamiliares where datosfamiliares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";

                $Resultado = $Mysql->Consulta($Consulta);

                while ($fila = $Resultado->fetch_assoc()) {
                  ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-inline">
                        <b>b) Numero hermanos: </b>
                        <label for="LugarTrabajoM"><?php echo $fila['NoHermanos']?></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-inline"> 
                        <b>Lugar que ocupas: </b>
                        <label for="LugarTrabajoM"><?php echo $fila['LugarOcupas']?></label>
                      </div>
                    </div>
                  </div>
                  <!--Final opcion b-->
                  <br>
                  <!--Inicio opcion c-->
                  <div class="row">
                    <div class="col-md">
                      <b>c) Otras personas que viven con tigo</b>
                      <label for="LugarTrabajoM"><?php echo $fila['OtrasPersonas']?></label>
                    </div>                   
                  </div>
                  <!--Final opcion c-->
                  <br>
                  <!--Incio opcion d-->
                  <div class="row">
                    <div class="col-md-12">
                      <b>d) Actualmente vives con</b> 
                      <label for="LugarTrabajoM"><?php echo $fila['ActualmenteVives']?></label>
                    </div>                
                  </div>
                  <!--Final opcion d-->
                  <br>
                  <!--Inicio opcion e-->
                  <div class="row">
                    <div class="col-md-12">
                      <b>e) ¿Hay alguna situación familiar que se pueda considerar especial? (fallecimiento de padre/madre, separacion de los padres, divorcio, enfermedad de algún familiar)</b>
                      <label for="LugarTrabajoM"><?php echo $fila['SituacionFamiliar']?></label>
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
                        <label for="LugarTrabajoM"><?php if($fila['RelacionPadres'] == '6'){
                          echo "Excelente";
                        }elseif($fila['RelacionPadres'] == '5'){
                          echo "Muy Buena";
                        }elseif($fila['RelacionPadres'] == '4'){
                          echo "Buena";
                        }elseif($fila['RelacionPadres'] == '3'){
                          echo "Regular";
                        }elseif($fila['RelacionPadres'] == '2'){
                          echo "Mala";
                        }elseif($fila['RelacionPadres'] == '1'){
                          echo "Muy Mala";
                        }?>
                      </label>
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

              $Consulta = "SELECT secundaria.Nombre , datosescolares.PromedioSecu, datosescolares.OtrosEstudios, datosescolares.RendimientoEscolar, datosescolares.MateriaGustada, datosescolares.MateriaDisgustada, datosescolares.ReaccionPadres, datosescolares.Espectativa FROM secundaria, datosescolares WHERE secundaria.idSecundaria = datosescolares.Secundaria_idSecundaria AND datosescolares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
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

                $Consulta2 = "SELECT * FROM `materiassecureprobadas` WHERE materiassecureprobadas.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."'";
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
                          <b><i>¿Cuál? </i></b><label for=""><?php echo substr($fila2['Materias'], 3)?></label>
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
                      <b>c) ¿Actualmente realizas otro tipo de estudios?</b> <br>
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
    <b>¿Cress que cumples con lo que ellos esperan de ti? </b> <br>
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

  $Consulta = "SELECT datosmedicos.Enfermedad , datosmedicos.Tratamiento , datosmedicos.Tabaquismo, datosmedicos.Drogadiccion, datosmedicos.Alcoholismo from datosmedicos WHERE datosmedicos.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."'";

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

 $Consulta = "SELECT expectativanuevaform.Atraccion, expectativanuevaform.Precupacion, expectativanuevaform.EstudioEs, expectativanuevaform.ProblemaCausa, expectativanuevaform.Preparado, expectativanuevaform.ValorarProfesor FROM expectativanuevaform WHERE expectativanuevaform.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";

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
      <b>b) Hay algo que te preocupe sobre la nueva etapa que ahora empiezas?</b><br>
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

  $Consulta = "SELECT habitosestudio.TiempoTarea, habitosestudio.TiempoEstudio, habitosestudio.TiempoLectura, habitosestudio.LugarEstudio, habitosestudio.EstimulacionEstudio, habitosestudio.MotivoAprender, habitosestudio.MotivoInteres, habitosestudio.MotivoSatisfaccion, habitosestudio.MotivoFracaso, habitosestudio.MotivoAgradecer, habitosestudio.MotivoPremio, habitosestudio.MotivoHacer, habitosestudio.TecnicasEstudio FROM habitosestudio WHERE habitosestudio.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";

  $Resultado = $Mysql->Consulta($Consulta);

  while ($fila = $Resultado->fetch_assoc()) {
    ?>


    <div class="form-group">
      <b>a) Tiempo de trabajo diario en casa:</b><br>
      <div class="container">
        <i><b>Tareas:</b></i>
        <label for=""><?php if($fila['TiempoTarea'] == '0'){
          echo "Nada";
        }elseif($fila['TiempoTarea'] == '1'){
          echo "Una hora";
        }elseif($fila['TiempoTarea'] == '2'){
          echo "Dos horas";
        }elseif($fila['TiempoTarea'] == '3'){
          echo "Mas de dos horas";
        }?></label>
        <br>
        <i><b>Estudio:</b></i>
        <label for=""><?php if($fila['TiempoEstudio'] == '0'){
          echo "Nada";
        }elseif($fila['TiempoEstudio'] == '1'){
          echo "Una hora";
        }elseif($fila['TiempoEstudio'] == '2'){
          echo "Dos horas";
        }elseif($fila['TiempoEstudio'] == '3'){
          echo "Mas de dos horas";
        }?></label>
        <br>
        <b><i>Tiempo Semanal que le dedicas a la lectura: </i></b>
        <label for=""><?php if($fila['TiempoLectura'] == '0'){
          echo "Nada";
        }elseif($fila['TiempoLectura'] == '1'){
          echo "Una hora";
        }elseif($fila['TiempoLectura'] == '2'){
          echo "Dos horas";
        }elseif($fila['TiempoLectura'] == '3'){
          echo "Mas de dos horas";
        }?></label>
      </div>
    </div>
    <!--Fin opcion a-->
    <!--Inicio opcion b-->
    <b>b) Lugar de Estudio: </b><br>
<label for=""><?php 
$Opciones= explode(",",  $fila['LugarEstudio']);

for ($i=0; $i < count($Opciones); $i++) {

  if($i == 0){
    if ($Opciones[$i] == "4"){
      echo "Habitacion propia";
    }elseif ($Opciones[$i] == "3") {
      echo "Sala";
    }elseif ($Opciones[$i] == "2") {
      echo "Cocina";
    }elseif ($Opciones[$i] == "1") {
      echo "Otros";
    }

  }else{
    if ($Opciones[$i] == "4"){
      echo ", Habitacion propia";
    }elseif ($Opciones[$i] == "3") {
      echo ", Sala";
    }elseif ($Opciones[$i] == "2") {
      echo ", Cocina";
    }elseif ($Opciones[$i] == "1") {
      echo ", Otros";
    }

  }
}
?></label>
<!--Fin opcion b-->
<!--Inicio opcion c-->
<div>
  <b>c) Técnicas de estudio que utilizas:</b><br>
<label for=""><?php 
$Opciones= explode(",",  $fila['TecnicasEstudio']);

for ($i=0; $i < count($Opciones); $i++) {

  if($i == 0){
    if ($Opciones[$i] == "4"){
      echo "Subrayado";
    }elseif ($Opciones[$i] == "3") {
      echo "Esquema";
    }elseif ($Opciones[$i] == "2") {
      echo "Resumen";
    }elseif ($Opciones[$i] == "1") {
      echo "Memoria";
    }

  }else{
    if ($Opciones[$i] == "4"){
      echo ", Subrayado";
    }elseif ($Opciones[$i] == "3") {
      echo ", Esquema";
    }elseif ($Opciones[$i] == "2") {
      echo ", Resumen";
    }elseif ($Opciones[$i] == "1") {
      echo ", Memoria";
    }

  }

}
?></label>

</div>
<!--Fin opcion c-->
<!--Inicio opcion d-->
<div>
  <b>d) ¿Te estimulan tus padres en tus estudios?</b><br>
  <label for=""><?php echo $fila['EstimulacionEstudio'] ?></label>
</div> 
<!--Fin opcion d-->
<!--Inicio opcion e-->
<div class="form-group">
  <b>
    e) En estos momentos, el motivo principal que te anima en tus estudios son:
  </b><br>
  <b><i>Aprender cada día más</i></b><br>
  <label for=""><?php 
  if($fila['MotivoAprender'] == '4'){
    echo "Muchisimo";
  }elseif ($fila['MotivoAprender'] == '3') {
    echo "Normal";
  }elseif ($fila['MotivoAprender'] == '2') {
    echo "Algo";
  }elseif ($fila['MotivoAprender'] == '1') {
    echo "Nada";
  }
  ?></label>
  <br>
  <b><i>Poder hacer las cosas por ti mismo/a y a tu manera</i></b><br>
  <label for=""><?php 
  if($fila['MotivoHacer'] == '4'){
    echo "Muchisimo";
  }elseif ($fila['MotivoHacer'] == '3') {
    echo "Normal";
  }elseif ($fila['MotivoHacer'] == '2') {
    echo "Algo";
  }elseif ($fila['MotivoHacer'] == '1') {
    echo "Nada";
  }
  ?></label>
  <br>
  <b><i>El interes que despierta en ti todo lo que estudias</i></b><br>
  <label for=""><?php 
  if($fila['MotivoInteres'] == '4'){
    echo "Muchisimo";
  }elseif ($fila['MotivoInteres'] == '3') {
    echo "Normal";
  }elseif ($fila['MotivoInteres'] == '2') {
    echo "Algo";
  }elseif ($fila['MotivoInteres'] == '1') {
    echo "Nada";
  }
  ?></label>
  <br>
  <b><i>La satisfacción que se siente cuando se obtienen buenos resultados</i></b><br>
  <label for=""><?php 
  if($fila['MotivoSatisfaccion'] == '4'){
    echo "Muchisimo";
  }elseif ($fila['MotivoSatisfaccion'] == '3') {
    echo "Normal";
  }elseif ($fila['MotivoSatisfaccion'] == '2') {
    echo "Algo";
  }elseif ($fila['MotivoSatisfaccion'] == '1') {
    echo "Nada";
  }
  ?></label>
  <br>
  <b><i>Evitar un posible fracaso en los estudios</i></b><br>
  <label for=""><?php 
  if($fila['MotivoFracaso'] == '4'){
    echo "Muchisimo";
  }elseif ($fila['MotivoFracaso'] == '3') {
    echo "Normal";
  }elseif ($fila['MotivoFracaso'] == '2') {
    echo "Algo";
  }elseif ($fila['MotivoFracaso'] == '1') {
    echo "Nada";
  }
  ?></label>
  <br>
  <b><i>Agradecer a tus padres y/o profesores</i></b><br>
  <label for=""><?php 
  if($fila['MotivoAgradecer'] == '4'){
    echo "Muchisimo";
  }elseif ($fila['MotivoAgradecer'] == '3') {
    echo "Normal";
  }elseif ($fila['MotivoAgradecer'] == '2') {
    echo "Algo";
  }elseif ($fila['MotivoAgradecer'] == '1') {
    echo "Nada";
  }
  ?></label>
  <br>
  <b><i>Conseguir los premios que te han prometido tus padres</i></b><br>
  <label for=""><?php 
  if($fila['MotivoPremio'] == '4'){
    echo "Muchisimo";
  }elseif ($fila['MotivoPremio'] == '3') {
    echo "Normal";
  }elseif ($fila['MotivoPremio'] == '2') {
    echo "Algo";
  }elseif ($fila['MotivoPremio'] == '1') {
    echo "Nada";
  }
  ?></label>
</div>
<!--Fin opcion e-->
<?php }
?>
</div>
<br>
<br>
<br>
<br>
<br>
</div>
</div>
</div>
</form>

<!--Fin de contenido de caja de texto-->
</div> 
</div>
<!--Fin Contenido central-->
<!--Inicio de pie de pagina-->
  <?php include "../menus/PiePagina.php";?>
<!--fin de pie de pagina-->
</div>
<!--Fin Contenedor medio-->


</body>
</html>