<?php 
	$controlador = new controladorEspecialidades();
	if(isset($_GET['id'])){
		$row = $controlador->ver($_GET['id']);
	}else{
		header('Location: index.php?cargar=especialidades_inicio');
	}

	if(isset($_POST['enviar'])){
		$controlador->editar($_GET['id'], $_POST['nombre'], $_POST['status'], $_POST['observacion']);
			echo "<script type='text/javascript'>";
			echo "alert('Ha editado la especialidad');";
  			echo "window.location='index.php?cargar=especialidades_inicio'";
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
	  			<a href="?cargar=especialidades_inicio">Volver</a>       
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
<form action="" method="POST">
	<div class="form-group">
		<label for="codigo">Codigo</label>
		<input type="text" class="form-control" name="codigo" value="<?php echo $row['codigo']; ?>" disabled>
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
	</div>
	<div class="form-group">
		<label for="observacion">Observaciones</label>
		<input type="text" class="form-control" name="observacion" value="<?php echo $row['observacion']; ?>">
	</div>
	<input class="btn btn-default btn-success" type="submit"  name="enviar" value="Editar">
</form>

