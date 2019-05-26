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
    miCampoTexto = document.getElementById('Lugar').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo Lugar se encuentra vacio!');
          return false;
        }
        miCampoTexto = document.getElementById('Motivo').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo motivo se encuentra vacio!');
          return false;
        }

        miCampoTexto = document.getElementById('Acuerdos').value;
        //la condición
        if ((miCampoTexto == '-') || miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo de Acuerdos Realizados esta vacio!');
          return false;
        }else{
          AcuerdosRealizados = '';
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
            alert('Comentarios no validos verifique porfavor');
            return false;
          }
        }

        miCampoTexto = document.getElementById('Motivo').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Establece el motivo de la carta Compromiso el campo se encuentra vacio!');
          return false;
        }

        return true;
      }
    </script>
    <script>
      function myFunction(event) {
        var codigo=window.event.keyCode;
        var x = document.getElementById("Acuerdos");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("Acuerdos").value+"\n-";
    }
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

</head>

<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
    <br>
    <?php include "../menus/MenuDocenteTutor.php";
      MenuAlumnoDocenteCartaCompromiso();?>
  </div>
  <!--Fin contenedor Cabecera-->

  <!--Inicio Contenedor medio-->
  <div class="container">
    <!--Poner titulo o nombre -->
    <br><center><h2> Carta Compromiso </h2></center>
    <!--Poner titulo o nombre -->
    <br>
    
    <div class="row">


      <?php
      $Fecha = date("Y-m-d");
      include_once "../../clases/MySQLConector.php";
      $Mysql = new MySQLConector();
      $Mysql->Conectar();
      $Consulta = "SELECT * FROM `plantel` WHERE 1;";
      $Resultado = $Mysql->Consulta($Consulta);
      while ($fila = $Resultado->fetch_assoc()) {
        $Lugar = $fila['Ciudad'] .", ". $fila['Estado'];
        $NombrePlantel = strtoupper($fila['Nombre']);
        $Plantel = $fila['Ciudad'].' '.$fila['Clave'];

      }
      $Lugar = "";
      ?>
      <div class="col-sm-1"></div>
      <?php 
      if(!isset($_POST['Acuerdos'])){
       ?>
       <div class="col-sm-10">
        <!--Inicio de contenido de caja de texto--> 
        <form action="AltaCartaCompromisoTutor.php" method="POST" onsubmit="return validar()">
          <!--Inicio Contenido central-->
          <?php 
          $Lugar = "Rio Grande Zacatecas";
          include_once "../../clases/MySQLConector.php";
          $Mysql = new MySQLConector();
          $Mysql->Conectar();
          $Consulta = "SELECT alumno.Grupos_idGrupos,alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM , carreras.Nombre AS NombreCarrera , grupos.Grupo , grupos.Grado FROM carreras, alumno, grupos WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' and carreras.idCarreras = grupos.Carreras_idCarreras AND grupos.idGrupos = alumno.Grupos_idGrupos ;";
          $Resultado = $Mysql->Consulta($Consulta);
          while ($fila = $Resultado->fetch_assoc()) {
            ?>
           
          

            <div class="form-inline justify-content-end">
              <div class="form-group">
                <label for="inputPassword" class="col-form-label" ><b>Lugar: </b></label>
                <?php echo"<input type=\"text\" name=\"Lugar\" id=\"Lugar\" placeholder=\"Lugar\" class=\"form-control m-2\" value=\"".$Lugar."\" maxlength=\"50\"  onkeypress=\"return NumerosLetras(event);\">"; ?>
              </div>
            </div>
            <div class="form-inline justify-content-end">
              <div class="form-group">
                <label for="inputPassword" class="col-form-label"><b>Motivo:</b></label>
                <?php echo"<input type=\"text\" name=\"Motivo\" id=\"Motivo\" placeholder=\"Motivo\" class=\"form-control m-2\" value=\"Indisciplina\" maxlength=\"50\"  onkeypress=\"return NumerosLetras(event);\">"; ?>
              </div>
            </div>
            <div class="form-inline justify-content-end">
              <b>Fecha: </b><label for="Fecha" class="m-1"><?php print_r($Fecha) ?></label>
            </div>
            <h4>Del Alumno:</h4>
            <?php echo "<input type=\"hidden\" value=".$fila['Grupos_idGrupos']." id=\"idGrupo\" name=\"idGrupo\">" ?>
            <div align="justify">
              En mi calidad de alumno:<br><b><?php echo $fila['Nombre']." ".$fila['ApellidoP']." ".$fila['ApellidoM']; ?></b> Grupo: <b><?php echo $fila['Grado'] ."-". $fila['Grupo']; ?></b>,
              Carrera: <b><?php echo $fila['NombreCarrera']; ?></b>
              me comprometo a participar como estudiante en todo lo que ello implica, Responsabilizandome de mi asistencia puntual a cada una de mis clases que la Coordinación Académica señale, así como el cumplimiento de las actividades de estudio y crecimiento personal para conducirme con la actitud de respeto y tolerancia hacia mis compañeros, hacia los docentes y personal de apoyo de la institución.
            </div>
            <br>
            <div align="justify">
              <h4> Del Padre de Familia y/o Tutor Legal: </h4>
              <select  name="idFamiliar" class="m-1 custom-select"> 
                <?php
                include_once "../../clases/MySQLConector.php";

                $Mysql = new MySQLConector();
                $Mysql->Conectar();
                $Consulta2 = "SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM FROM familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND familiares.Tutor = '1';";
                $Resultado2 = $Mysql->Consulta($Consulta2);
                if($Resultado2)
                  while ($fila2 = mysqli_fetch_array($Resultado2)){           
                    echo "<option value=\"{$fila2['idFamiliares']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
                  }
                  ?>
                </select>
                Como padre de familia y/o tutor legal del alumno me responsabilizo en apoyar e impulsar la participación activa de mi hijo(a) en sus actividades del Colegio, asi como
                también en atender e involucrarme en las acciones que las autoridades del plantel me sugieran y que favorezcan al desarrollo integral y académico de mi hijo(a).
              </div>
            <?php } ?>
            <br>
            
            <label for="comment"><h4> Acuerdos Realizados: </h4> </label>
            <textarea class="form-control" name="Acuerdos" id="Acuerdos" onkeyup="myFunction(event)"  onkeypress="return NumerosLetras(event);">-</textarea>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <a href="ConsultasCartaCompromisoTutor.php"><button type="submit" class="btn btn-success">Guardar</button></a>
              </div> 
            </div>
            <br><br><br>
            <!--Fin de contenido de caja de texto--> 
            <!--Fin Contenido central-->
          </form>
        </div>
      <?php } else {

        $idFamiliar = $_POST['idFamiliar'];
        $idPersonal = $_SESSION['IdDocenteTutor'];;
        $Alumno_idAlumno = $_SESSION['IdAlumnoDocenteTutor'];
        $idGrupo = $_POST['idGrupo'];
        
        $CadenaAcuerdosRealizados =explode("\n", $_POST['Acuerdos']);
        $AcuerdosRealizados = '';
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
            $AcuerdosRealizados = $AcuerdosRealizados.substr($CadenaAcuerdosRealizados[$i],0,$TamanoCadena).'.'.'|';
          }elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
            $AcuerdosRealizados = $AcuerdosRealizados.'-'.substr($CadenaAcuerdosRealizados[$i],0,$TamanoCadena).'.'.'|';
          } elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
            $AcuerdosRealizados = $AcuerdosRealizados.$CadenaAcuerdosRealizados[$i].'|';
          }elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
            $AcuerdosRealizados = $AcuerdosRealizados;
          }elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
            $AcuerdosRealizados = $AcuerdosRealizados;
          }elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
            $AcuerdosRealizados = $AcuerdosRealizados.'-'.substr($CadenaAcuerdosRealizados[$i],0,$TamanoCadena).'|';
          }elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
            $AcuerdosRealizados = $AcuerdosRealizados;
          }elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
            $AcuerdosRealizados = $AcuerdosRealizados;
          }
                  //echo "<script language='javascript'>alert('".$AcuerdosRealizados."')</script>";
        }

        //print_r('Listones'.$AcuerdosRealizados);
        $Motivo = $_POST['Motivo'];
        $Lugar = $_POST['Lugar'];
        
        include_once "../../clases/SQLControlador.php";
        include_once "../../clases/cartacompromiso.php";

        $Cartacompromiso = new cartacompromiso();
        $Cartacompromiso->setidFamiliares($idFamiliar);
        $Cartacompromiso->setidPersonal($idPersonal);
        $Cartacompromiso->setidGrupo($idGrupo);
        $Cartacompromiso->setAlumno_idAlumno($Alumno_idAlumno);
        $Cartacompromiso->setLugar($Lugar);
        $Cartacompromiso->setFecha($Fecha);
        $Cartacompromiso->setAcuerdosRealizados($AcuerdosRealizados);
        $Cartacompromiso->setMotivo($Motivo);


        $SQLControlador = new SQLControlador();
        $SQLControlador->InsertarCartaCompromiso($Cartacompromiso);
      }
      ?>
      
      <div class="col-sm-1"></div>
      <?php include '../menus/PiePagina.php';?>
      
    </div>
  </div>
  <!--Fin Contenedor medio-->
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#Lugar').on('input', function (e) {
      if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
      }
    });
    
      $('#Motivo').on('input', function (e) {
        if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
        }
      });

        $('#Acuerdos').on('input', function (e) {
          if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
          }
        });
      });
</script>