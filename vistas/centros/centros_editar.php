<?php 

	$controladorCentros = new controladorCentros();
    $controladorEspecialidades = new controladorEspecialidades();

	$resultadoEspecialidades = $controladorEspecialidades->index();

	// aqui se lleva a cabo la creacion de un centro nuevo
	if(isset($_GET['id'])){
		$row_centro = $controladorCentros->ver($_GET['id']);
		//$row_especialidades = $controladorCentros->ver_especialidades($_GET['id']);
		//$resultadoCentroEspecialidades = $controladorCentros->ver_especialidades($_GET['id']);
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['editar'])){
		$r = $controladorCentros->editar($_GET['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['camas'], $_POST['especialidades']);
		if($r){
			echo "<script type='text/javascript'>";
  			echo "alert('Se ha editado el centro');";
  			echo "window.location='index.php?cargar=centros_inicio'";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
  			echo "alert('El codigo introducido ya existe');";
  			echo "window.location='index.php?cargar=centros_inicio'";
			echo "</script>";
		}
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
	    <a class="navbar-brand" href="index.php">SGM</a>
	  </div>

	  <div id="navbar" class="navbar-collapse collapse">
	  	<ul class="nav navbar-nav">
	  		<li>      
	  			<a href="?cargar=centros_inicio">Volver</a>       
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
<!-- Modal de Ayuda -->
<div class="modal fade" id="ModalAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form action="recursos/Manual de usuario Admisitrador SGME.pdf" target="_blank" method="POST">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
				</div>
				
				<div class="modal-body">
					<div class="row-fluid">
			            <p>En este apartado puede editar los datos el centro</p>
			            <p>Tambien tiene la posibilidad de registrar un nuevo centro </p>
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
<!-- fin menu de opciones -->
<div class="row-fluid">
	<div class="container">
		<h3>Centros de Salud</h3>
		<hr>
		<form action="" method="POST">
			<div class="form-group">
		    	<label for="codigo">Codigo</label>
				<input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row_centro['codigo']; ?>" disabled>
		    </div>
			<div class="form-group">
		    	<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return sololetras(event)" maxlength="50" value="<?php echo $row_centro['nombre']; ?>" placeholder="Nombre del Centro" required>
		    </div>
			<div class="form-group">
		    	<label for="nombre">Direccion</label>
				<input type="text" class="form-control" id="direccion" name="direccion" maxlength="60" value="<?php echo $row_centro['direccion']; ?>" placeholder="Nombre del Centro" required>
		    </div>
		    <div class="form-group">
		    	<label for="nombre">Telefono</label>
				<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row_centro['telefono']; ?>" onkeypress="return solonumeros(event)" maxlength="11"  placeholder="Telefono del Centro" required>
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