<?php
session_start();
    include_once "../SQLControlador.php";
    include_once "../Alumno.php";

    $Mysql = new MySQLConector();
    $Mysql->Conectar();

    $salida = "";

       // $query = "SELECT * FROM jugadores WHERE Name NOT LIKE '' ORDER By Id_no LIMIT 25";
    $Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes,CONCAT(grupos.Grado,'.',grupos.Grupo,' ',materia.Nombre,' ',carreras.Nombre) AS Todo from materiagruposdocentes INNER JOIN grupos on materiagruposdocentes.idGrupo=grupos.idGrupos INNER JOIN materia ON materia.idMateria= materiagruposdocentes.Materia_idMateria INNER JOIN carreras on carreras.idCarreras =grupos.Carreras_idCarreras WHERE materiagruposdocentes.Personal_idPersonal='".$_SESSION['IdUsuarioDocente']."' AND grupos.Estatus=1;";

    if (isset($_POST['consulta'])) {
        $q = $_POST['consulta'];
        $Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes,CONCAT(grupos.Grado,'.',grupos.Grupo,' ',materia.Nombre,' ',carreras.Nombre) AS Todo from materiagruposdocentes INNER JOIN grupos on materiagruposdocentes.idGrupo=grupos.idGrupos INNER JOIN materia ON materia.idMateria= materiagruposdocentes.Materia_idMateria INNER JOIN carreras on carreras.idCarreras =grupos.Carreras_idCarreras WHERE materiagruposdocentes.Personal_idPersonal='".$_SESSION['IdUsuarioDocente']."'AND grupos.Estatus=1 AND CONCAT(grupos.Grado,'.',grupos.Grupo,' ',materia.Nombre,' ',carreras.Nombre) LIKE '%$q%' OR materiagruposdocentes.idMateriaGruposDocentes LIKE '%$q%' ;";
    }

    $Resultado = $Mysql->Consulta($Consulta);

    if ($Resultado->num_rows>0) {
       $salida.="<div class='table-responsive'>
                    <div class='table table-hover table-bordered'>
                        <table border=1 class='tabla_datos'>
                           <thead class='thead-light'>
                           <tr id='titulo'>
                           <th>ID</td>
                           <th>Detalle</td>
                           <th>Calificaciones</td>
                           </tr>
                           </thead>

                          <tbody>";
                          while ($fila = $Resultado->fetch_assoc()) {
                          $salida.="<tr>
                                <td>".$fila['idMateriaGruposDocentes']."</td>
                                <td>".$fila['Todo']."</td>
                                <td><form action='../../formularios/docente/ListarCalificacionesGrupo.php?idgrupo=".$fila['idMateriaGruposDocentes']."' method='post'><button class='btn btn-success'>Asignar calificaciones</button></a></form></td>
                            </tr>";
                            }
                    $salida.="</tbody></table></div></div><br>";
                  }else{
                     $salida.="NO HAY DATOS :(";
                  }

                  echo $salida;
$Mysql->CerrarConexion();
?>