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

  <script language="javascript" type="text/javascript">
   function validar() {
  	//obteniendo el valor que se puso en el campo text del formulario
    txtFecha = document.getElementById('fecha').value;
    if(!isNaN(txtFecha)){
      alert('Seleccione o introduzca una fecha!');
      return false;
    }

    miCampoTexto = document.getElementById('descripcionbreve').value;  
    if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
      alert('Establezca una descripcion breve, el campo se encuentra vacio!');
      return false;
    }

    miCampoTexto = document.getElementById('descripcionbreve').value;  
    if (!/[a-zA-Z\s.,-_0-9]+$/.test(miCampoTexto)) {
      alert('No se permiten acentos y ñ, verifique el campo descripcionbreve!');
      return false;
    }

    miCampoTexto = document.getElementById('instancia').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Establezca la instancia, el campo se encuentra vacio!');
          return false;
        }

        miCampoTexto = document.getElementById('instancia').value;  
        if (!/[a-zA-Z\s.,-_0-9]+$/.test(miCampoTexto)) {
          alert('No se permiten acentos y ñ en campo instancia!');
          return false;
        }

        return true;
      }
    </script>

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
      if(!isset($_POST['problematica'])){
       ?>
       <div class="col-sm-10">
        <!--Inicio de contenido de caja de texto--> 
        <form action="AltaCanalizacionTutor.php" method="POST" onsubmit="return validar()">
          <!--Inicio Contenido central-->
          <?php
          include_once "../../clases/MySQLConector.php";
          $Fecha = date("Y-m-d");
          $Mysql = new MySQLConector();
          $Mysql->Conectar();
          $Consulta = "SELECT alumno.Grupos_idGrupos,alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM , alumno.FechaNac, alumno.Sexo, carreras.Nombre AS NombreCarrera , grupos.Grupo , grupos.Grado , grupos.Grado, grupos.Grupo FROM alumno INNER JOIN grupos ON alumno.Grupos_idGrupos=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE alumno.idAlumno ='".$_SESSION['IdAlumnoDocenteTutor']."'";
          

          $Resultado = $Mysql->Consulta($Consulta);
          while ($fila = mysqli_fetch_array($Resultado)){           

            ?>
            <h4>Datos del Alumno</h4><br>
            <?php echo "<input type=\"hidden\" value=".$_SESSION['IdAlumnoDocenteTutor']."  id=\"Alumno\" name=\"Alumno\">" ?>
            <?php echo "<input type=\"hidden\" value=".$fila['Grupos_idGrupos']." id=\"idGrupo\" name=\"idGrupo\">" ?>
            <?php echo "<input type=\"hidden\" value=".$Fecha." id=\"Fecha\">" ?>
            <label><b>Nombre:</b> <?php echo $fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM']; ?></label><br>
            <label><b>Semestre:</b> <?php echo $fila['Grado']; ?></label>
            <label class="ml-4"><b>Grupo:</b> <?php echo $fila['Grupo']; ?></label>
            <label class="ml-4"><b>Sexo:</b> <?php echo $fila['Sexo']; ?></label>
            <label class="ml-4"><b>Edad:</b> <?php echo calculaedad ($fila['FechaNac']);?></label><br>
            <label><b>Carrera:</b> <?php echo $fila['NombreCarrera']; ?></label><br>
          <?php }?>
          <hr>
          <h4>Datos tutor Legal</h4>
          <select  name="idFamiliar" id="idFamiliar" class="m-1 custom-select"> 
            <?php
            include_once "../../clases/MySQLConector.php";

            $Mysql = new MySQLConector();
            $Mysql->Conectar();
            $Consulta2 = "SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM FROM familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor'] ."' AND familiares.Tutor = '1';";
            $Resultado2 = $Mysql->Consulta($Consulta2);
            if($Resultado2)
              while ($fila2 = mysqli_fetch_array($Resultado2)){           
                echo "<option value=\"{$fila2['idFamiliares']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
              }
              ?>
            </select>
            <hr>
            <h4>Datos de canalización</h4>
            <label ><b>Fecha:</b> <input type="date" id="fecha" name="fecha" class="custom-select"></label><br>
            <label for=""><b>Problematica</b></label>
            <select name="problematica" id="problematica" class="custom-select">
              <?php
              include_once "../../clases/MySQLConector.php";

              $Mysql = new MySQLConector();
              $Mysql->Conectar();
              $Consulta3 = "SELECT * FROM `problematicascanalizacion`";
              $Resultado3 = $Mysql->Consulta($Consulta3);
              if($Resultado3)
                while ($fila3 = mysqli_fetch_array($Resultado3)){           
                  echo "<option value=\"{$fila3['idProblematicasCanalizacion']}\">{$fila3['Problematica']}</option>";
                }
                ?>
              </select>
              <label><b>Descripcion breve</b></label>
              <textarea  name="descripcionbreve" id="descripcionbreve" class="form-control input-sm" onkeypress="return NumerosLetras(event);" ></textarea>
              <label><b>Instancia a la que se canaliza</b></label>
              <input type="text" name="instancia" id="instancia" class="form-control input-sm" onkeypress="return NumerosLetras(event);"> <br>
              <button type="submit" class="btn btn-success"  id="GuardarRegistro" onclick="" >
                Agregar
              </button>
              <br><br><br><br>
            </form>
          </div>
        <?php } else {
          include_once "../../clases/SQLControlador.php";
          include_once "../../clases/Canalizacion.php";

          $Alumno_idAlumno= $_SESSION['IdAlumnoDocenteTutor'];
          $idFamiliar=$_POST['idFamiliar'];
          $idProblematicasCanalizacion=$_POST['problematica'];
          $idGrupo = $_POST['idGrupo'];
          $Descripcion = $_POST['descripcionbreve'];
          $Fecha = $_POST['fecha'];
          $Instancia = $_POST['instancia'];

          $Canalizacion = new Canalizacion();
          $Canalizacion->setidProblematicasCanalizacion($idProblematicasCanalizacion);
          $Canalizacion->setidFamiliar($idFamiliar);
          $Canalizacion->setAlumno_idAlumno($Alumno_idAlumno);
          $Canalizacion->setidGrupo($idGrupo);
          $Canalizacion->setFecha($Fecha);
          $Canalizacion->setDescripcion($Descripcion);
          $Canalizacion->setInstancia($Instancia);

          $SQLControlador = new SQLControlador();
          $SQLControlador-> AgregarCanalizacion($Canalizacion);
        }
        ?>
      </div>
      <div class="col-sm-1"></div>
      <?php include '../menus/PiePagina.php';?>
    </div>
  </div>
  <!--Fin Contenedor medio-->
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#descripcionbreve').on('input', function (e) {
      if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
      }
    });

      $('#instancia').on('input', function (e) {
        if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
        }
      });
    });
  </script>