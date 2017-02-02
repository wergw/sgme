<?php
    session_start();
    include_once("modulos/ControladorUsuarios.php");

    $controlador = new controladorUsuarios();
    if (isset($_POST['entrar'])){
        if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
            $row = $controlador->Logear($_POST['usuario'],$_POST['password']);
            //var_dump(">>>>>>".$row['nombre']);
            if($row['usuario']<>''){
                //echo"<div>al menos encontro un usuario</div>";
                $_SESSION['id']=$row['id'];
                $_SESSION['usuario']=$row['usuario'];
                $_SESSION['pefil_id']=$row['perfil_id'];
                $_SESSION['nombre']=$row['nombre'];
                // aqui se debe registrar bitacora 
                $usuario_id=$row['id'];
                $operacion="Inicio de Sesion";
                $b=$controlador->registrarbitacora($usuario_id,$operacion);
                header('Location: index.php');  
            }else{
                echo ('Usuario y/o Contraseña Incorrecto<br>');
            }
        }
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
        <script src="js/ie-emulation-modes-warning.js"></script>
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
                background-image: url(imagenes/background.png);
                background-repeat: repeat;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                   -moz-border-radius: 5px;
                        border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                        box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
            input{ 
                text-align:center; 
            } 
        </style>
    </head>
    <body>
        <div class="container">
            <form class="form-signin" action="" method="POST">
                <center><img src="imagenes/logo.png" width="200" height="200"></center><br>
                <label>Usuario</label><br>
                <input type="text" name="usuario" maxlength="10" required>
                <br><br>
                <label>Password</label><br>
                <input type="password" name="password" required>
                <br><br>
                <input class="btn btn-default btn-success" role="button" type="submit" name="entrar" value="entrar">
            </form>

            <footer class=bs-docs-footer>
                <div class=container>
                    Todos los derechos reservados &copy Jancarlos Alarcon
                </div>
            </footer> 
        </div>  
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="js/jquery.js"></script>
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
    </body>    
</html>