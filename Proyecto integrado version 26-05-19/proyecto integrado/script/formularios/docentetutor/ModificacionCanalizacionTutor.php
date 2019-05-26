<?php 
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinDocenteTutor']) && !isset ($_SESSION['IdDocenteTutor']) && !isset ($_SESSION['IdAlumnoDocenteTutor']))
{
   echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
}
?>
<!DOCTYPE html>
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
  <script src="./../../../js/jquery-3.3.1.js"></script>
  <script src="./../../../js/jquery-3.3.1.min.js"></script>
  <script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
  <script src="./../../../js/popper.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>


  <!--Icono en pestaña-->
  <link rel="icon" type="image/vnd.microsoft.icon" href="../../imagenes/Mapa.ico">
  
  <!--STYLOS-->
   <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
  

  <!--Iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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

</head>

<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
    <br>
    <?php include "../menus/MenuDocenteTutor.php";
      MenuAlumnoDocenteCanalizacion();?>
  </div>
  <!--Fin contenedor Cabecera-->

  <!--Inicio Contenedor medio-->
  <div class="container">
    <!--Poner titulo o nombre -->
    <br><center><h2> Canalización </h2></center>
    <!--Poner titulo o nombre -->
    <br>
    
    <div class="row">
      <div class="col-sm-1"></div>
      <?php 
      if(!isset($_POST['estatusu'])){
       ?>
       <div class="col-sm-10">
        <!--Inicio de contenido de caja de texto--> 
        <form action="ModificacionCanalizacionTutor.php" method="POST" target="request" onsubmit="return validar()">
          <!--Inicio Contenido central-->
          
          <?php 

          include_once "../../clases/MySQLConector.php";
          $Fecha = date("Y-m-d");
          $Mysql = new MySQLConector();
          $Mysql->Conectar();

          $ConsultaT = "SELECT canalizacion.idCanalizacion,canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion, canalizacion.Alumno_idAlumno, canalizacion.idFamiliar, canalizacion.Fecha, canalizacion.Descripcion, canalizacion.Instancia, canalizacion.Estatus AS EstatusCanalizacion,alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno,alumno.FechaNac, alumno.Sexo, grupos.Grupo, grupos.Grado, carreras.Nombre AS NombreCarrera,familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, problematicascanalizacion.idProblematicasCanalizacion, problematicascanalizacion.Problematica FROM `canalizacion`,familiares, problematicascanalizacion , alumno, grupos,carreras WHERE canalizacion.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion = problematicascanalizacion.idProblematicasCanalizacion and canalizacion.idFamiliar = familiares.idFamiliares AND canalizacion.Alumno_idAlumno = alumno.idAlumno AND canalizacion.idGrupo = grupos.idGrupos AND carreras.idCarreras = grupos.Carreras_idCarreras AND canalizacion.idCanalizacion = '".$_SESSION['IdCanalizacion']."';";
          

          $ResultadoT = $Mysql->Consulta($ConsultaT);
          while ($filaT = mysqli_fetch_array($ResultadoT)){

            ?>
            <h4>Datos del Alumno</h4>
            <?php echo "<input type=\"hidden\" value=".$_SESSION['IdAlumnoDocenteTutor']." id=\"Alumno\" name=\"Alumno\">" ?>
            <?php echo "<input type=\"hidden\" value=".$Fecha." id=\"Fecha\">" ?>
            <?php echo "<input type=\"hidden\" id=\"idcanalizacionu\">" ?>
            <label><b>Nombre:</b> <?php echo $filaT['NombreAlumno'].' '.$filaT['ApellidoPAlumno'].' '.$filaT['ApellidoMAlumno']; ?></label><br>
            <label><b>Semestre:</b> <?php echo $filaT['Grado']; ?></label>
            <label class="ml-4"><b>Grupo:</b> <?php echo $filaT['Grupo']; ?></label>
            <label class="ml-4"><b>Sexo:</b> <?php echo $filaT['Sexo']; ?></label>
            <label class="ml-4"><b>Edad:</b> <?php echo calculaedad ($filaT['FechaNac']);?></label><br>
            <label><b>Carrera:</b> <?php echo $filaT['NombreCarrera']; ?></label><br>
            <?php echo"<input type=\"hidden\" id=\"idCanalizacion\" value=\"".$filaT['idCanalizacion']."\">";?>
            <hr>
            <h4>Datos tutor Legal</h4>
            <label>Nombre del padre o tutor legal:</label> <br>
            <?php echo"<input type=\"text\" id=\"tutorlegalu\"  class=\"form-control input-sm\"  value=\"".$filaT['Nombre'].' '.$filaT['ApellidoP'].' '.$filaT['ApellidoM']."\"  disabled>" ?>
            <hr>
            <h4>Datos de canalización</h4>
            <label><b>Fecha:</b></label> 
            <?php echo"<input type=\"text\" id=\"fechau\"  class=\"form-control input-sm\" value=\"".$filaT['Fecha']."\" disabled>"; ?>
            <label for=""><b>Problematica</b></label><br>
            <?php echo"<input type=\"text\" id=\"problematicau\"  class=\"form-control input-sm\"  value=\"".$filaT['Problematica']."\" disabled><br>"; ?>
            <label><b>Descripcion breve</b></label>
            <textarea  name="descripcionbreveu" id="descripcionbreveu" class="form-control input-sm" disabled onkeypress="return soloLetras(event);"><?php echo $filaT['Descripcion'] ?>;</textarea>
            <label><b>Instancia a la que se canaliza</b></label>
            <?php echo "<input type=\"text\" name=\"instanciau\" id=\"instanciau\" class=\"form-control input-sm\" value=\"".$filaT['Instancia']."\" disabled onkeypress=\"return soloLetras(event);\" >";?>
            <label><b>Estatus:</b></label>
            <select name="estatusu" id="estatusu" class="custom-select">
              <option value="1" <?php if($filaT['EstatusCanalizacion'] == '1') echo "Selected"; ?> >Activo</option>
              <option value="0" <?php if($filaT['EstatusCanalizacion'] == '0') echo "Selected"; ?> >Inactivo</option>
            </select>
          <?php } ?>
          <br>
          <br> 
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
          <br>
          <br>
        </form>
      </div>
      <?php 
    } else {
      include_once "../../clases/SQLControlador.php";
      include_once "../../clases/Canalizacion.php";

      $Id = 0;

      $Id= $_SESSION['IdCanalizacion'];
      $Estatus=$_POST['estatusu'];

      $Canalizacion = new Canalizacion();
      $Canalizacion->setidCanalizacion($Id);
      $Canalizacion->setEstatus($Estatus);

      $SQLControlador = new SQLControlador();
      $SQLControlador->ModificarCanalizacion($Canalizacion);


    }
    ?>
    <div class="col-sm-1"></div>
    <?php include '../menus/PiePagina.php';?>
  </div>

  
</div>
</div>
<!--Fin Contenedor medio-->
</body>
</html>

