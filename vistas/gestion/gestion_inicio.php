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
	  			<!--<a href="?cargar=centros_inicio">Volver</a>       
	        	<a href="clases/cerrar_sesion.php">Crear Centro</a>-->
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