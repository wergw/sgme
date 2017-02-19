<style type="text/css">
            body {
                background-image: url(imagenes/background.png);
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
      <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" width="80" height="30"/></a>    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>                    
          <a href="#nuevo" role="button" class="btn" data-toggle="modal" data-target="#cambiarpassword">Seguridad</a>
        </li>
        <li>                    
            <a href="clases/cerrar_sesion.php">Salir</a>
        </li>
        
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<!-- Modal de Ayuda -->
<div class="modal fade" id="cambiarpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cambiar contraseña</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="modal-body">
            <div class="row-fluid">
                    <div class="form-group">
                      <label for="nombre">Contraseña actual</label>
                <input type="text" class="form-control" id="nombre" onkeypress="return solonumeros(event)" maxlength="35" name="nombre">
                    </div>
                    <div class="form-group">
                      <label for="nombre">Nueva contraseña</label>
                <input type="text" class="form-control" id="nombre" onkeypress="return solonumeros(event)" maxlength="35" name="nombre">
                    </div>  
                    <div class="form-group">
                      <label for="nombre">Confirmar contraseña</label>
                <input type="text" class="form-control" id="nombre" onkeypress="return solonumeros(event)" maxlength="35" name="nombre">
                    </div>                    
                </div>
          </div>
          <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
                <button class="btn btn-primary" type="submit" name="enviar" value="Crear"><strong><i class="icon-ok"></i>Cambiar</strong></button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal de Ayuda -->

<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
    <p>El sistema de gestion medica lo ayuda a gestionar las camas en los centros de salud del Municipio Palavecino. Para usar el sistema de gestion medica puede selecionar alguna de las opciones a continuacion; </p>
  </div>
</div> <!-- /container -->
<!-- Three columns of text below the carousel -->
<div class="container marketing">
  <div class="row">
    <?php if($_SESSION['pefil_id']==1){ ?>
    <div class="col-lg-4">
      <a href="?cargar=centros_inicio" class="thumbnail">
        <img src="imagenes/icono_centros.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">centros</p>
      </a>
    </div>
    <?php } ?>
    <?php if($_SESSION['pefil_id']==1){ ?>
    <div class="col-lg-4">
      <a href="?cargar=especialidades_inicio" class="thumbnail">
        <img src="imagenes/icono_especialidades.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Especialidades</p>
      </a>
    </div>
    <?php } ?>
    <?php if($_SESSION['pefil_id']==1 || $_SESSION['pefil_id']==2){ ?>
    <div class="col-lg-4">
      <a href="?cargar=gestion_inicio" class="thumbnail">
        <img src="imagenes/icono_gestion_camas.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Gestion de Camas</p>
      </a>
    </div>
    <br>
    <?php } ?>
  </div>

  <div class="row">
    <?php if($_SESSION['pefil_id']==1){ ?>
    <div class="col-lg-4">
      <a href="?cargar=usuarios_inicio" class="thumbnail">
        <img src="imagenes/icono_auditoria.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Usuarios</p>
      </a>
    </div>
    <?php } ?>
    <?php if($_SESSION['pefil_id']==1){ ?>
    <div class="col-lg-4">
      <a href="?cargar=auditoria_inicio" class="thumbnail">
        <img src="imagenes/icono_auditoria.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Auditoria</p>
      </a>
    </div>
    <?php } ?>
    <?php if($_SESSION['pefil_id']==1){ ?>
    <div class="col-lg-4">
      <a href="?cargar=reportes_inicio" class="thumbnail">
        <img src="imagenes/icono_reportes.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reportes</p>
      </a>
    </div>
    <?php } ?>
  </div>

  <div class="row">
    <?php if($_SESSION['pefil_id']==3){ ?>
    <div class="col-lg-4">
      <a href="?cargar=gestion_actualiza_centro" class="thumbnail">
        <img src="imagenes/icono_centros.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Actualizar Centro</p>
      </a>
    </div>
    <?php } ?>
    <?php if($_SESSION['pefil_id']==3){ ?>
    <div class="col-lg-4">
      <a href="?cargar=gestion_procesar_solicitudes" class="thumbnail">
        <img src="imagenes/icono_gestion_camas.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Procesar Solicitudes</p>
      </a>
    </div>
    <?php } ?>
  </div>
</div>