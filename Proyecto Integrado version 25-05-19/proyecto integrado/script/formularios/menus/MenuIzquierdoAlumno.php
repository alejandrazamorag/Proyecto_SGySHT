<?php
if (!isset($_SESSION)) { session_start(); }

	echo '<div class="dropdown-menu2" role="menu" style="display: block; position: static; margin-bottom: 5px;width: 220px;margin-left: 10px;margin-top: 10px;" aria-labelledby="dropdownmenu">
            <h6 class="dropdown-header">Menú</h6>

            <div class="dropdown-divider"></div>';
                        include_once "../../clases/SQLControlador.php";
                        include_once "../../clases/Alumno.php";
                        include_once "../../clases/ExpectativaNuevaForm.php";

                        $Mysql = new MySQLConector();
                        $Mysql->Conectar();
                        $Consulta = "SELECT * FROM expectativanuevaform WHERE Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."';";
                        $Resultado = $Mysql->Consulta($Consulta);
                        if ($Resultado->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                            echo '<a class="dropdown-item" href="ConsultaModificacionFichaIdentificacionAlumno.php">Ficha de identificación</a>';
                        }else{
                          
                          echo '<a class="dropdown-item" href="AltaFichaIdentificacionAlumno.php">Ficha de identificación</a>';
                        }

                        '<a class="dropdown-item" href="enproceso.php">Ficha de identificación</a>';
                        $Mysql = new MySQLConector();
                        $Mysql->Conectar();
                        $Consulta2 = "SELECT Total FROM testaprendizaje WHERE Alumno_idAlumno='".$_SESSION['IdUsuarioAlumno']."';";
                        $Resultado2 = $Mysql->Consulta($Consulta2);
                        if ($Resultado2->num_rows > 0) {//si la variable tiene al menos 1 fila entonces seguimos con el codigo
                            echo '<a class="dropdown-item" href="ConsultaTestAprendizaje.php">Test de aprendizaje</a>';
                        }else{
                          
                          echo '<a class="dropdown-item" href="TestAprendizajeAlumno.php">Test de aprendizaje</a>';
                        }
           echo'<a class="dropdown-item" href="EncuestaReprobacion.php">Encuesta de reprobación</a>
        </div>';
 
?>