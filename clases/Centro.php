    <?php

    //CLASE DE CONEXIÓN INCLUIDA
    include_once('Conexion.php');

    class Centro{

        //Atributos
        private $id;
        private $codigo;
        private $nombre;
        private $direccion;
        private $telefono;
        private $camas;
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
            $sql = "SELECT * FROM centros";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){

            $sql2 = "SELECT * FROM centros WHERE codigo = '{$this->codigo}'";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);
            if($num != 0){
                return false;
            }else{
                $sql_insert_centro = "INSERT INTO centros (codigo, nombre, direccion, telefono, camas) VALUES ('{$this->codigo}', '{$this->nombre}', '{$this->direccion}', '{$this->telefono}', '{$this->camas}')";
                $this->con->consultaSimple($sql_insert_centro);
                // una vez que se inserto el centro debo buscar el id que se le puso a este nuevo centro
                // para proceder a insertar las especialidades de ese centro
                $sql_buscar_ultimo_centro = "SELECT id FROM centros ORDER BY id DESC LIMIT 1";
                $resultado = $this->con->consultaRetorno($sql_buscar_ultimo_centro);
                $row=mysql_fetch_assoc($resultado);
                $centro_id=$row['id'];
                // guardando las especialidades asociadas al centro
                if ($this->especialidades !="")
                {
                    if(is_array($this->especialidades))
                    {
                        //realizamos el ciclo
                        while(list($key,$value) = each($this->especialidades))
                        {
                            //debemos verificar que no ya no haya estado almacenada la especialidad para ese centro
                            $sql_buscar_especialidades = "SELECT * FROM centros_especialidades WHERE centros_id = $centro_id AND especialidades_id = $value";
                            $resultado_especialidades = $this->con->consultaRetorno($sql_buscar_especialidades);
                            $num = mysql_num_rows($resultado_especialidades);
                            if($num != 0){
                                return false;
                            }else{
                                $sql = "INSERT INTO centros_especialidades (centros_id, especialidades_id) VALUES ($centro_id, $value)";
                                $this->con->consultaSimple($sql);
                            }
                        }
                    }
                }
                return true;
            }
        }

        public function eliminar(){
            $sql_borrar_centro = "DELETE FROM centros WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql_borrar_centro);
            $sql_borrar_especialidad_centro = "DELETE FROM centros_especialidades WHERE centros_id = '{$this->id}'";
            $this->con->consultaSimple($sql_borrar_especialidad_centro);
            return true;
            
        }

        public function ver(){
            $sql = "SELECT * FROM centros WHERE id = '{$this->id}' LIMIT 1";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id = $row['id'];
            $this->codigo = $row['codigo'];
            $this->nombre = $row['nombre'];
            $this->direccion = $row['direccion'];
            $this->telefono = $row['telefono'];
            $this->camas = $row['camas'];
            $this->especialidades = $row['especialidad'];
            return $row;
        }

        public function ver_especialidades(){
            $sql = "SELECT e.nombre 
                    FROM especialidades e
                    LEFT JOIN centros_especialidades ce ON ce.especialidades_id = e.id
                    WHERE ce.centros_id='{$this->id}' AND ce.status=1";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function ver_especialidad_check(){
            $sql = "SELECT count(*) as contador FROM centros_especialidades ce WHERE ce.centros_id='{$this->centros_id}' AND ce.especialidades_id='{$this->especialidades_id}'";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);
            //Set
            $this->contador = $row['contador'];
            return $row;
        }

        public function editar(){
            $sql1 = "UPDATE centros SET nombre = '{$this->nombre}', direccion = '{$this->direccion}', telefono = '{$this->telefono}', camas = '{$this->camas}' WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql1);
            // se procede a eliminar todos las especialidades del centro para luego insertarlas nuevamente
            $sql2 = "DELETE FROM centros_especialidades WHERE centros_id = '{$this->id}'";
            $this->con->consultaSimple($sql2);
            // se procede ahora a insertar las especialidades del centro 
            if ($this->especialidades !="")
            {
                if(is_array($this->especialidades))
                {
                    //realizamos el ciclo
                    while(list($key,$value) = each($this->especialidades))
                    {
                        $sql3 = "INSERT INTO centros_especialidades (centros_id, especialidades_id) VALUES ('{$this->id}', $value)";
                        $this->con->consultaSimple($sql3);
                    }
                }
            }
            return true;
        }

        public function ver_disponibilidad(){
            if ($this->especialidad_id == -1){
                // si especialidad_id es -1 entonces busca sin importar la especialidad
                $sql = "SELECT c.id, c.codigo, c.nombre, c.direccion, c.telefono, c.camas
                        FROM centros c 
                        WHERE c.direccion LIKE '%{$this->direccion}%'
                        AND c.camas > 0;";
            }else{
                $sql = "SELECT c.id, c.codigo, c.nombre, c.direccion, c.telefono, c.camas
                        FROM centros c 
                        INNER JOIN centros_especialidades ce ON ce.centros_id=c.id
                        WHERE ce.especialidades_id='{$this->especialidad_id}'
                        AND c.direccion LIKE '%{$this->direccion}%'
                        AND c.camas > 0;";
            }
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function solicitarCama(){
            $sql = "INSERT INTO operaciones (centro_id, usuario_id_solicitud, fecha_solicitud, observacion_solicitud) 
                    VALUES('{$this->centro_id}','{$this->usuario_id_solicitud}','{$this->fecha_solicitud}','{$this->observacion_solicitud}');";
            $this->con->consultaSimple($sql);
            return true;
        }

        public function asignarCama(){
            //se procede a actualizar la cantidad de camas en el centro
            $sql1 = "SELECT camas FROM centros WHERE id = '{$this->centro_id}'";
            $resultado1 = $this->con->consultaRetorno($sql1);
            $row=mysql_fetch_assoc($resultado1);
            $cantidad=$row['camas'];
            $cantidad_nueva=$cantidad-1;
            $sql_actualiza_camas_centro = "UPDATE centros SET camas = $cantidad_nueva WHERE id = '{$this->centro_id}'";
            $this->con->consultaSimple($sql_actualiza_camas_centro);
            //se procede a actualizar el estatus de la operacion a 2->asignada
            $sql = "UPDATE operaciones SET usuario_id_asignacion='{$this->usuario_id_asignacion}', fecha_asignacion='{$this->fecha_asignacion}', 
                    observacion_asignacion='{$this->observacion_asignacion}', status_operacion=2 WHERE id='{$this->operacion_id}';";
            $this->con->consultaSimple($sql);
            return true;
        }

        public function cancelarCama(){
            $sql = "UPDATE operaciones SET usuario_id_cancelacion='{$this->usuario_id_cancelacion}', fecha_cancelacion='{$this->fecha_cancelacion}', 
                    observacion_cancelacion='{$this->observacion_cancelacion}', status_operacion=3 WHERE id='{$this->operacion_id}';";
            $this->con->consultaSimple($sql);
            return true;
        }

        public function verOperacionesPorStatus(){
            $sql = "SELECT * FROM operaciones WHERE centro_id='{$this->centro_id}' AND status_operacion='{$this->status_operacion}';";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function listarOperaciones(){
            $sql = "SELECT op.*, p.nombre,
                    CASE op.status_operacion
                      WHEN 1 THEN 'Solicitud Nueva'
                      WHEN 2 THEN 'Cama asignada'
                      WHEN 3 THEN 'Solicitud Cancelada'
                    END AS status_texto
                    FROM operaciones op
                    INNER JOIN usuarios u ON u.id=op.usuario_id_solicitud
                    INNER JOIN personas p ON u.persona_id=p.id
                    WHERE centro_id='{$this->centro_id}';";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function buscarCentro(){
            $sql = "SELECT centro_id FROM recepcionistas_centros WHERE usuario_id = '{$this->id}' LIMIT 1";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);
            $centro_id=$row['centro_id'];
            //Set
            return $centro_id;
        }
    }

?>