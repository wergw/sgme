<?php

    //CLASE DE CONEXIÓN INCLUIDA
    include_once('Conexion.php');

    class Usuario{

        //Atributos
        private $id;
        private $usuario;
        private $password;
        private $persona_id;
        private $perfil_id;
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
            $sql = "SELECT 
            u.id AS usuario_id, 
            u.usuario, 
            prs.nombre AS persona_nombre, 
            prf.nombre AS perfil_nombre 
            FROM usuarios u
            INNER JOIN perfiles prf ON u.perfil_id = prf.id 
            INNER JOIN personas prs ON u.persona_id = prs.id";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }
        
        public function crear(){
            $sql_persona = "SELECT * FROM personas WHERE cedula = '{$this->cedula}'";
            $resultado_persona = $this->con->consultaRetorno($sql_persona);
            $num_persona = mysql_num_rows($resultado_persona);
            if($num_persona > 0){
                //si $num_persona != 0 no se debe insertar el usuario
                return false;
            }
            else{  
                $sql_usuario = "SELECT * FROM usuarios WHERE usuario = '{$this->usuario}'";
                $resultado_usuario = $this->con->consultaRetorno($sql_usuario);
                $num_usuario = mysql_num_rows($resultado_usuario);

                if($num_usuario > 0){
                    //si $num_usuario != 0 no se debe insertar el usuario
                   return false;
                }  
                else{
                    // se debe insertar primero la persona y luego el usuario
                    $sql_insert_persona = "INSERT INTO personas (cedula, nombre, direccion, telefono) VALUES('{$this->cedula}','{$this->nombre}','{$this->direccion}','{$this->telefono}')";
                    
                    $this->con->consultaSimple($sql_insert_persona);
                    //se busca la ultima persona insertada 
                    $sql_buscar_ultima_persona = "SELECT id FROM personas ORDER BY id DESC LIMIT 1";
                     $resultado = $this->con->consultaRetorno($sql_buscar_ultima_persona);
                    $row=mysql_fetch_assoc($resultado);
                    $persona_id=$row['id'];
                    
                     $sql_insert_usuario = "INSERT INTO usuarios (persona_id, usuario, password, perfil_id) VALUES ($persona_id, '{$this->usuario}','123456', '{$this->perfil_id}')";
                     $this->con->consultaSimple($sql_insert_usuario);

                     //se busca la ultima usuario insertado
                    $sql_buscar_ultimo_usuario = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
                    $resultado_usuario = $this->con->consultaRetorno($sql_buscar_ultimo_usuario);
                    $row_usuario=mysql_fetch_assoc($resultado_usuario);
                    $usuario_id=$row_usuario['id'];

                     // aqui debes hacer el insert en recepcionistas_centros

                     $sql_insert_recepcionistas_centros = "INSERT INTO recepcionistas_centros (usuario_id, centro_id) VALUES ($usuario_id, '{$this->centro_id}')";
                     $this->con->consultaSimple($sql_insert_recepcionistas_centros);

                     return true;
                }
            }    
        }

        public function eliminar(){
            $sql_borrar_usuario = "DELETE FROM usuarios WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql_borrar_usuario);
            $sql_borrar_persona = "DELETE FROM personas WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql_borrar_persona);
            return true;
        }

        public function ver(){
            $sql = "SELECT 
            u.id AS usuario_id, 
            u.usuario, 
            prs.nombre AS persona_nombre,
            prs.direccion AS persona_direccion,
            prs.telefono AS persona_telefono,
            prs.cedula AS persona_cedula,
            prf.nombre AS perfil_nombre 
            FROM usuarios u
            INNER JOIN perfiles prf ON u.perfil_id = prf.id 
            INNER JOIN personas prs ON u.persona_id = prs.id WHERE u.id = '{$this->id}' LIMIT 1";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id = $row['id'];
            $this->persona_id = $row['personaid'];
            $this->usuario = $row['usuario'];
            $this->perfil_id = $row['perfil_id'];
            $this->observaciones = $row['obsevaciones'];
            return $row;
        }

        public function logear(){
            $sql = "SELECT u.id, u.usuario, u.perfil_id, p.nombre 
                    FROM usuarios u 
                    INNER JOIN personas p ON u.persona_id=p.id
                    WHERE u.usuario = '{$this->usuario}' AND u.password = '{$this->password}' AND u.status = 1 LIMIT 1";

            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id = $row['id'];
            $this->persona_id = $row['personaid'];
            $this->usuario = $row['usuario'];
            $this->perfil_id = $row['perfil_id'];
            return $row;
        }

        public function editar(){
            //se actualiza la tabla usuario
            $sql = "UPDATE usuarios SET perfil_id = '{$this->perfil_id}' WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql);
            // se realiza el select para buscar el id de la persona
            $sql_persona = "SELECT persona_id FROM usuarios WHERE id= '{$this->id}'";
            $resultado_persona = $this->con->consultaRetorno($sql_persona);
            $row=mysql_fetch_assoc($resultado_persona);
            $persona_id=$row['persona_id'];
            //se actualiza la tabla persona
            $sql = "UPDATE personas SET nombre = '{$this->nombre}', direccion = '{$this->direccion}', telefono = '{$this->telefono}' WHERE id = $persona_id";
            $this->con->consultaSimple($sql);
            return true;
        }

        public function registrarbitacora(){
            //se inserta el registro de la bitacora
            $sql = "INSERT INTO bitacora (usuario_id, operacion, fecha) VALUES('{$this->usuario_id}','{$this->operacion}','{$this->fecha}')";
            $this->con->consultaSimple($sql);
            
            return true;
        }
    }       
?>