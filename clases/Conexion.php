<?php

    class Conexion{

        //Atributos
        private $host;
        private $user;
        private $pass;
        private $bd;

        //Metodos
        public function __construct(){
            $this->host = "localhost";
            $this->user = "user_sgme";
            $this->pass = "123456";
            $this->bd = "sgmdb";

            $con = mysql_connect($this->host, $this->user, $this->pass);
            if($con)
                mysql_select_db($this->bd, $con);
        }

        public function consultaSimple($sql){

            mysql_query($sql);
        }

        public function consultaRetorno($sql)
        {
            $consulta = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
            return $consulta;
        }

    }

?>
