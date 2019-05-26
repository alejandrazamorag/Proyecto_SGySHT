<?php 
if (!isset($_SESSION)) { session_start(); }

function MenuLoginDocenteTutor(){
		echo '     <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="#"><h1>Sistema Integral Docente-Tutor</h1></a>
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


function MenuDocenteTutorAlumnoInicio(){
    echo '        <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="InicioCE.php"><h1> Hola '.$_SESSION['NombreDocenteTutor'].'</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="InicioAlumnoTodos.php"><center></center></i></a>
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

function MenuAlumnoDocenteTutor(){
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
                      <a class="nav-link mr-3 " href="../menus/CerrarSesionAlumnoDT.php">Volver<center><div class="icono-undo"></div></center></i></a>
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

function MenuAlumnoDocenteCartaCompromiso(){
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
                      <a class="nav-link mr-3 " href="../docentetutor/ConsultasCartaCompromisoTutor.php">Cartas.C<center><div class="icono-undo"></div></center></i></a>
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

function MenuAlumnoDocenteTutoriaIndividual(){
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
                      <a class="nav-link mr-3 " href="../docentetutor/ConsultasTutoriaIndividualTutor.php">Tutorias<center><div class="icono-undo"></div></center></i></a>
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


function MenuAlumnoDocenteCanalizacion(){
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
                      <a class="nav-link mr-3 " href="../docentetutor/ConsultasCanalizaciones.php">Canlz<center><div class="icono-undo"></div></center></i></a>
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

function MenuAlumnoDocenteSolicitidBaja(){
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
                      <a class="nav-link mr-3 " href="../docentetutor/ConsultasSolicitudBaja.php">S.Bajas<center><div class="icono-undo"></div></center></i></a>
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

function MenuAlumnoDocenteCartaResponsiva(){
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
                      <a class="nav-link mr-3 " href="../docentetutor/TodasCartaResponsiva.php">Cartas.R<center><div class="icono-undo"></div></center></i></a>
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



