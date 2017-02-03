<?php

    class Enrutador{

        public function cargarVista($vista){
            switch($vista):

                //enrutamiento de centros

                case "centros_inicio":
                    include_once('vistas/centros/' . $vista . '.php');
                    break;

                case "centros_crear":
                    include_once('vistas/centros/' . $vista . '.php');
                    break;

                case "centros_ver":
                    include_once('vistas/centros/' . $vista . '.php');
                    break;

                case "centros_editar":
                    include_once('vistas/centros/' . $vista . '.php');
                    break;

                case "centros_eliminar":
                    include_once('vistas/centros/' . $vista . '.php');
                    break;

                //enrutamiento de especialidades

                case "especialidades_inicio":
                    include_once('vistas/especialidades/' . $vista . '.php');
                    break;

                case "especialidades_crear":
                    include_once('vistas/especialidades/' . $vista . '.php');
                    break;

                case "especialidades_ver":
                    include_once('vistas/especialidades/' . $vista . '.php');
                    break;

                case "especialidades_editar":
                    include_once('vistas/especialidades/' . $vista . '.php');
                    break;

                case "especialidades_eliminar":
                    include_once('vistas/especialidades/' . $vista . '.php');
                    break;

                //enrutamiento de gestion    

                case "gestion_inicio":
                    include_once('vistas/gestion/' . $vista . '.php');
                    break;
                case "gestion_ver":
                    include_once('vistas/gestion/' . $vista . '.php');
                    break; 

                case "gestion_solicitar_cama":
                    include_once('vistas/gestion/' . $vista . '.php');
                    break;

                case "gestion_asignar_cama":
                    include_once('vistas/gestion/' . $vista . '.php');
                    break;

                case "gestion_cancelar_cama":
                    include_once('vistas/gestion/' . $vista . '.php');
                    break; 

                case "gestion_actualiza_centro":
                    include_once('vistas/gestion/' . $vista . '.php');
                    break; 

                case "gestion_procesar_solicitudes":
                    include_once('vistas/gestion/' . $vista . '.php');
                    break; 

                //enrutamiento de usuarios
                
                case "usuarios_inicio":
                    include_once('vistas/usuarios/' . $vista . '.php');
                    break;

                case "usuarios_crear":
                    include_once('vistas/usuarios/' . $vista . '.php');
                    break;

                case "usuarios_ver":
                    include_once('vistas/usuarios/' . $vista . '.php');
                    break;

                case "usuarios_editar":
                    include_once('vistas/usuarios/' . $vista . '.php');
                    break;

                case "usuarios_eliminar":
                    include_once('vistas/usuarios/' . $vista . '.php');
                    break;       

                default:
                    include_once('vistas/centros/centros_error.php');

                //enrutamiento de reportes
                
                case "reportes_inicio":
                    include_once('vistas/reportes/' . $vista . '.php');
                    break;

            endswitch;

        }

        public function validarGET($variable){
            if(empty($variable)){
                include_once('vistas/panel_control.php');
            }else{
                return true;
            }
        }

    }

?>