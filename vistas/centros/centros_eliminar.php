<?php
	$controladorCentros = new controladorCentros();
    $controladorEspecialidades = new controladorEspecialidades();
    //$resultadoEspecialidades = $controladorEspecialidades->index();
	
	if(isset($_GET['id'])){
		$row_centro = $controladorCentros->ver($_GET['id']);
		//$row_especialidades = $controladorCentros->ver_especialidades($_GET['id']);
		$resultadoEspecialidades = $controladorCentros->ver_especialidades($_GET['id']);
	}else{
		header('Location: index.php');
	}
	if(isset($_GET['id'])){
		$row = $controladorCentros->ver($_GET['id']);
	}else{
		header('Location: index.php?cargar=centros_inicio');
	}
	if(isset($_POST['enviar'])){
	 	$controladorCentros->eliminar($_GET['id']);
		echo "<script type='text/javascript'>";
  		echo "alert('Se ha eliminado el Centro');";
  		echo "window.location='index.php?cargar=centros_inicio'";
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
	  			<a href="?cargar=centros_inicio">Volver</a>       
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
			<h3>Centros de Salud</h3>
			<hr>
			<b>Codigo:</b> <?php echo $row_centro['codigo']; ?>
			<br><br>
			<b>Nombre:</b> <?php echo $row_centro['nombre']; ?>
			<br><br>
			<b>Direccion:</b> <?php echo $row_centro['direccion']; ?>
			<br><br>
			<b>Telefono:</b> <?php echo $row_centro['telefono']; ?>
			<br><br>
			<b>Camas:</b> <?php echo $row_centro['camas']; ?>
			<br><br>
			<!-- Aqui se muestran las especialidades del centro -->
			<?php
				$num = mysql_num_rows($resultadoEspecialidades);
		        if($num > 0){
		            echo "<b><p>Las especialidades disponibles en este centro son:</p></b>";
		        }else{
		        	echo "<b><p>Este centro no tiene especialidades</p></b>";
		        }
		    ?>	
			<ul>
			<?php while($row_especialidades = mysql_fetch_array($resultadoEspecialidades)): ?>
				<li>	
					<?php echo $row_especialidades['nombre']; ?>
				</li>
			<?php endwhile; ?>

			</ul>
			<h5>
				<strong>¿Usted de verdad quiere eliminar el centro?</strong>
				<input class="btn btn-xs btn-danger" type="submit" name="enviar" value="Eliminar">
			</h5>
		</form>
	</div>
</div>



