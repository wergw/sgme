<?php
    // se importa el controlador para bitacora
    session_start();
    include_once("modulos/ControladorUsuarios.php");
    include_once("clases/Centro.php");

    class controladorCentros{

        //Atributos
        private $centro;

        //Metodos
        public function __construct(){
            $this->centro = new Centro();
            //se instancia el controlador para bitacora
            $this->bitacora = new controladorUsuarios();
            
        }

        public function index(){
            $resultado = $this->centro->listar();
            return $resultado;
        }

        public function crear($codigo, $nombre, $direccion, $telefono, $camas, $especialidades){
            $this->centro->set("codigo", $codigo);
            $this->centro->set("nombre", $nombre);
            $this->centro->set("direccion", $direccion);
            $this->centro->set("telefono", $telefono);
            $this->centro->set("camas", $camas);
            $this->centro->set("especialidades", $especialidades);
            $resultado = $this->centro->crear();

            // aqui se debe registrar bitacora 
            $usuario_id=$_SESSION['id'];
            $operacion="Creacion de nuevo centro ".$nombre;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
            return $resultado;
        }

        public function eliminar($id){
            $this->centro->set("id", $id);
            $this->centro->eliminar();

            // aqui se debe registrar bitacora 
            $usuario_id=$_SESSION['id'];
            $operacion="Eliminacion de centro: " .$id;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
        }

        public function ver($id){
            $this->centro->set("id", $id);
            $datos = $this->centro->ver();
            return $datos;
        }

        public function ver_especialidades($id){
            $this->centro->set("id", $id);
            //$datos = $this->centro->ver_especialidades();
            //return $datos;
            $resultado = $this->centro->ver_especialidades();
            return $resultado;
        }

        public function ver_especialidad_check($centros_id, $especialidades_id){
            $this->centro->set("centros_id", $centros_id);
            $this->centro->set("especialidades_id", $especialidades_id);
            //$datos = $this->centro->ver_especialidades();
            //return $datos;
            $resultado = $this->centro->ver_especialidad_check();
            return $resultado;
        }

        public function editar($id, $nombre, $direccion, $telefono, $camas, $especialidades){
            $this->centro->set('id', $id);
            $this->centro->set('nombre', $nombre);
            $this->centro->set('direccion', $direccion);
            $this->centro->set('telefono', $telefono);
            $this->centro->set('camas', $camas);
            $this->centro->set("especialidades", $especialidades);            
            $resultado = $this->centro->editar();
            // aqui se debe registrar bitacora 
            $usuario_id=$_SESSION['id'];
            $operacion="Se edito el centro ".$nombre;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
            return $resultado;
        }

        public function ver_disponibilidad($direccion, $especialidad_id){
            $this->centro->set("direccion", $direccion);
            $this->centro->set("especialidad_id", $especialidad_id);
            $datos = $this->centro->ver_disponibilidad();
            return $datos;
        }

        public function solicitarCama($centro_id, $usuario_id_solicitud, $observacion_solicitud){
            $this->centro->set('centro_id', $centro_id);
            $this->centro->set('usuario_id_solicitud', $usuario_id_solicitud);
            $this->centro->set('fecha_solicitud', date("Y-m-d"));
            $this->centro->set('observacion_solicitud', $observacion_solicitud);
            $resultado = $this->centro->solicitarCama();
            // aqui se debe registrar bitacora 
            $usuario_id=$_SESSION['id'];
            $operacion="Se solicito cama ";
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
            return $resultado;
        }

        public function asignarCama($operacion_id, $centro_id, $usuario_id_asignacion, $observacion_asignacion){
            $this->centro->set('operacion_id', $operacion_id);
            $this->centro->set('centro_id', $centro_id);
            $this->centro->set('usuario_id_asignacion', $usuario_id_asignacion);
            $this->centro->set('fecha_asignacion', date("Y-m-d"));
            $this->centro->set('observacion_asignacion', $observacion_asignacion);
            $resultado = $this->centro->asignarCama();
            $usuario_id=$_SESSION['id'];
            $operacion="Se Asigno la cama a: ".$usuario_id_solicitud;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
            return $resultado;
        }

        public function cancelarCama($operacion_id, $centro_id, $usuario_id_asignacion, $observacion_asignacion){
            $this->centro->set('operacion_id', $operacion_id);
            $this->centro->set('usuario_id_cancelacion', $usuario_id_cancelacion);
            $this->centro->set('fecha_cancelacion', date("Y-m-d"));
            $this->centro->set('observacion_cancelacion', $observacion_cancelacion);
            $resultado = $this->centro->cancelarCama();
            // aqui se debe registrar bitacora 
            $usuario_id=$_SESSION['id'];
            $operacion="Se cancelo la solicitud de cama a: ".$usuario_id_solicitud;
            $this->bitacora->registrarbitacora($usuario_id,$operacion);
            return $resultado;
        }

        public function verOperacionesPorStatus($centro_id, $status_operacion){
            $this->centro->set("centro_id", $centro_id);
            $this->centro->set("status_operacion", $status_operacion);
            $resultado = $this->centro->verOperacionesPorStatus();
            return $resultado;
        }

        public function listarOperaciones($centro_id){
            $this->centro->set("centro_id", $centro_id);
            $resultado = $this->centro->listarOperaciones();
            return $resultado;

        }

        public function buscarCentro($id){
            $this->centro->set("id", $id);
            $datos = $this->centro->buscarCentro();
            return $datos;
        }  

    }

?>