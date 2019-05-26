<?php 
if (!isset($_SESSION)) { session_start(); }
	include_once "../MySQLConector.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();

	$Consulta ="SELECT alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno, cartacompromiso.idCartaCompromiso ,cartacompromiso.Fecha, cartacompromiso.AcuerdosRealizados, cartacompromiso.Motivo FROM alumno, cartacompromiso WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor'] ."' AND cartacompromiso.Alumno_idAlumno = alumno.idAlumno;";
	
	$Resultado = $Mysql->Consulta($Consulta);

 ?>

 <div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label ><b>Buscador</b></label>
		<select id="buscadorvivo">
			<option value="0">Seleciona uno</option>
			<?php while($fila = $Resultado->fetch_assoc()){ ?>
				<option value="<?php echo $fila['idCartaCompromiso'] ?>">
					<?php echo $fila['Fecha']." ".$fila['Motivo'] ?>
				</option>
			<?php }?> 
		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'../../clases/tablasmodales/CrearSessionCartaComprimosoAlumno.php',
					success:function(r){
						$('#tabla').load('../../clases/tablasmodales/TablaCartaCompromiso.php');
					}
				});
			});
		});
	</script>