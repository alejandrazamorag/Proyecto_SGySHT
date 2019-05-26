<?php 
	//require_once "../php/conexion.php";


	include_once "../SQLControlador.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();
    $Consulta = "SELECT materia.idMateria,carreras.Nombre,materia.Nombre FROM materia INNER JOIN carreras ON materia.Carreras_idCarreras=carreras.idCarreras;";
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
					<?php echo $ver[2]."-".$ver[1]?>
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
					url:'./../../../script/clases/tablasmodales/CrearSessionMaterias.php',
					success:function(r){
						$('#tabla').load('./../../../script/clases/tablasmodales/TablaMaterias.php');
					}
				});
			});
		});
	</script>