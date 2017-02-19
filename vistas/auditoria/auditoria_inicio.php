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
    <form action="recursos/Manual de usuario Admisitrador SGME" target="_blank" method="POST">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
        </div>
        
        <div class="modal-body">
          <div class="row-fluid">
                  <p>En este icono podra descargar la bitacora de sistema  <img src="imagenes/icono_auditoria.png" alt="Generic placeholder image" width="25" height="25"></p>
                  <p>En este icono podra Respaldar o Restaurar la base de un respaldo anterior  <img src="imagenes/db.png" alt="Generic placeholder image" width="25" height="25"></p>
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

<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>AUDITORIA</h1>
    <p>Auditoria de sistema y respaldo de base de datos </p>
  </div>
</div> <!-- /container -->
<!-- Three columns of text below the carousel -->
<div class="container marketing">
  <div class="row">

  <form>
   Fecha: <input type="text" name="fecha" class="campofecha" size="12">
</form>
    <div class="col-lg-6">
      <a href="reportes/auditoria_pdf.php" class="thumbnail">
        <img src="imagenes/icono_auditoria.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Auditar</p>
      </a>
    </div>
    <div class="col-lg-6">
      <a href="vistas/auditoria/respaldo.php" class="thumbnail">
        <img src="imagenes/db.png" alt="Generic placeholder image" width="77" height="50">
        <p class="text-center">Respaldar y Restaurar Base de datos</p>
      </a>
    </div>

  </div>
  </div>
</div>