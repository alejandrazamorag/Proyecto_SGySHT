
<?php 
if (!isset($_SESSION)) { session_start(); }


	//require_once "../php/conexion.php";
	//$conexion=conexion();

include_once "../SQLControlador.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();

?>

	

<div class="row">
	<div class="col-sm-12">
		<caption>
			<br>
			<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<br>
			</caption>
			<thead class="thead-light">
			<tr>
				<th>Id</td>
				<th>Carrera</td>
				<th>Grado</td>
				<th>Grupo</td>
				<th>Materia</td>
				<th>Docente asignado para materia</td>
				<th>Editar</td>	
			</tr>
			</thead>

			<?php 

			if(isset($_SESSION['ConsultaMGD'])){
				if($_SESSION['ConsultaMGD'] > 0){
					$Id=$_SESSION['ConsultaMGD'];

					$Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes, materiagruposdocentes.Personal_idPersonal, materiagruposdocentes.Materia_idMateria, materia.Nombre, materiagruposdocentes.idGrupo, grupos.Grado,grupos.Grupo,carreras.Nombre FROM materiagruposdocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria=materia.idMateria INNER JOIN grupos ON materiagruposdocentes.idGrupo=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE grupos.Estatus=1 AND (materiagruposdocentes.Personal_idPersonal>0 OR materiagruposdocentes.Personal_idPersonal IS NULL) AND materiagruposdocentes.idMateriaGruposDocentes='$Id';";

				}else{
					$Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes, materiagruposdocentes.Personal_idPersonal, materiagruposdocentes.Materia_idMateria, materia.Nombre, materiagruposdocentes.idGrupo, grupos.Grado,grupos.Grupo,carreras.Nombre FROM materiagruposdocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria=materia.idMateria INNER JOIN grupos ON materiagruposdocentes.idGrupo=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE grupos.Estatus=1 AND (materiagruposdocentes.Personal_idPersonal>0 OR materiagruposdocentes.Personal_idPersonal IS NULL);";
				}
			}else{
				$Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes, materiagruposdocentes.Personal_idPersonal, materiagruposdocentes.Materia_idMateria, materia.Nombre, materiagruposdocentes.idGrupo, grupos.Grado,grupos.Grupo,carreras.Nombre FROM materiagruposdocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria=materia.idMateria INNER JOIN grupos ON materiagruposdocentes.idGrupo=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE grupos.Estatus=1 AND (materiagruposdocentes.Personal_idPersonal>0 OR materiagruposdocentes.Personal_idPersonal IS NULL);";
			}
			$Resultado = $Mysql->Consulta($Consulta);

			while($ver=mysqli_fetch_row($Resultado)){ 

				$datos=$ver[0]."||".
				$ver[1]."||".
				$ver[2]."||".
				$ver[3]."||".
				$ver[4]."||".
				$ver[5]."||".
				$ver[6]."||".
				$ver[7];
				?>

				<tr>

					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[7] ?></td>
					<td><?php echo $ver[5] ?></td>
					<td><?php echo $ver[6] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php
					if($ver[1]==NULL){
					 	echo "No hay docente asignado";
					}else{
		               $Consulta2="SELECT CONCAT( personal.Nombre,' ', personal.ApellidoP,' ', personal.ApellidoM) AS NombreDocente FROM personal WHERE personal.idPersonal=$ver[1];";
		               $Resultado2 = $Mysql->Consulta($Consulta2);
					   $row = mysqli_fetch_array($Resultado2);
					   echo $Nombre = $row['NombreDocente'];	
					}
					 ?></td>
				</td>
				<td>
					<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerDocenteMateriaGrupo('<?php echo $datos ?>')">
						Modificar
					</button>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	<br><br>
	<br>
	</div>
</div>
</div>