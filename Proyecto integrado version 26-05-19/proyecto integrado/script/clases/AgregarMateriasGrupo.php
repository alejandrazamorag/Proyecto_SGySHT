<?php
	$IdGrupo= $_GET['idGrupo'];
	$IdCarrera=$_GET['idCarrera'];
	$IdSemestre=$_GET['idSemestre'];
	include_once "MySQLConector.php";
    $Mysql = new MySQLConector();
   	$Mysql->Conectar();
    
    //----------------------------------------------------------------------
     $Consulta = "SELECT materia.idMateria, materia.Nombre, materia.Carreras_idCarreras FROM materia INNER JOIN grupos on materia.Carreras_idCarreras=grupos.Carreras_idCarreras AND materia.Semestre=grupos.Grado WHERE materia.Carreras_idCarreras='$IdCarrera'  and materia.Semestre='$IdSemestre';";
        $Resultado = $Mysql->Consulta($Consulta);
    $Resultado = $Mysql->Consulta($Consulta);
    if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
        //////////////////////////////////////////////////////////////////////
            $Consulta = "SELECT * FROM materiagruposdocentes WHERE idGrupo ='$IdGrupo' ;";
            $Resultado = $Mysql->Consulta($Consulta);
            if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
                echo "<script language='javascript'>alert('Ya se genero la carga de materias')</script>";
                echo "<script language='javascript'>window.location = '../formularios/capturista/CatalogoGrupos.php'</script>";
                
            }else{
                $Consulta = "SELECT materia.idMateria, materia.Nombre, materia.Carreras_idCarreras FROM materia INNER JOIN grupos on materia.Carreras_idCarreras=grupos.Carreras_idCarreras AND materia.Semestre=grupos.Grado WHERE materia.Carreras_idCarreras='$IdCarrera'  and materia.Semestre='$IdSemestre';";
                $Resultado = $Mysql->Consulta($Consulta);
                while ($tupla = mysqli_fetch_array($Resultado)) {
                    $Consulta = "INSERT INTO materiagruposdocentes(idMateriaGruposDocentes, Materia_idMateria, idGrupo) VALUES (null,'$tupla[0]','$IdGrupo');";
                    $Mysql->Consulta($Consulta);
                }
                echo "<script language='javascript'>alert('Se genero la carga de materias con éxito')</script>";
                echo "<script language='javascript'>window.location = '../formularios/capturista/CatalogoGrupos.php'</script>";
            }

        /////////////////////////////////////////////////////////////////////
       
        
    }else{
        
          echo "<script language='javascript'>alert('La carrera no tiene materias, no se puede generar la carga')</script>";
           echo "<script language='javascript'>window.location = '../formularios/capturista/CatalogoGrupos.php'</script>";
    }

    //------------------------------------------------------------



   
?>