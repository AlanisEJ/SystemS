<?php

    class conexion{
        private $LH = "localhost";
        private $USER = "root";
        private $PASS = "";
        private $BD = "prueba";
        public $conn;
        public function __construct()
        {
            $this->conn = mysqli_connect($this->LH, $this->USER, $this->PASS, $this->BD);

            //verificar la conexion

            if ($this->conn->connect_error) {
                die("Connection failed: ". $this->conn->connect_error);
            }

        }
        //Metodo para ejecutar consultas SQL

        public function consultar($sql){
            $resultado = $this->conn->query($sql);
            return $resultado;
        }

        //Metodo para cerrar la conexion 
        public function cerrar(){
            $this->conn->close();
        }

   }
?>