<?php
    
    include_once("clases/Usuario.php");

    class controladorUsuarios{

        //Atributos
        private $usuario;

        //Metodos
        public function __construct(){
            $this->usuario = new Usuario();
            
        }

        public function index(){
            $resultado = $this->usuario->listar();
            
            return $resultado;
        }
        
         public function crear($usuario, $nombre, $cedula, $direccion, $telefono, $perfil_id, $centro_id){
            $this->usuario->set("usuario", $usuario);
            $this->usuario->set("nombre", $nombre);
            $this->usuario->set("cedula", $cedula);
            $this->usuario->set("direccion", $direccion);
            $this->usuario->set("telefono", $telefono);
            $this->usuario->set("perfil_id", $perfil_id);
            $this->usuario->set("centro_id", $centro_id);            
            $resultado = $this->usuario->crear();
           
           
            

        }

        public function eliminar($id){
            $this->usuario->set("id", $id);
            $this->usuario->eliminar();
        }

        public function Logear($usuario,$password){
            $this->usuario->set("usuario", $usuario);
            $this->usuario->set("password", $password);
            $datos = $this->usuario->logear();
            return $datos;
        }

        public function ver($id){
            $this->usuario->set("id", $id);
            $datos = $this->usuario->ver();
            return $datos;
        }

        public function editar($id, $nombre, $direccion, $telefono, $perfil_id){
            
            $this->usuario->set("id", $id);
            $this->usuario->set("nombre", $nombre);
            $this->usuario->set("direccion", $direccion);
            $this->usuario->set("telefono", $telefono);
            $this->usuario->set("perfil_id", $perfil_id);
            $resultado = $this->usuario->editar();
            return $resultado;
        }

        public function registrarbitacora($usuario_id, $operacion){
            $this->usuario->set("usuario_id", $usuario_id);
            $this->usuario->set("operacion", $operacion);
            $this->usuario->set('fecha', date("Y-m-d H:m:s"));       
            $resultado = $this->usuario->registrarbitacora();
            return $resultado;

        }

    }   

?>