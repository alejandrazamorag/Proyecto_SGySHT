<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
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
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
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
    	<?php include "../menus/MenuCapturista.php";
      MenuAlumnoCapturista();?>
    </div>
    <!--Fin contenedor Cabecera-->

    <!--Inicio Contenedor medio-->
    <div class="container" id="contenedor">
      <!--Poner titulo o nombre -->
              <?php
                include_once "../../clases/MySQLConector.php";
                $Mysql = new MySQLConector();
                $Mysql->Conectar();
                $Consulta = "SELECT Nombre from alumno where idAlumno='".$_SESSION['IdAlumnoCapturista']."';";
                $Resultado = $Mysql->Consulta($Consulta);
               if ($Resultado->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                          while ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
                            $NombreAlumno= $row["Nombre"];
                          }
                }
              ?>
              <br><center><h2> Subir Imagen del alumno <?php echo $NombreAlumno?> </h2></center>
            <!--Poner titulo o nombre -->
      
      <div class="row">
        <!--Inicio de menu izquierdo-->

        <div class="col-sm-3">

          <?php include '../menus/MenuIzquierdoAlumnoCap.php';
          ?>
        
          <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--Fin inicio menu izquierdo-->
        </div>
        <!--Inicio Contenido central-->
        <div class="col-sm-9">
           <table class="table table-responsive">
          <br>
          <div class="row">
        	   <div class="col-sm-3"  style=" top: 0px; left: 0px;">
               <div class="main">
                  <div class="panel panel-primary">
                    <div class="panel panel-primary">
                      <?php  
                       include_once "../../clases/SQLControlador.php";                                     
                        $Consulta = "SELECT Fotografia from alumno where idAlumno='".$_SESSION['IdAlumnoCapturista']."';";
                       $Resultado = $Mysql->Consulta($Consulta);
                        if ($Resultado->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                          while ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
                            echo "<img width='210' height='260' src='data:imagen/jpeg;base64,".base64_encode($row["Fotografia"]). "' />";
                          }
                        }else{

                          echo "<font color='red'>Aun no hay fotografia</font>";
                        }
                      ?>
                      </div>
                    </div>
                 </div>  
            </div>
            <div class="col-sm-9"  style=" top: 0px; left: 0px;">
              <div class="main">
                    <div class="panel panel-primary">
                      <div class="panel-body">
                        <?php
                        if(!isset($_POST["submit"])){
                          ?>
                        <form name="SubirImg" id="SubirImg" method="post" action="SubirImgAlumnoCap.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <br><br><br>
                            <label class="col-sm-6 control-label">Seleccione imagen a cargar</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="image" name="image" required>
                              <center><button name="submit" class="btn btn-success center-block">Cargar Imagen</button></center>
                            </div>
                            
                          </div>
                        </form>
                        <?php
                          }
                          if(isset($_POST["submit"])){
                              $check = getimagesize($_FILES["image"]["tmp_name"]);
                              if($check !== false){
                                  $image = $_FILES['image']['tmp_name'];
                                  $imgContent = addslashes(file_get_contents($image));
                                  $dbHost     = 'localhost';
                                  $dbUsername = 'root';
                                  $dbPassword = '';
                                  $dbName     = 'cecyte';
                              
                                  $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
                                  
                                  if($db->connect_error){
                                      die("Connection failed: " . $db->connect_error);
                                  }
                                  
                                  
                                  //Insert image content into database
                                  $insert = $db->query("UPDATE alumno SET Fotografia ='$imgContent' where idAlumno='".$_SESSION['IdAlumnoCapturista']."';");
                                  if($insert){
                                      //echo "File uploaded successfully.";
                                      echo "<script language='javascript'>alert('La imagen se subio exitosamente')</script>";
                                      echo "<script language='javascript'>window.location = 'SubirImgAlumnoCap.php'</script>";
                                  }else{
                                     // echo "File upload failed, please try again.";
                                      echo "<script language='javascript'>alert('Error al subir imagen')</script>";
                                      echo "<script language='javascript'>window.location = 'SubirImgAlumnoCap.php'</script>";
                                  } 
                              }else{
                                  //echo "Please select an image file to upload.";
                                echo "<script language='javascript'>alert('Selecciona una imagen con el formato correcto')</script>";
                                  echo "<script language='javascript'>window.location = 'SubirImgAlumnoCap.php'</script>";
                              }
                          } 
                        ?> 
                      
                      </div> 
                      </div>
                   </div>
                  <br><br><br><br><br><br>
            </div>

        			</div>
             </table>
        	<!--Fin de contenido de caja de texto--> 
        </div>
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