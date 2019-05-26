<?php 
if (!isset($_SESSION)) { session_start(); }

function MenuInicioIndex(){
		echo '     <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="#"><center><h1>Sistema Integral CECyTE Plantel Río Grande</h1></center></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="script/formularios/alumno/LoginAlumno.php">Alumnos<center><div class="icono-user"></div></center></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mr-3 " href="script/formularios/docentetutor/LoginDocenteTutor.php">Tutorias<center><div class="icono-teacher"></div></center></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mr-3 " href="script/formularios/capturista/LoginCE.php">Capturista<center><div class="icono-laptop"></div></center></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mr-3 " href="script/formularios/docente/LoginDocente.php">Calificaciones<center><div class="icono-book"></div></center></i></a>
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



