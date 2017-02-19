<?php 
	$controlador = new controladorUsuarios();
	if(isset($_GET['id'])){
		$row = $controlador->ver($_GET['id']);
	}else{
		header('Location: especialidades.php');
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
	  			<a href="?cargar=usuarios_inicio">Volver</a>       
	        	<!--<a href="clases/cerrar_sesion.php">Crear Centro</a>-->
	      	</li>	
	  	</ul>
	    <ul class="nav navbar-nav navbar-right">
	        <li>                    
				<a href="clases/cerrar_sesion.php">Salir</a>
	        </li>
	    </ul>
	  </div><!--/.nav-collapse -->
	</div>
</nav>
<!-- fin menu de opciones -->

<b>Usuario:</b> <?php echo $row['usuario']; ?>
<br><br>

<b>Nombre:</b> <?php echo $row['persona_nombre']; ?>
<br><br>

<b>Cedula:</b> <?php echo $row['persona_cedula']; ?>
<br><br>

<b>Dirección:</b> <?php echo $row['persona_direccion']; ?>
<br><br>

<b>Telefono:</b> <?php echo $row['persona_telefono']; ?>
<br><br>

<b>Tipo de Usuario:</b> <?php echo $row['perfil_nombre']; ?>
<br><br>


