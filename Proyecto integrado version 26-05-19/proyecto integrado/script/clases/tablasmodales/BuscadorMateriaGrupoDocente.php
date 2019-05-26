<?php 
	//require_once "../php/conexion.php";


	include_once "../SQLControlador.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();
    $Consulta = "SELECT materiagruposdocentes.idMateriaGruposDocentes, materiagruposdocentes.Personal_idPersonal, materiagruposdocentes.Materia_idMateria, materia.Nombre, materiagruposdocentes.idGrupo, grupos.Grado,grupos.Grupo,carreras.Nombre FROM materiagruposdocentes INNER JOIN materia ON materiagruposdocentes.Materia_idMateria=materia.idMateria INNER JOIN grupos ON materiagruposdocentes.idGrupo=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE grupos.Estatus=1 AND (materiagruposdocentes.Personal_idPersonal>0 OR materiagruposdocentes.Personal_idPersonal IS NULL);";
    $Resultado = $Mysql->Consulta($Consulta);

 ?>

<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label style="font-weight: bold;">Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php
				while($ver=mysqli_fetch_row($Resultado)): 
			 ?>
				<option value="<?php echo $ver[0] ?>">
					<?php echo $ver[5].".".$ver[6]." ".$ver[3]."-".$ver[7]?>
				</option>

			<?php endwhile; ?>

		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"GET",
					data:'Valor=' + $('#buscadorvivo').val(),
					url:'./../../../script/clases/tablasmodales/CrearSessionMateriaGrupoDocente.php',
					success:function(r){
						$('#tabla').load('./../../../script/clases/tablasmodales/TablaMateriaGruposDocentes.php');
					}
				});
			});
		});
	</script>