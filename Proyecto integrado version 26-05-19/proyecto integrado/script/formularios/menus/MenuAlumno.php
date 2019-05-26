<?php 
if (!isset($_SESSION)) { session_start(); }

//echo 'este sera el menu <br />';
function menuLoginAlumno(){
		echo '    <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="#"><h1>Sistema Integral Alumno</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="../menus/CerrarSesion.php">Home<center><div class="icono-home"></div></center></i></a>
                    </li>
                   </ul>
                </div>
              </nav>
            </div>
          </div>
       </div>
	';
}

function menuAlumno(){
		echo '<div class="row">
        	<div class="col-sm-12">
        		  <div class="mynav"> 
				      <nav class="navbar navbar-expand-lg navbar-light bg-light">
				        <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
				        	<a class="nav-link mr-3 " href="inicioalumno.php"><h1> Hola '.$_SESSION['NombreAlumno'].'</h1></a>
				        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				          <span class="navbar-toggler-icon"></span>
				        </button>
				        <div class="collapse navbar-collapse" id="navbarSupportedContent">
				          <ul class="navbar-nav mr-auto">
				           <li class="nav-item">
				              <a class="nav-link mr-3 " href="PerfilAlumno.php">Perfil <center> <div class="icono-user"></div></center></i></a>
				            </li>
				             <li class="nav-item">
				              <a class="nav-link" href="../menus/CerrarSesion.php">Salir <center> <div class="icono-off"></div></center></i></a>
				            </li>
				          </ul>
				        </div>
				      </nav>
				    </div>
        	</div>
       </div>';
}
function menuAlumnoEncuesta(){
    echo '<div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="inicioalumno.php"><h1> Hola '.$_SESSION['NombreAlumno'].'</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="EncuestaReprobacion.php">Volver <center> <div class="icono-undo"></div></center></i></a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="../menus/CerrarSesion.php">Salir<center> <div class="icono-off"></div></center></i></a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
       </div>';
}
?>

