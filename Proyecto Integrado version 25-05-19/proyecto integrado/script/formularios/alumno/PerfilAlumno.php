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
  </head>


  <body>
    <!--Inicio contenedor Cabecera-->
    <div class="container">
    	<br>
    	<?php include "../menus/MenuAlumno.php";
      MenuAlumno();?>
    </div>
    <!--Fin contenedor Cabecera-->

    <!--Inicio Contenedor medio-->
    <div class="container" id="contenedor">
      <!--Poner titulo o nombre -->
              <br><center><h2> Modificación de perfil</h2></center>
            <!--Poner titulo o nombre -->
      
      <div class="row">
        <!--Inicio de menu izquierdo-->

        <div class="col-sm-3">

          <?php include '../menus/MenuIzquierdoAlumno.php';
          ?>
      
        <!--Fin inicio menu izquierdo-->
        </div>
        <!--Inicio Contenido central-->
        <div class="col-sm-6">
        	<!--Inicio de contenido de caja de texto--> 
            <?php  
                    if (!isset($_POST['contrasena1']) | !isset($_POST['contrasena2'])) {   
                        include_once "../../clases/SQLControlador.php";
                        include_once "../../clases/UsuariosAlumnos.php";

                        $Mysql = new MySQLConector();
                        $Mysql->Conectar();
                        $Consulta = "SELECT * FROM usuariosalumnos WHERE Alumno_idAlumno ='".$_SESSION['IdUsuarioAlumno']."';";
                        $Resultado = $Mysql->Consulta($Consulta);
                        $row = mysqli_fetch_array($Resultado);

                        $NombreUsuario=$row["NombreUsuario"];
                        $Contrasena=$row["Contrasena"];  
                ?>
            <form method="POST" action="perfilalumno.php" class="form-horizontal">
              <br><br>
              <div class="form-group">
                  <label for="formGroupExampleInput">Nombre de usuario</label>
                  <input type="text" class="form-control" name=NomUsuario required value="<?php echo $NombreUsuario?>" readonly="readonly" >
                  <input type="text" class="form-control" name=ContUsuario required value="<?php echo $Contrasena?>" readonly="readonly" style="visibility:hidden;">
              </div>
              <div class="form-group">
                  <label for="formGroupExampleInput">Nueva contraseña</label>
                  <input type="password" class="form-control" name=contrasena1 required placeholder="Ingresa la nueva contraseña">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Confirmar Contraseña</label>
                <input type=password class="form-control" name=contrasena2 required placeholder="Confirma la nueva contraseña">
              </div>
              <div class="col-xs-6">
                        <input class="btn btn-success center-block " type="submit" name="Inicar" value="Modificar"></input>
              </div>
              <br><br><br>
            </form>

            <?php
              }
              else{
                    $ContrasenaOriginal=$_POST['ContUsuario'];
                    $Contrasena1 = md5($_POST['contrasena1']);
                    $Contrasena2 = md5($_POST['contrasena2']);
                    if (($ContrasenaOriginal == $Contrasena1) && ($ContrasenaOriginal == $Contrasena2)) {
                        echo "<script language='javascript'>alert('No se registraron cambios')</script>";
                        echo "<script language='javascript'>window.location='PerfilAlumno.php'</script>";
                    } else if ($Contrasena1 == $Contrasena2) {

                        $SQLControlador = new SQLControlador();
                        $UsuariosAlumnos = new UsuariosAlumnos();
                        $UsuariosAlumnos->setAlumno_idAlumno($_SESSION['IdUsuarioAlumno']);
                        $UsuariosAlumnos->setContrasena($Contrasena1);
                        $SQLControlador->ModificarContrasenaAlumno($UsuariosAlumnos);
                    } else {
                        echo "<script language='javascript'>alert('Las contraseñas no coinciden')</script>";
                        echo "<script language='javascript'>window.location='PerfilAlumno.php'</script>";
                    }

                    }
            ?>
        
        </div>
        <div class="col-sm-3">
          
        </div>
        			
        	<!--Fin de contenido de caja de texto--> 
        <!--Fin Contenido central-->
      
    </div>
    <!--Fin Contenedor medio-->
     <?php include "../menus/PiePagina.php";?>
    <!--Inicio de pie de pagina-->
      <div class="container">
     <!-- <?php //include 'pie_pagina.php';?>-->
    </div>
    <!--fin de pie de pagina-->
  </body>
</html>