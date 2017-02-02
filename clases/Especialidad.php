<?php

    //CLASE DE CONEXIÓN INCLUIDA
    include_once('Conexion.php');

    class Especialidad{

        //Atributos
        private $id;
        private $codigo;
        private $nombre;
        private $status;
        private $observacion;
        private $con;

        //Metodos
        public function __construct(){
            $this->con = new Conexion();
        }

        public function set($atributo, $contenido){
            $this->$atributo = $contenido;
        }

        public function get($atributo){
            return $this->$atributo;
        }

        public function listar(){
            $sql = "SELECT * FROM especialidades";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){

            $sql2 = "SELECT * FROM especialidades WHERE codigo = '{$this->codigo}'";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO especialidades (codigo, nombre, status, observacion) VALUES (
                    '{$this->codigo}', '{$this->nombre}', '{$this->status}', '{$this->observacion}')";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM especialidades WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT * FROM especialidades WHERE id = '{$this->id}' LIMIT 1";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id = $row['id'];
            $this->codigo = $row['codigo'];
            $this->nombre = $row['nombre'];
            $this->status = $row['status'];
            $this->observacion = $row['observacion'];
            return $row;
        }

        public function editar(){
            $sql = "UPDATE especialidades SET nombre = '{$this->nombre}', status = '{$this->status}', observacion = '{$this->observacion}' WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql);
        }
    }

?>