<?php
  session_start();
    include_once "../SQLControlador.php";
    include_once "../Alumno.php";

    $Mysql = new MySQLConector();
    $Mysql->Conectar();

    $salida = "";

       // $query = "SELECT * FROM jugadores WHERE Name NOT LIKE '' ORDER By Id_no LIMIT 25";
    $Consulta = "SELECT alumno.idAlumno,alumno.NC, CONCAT(alumno.Nombre, ' ' , alumno.ApellidoP, ' ' , alumno.ApellidoM) AS NombreCompleto, carreras.Nombre AS NombreCarrera, CONCAT(grupos.Grado,' ', grupos.Grupo) AS GradoGrupo FROM alumno INNER JOIN grupos on alumno.Grupos_idGrupos= grupos.idGrupos INNER JOIN carreras on grupos.Carreras_idCarreras=carreras.idCarreras INNER JOIN personaltutores ON alumno.Grupos_idGrupos= personaltutores.idGrupos WHERE personaltutores.idPersonal='".$_SESSION['IdDocenteTutor']."' and alumno.Nombre NOT LIKE '' ORDER By idAlumno;";

    if (isset($_POST['consulta'])) {
        $q = $_POST['consulta'];
        $Consulta = "SELECT alumno.idAlumno,alumno.NC, CONCAT(alumno.Nombre, ' ' , alumno.ApellidoP, ' ' , alumno.ApellidoM) AS NombreCompleto, carreras.Nombre AS NombreCarrera, CONCAT(grupos.Grado,' ', grupos.Grupo) AS GradoGrupo FROM alumno INNER JOIN grupos on alumno.Grupos_idGrupos= grupos.idGrupos INNER JOIN carreras on grupos.Carreras_idCarreras=carreras.idCarreras INNER JOIN personaltutores ON alumno.Grupos_idGrupos= personaltutores.idGrupos WHERE personaltutores.idPersonal='".$_SESSION['IdDocenteTutor']."' and CONCAT(alumno.Nombre, ' ' , alumno.ApellidoP, ' ' , alumno.ApellidoM) LIKE '%$q%' OR alumno.NC LIKE '%$q%' OR alumno.idAlumno LIKE '%$q%' ;";
    }

    $Resultado = $Mysql->Consulta($Consulta);

    if ($Resultado->num_rows>0) {
       $salida.="<div class='table-responsive'>
                    <div class='table table-hover table-bordered'>
                        <table border=1 class='tabla_datos'>
                           <thead class='thead-light'>
                           <tr id='titulo'>
                           <th>ID</td>
                           <th>NC</td>
                           <th>Grado-Grupo</td>
                           <th>Nombre</td>
                           <th>Carrera</td>
                           <th>Ver</td>
                           </tr>
                           </thead>

                          <tbody>";
                          while ($fila = $Resultado->fetch_assoc()) {
                          $salida.="<tr>
                                <td class='table-light'>".$fila['idAlumno']."</td>
                                <td>".$fila['NC']."</td>
                                <td>".$fila['GradoGrupo']."</td>
                                <td>".$fila['NombreCompleto']."</td>
                                <td>".$fila['NombreCarrera']."</td>
                                <td><form action='../../formularios/docentetutor/CrearSesionAlumnoDocenteTutor.php?idalumno=".$fila['idAlumno']."' method='post'><button class='btn btn-success'>Ver tutorado</button></a></form></td>
                            </tr>";
                            }
                    $salida.="</tbody></table></div></div><br>";
                  }else{
                     $salida.="NO HAY DATOS :(";
                  }

                  echo $salida;
$Mysql->CerrarConexion();
?>