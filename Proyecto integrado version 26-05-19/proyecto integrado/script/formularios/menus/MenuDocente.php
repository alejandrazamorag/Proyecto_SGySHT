<?php 
if (!isset($_SESSION)) { session_start(); }

function MenuLogindDocente(){
		echo '     <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="#"><h1>Sistema Integral Docente</h1></a>
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


function MenuDocente(){
		echo '        <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                  <a class="nav-link mr-3 " href="InicioCE.php"><h1> Hola '.$_SESSION['NombreUsuarioDocente'].'</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                      <a class="nav-link" href="../menus/CerrarSesion.php">Sign Out <center><div class="icono-off"></div></center></i></a>
                    </li>

                  </ul>
                </div>
              </nav>
            </div>
          </div>';
}


function MenuListarGrupos(){
    echo '     <div class="row">
          <div class="col-sm-12">
              <div class="mynav"> 
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="./../../../imagenes/Rio Grande2.jpg" width="110" height="60" style="margin-right:10px" >
                 <a class="nav-link mr-3 " href="InicioCE.php"><h1> Hola '.$_SESSION['NombreUsuarioDocente'].'</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a class="nav-link mr-3 " href="BusquedaTodosGrupos.php">Volver<center><div class="icono-undo"></div></center></i></a>
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



