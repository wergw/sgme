<?php
	$controladorCentros = new controladorCentros();
    $controladorEspecialidades = new controladorEspecialidades();
    //$resultadoEspecialidades = $controladorEspecialidades->index();

	if(isset($_GET['id'])){
		$row_centro = $controladorCentros->ver($_GET['id']);
	}else{
		header('Location: index.php?cargar=centros_inicio');
	}

	if(isset($_POST['confirmar'])){
		$usuario_id_solicitud=$_SESSION['id'];
		$centro_id=$_GET['id'];
		$observacion_solicitud=$_POST['observacion'];
	 	$controladorCentros->solicitarCama($centro_id, $usuario_id_solicitud, $observacion_solicitud);
		echo "<script type='text/javascript'>";
  		echo "alert('Solicitud realizada exitosamente');";
  		echo "window.location='index.php?cargar=gestion_inicio'";
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
	  			<a href="?cargar=gestion_inicio">Volver</a>       
	        	<!--<a href="clases/cerrar_sesion.php">Crear Centro</a>-->
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
		<form action="recursos/Manual de usuario Paramedico SGME.pdf" target="_blank" method="POST">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
				</div>
				
				<div class="modal-body">
					<div class="row-fluid">
			            <p>En este apartado confirmara su solicitud al centro.</p>
			            <p><a class="btn btn-xs btn-warning" href="#" role="button">Confirmar</a> Solicita una cama en el centro.</p>
			            <p><a class="btn btn-xs btn-danger" href="#" role="button">Cancelar</a> Cancela la solicitud de cama en el centro.</p>  
			            <br>
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
			<h3>Solicitud de Cama en centro <?php echo $row_centro['nombre']; ?></h3>
			<hr>
			<div class="form-group">
            	<label for="observacion">Observaciones</label>
            	<textarea class="form-control" rows="3" maxlength="100" id="observacion" name="observacion"></textarea>
	            <div class="pull-right">
		            <h5>
						<strong>¿Usted desea solicitar una cama en el centro indicado?</strong>
						<input class="btn btn-xs btn-warning" type="submit" name="confirmar" value="Confirmar">
						<a class="btn btn-xs btn-danger" href="?cargar=gestion_inicio">Cancelar</a> 
					</h5>
				</div>
            </div>
			
		</form>
	</div>
</div>



