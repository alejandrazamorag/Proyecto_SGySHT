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

  <script>
    function myFunction(event) {
      var codigo=window.event.keyCode;
      var x = document.getElementById("ActividadesTareas");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("ActividadesTareas").value+"\n-";
    }
  }

</script>

<script language="javascript" type="text/javascript">
 function validar() {
  	//obteniendo el valor que se puso en el campo text del formulario
    txtFecha = document.getElementById('FechaTutoria').value;
    if(!isNaN(txtFecha)){
      alert('Seleccione o introduzca una fecha!');
      return false;
    }

    txtHorario = document.getElementById('Horario').value;
    if(!isNaN(txtHorario)){
      alert('Seleccione o introduzca una Horario');
      return false;
    }
    miCampoTexto = document.getElementById('ActividadesTareas').value;
        //la condición
        if ((miCampoTexto == '-') || miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de Actividades Tareas esta vacío!');
          return false;
        }else{
          //alert(miCampoTexto);
          ActividadesTareas = '';
          CadenaAcuerdosRealizados = miCampoTexto.split('\n');
          //alert(CadenaAcuerdosRealizados);
          for (var i = 0; i < CadenaAcuerdosRealizados.length; i++) {
            //alert('AYYY');
            CadenaAcuerdosRealizados[i].trim();
            TamanoCadena = CadenaAcuerdosRealizados[i].length;
            //alert(TamanoCadena);
            primer = CadenaAcuerdosRealizados[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaAcuerdosRealizados[i].substr(-1);
            //alert(ultimo);
            
            if((primer == '-')&&(ultimo == '.')&&(TamanoCadena == 2)){
              //alert('-.');
              ActividadesTareas = ActividadesTareas + '';
            }else if((primer == '-')&&(ultimo == '-')){
              //alert('--');
              ActividadesTareas = ActividadesTareas + '';
            }else if((primer == '.')&&(ultimo == '.')){
              //alert('..');
              ActividadesTareas = ActividadesTareas + '';
            }else if((primer == '')&&(ultimo == '')){
              //alert('vacio');
              ActividadesTareas = ActividadesTareas + '';
            }else if((primer == '-')&&(ultimo > 0) && (TamanoCadena == 2)){
              //alert('Es numerooo');
              ActividadesTareas = ActividadesTareas + '';
            }else{
              ActividadesTareas = "a";
            }
          }

          if(ActividadesTareas.length == 0){
            alert('Comentarios no validos verifique por favor');
            return false;
          }
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
      MenuAlumnoDocenteTutoriaIndividual();?>
  </div>
  <!--Fin contenedor Cabecera-->

  <!--Inicio Contenedor medio-->
  <div class="container">
    <!--Poner titulo o nombre -->
    <br><center><h2> Tutoria individual <h2></center>
      <!--Poner titulo o nombre -->
      <br>

      <div class="row">
        <div class="col-sm-1"></div>
        <?php 
        if(!isset($_POST['ActividadesTareas'])){
         ?>
         <div class="col-sm-10">
          <!--Inicio de contenido de caja de texto--> 
          <form action="AltaTutoriaIndividual.php" method="POST" onsubmit="return validar()">
            <!--Inicio Contenido central-->
            <?php
            include_once "../../clases/MySQLConector.php";
            $Fecha = date("Y-m-d");
            $Mysql = new MySQLConector();
            $Mysql->Conectar();
            $Consulta = "SELECT alumno.Nombre, alumno.Grupos_idGrupos,alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM , alumno.FechaNac, alumno.Sexo, carreras.Nombre AS NombreCarrera , grupos.Grupo , grupos.Grado , grupos.Grado, grupos.Grupo FROM alumno INNER JOIN grupos ON alumno.Grupos_idGrupos=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE alumno.idAlumno ='".$_SESSION['IdAlumnoDocenteTutor']."'";

            $Resultado = $Mysql->Consulta($Consulta);
            while ($fila = mysqli_fetch_array($Resultado)){           

              ?>
              <h4>Datos del Alumno</h4>
              <?php echo "<input type=\"hidden\" value=".$_SESSION['IdAlumnoDocenteTutor']." id=\"Alumno\" name=\"Alumno\">" ?>
              <label><b>Nombre:</b> <?php echo $fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM']; ?></label><br>
              <label><b>Semestre:</b> <?php echo $fila['Grado']; ?></label>
              <label class="ml-4"><b>Grupo:</b> <?php echo $fila['Grupo']; ?></label>
              <label class="ml-4"><b>Sexo:</b> <?php echo $fila['Sexo']; ?></label>
              <label class="ml-4"><b>Edad:</b> <?php echo calculaedad ($fila['FechaNac']);?></label><br>
              <label><b>Carrera:</b> <?php echo $fila['NombreCarrera']; ?></label><br>
              <?php echo "<input type=\"hidden\" value=\"".$fila['Grupos_idGrupos']."\" id=\"idGrupo\" name=\"idGrupo\">" ?>


            <?php }?>
            <hr>
            <h4>Datos del tutor docente</h4>
            <?php echo "<input type=\"hidden\" value=\"1\" id=\"idTutor\" name=\"idTutor\">" ?>

            <?php 
            include_once "../../clases/MySQLConector.php";
            $Mysql = new MySQLConector();
            $Mysql->Conectar();
            $Consulta2 = "SELECT * FROM `personal` where personal.idPersonal = '".$_SESSION['IdDocenteTutor']."';";
            $Resultado2 = $Mysql->Consulta($Consulta2);
            while ($fila2 = mysqli_fetch_array($Resultado2)){
              ?>
              <label><b>Nombre: </b><?php echo $fila2['Nombre']." ".$fila2['ApellidoP']." ".$fila2['ApellidoM'];?></label>
            <?php }?>
            <hr>
            <h4>Datos de la tutoria</h4>
            <label><b>Fecha:</b></label> <input type="date" id="FechaTutoria" class="form-control input-sm" name="FechaTutoria"><br>
            <label><b>Horario:</b></label> <input type="time" class="form-control input-sm" id="Horario" name="Horario"><br>
            <label><b>Actividades y Tareas: </b></label>
            <textarea  name="ActividadesTareas" id="ActividadesTareas" class="form-control input-sm" onkeypress="return NumerosLetras(event);" onkeyup="myFunction(event)">-</textarea>
            <br>
            <button type="submit" class="btn btn-success"  id="GuardarRegistro" onclick="" >
              Agregar
            </button>
            <br>
            <br><br>
            <br>
          </form>
        </div>
      <?php } else {
        include_once "../../clases/SQLControlador.php";
        include_once "../../clases/TutoriaIndividual.php";

        $Alumno_idAlumno= $_SESSION['IdAlumnoDocenteTutor'];
        $idGrupo = $_POST['idGrupo'];
        //echo "<script language='javascript'>alert('".$idGrupo."')</script>";
        $idTutor=$_SESSION['IdDocenteTutor'];
        $FechaTutoria=$_POST['FechaTutoria'];
        $Horario = $_POST['Horario'];

        $CadenaAcuerdosRealizados =explode("\n",  $_POST['ActividadesTareas']);
        $ActividadesTareas = '';
                //print_r($CadenaAcuerdosRealizados);
        for ($i=0; $i < count($CadenaAcuerdosRealizados); $i++) {
          $CadenaAcuerdosRealizados[$i] = trim($CadenaAcuerdosRealizados[$i]);
          $primer = substr($CadenaAcuerdosRealizados[$i],0,1);
          $ultimo = substr($CadenaAcuerdosRealizados[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
          $TamanoCadena = strlen($CadenaAcuerdosRealizados[$i]);
                    //print_r($TamanoCadena);

          if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
            $ActividadesTareas = $ActividadesTareas.substr($CadenaAcuerdosRealizados[$i],0,$TamanoCadena).'.'.'|';
          }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
            $ActividadesTareas = $ActividadesTareas.'-'.substr($CadenaAcuerdosRealizados[$i],0,$TamanoCadena).'.'.'|';
          } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
            $ActividadesTareas = $ActividadesTareas.$CadenaAcuerdosRealizados[$i].'|';
          }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
            $ActividadesTareas = $ActividadesTareas;
          }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
            $ActividadesTareas = $ActividadesTareas;
          }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
            $ActividadesTareas = $ActividadesTareas.'-'.substr($CadenaAcuerdosRealizados[$i],0,$TamanoCadena).'|';
          }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
            $ActividadesTareas = $ActividadesTareas;
          }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
            $ActividadesTareas = $ActividadesTareas;
          }
                  //echo "<script language='javascript'>alert('".$ActividadesTareas."')</script>";
        }

        //print_r('Listones'.$ActividadesTareas);

        $TutoriaIndividual = new TutoriaIndividual();
        $TutoriaIndividual->setAlumno_idAlumno($Alumno_idAlumno);
        $TutoriaIndividual->setidGrupo($idGrupo);
        $TutoriaIndividual->setidTutor($idTutor);
        $TutoriaIndividual->setFechaTutoria($FechaTutoria);
        $TutoriaIndividual->setHorario($Horario);
        $TutoriaIndividual->setActividadesTareas($ActividadesTareas);

        $SQLControlador = new SQLControlador();
        $SQLControlador->AgregarTutoriaIndividual($TutoriaIndividual);
      }
      ?>
      <div class="col-sm-1"></div>
    </div>
    <?php include '../menus/PiePagina.php';?>
  </div>
</div>
<!--Fin Contenedor medio-->
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#ActividadesTareas').on('input', function (e) {
      if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
      }
    });
    
  });
</script>