<?php
	$controladorCentros = new controladorCentros();
    $centro_id = $controladorCentros->buscarCentro($_SESSION['id']);
	$row_centro = $controladorCentros->ver($centro_id);

	$controladorEspecialidades = new controladorEspecialidades();
	$resultadoEspecialidades = $controladorEspecialidades->index();


	if(isset($_POST['editar'])){

		$r = $controladorCentros->editar($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['camas'], $_POST['especialidades']);
		if($r){
			echo "<script type='text/javascript'>";
  			echo "alert('Se ha editado el centro');";
  			echo "window.location='index.php?cargar=gestion_actualiza_centro'";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
  			echo "alert('El codigo introducido ya existe');";
  			echo "window.location='index.php?cargar=gestion_actualiza_centro'";
			echo "</script>";
		}
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
	  			<!--<a href="?cargar=gestion_inicio">Volver</a>       
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
		<h3>Centros de Salud</h3>
		<hr>
		<form action="" method="POST">
			<div class="form-group">
		    	<label for="codigo">Codigo</label>
		    	<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row_centro['id']; ?>">
				<input type="hidden" class="form-control" id="codigo" name="codigo" value="<?php echo $row_centro['codigo']; ?>" >
				<input type="text" class="form-control" id="codigo2" name="codigo2" value="<?php echo $row_centro['codigo']; ?>" disabled>
		    </div>
			<div class="form-group">
		    	<label for="nombre">Nombre</label>
				<input type="hidden" class="form-control" id="nombre" name="nombre" value="<?php echo $row_centro['nombre']; ?>" >
				<input type="text" class="form-control" id="nombre2" name="nombre2" value="<?php echo $row_centro['nombre']; ?>" disabled>
		    </div>
			<div class="form-group">
		    	<label for="nombre">Direccion</label>
				<input type="hidden" class="form-control" id="direccion" name="direccion" value="<?php echo $row_centro['direccion']; ?>">
				<input type="text" class="form-control" id="direccion2" name="direccion2" value="<?php echo $row_centro['direccion']; ?>" disabled>
		    </div>
		    <div class="form-group">
		    	<label for="nombre">Telefono</label>
				<input type="hidden" class="form-control" id="telefono" name="telefono" value="<?php echo $row_centro['telefono']; ?>">
				<input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo $row_centro['telefono']; ?>" disabled>
		    </div>
			<div class="form-group">
		    	<label for="nombre">Camas</label>
				<input type="number" class="form-control" id="camas" name="camas" value="<?php echo $row_centro['camas']; ?>"  min="0" max="100" maxlength="4" placeholder="Camas Disponibles" required>
		    </div>
		    <div class="form-group">
			<fieldset>
				<legend>Especialidades del Centro:</legend>
				<?php 
				    while($row_especialidad = mysql_fetch_array($resultadoEspecialidades)){
				    	$row_check = $controladorCentros->ver_especialidad_check($row_centro['id'], $row_especialidad['id']); 
						if ($row_check['contador']>0){$checheado="checked";}else{$checheado="";}
				?>
					<input type="checkbox" name="especialidades[]" id="especialidades" <?php echo $checheado; ?> value="<?php echo $row_especialidad['id']; ?>"><?php echo $row_especialidad['nombre']; ?> 
					<br><br>
				<?php } ?>
			</fieldset>
			<input class="btn btn-default btn-success" role="button" type="submit" name="editar" value="Editar">
		</form>
	</div>
</div>
