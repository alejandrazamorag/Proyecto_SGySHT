<?php
if (!isset($_SESSION)) { session_start(); }

	echo '<div class="dropdown-menu2" role="menu" style="display: block; position: static; margin-bottom: 5px;width: 220px;margin-left: 10px;margin-top: 10px;" aria-labelledby="dropdownmenu">
            <h6 class="dropdown-header">Menú</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="AltaDatosFamiliares">Alta de familiares y/o tutores</a>           
            <a class="dropdown-item" href="ModificacionDatosBasico.php">Modificación datos básicos</a>
            <a class="dropdown-item" href="SubirImgAlumnoCap.php">Agregar fotografía</a>
            <a class="dropdown-item" href="CargaAcademicaAlumno.php">Carga académica</a>
        </div>';
 
?>