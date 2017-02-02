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
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      <span class="sr-only"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="index.php">SGM</a>
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
				<a href="clases/cerrar_sesion.php">Seguridad</a>
			</li>
	        <li>                    
				<a href="clases/cerrar_sesion.php">Salir</a>
	        </li>
	    </ul>
	  </div><!--/.nav-collapse -->
	</div>
</nav>
<!-- fin menu de opciones -->

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



