<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        //inclucion de los controladores OJO!!
        include_once("modulos/Enrutador.php");
        include_once("modulos/ControladorCentros.php");
        include_once("modulos/ControladorEspecialidades.php");
        include_once("modulos/ControladorUsuarios.php");
    }else{
        header('Location: login.php'); 
    }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Sistema de gestion de camas de centros asistenciales</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/navbar-fixed-top.css">
        <link rel="stylesheet" href="css/alertify.core.css">
        <link rel="stylesheet" href="css/alertify.default.css">
        <link href="calendario-jquery/calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
        <script src="js/ie-emulation-modes-warning.js"></script>
        <script src="js/alertify.min.js"></script>
        <script src="js/jquery.js"></script>     
        <script src="js/googlemap.js"></script>
        <script src="js/notify.js"></script>  
        <script type="text/javascript" src="calendario-jquery/calendario_dw/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="calendario-jquery/calendario_dw/calendario_dw.js"></script>       

<script>
    function solonumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       numeros = " 0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(numeros.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<script>
    function sololetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       numeros = "  áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(numeros.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
    <script>
        $(document).ready(function(){
            $("#simple_alert").click(function(){
                alertify.alert("Registro de paciente exitoso!");
            });
        });
    </script>

    <script type="text/javascript">
$(document).ready(function(){
   $(".campofecha").calendarioDW();
})
</script>

    </head>
    <body>
        <div class="container">
            <!-- en el segmento section es donde se cargaran las subvistas -->
            <section>
                <?php
                    
                    $enrutador = new Enrutador();                
                    if($enrutador->validarGET($_GET['cargar'])){
                        $enrutador->cargarVista($_GET['cargar']);
                    }
                    
                ?>
            </section>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
            <footer>
                <div class="container">
                    <ul class="nav nav-pills nav-stacked pull-right copy">
                        <li>Todos los derechos reservados &copy Jancarlos Alarcon</li>
                    </ul>
                </div>
            </footer>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script src="js/bootstrap-transition.js"></script>
        <script src="js/bootstrap-alert.js"></script>
        <script src="js/bootstrap-modal.js"></script>
        <script src="js/bootstrap-dropdown.js"></script>
        <script src="js/bootstrap-scrollspy.js"></script>
        <script src="js/bootstrap-tab.js"></script>
        <script src="js/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap-popover.js"></script>
        <script src="js/bootstrap-button.js"></script>
        <script src="js/bootstrap-collapse.js"></script>
        <script src="js/bootstrap-carousel.js"></script>
        <script src="js/bootstrap-typeahead.js"></script>
        <!-- <script type="text/javascript" src="js/prototype.js"></script>-->
        <script type="text/javascript" src="js/eventos.js"></script>    
        <script src="js/notify.js"></script>
        <script src="js/alertify.min.js"></script>         
        <link rel="stylesheet" href="css/alertify.core.css">
        <link rel="stylesheet" href="css/alertify.default.css">
        <script type="text/javascript" src="calendario-jquery/calendario_dw/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="calendario-jquery/calendario_dw/calendario_dw.js"></script>
    </body>
</html>