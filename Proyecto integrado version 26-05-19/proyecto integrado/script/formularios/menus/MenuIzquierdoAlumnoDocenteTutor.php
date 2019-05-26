<?php
if (!isset($_SESSION)) { session_start(); }

	echo '<div class="dropdown-menu2" role="menu" style="display: block; position: static; margin-bottom: 5px;width: 220px;margin-left: 10px;margin-top: 10px;" aria-labelledby="dropdownmenu">
            <h6 class="dropdown-header">Menú</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="ConsultaFichaIdentificacionTutor.php">Ficha de identificación</a>           
            <a class="dropdown-item" href="ConsultaTestAprendizaje.php">Test Aprendizaje</a>
            <a class="dropdown-item" href="ConsultasCartaCompromisoTutor.php">Carta compromiso</a>
            <a class="dropdown-item" href="TodasCartaResponsiva.php">Carta Responsiva</a>
            <a class="dropdown-item" href="ConsultasTutoriaIndividualTutor.php">Tutoria Individual</a>
            <a class="dropdown-item" href="TodasEncuestasReprobacion">Encuesta de reprobación</a>
            <a class="dropdown-item" href="ConsultasCanalizaciones.php">Canalización</a>
            <a class="dropdown-item" href="ConsultasSolicitudBaja.php">Solicitud de baja</a>
        </div>';
 
?>