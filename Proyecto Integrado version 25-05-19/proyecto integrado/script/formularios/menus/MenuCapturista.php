<?php 
if (!isset($_SESSION)) { session_start(); }

function MenuLoginCapturista(){
		echo '     <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="#"><h1>Sistema Integral Capturista</h1></a>
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


function MenuCapturista(){
		echo '        <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="InicioCE.php"><h1> Hola '.$_SESSION['NombreUsuarioCAP'].'</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="InicioAlumnoTodos.php">Alumnos <center><div class="icono-user"></div></center></i></a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Control Escolar 
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../Capturista/CatalogoCarreras.php">Carreras</a>
                        <a class="dropdown-item" href="../Capturista/CatalogoMaterias.php">Materias</a>
                        <a class="dropdown-item" href="../Capturista/CatalogoGrupos.php">Grupos</a>
                        <a class="dropdown-item" href="../Capturista/CatalogoMateriaGruposDocentes.php">Asignar Docentes a Materias-grupos</a>
                      </div>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="../menus/CerrarSesion.php">Sign Out <center><div class="icono-off"></div></center></i></a>
                    </li>

                  </ul>
                </div>
              </nav>
            </div>
          </div>';
}

function MenuCapturistaAlumnoInicio(){
    echo '        <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="InicioCE.php"><h1> Hola '.$_SESSION['NombreUsuarioCAP'].'</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="InicioAlumnoTodos.php">Alumnos <center><div class="icono-user"></div></center></i></a>
                    </li>
                      <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Control Escolar 
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../Capturista/CatalogoCarreras.php">Carreras</a>
                        <a class="dropdown-item" href="../Capturista/CatalogoMaterias.php">Materias</a>
                        <a class="dropdown-item" href="../Capturista/CatalogoGrupos.php">Grupos</a>
                        <a class="dropdown-item" href="../Capturista/CatalogoMateriaGruposDocentes.php">Asignar Docentes a Materias-grupos</a>
                      </div>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="../menus/CerrarSesion.php">Sign Out <center><div class="icono-off"></div></center></i></a>
                    </li>

                  </ul>
                </div>
              </nav>
            </div>
          </div>';
}

function MenuAlumnoCapturista(){
    echo '     <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="#"><h1>Sistema Integral</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="../menus/CerrarSesionAlumnoCap.php">Volver<center><div class="icono-undo"></div></center></i></a>
                    </li>
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



?>



