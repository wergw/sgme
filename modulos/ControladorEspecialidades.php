<?php
    // se importa el controlador para bitacora
    session_start();
    include_once("modulos/ControladorUsuarios.php");
    include_once("clases/Centro.php");

    include_once("clases/Especialidad.php");

    class controladorEspecialidades{

        //Atributos
        private $especialidad;

        //Metodos
        public function __construct(){
            $this->especialidad = new Especialidad();
            //se instancia el controlador para bitacora
            $this->bitacora = new controladorUsuarios();
        }

        public function index(){

            $resultado = $this->especialidad->listar();
            return $resultado;
        }

        public function crear($codigo, $nombre, $status, $observacion){
            $this->especialidad->set("codigo", $codigo);
            $this->especialidad->set("nombre", $nombre);
             $this->especialidad->set("status", $status);
            $this->especialidad->set("observacion", $observacion);

            //registro de bitacora
            $usuario_id=$_SESSION['id'];
            $operacion="Se creo especialidad: ".$nombre;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
            $resultado = $this->especialidad->crear();
            return $resultado;
        }

        public function eliminar($id){
            $this->especialidad->set("id", $id);
            $this->especialidad->eliminar();
            //registro de bitacora
            $usuario_id=$_SESSION['id'];
            $operacion="Eliminacion de especialidad: ".$nombre;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
        }

        public function ver($id){
            $this->especialidad->set("id", $id);
            $datos = $this->especialidad->ver();
            return $datos;
        }

        public function editar($id, $nombre, $status, $observacion){
            $this->especialidad->set('id', $id);
            $this->especialidad->set('nombre', $nombre);
            $this->especialidad->set('status', $status);
            $this->especialidad->set('observacion', $observacion);
            $this->especialidad->editar();

            //registro de bitacora
            $usuario_id=$_SESSION['id'];
            $operacion="Se edito la especialidad: ".$nombre;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
            
        }

    }

?>