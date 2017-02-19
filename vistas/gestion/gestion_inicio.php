<?php

	$controladorCentros = new controladorCentros(); 
	$resultadoCentros = $controladorCentros->index();
	$controladorEspecialidades = new controladorEspecialidades();
	$resultadoEspecialidades = $controladorEspecialidades->index();

	if(isset($_POST['buscar'])){
		header('Location: index.php?cargar=gestion_ver&direccion='.$_POST['direccion'].'&especialidad_id='.$_POST['especialidad_id']); 
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
	  			<!--<a href="?cargar=centros_inicio">Volver</a>       
	        	<a href="clases/cerrar_sesion.php">Crear Centro</a>-->
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
			            <p>En este apartado podra buscar los centros con camas y/o especialidad medica disponibles</p>
			            <p>Filtre la busqueda por direccion, por especialista  o ambas</p>
			            <p><strong>DATO: si no escoje una especialidad buscara el centro que tenga al menos una (1) especialidad y camas disponibles</strong></p>
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
		<h3>Gestion de Camas</h3>
		<hr>
		<h4>Buscar disponibilidad de camas por ubicacion / especialidad</h4>
		<hr>
		<form action="" method="POST" class="form-inline">
			<div class="form-group">
		        <label for="direccion">Direccion: </label>
		        <input type="text" class="form-control" id="direccion" name="direccion"  placeholder="introduzca direccion" size="50">
		    </div>
		    <div class="form-group">
				<label for="direccion">Especialidad: </label>
				<select class="form-control" id="especialidad_id" name="especialidad_id">
					<option value="-1" selected="selected">Cualquier especialidad</option>
					<?php while($row_especialidad = mysql_fetch_array($resultadoEspecialidades)): ?>
						<option value="<?php echo $row_especialidad['id']?>"><?php echo $row_especialidad['nombre']?></option>
					<?php endwhile; ?> 
				</select>
			</div>
			<input class="btn btn-md btn-info" role="button" type="submit" name="buscar" value="Buscar">
		</form>
		
	</div>
</div>