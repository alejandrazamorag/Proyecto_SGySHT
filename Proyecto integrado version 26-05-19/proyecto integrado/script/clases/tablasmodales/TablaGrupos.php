
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
		<!--<h2>Tabla de carreras</h2>-->
		<br>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo grupo
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<br>
			<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<br>
			</caption>
			<thead class="thead-light">
			<tr>
				<th>Id</td>
				<th>Asesor</td>
				<th>Carrera</td>
				<th>Grado</td>
				<th>Grupo</td>
				<th>Ciclo escolar</td>
				<th>Estatus</td>
				<th>Editar</td>
				<th>Carga</th>	
			</tr>
			</thead>

			<?php 

			if(isset($_SESSION['ConsultaG'])){
				if($_SESSION['ConsultaG'] > 0){
					$IdGrupos=$_SESSION['ConsultaG'];

					$Consulta = "SELECT grupos.idGrupos, grupos.idAsesor, CONCAT( personal.Nombre,' ', personal.ApellidoP,' ', personal.ApellidoM) AS NombreTutor, grupos.Carreras_idCarreras,carreras.Nombre,grupos.Grado, grupos.Grupo, grupos.CicloEscolar, grupos.Estatus FROM grupos INNER JOIN personal ON grupos.idAsesor=personal.idPersonal INNER JOIN carreras on grupos.Carreras_idCarreras=carreras.idCarreras where grupos.idGrupos='$IdGrupos';";

				}else{
					$Consulta = "SELECT grupos.idGrupos, grupos.idAsesor, CONCAT( personal.Nombre,' ', personal.ApellidoP,' ', personal.ApellidoM) AS NombreTutor, grupos.Carreras_idCarreras,carreras.Nombre,grupos.Grado, grupos.Grupo, grupos.CicloEscolar, grupos.Estatus FROM grupos INNER JOIN personal ON grupos.idAsesor=personal.idPersonal INNER JOIN carreras on grupos.Carreras_idCarreras=carreras.idCarreras;";
				}
			}else{
				$Consulta = "SELECT grupos.idGrupos, grupos.idAsesor, CONCAT( personal.Nombre,' ', personal.ApellidoP,' ', personal.ApellidoM) AS NombreTutor, grupos.Carreras_idCarreras,carreras.Nombre,grupos.Grado, grupos.Grupo, grupos.CicloEscolar, grupos.Estatus FROM grupos INNER JOIN personal ON grupos.idAsesor=personal.idPersonal INNER JOIN carreras on grupos.Carreras_idCarreras=carreras.idCarreras;";
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
				$ver[7]."||".
				$ver[8];
				//echo $datos;
				?>

				<tr>

					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[2] ?></td>
					<td><?php echo $ver[4] ?></td>
					<td><?php echo $ver[5] ?></td>
					<td><?php echo $ver[6] ?></td>
					<td><?php echo $ver[7] ?></td>
					<td><?php
					if($ver[8]==1){
						echo "Activo";
					}else if($ver[8]==0){
						echo "Inactivo";
					} ?>

				</td>
				<td>
					<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerDatosGrupoModificacion('<?php echo $datos ?>')">
						Modificar
					</button>
				</td>
				<td>
					<form action="../../clases/AgregarMateriasGrupo.php?idGrupo=<?php  echo $ver[0];?>&idCarrera=<?php  echo $ver[3]?>&idSemestre=<?php  echo $ver[5]?>" method="post" OnClick="if (! confirm('La carga de materias se realizara una vez, ¿estas seguro de realizarla ahora?')) return false;"><button class='btn btn-success'>Cargar materias</button></form>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	<br>
	<br>
	</div>
</div>
</div>