<?php
	$controladorCentros = new controladorCentros();
    $controladorEspecialidades = new controladorEspecialidades();
    //$resultadoEspecialidades = $controladorEspecialidades->index();

	if(isset($_GET['id'])){
		$row_operacion = $controladorCentros->verOperacion($_GET['id']);
	}else{
		header('Location: index.php?cargar=gestion_inicio');
	}

	if(isset($_POST['confirmar'])){
		$usuario_id_asignacion=$_SESSION['id'];
		$operacion_id=$_GET['id'];
		$centro_id=$_POST['centro_id'];
		$observacion_asignacion=$_POST['observacion_asignacion'];
	 	$controladorCentros->asignarCama($operacion_id, $centro_id, $usuario_id_asignacion, $observacion_asignacion);
		echo "<script type='text/javascript'>";
  		echo "alert('Solicitud realizada exitosamente');";
  		echo "window.location='index.php?cargar=gestion_procesar_solicitudes'";
		echo "</script>";
	}
?>

<!-- menu de opciones -->
<style type="text/css">
            body {
                background-image: url(imagenes/background2.png);
                background-repeat: repeat;
            }
</style>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      <span class="sr-only"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" width="80" height="30"/></a>
	  </div>

	  <div id="navbar" class="navbar-collapse collapse">
	  	<ul class="nav navbar-nav">
	  		<li>      
	  			<a href="?cargar=gestion_procesar_solicitudes">Volver</a>       
	      	</li>	
	  	</ul>
	    <ul class="nav navbar-nav navbar-right">
	    	
	       	<li>                    
				<a href="#nuevo" role="button" class="btn" data-toggle="modal" data-target="#ModalAyuda">Ayuda</a>
			</li>
	        <li>                    
				<a href="clases/cerrar_sesion.php">Salir</a>
	        </li>
	    </ul>
	  </div><!--/.nav-collapse -->
	</div>
</nav>
<!-- fin menu de opciones -->
<!-- Modal de Ayuda -->
<div class="modal fade" id="ModalAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form action="recursos/Manual de usuario Recepcinista SGME.pdf" target="_blank" method="POST">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
				</div>
				
				<div class="modal-body">
					<div class="row-fluid">
			            <p>En este apartado podra aceptar las solicitude de la cama</p>
			            <p><a class="btn btn-xs btn-warning" href="#" role="button">Confirmar</a> Asigna la Cama agregando primero una Obvervacion</p> 
			            <p>Para mas ayuda consulte el manual de usuario <input type="image" name="pdf" src="imagenes/pdf.png" width="30" height="30"/></p>
			            
			        </div>
				</div>
				
				<div class="modal-footer">
			        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
			    </div>

			</div>
		</form>
	</div>
</div>
<!-- Fin Modal de Ayuda -->

<div class="row-fluid">
	<div class="container">
		<form action="" method="POST">
			<h3>Asignacion de Cama solicitada por <?php echo $row_operacion['nombre']; ?></h3>
			<hr>
			<p>
				<strong>Observaciones de la solicitud: </strong><?php echo $row_operacion['observacion_solicitud']; ?>
			</p>
			<hr>
			<div class="form-group">
            	<label for="observacion">Observaciones</label>
            	<input type="hidden" class="form-control"  name="centro_id" id="centro_id" value="<?php echo $row_operacion['centro_id']; ?>">
            	<textarea class="form-control" rows="3" maxlength="100" id="observacion_asignacion" name="observacion_asignacion"></textarea>
	            <div class="pull-right">
		            <h5>
						<strong>¿Usted desea asignar una cama?</strong>
						<input class="btn btn-xs btn-warning" type="submit" name="confirmar" value="Confirmar">
						<a class="btn btn-xs btn-danger" href="?cargar=gestion_procesar_solicitudes">Cancelar</a> 
					</h5>
				</div>
            </div>
			
		</form>
	</div>
</div>



