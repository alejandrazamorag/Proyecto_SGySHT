<?php
    if (!isset($_SESSION)) { session_start(); }
    include_once "MySQLConector.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();
    $Consulta="SELECT Grupos_idGrupos FROM alumno WHERE idAlumno='".$_SESSION['IdAlumnoCapturista']."';";
    $Resultado = $Mysql->Consulta($Consulta);
    $row = mysqli_fetch_array($Resultado);
    $IdGrupo = $row['Grupos_idGrupos'];
    /////////////////////////////////////////////////////////////////////

     $Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes FROM materiagruposdocentes WHERE idGrupo='$IdGrupo' ;";
    $Resultado = $Mysql->Consulta($Consulta);

    if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
         //////////////////////////////////////////////////////////////////////////////
         $Consulta = "SELECT calificaciones.idCalificaciones,calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes,materia.idMateria,materia.Nombre,materiagruposdocentes.Personal_idPersonal,CONCAT(personal.Nombre,' ',personal.ApellidoP,' ', personal.ApellidoM)AS NombreDocente FROM calificaciones INNER JOIN materiagruposdocentes on calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes=materiagruposdocentes.idMateriaGruposDocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria=materia.idMateria INNER JOIN personal ON materiagruposdocentes.Personal_idPersonal=personal.idPersonal WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdAlumnoCapturista']."' and calificaciones.idGrupo='".$IdGrupo."';";
        $Resultado = $Mysql->Consulta($Consulta);

        if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
            echo "<script language='javascript'>alert('La carga de materias ya se ha realizado')</script>";
            echo "<script language='javascript'>window.location = '../formularios/capturista/CargaAcademicaAlumno.php'</script>";

        }else{
            $Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes FROM materiagruposdocentes WHERE idGrupo='$IdGrupo' ;";
            $Resultado = $Mysql->Consulta($Consulta);
            while ($tupla = mysqli_fetch_array($Resultado)) {
                $Consulta = "INSERT INTO calificaciones (idCalificaciones, MateriaGruposDocentes_idMateriaGruposDocentes,Alumno_idAlumno,idGrupo) VALUES (null,'$tupla[0]','".$_SESSION['IdAlumnoCapturista']."','".$IdGrupo."')";
                //echo $Consulta;
                $Mysql->Consulta($Consulta);
            }
            echo "<script language='javascript'>alert('Se genero la carga de materias con éxito')</script>";
            echo "<script language='javascript'>window.location = '../formularios/capturista/CargaAcademicaAlumno.php'</script>";
        }

        ///////////////////////////////////////////////////////////////////////////////
    }else{
         echo "<script language='javascript'>alert('No hay materias disponibles para realizar la carga academica.')</script>";
         echo "<script language='javascript'>window.location = '../formularios/capturista/CargaAcademicaAlumno.php'</script>";

    }
    /////////////////////////////////////////////////////////////////////

   
?>